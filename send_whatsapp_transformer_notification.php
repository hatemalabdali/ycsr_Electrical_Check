<?php
// send_whatsapp_transformer_notification.php
// هذا الملف يقوم بالتحقق من المهام غير المكتملة في جداول صيانة المحولات
// ثم يقوم بإنشاء روابط wa.me لإرسال تنبيهات واتساب يدوياً.

// تفاصيل الاتصال بقاعدة البيانات
$Xservername =  "sql202.infinityfree.com";
$Xusername = "if0_39426096";
$Xpassword = "WKa8VQVTNfi";
$Xdbname = 'if0_39426096_mwt';

// $Xservername =  "localhost";
// $Xusername = "root";
// $Xpassword = "";
// $Xdbname = 'mwt';

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. تحديد الأسبوع والسنة الحاليين
$currentYear = date('Y');
$currentMonthNumber = date('n'); // رقم الشهر بدون صفر بادئ (1-12)
$currentMonthName = strtolower(date("F", mktime(0, 0, 0, $currentMonthNumber, 10))); // اسم الشهر بالإنجليزية بأحرف صغيرة

// دالة لحساب تاريخ بداية ونهاية الأسبوع من رقم الأسبوع والسنة
// تم تعديل هذه الدالة لتبدأ الأسبوع من يوم السبت
function getStartAndEndDateOfWeek($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week); // يضبط التاريخ على يوم الاثنين من الأسبوع المحدد (ISO standard)

    // لضبط البداية من السبت، نعود يومين من الاثنين
    $dto->modify('-2 days');
    $start_date = $dto->format('d/m/Y');

    // نضيف 6 أيام من السبت للحصول على يوم الجمعة (نهاية الأسبوع)
    $dto->modify('+6 days');
    $end_date = $dto->format('d/m/Y');
    return ['start' => $start_date, 'end' => $end_date];
}

$currentWeekISO = date('W'); // رقم الأسبوع ISO 8601 (من 01 إلى 53)
$week_dates = getStartAndEndDateOfWeek($currentWeekISO, $currentYear);
$week_range_text = "للأسبوع من " . $week_dates['start'] . " إلى " . $week_dates['end'];


// 2. تحديد أرقام المحولات التي يجب التحقق منها
// بناءً على ملف weekly_transformers.php، أرقام المحولات هي 1, 2, 3, 5
$transformer_numbers = ['1', '2', '3', '5'];

$incomplete_transformer_tables = [];

// 3. التحقق من اكتمال المهام لكل جدول محولات
foreach ($transformer_numbers as $transformer_num) {
    // بناء اسم الجدول ديناميكياً: month_year_transformer_number
    $table_name = $currentMonthName . '_' . $currentYear . '_' . $transformer_num;

    // التحقق مما إذا كان الجدول موجوداً (لتجنب الأخطاء إذا لم يكن الجدول موجوداً)
    $check_table_exists_sql = "SHOW TABLES LIKE '" . $table_name . "'";
    $table_exists_result = $conn->query($check_table_exists_sql);

    if ($table_exists_result && $table_exists_result->num_rows > 0) {
        // المنطق الجديد: فحص الصف الأول (id=1) للأيام التي تقع ضمن الأسبوع الحالي
        $is_table_incomplete_for_week = false;

        // تحديد الأيام (أرقام الأعمدة) التي تقع ضمن الأسبوع الحالي والشهر الحالي
        $days_to_check = [];
        $week_start_date_obj = new DateTime();
        $week_start_date_obj->setISODate($currentYear, $currentWeekISO); // يوم الاثنين من الأسبوع
        $week_start_date_obj->modify('-2 days'); // تعديل ليصبح يوم السبت

        $week_end_date_obj = clone $week_start_date_obj;
        $week_end_date_obj->modify('+6 days'); // يوم الجمعة من نفس الأسبوع

        $interval = new DateInterval('P1D');
        $period = new DatePeriod($week_start_date_obj, $interval, $week_end_date_obj->modify('+1 day')); // +1 يوم لتضمين تاريخ النهاية

        foreach ($period as $date) {
            // فقط الأيام التي تقع ضمن الشهر الحالي
            if ($date->format('Y') == $currentYear && $date->format('n') == $currentMonthNumber) {
                $days_to_check[] = (int)$date->format('j'); // رقم اليوم (1-31)
            }
        }

        if (!empty($days_to_check)) {
            // بناء استعلام SELECT لجلب قيم الأعمدة اليومية للصف الأول (id=1)
            $select_columns_sql = [];
            foreach ($days_to_check as $day) {
                $select_columns_sql[] = "`" . $day . "`";
            }
            $columns_string = implode(', ', $select_columns_sql);

            // افتراض أننا نفحص الصف الذي يحمل id=1
            $sql_check_daily_completion = "SELECT " . $columns_string . " FROM `" . $table_name . "` WHERE `id` = 1";
            $result_daily_completion = $conn->query($sql_check_daily_completion);

            if ($result_daily_completion && $result_daily_completion->num_rows > 0) {
                $row_daily_completion = $result_daily_completion->fetch_assoc();
                foreach ($days_to_check as $day) {
                    // إذا كان أي من الأعمدة اليومية فارغاً، يعتبر الجدول غير مكتمل لهذا الأسبوع
                    if (empty($row_daily_completion[$day])) {
                        $is_table_incomplete_for_week = true;
                        break; // تم العثور على يوم غير مكتمل، لا داعي للمتابعة لهذا الجدول
                    }
                }
            } else {
                // إذا لم يتم العثور على الصف الذي يحمل id=1، يعتبر الجدول غير مكتمل
                $is_table_incomplete_for_week = true;
                error_log("Row with ID 1 not found in table " . $table_name . " for daily check.");
            }
        } else {
            // إذا لم تكن هناك أيام من الأسبوع الحالي تقع ضمن الشهر الحالي، يعتبر الجدول مكتملًا (لعدم وجود أيام للفحص)
            $is_table_incomplete_for_week = false;
        }

        if ($is_table_incomplete_for_week) {
            $incomplete_transformer_tables[] = $table_name;
        }
    } else {
        // الجدول غير موجود لهذا الشهر/السنة/المحول، يمكن تسجيل ذلك أو تجاهله
        error_log("Transformer table does not exist: " . $table_name);
    }
}

