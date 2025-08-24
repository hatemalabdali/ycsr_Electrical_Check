<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// بيانات الاتصال بقاعدة البيانات
$servername = "sql202.infinityfree.com";
$username = "if0_39426096";
$password = "WKa8VQVTNfi";
$dbname = 'if0_39426096_mwt';

// التحقق من وجود البيانات المرسلة عبر الرابط (GET)
if (isset($_GET['breaker']) && isset($_GET['year'])) {
    $breaker_value = $_GET['breaker'];
    $year_value = $_GET['year'];
    $tablename = $breaker_value . '_' . $year_value;

    // الاتصال بقاعدة البيانات
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
    // التحقق من الاتصال
    if ($conn->connect_error) {
        echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }

    // بناء استعلام SQL لجلب جميع البيانات
    $sql = "SELECT * FROM `$tablename`";
    $result = $conn->query($sql);

    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    if (!empty($data)) {
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'No data found or table does not exist.']);
    }

    $conn->close();
} else {
    echo json_encode(['error' => 'Missing breaker or year data.']);
}
