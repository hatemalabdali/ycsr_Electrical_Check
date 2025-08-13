<?php
// update_status.php

session_start();

// تأكد من أن الطلب هو POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $Xservername =  "sql202.infinityfree.com";
$Xusername = "if0_39426096";
$Xpassword = "WKa8VQVTNfi";
$Xdbname = 'if0_39426096_mwt';

// $Xservername =  "localhost";
// $Xusername = "root";
// $Xpassword = "";
// $Xdbname = 'mwt';

    $servername = $Xservername;
    $username = $Xusername;
    $password = $Xpassword;
    $dbname = $Xdbname;

    // اسم الجدول الذي تريد تحديثه
    $tableName = $_SESSION['tableName'];
    // إضافة اسم المهندس من الجلسة
    $engineerName = $_SESSION['username'] ?? 'Unknown Engineer';

    // إنشاء اتصال بقاعدة البيانات
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

    // التحقق من الاتصال
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }

    // استلام البيانات المرسلة من JavaScript
    $id = $_POST['id'] ?? null;
    $day = $_POST['day'] ?? null;
    $value = $_POST['value'] ?? null; // ستكون '1', '2', أو '' (فارغة)

    // التحقق من صحة البيانات الأساسية
    if ($id === null || $day === null) {
        echo json_encode(['status' => 'error', 'message' => 'Missing ID or Day parameter.']);
        $conn->close();
        exit();
    }

    // تحويل رقم اليوم إلى عدد صحيح والتحقق من نطاقه (من 1 إلى 31)
    $day = (int)$day;
    if ($day < 1 || $day > 31) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid day parameter.']);
        $conn->close();
        exit();
    }

    // تحديد القيمة المراد تخزينها في قاعدة البيانات
    $dbValue = null;
    if ($value === '1' || $value === '2') {
        $dbValue = $value;
    }

    // **التغيير هنا:** أضفنا تحديثًا لعمود `Eng` في جملة SQL
    // إعداد استعلام التحديث باستخدام PreparedStatement
    $sql = "UPDATE `" . $tableName . "` SET `" . $day . "` = ?, `Eng` = ? WHERE `id` = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        $conn->close();
        exit();
    }

    // **التغيير هنا:** أضفنا ربطًا للمتغير `engineerName`
    // ربط البارامترات: 's' للسلسلة (dbValue)، 's' للسلسلة (engineerName)، 'i' للعدد الصحيح (id)
    $stmt->bind_param('ssi', $dbValue, $engineerName, $id);

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error]);
    }

    // إغلاق الاستعلام والاتصال
    $stmt->close();
    $conn->close();
} else {
    // إذا لم يكن الطلب POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
