<?php
// تمكين عرض الأخطاء (للتdebugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// بيانات الاتصال بقاعدة البيانات
$servername = "sql202.infinityfree.com";
$username = "if0_39426096";
$password = "WKa8VQVTNfi";
$dbname = "if0_39426096_mwt";

// استقبال البيانات من الطلب
$year = $_POST['year'] ?? '';
$month = $_POST['month'] ?? '';
$day = $_POST['day'] ?? '';
$column = $_POST['column'] ?? '';

// التحقق من صحة البيانات
if (empty($year) || empty($month) || empty($column)) {
    echo json_encode([
        'success' => false,
        'message' => 'بيانات غير مكتملة',
        'value' => '0'
    ]);
    exit;
}

try {
    // إنشاء connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // إنشاء اسم الجدول بناءً على السنة والشهر
    $tableName = "R_" . $year . "_" . str_pad($month, 2, '0', STR_PAD_LEFT);
    
    // التحقق من وجود الجدول
    $checkTable = $conn->prepare("SHOW TABLES LIKE :tableName");
    $checkTable->bindParam(':tableName', $tableName);
    $checkTable->execute();
    
    if ($checkTable->rowCount() == 0) {
        echo json_encode([
            'success' => true,
            'message' => 'الجدول غير موجود',
            'value' => '0'
        ]);
        exit;
    }
    
    // التحقق من وجود العمود في الجدول
    $checkColumn = $conn->prepare("SHOW COLUMNS FROM `$tableName` LIKE :columnName");
    $checkColumn->bindParam(':columnName', $column);
    $checkColumn->execute();
    
    if ($checkColumn->rowCount() == 0) {
        echo json_encode([
            'success' => true,
            'message' => 'العمود غير موجود',
            'value' => '0'
        ]);
        exit;
    }
    
    // جلب البيانات من الجدول
    $sql = "SELECT `$column` FROM `$tableName` WHERE SR = :day";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':day', $day);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $value = $data[$column] ?? '0';
        
        echo json_encode([
            'success' => true,
            'message' => 'تم جلب البيانات بنجاح',
            'value' => $value
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'message' => 'لا توجد بيانات',
            'value' => '0'
        ]);
    }
    
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'خطأ في الاتصال بقاعدة البيانات: ' . $e->getMessage(),
        'value' => '0'
    ]);
}

$conn = null;
?>