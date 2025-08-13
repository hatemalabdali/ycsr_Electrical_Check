<?php
// send_whatsapp_notification.php
// هذا الملف يقوم بالتحقق من المهام غير المكتملة في جداول صيانة المحركات
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

// 1. تحديد الأسبوع والسنة الحاليين (باستخدام ISO 8601 week number)
$currentYear = date('Y');
$currentWeek = date('W'); // رقم الأسبوع ISO 8601 (من 01 إلى 53)

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

$week_dates = getStartAndEndDateOfWeek($currentWeek, $currentYear);
$week_range_text = "للأسبوع من " . $week_dates['start'] . " إلى " . $week_dates['end'];


// 2. جلب أسماء جداول المحركات ذات الصلة بالسنة الحالية
$motor_tables = [];
$sql_tables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME LIKE 'group_%_" . $currentYear . "'";
$stmt_tables = $conn->prepare($sql_tables);
if ($stmt_tables) {
    $stmt_tables->bind_param("s", $dbname);
    $stmt_tables->execute();
    $result_tables = $stmt_tables->get_result();
    while ($row = $result_tables->fetch_assoc()) {
        $motor_tables[] = $row['TABLE_NAME'];
    }
    $stmt_tables->close();
} else {
    error_log("Failed to prepare table selection query: " . $conn->error);
}

$incomplete_tables = [];

// 3. التحقق من اكتمال المهام لكل جدول
foreach ($motor_tables as $table_name) {
    // جلب الصفوف التي Eng فيها فارغ للأسبوع الحالي
    $sql_check_incomplete = "SELECT COUNT(*) AS incomplete_count FROM `" . $table_name . "` WHERE `week_id` = ? AND (`Eng` IS NULL OR `Eng` = '')";
    $stmt_check = $conn->prepare($sql_check_incomplete);

    if ($stmt_check) {
        $stmt_check->bind_param("i", $currentWeek);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $row_check = $result_check->fetch_assoc();

        if ($row_check['incomplete_count'] > 0) {
            $incomplete_tables[] = $table_name;
        }
        $stmt_check->close();
    } else {
        error_log("Failed to prepare incomplete check query for table " . $table_name . ": " . $conn->error);
    }
}

// 4. بناء رسالة واتساب
$whatsapp_message_body = "";
if (empty($incomplete_tables)) {
    $whatsapp_message_body = "جميع مهام صيانة المحركات " . $week_range_text . " من عام " . $currentYear . " مكتملة. أحسنتم!";
} else {
    $whatsapp_message_body = "تنبيه! توجد مهام صيانة محركات غير مكتملة " . $week_range_text . " من عام " . $currentYear . " في الجداول التالية:\n\n";
    foreach ($incomplete_tables as $table) {
        $whatsapp_message_body .= "- " . $table . "\n";
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
    <title>تنبيهات واتساب</title>
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
        <h1>تنبيهات صيانة المحركات</h1>
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

        <?php if (!empty($incomplete_tables) && empty($engineer_data)): ?>
            <p class="error-message">توجد جداول غير مكتملة ولكن لم يتم العثور على أرقام هواتف للمهندسين لإرسال التنبيهات.</p>
        <?php endif; ?>
    </div>
</body>
</html>