// 4. بناء رسالة واتساب
$whatsapp_message_body = "";
if (empty($incomplete_transformer_tables)) {
    $whatsapp_message_body = "جميع مهام صيانة المحولات " . $week_range_text . " من عام " . $currentYear . " مكتملة. أحسنتم!";
} else {
    $whatsapp_message_body = "تنبيه! توجد مهام صيانة محولات غير مكتملة " . $week_range_text . " من عام " . $currentYear . " في الجداول التالية:\n\n";
    foreach ($incomplete_transformer_tables as $table) {
        // استخراج رقم المحول من اسم الجدول
        $parts = explode('_', $table);
        $transformer_number = end($parts);
        $display_name = "المحول رقم " . $transformer_number;
        $whatsapp_message_body .= "- " . $display_name . "\n";
    }
    $whatsapp_message_body .= "\nالرجاء إكمال المهام في أقرب وقت ممكن.";
}

// 5. جلب أرقام هواتف المهندسين وأسمائهم (تضمين الجميع الآن)
$engineer_data = []; // سنخزن هنا كلاً من الاسم ورقم الهاتف
$sql_engineers = "SELECT user_name, phone_number FROM `users` WHERE `phone_number` IS NOT NULL AND `phone_number` != ''";
$result_engineers = $conn->query($sql_engineers);

if ($result_engineers) {
    while ($row_engineer = $result_engineers->fetch_assoc()) {
        $engineer_data[] = [
            'name' => $row_engineer['user_name'],
            'phone' => $row_engineer['phone_number']
        ];
    }
} else {
    error_log("Failed to fetch engineer phone numbers: " . $conn->error);
}

$conn->close();

// 6. إنشاء صفحة HTML تحتوي على روابط wa.me
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تنبيهات واتساب للمحولات</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f0f2f5;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #0056b3;
            margin-bottom: 20px;
        }
        .message-preview {
            background-color: #e9ecef;
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            white-space: pre-wrap; /* للحفاظ على تنسيق الأسطر الجديدة */
            text-align: right;
        }
        .whatsapp-link {
            display: block;
            background-color: #25d366;
            color: white;
            padding: 12px 20px;
            margin: 10px auto;
            border-radius: 25px;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: fit-content;
        }
        .whatsapp-link:hover {
            background-color: #1da851;
        }
        .no-tasks {
            color: #28a745;
            font-weight: bold;
        }
        .error-message {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>تنبيهات صيانة المحولات</h1>
        <p>رسالة التنبيه التي سيتم إرسالها:</p>
        <div class="message-preview"><?php echo nl2br(htmlspecialchars($whatsapp_message_body)); ?></div>

        <?php if (!empty($engineer_data)): ?>
            <p>اضغط على الروابط أدناه لإرسال الرسالة عبر واتساب:</p>
            <?php foreach ($engineer_data as $engineer): ?>
                <?php
                    $encoded_message = urlencode($whatsapp_message_body);
                    $whatsapp_url = "https://wa.me/{$engineer['phone']}?text={$encoded_message}";
                ?>
                <a href="<?php echo $whatsapp_url; ?>" target="_blank" class="whatsapp-link">
                    إرسال إلى <?php echo htmlspecialchars($engineer['name']); ?>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-tasks">لا توجد مهام غير مكتملة أو لم يتم العثور على أرقام هواتف للمهندسين.</p>
        <?php endif; ?>

        <?php if (!empty($incomplete_transformer_tables) && empty($engineer_data)): ?>
            <p class="error-message">توجد جداول محولات غير مكتملة ولكن لم يتم العثور على أرقام هواتف للمهندسين لإرسال التنبيهات.</p>
        <?php endif; ?>
    </div>
</body>
</html>
