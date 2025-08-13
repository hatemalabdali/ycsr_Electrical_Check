<?php
session_start();



if ($_SESSION['username'] === "Osama Al-Maqarmi") {

    $arabicname = "أســامــة المــقـرمــي";
}

if ($_SESSION['username'] === "Hatem Alabdali") {

    $arabicname =  "م/ حــاتم العـبـدلــي";
}

if ($_SESSION['username'] === "Khalid Hammoud") {

    $arabicname =  "م/ خــالــد نــاشــر";
}

if ($_SESSION['username'] === "Khalid Al-Maqarmi") {

    $arabicname =  "م/ خــالــد المــقـرمــي";
}

if ($_SESSION['username'] === "Akram Samir") {

    $arabicname =  "أكــرم سـمـيــر";
}

if ($_SESSION['username'] === "Riyadh Al-Rajhi") {

    $arabicname =  "ريــاض الراجــحــي";
}

if ($_SESSION['username'] === "Bassem Abdeljawad") {

    $arabicname =  "م/ بــاسم عـبـد الجــواد";
}

if ($_SESSION['username'] === "Murad Al-Dabai") {

    $arabicname =  "مــراد الـدبـعــي";
}

if ($_SESSION['username'] === "Younes") {

    $arabicname =  "يــونــس عبـــيد";
}

if ($_SESSION['username'] === "Mohammed Abdulrab") {

    $arabicname =  "م/ مـحـمـد الـزيلعـــي";
}

if ($_SESSION['username'] === "Mahmoud Al-Shumairi") {

    $arabicname =  "م/ مـحـمـود الـشـمـيـري";
}
if ($_SESSION['username'] === "Ameen Al-Shumairi") {

    $arabicname =  "م/ أمـــيــن الـشـمـيـري";
}


// 1. معالجة قيم العام، الشهر، والمحول:

//    - إعطاء الأولوية للقيم المستلمة عبر GET (من النموذج بعد الإرسال).

//    - إذا لم توجد قيم في GET، استخدم القيم المخزنة في الجلسة.

//    - إذا لم توجد قيم في الجلسة، استخدم التاريخ الحالي كافتراضي للسنة والشهر، والمحول الافتراضي '1'.



$_SESSION['year_groups'] = isset($_GET['year_groups']) && $_GET['year_groups'] !== '' ? $_GET['year_groups'] : (empty($_SESSION['year_groups']) ? date("Y") : $_SESSION['year_groups']);

$_SESSION['month_groups'] = isset($_GET['month_groups']) && $_GET['month_groups'] !== '' ? $_GET['month_groups'] : (empty($_SESSION['month_groups']) ? date("m") : $_SESSION['month_groups']);

$_SESSION['transfrmer_groups'] = isset($_GET['transfrmer_groups']) && $_GET['transfrmer_groups'] !== '' ? $_GET['transfrmer_groups'] : (empty($_SESSION['transfrmer_groups']) ? '1' : $_SESSION['transfrmer_groups']);

 $monthName = strtolower(date("F", mktime(0, 0, 0, $_SESSION['month_groups'], 10)));
// تأكد من أن هذا الملف يستقبل طلب POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

// قراءة البيانات المرسلة من JavaScript
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);

// التحقق من وجود الأيام المحددة
if (!isset($inputData['days']) || !is_array($inputData['days'])) {
    http_response_code(400);
    echo "Bad Request: Missing 'days' parameter.";
    exit;
}

$selectedDays = $inputData['days'];

// =========================================================================
// هنا يجب أن تضع كود PHP الخاص بك لإنشاء التقرير
// =========================================================================

// مثال على كيفية استخدام الأيام المحددة في استعلام قاعدة البيانات
// ستكون الأيام المحددة في مصفوفة $selectedDays

// مثال: تحويل مصفوفة الأيام إلى قائمة مفصولة بفاصلة لـ SQL IN clause
$daysList = implode(', ', array_map('intval', $selectedDays));

// مثال افتراضي للاستعلام (يجب تعديله ليتناسب مع جدولك)
// $sql = "SELECT * FROM your_table_name WHERE day IN ($daysList)";
// $result = $conn->query($sql);

// هنا تضع الكود الذي يولد رسالة التقرير
// سنفترض أنك تضع كل محتوى التقرير في متغير واحد يسمى $reportContent
$reportContent = "";
// مثال: حلقة على الأيام المحددة
// foreach ($selectedDays as $day) {
//     // هنا تضع منطقك لاستخراج بيانات كل يوم
//     $reportContent .= "تقرير اليوم " . $day . " (مثال)\n";
//     $reportContent .= "========================\n";
//     $reportContent .= "درجة الحرارة: 80\n";
//     $reportContent .= "حالة الأداء: جيد\n";
//     $reportContent .= "========================\n\n";
// }
//  $reportContent .= "========================\n\n";
$reportContent .= "========================\n";
$reportContent .= "========================\n";
$reportContent .= "========================\n";
$reportContent = "  تقرير  الفحص اليومي للمحولات "  . "\n";
$reportContent .= "العام :  " . $_SESSION['year_groups'] . "\n";
$reportContent .= "الشهر :  " . date('n', strtotime($monthName)) . "   ( " . $monthName . " )" . "\n";
$reportContent .= "المحول :  " . $_SESSION['transfrmer_groups'] . "\n";
$reportContent .= "بواسطة :  " . $arabicname . "\n";
$reportContent .= "\n" . "   ***************************" . "\n";
foreach ($selectedDays as $daaay) {
    $reportContent .= "========================\n";
    $reportContent .= "اليوم: " . $daaay . "\n";
    $reportContent .= "========================\n";
    $reportContent .= $_SESSION["x-" . $daaay]. "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 32] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 64] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 96] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 128] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 160] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 192] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 224] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 256] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 288] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 320] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 352] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 384] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 416] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 448] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 480] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 512] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 544] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 576] . "\n";
    $reportContent .= $_SESSION["x-" . $daaay + 608] . "\n";
}
//         for ($i = 0; $i < 31; $i++) {
//             if (isset($_SESSION["x-" . $i])!== '') {
//                 $reportContent .= $_SESSION["x-" . $i];
//             }
//         }





// =========================================================================
// نهاية الجزء الذي يجب تعديله
// =========================================================================

// إرسال محتوى التقرير كنص
echo $reportContent;
