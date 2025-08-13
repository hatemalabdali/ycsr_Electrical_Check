<?php
// update_transformer_daily.php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // تفاصيل الاتصال بقاعدة البيانات

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

    // اسم الجدول من الجلسة
    $tableName = $_SESSION['tableName'] ?? null;
    $engineerName = $_SESSION['username'] ?? 'Unknown Engineer';

    if ($tableName === null) {
        echo json_encode(['status' => 'error', 'message' => 'Table name not found in session.']);
        exit();
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Connection failed.']);
        exit();
    }

    // استلام البيانات من طلب AJAX
    $id = $_POST['id'] ?? null;
    $column = $_POST['day'] ?? null; // هنا اسم العمود هو رقم اليوم
    $value = $_POST['value'] ?? null;

    if ($id === null || $column === null) {
        echo json_encode(['status' => 'error', 'message' => 'Missing ID or Day parameter.']);
        $conn->close();
        exit();
    }

    // التحقق من أن القيمة ليست فارغة قبل التحديث
    if (empty($value)) {
        $sql = "UPDATE `" . $tableName . "` SET `" . $column . "` = '0', `Eng` = ? WHERE `id` = ?";
    } else {
        $sql = "UPDATE `" . $tableName . "` SET `" . $column . "` = ?, `Eng` = ? WHERE `id` = ?";
    }

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        $conn->close();
        exit();
    }

    if (empty($value)) {
        $stmt->bind_param('si', $engineerName, $id);
    } else {
        $stmt->bind_param('ssi', $value, $engineerName, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
