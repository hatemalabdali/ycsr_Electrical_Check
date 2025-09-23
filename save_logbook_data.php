<?php
// تمكين عرض الأخطاء (يجب تعطيل هذا في production)


// بيانات الاتصال بقاعدة البيانات
$servername = "sql202.infinityfree.com";
$username = "if0_39426096";
$password = "WKa8VQVTNfi";
$dbname = "if0_39426096_mwt";

// استقبال البيانات من الطلب
$row = $_POST['row'] ?? '';
$column = $_POST['column'] ?? '';
$value = $_POST['value'] ?? '';
$day = $_POST['day'] ?? '';
$month = $_POST['month'] ?? '';
$year = $_POST['year'] ?? '';

// التحقق من صحة البيانات
if (empty($row) || empty($column) || empty($day) || empty($month) || empty($year)) {
    echo json_encode([
        'success' => false,
        'message' => 'بيانات غير مكتملة'
    ]);
    exit;
}

// إنشاء اسم الجدول بناءً على السنة والشهر
$tableName = "R_" . $year . "_" . $month;

try {
    // إنشاء connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // التحقق من وجود الجدول
    $checkTable = $conn->prepare("SHOW TABLES LIKE :tableName");
    $checkTable->bindParam(':tableName', $tableName);
    $checkTable->execute();
    
    if ($checkTable->rowCount() == 0) {
        echo json_encode([
            'success' => false,
            'message' => 'الجدول غير موجود: ' . $tableName
        ]);
        exit;
    }
    
    // التحقق من وجود العمود في الجدول
    $checkColumn = $conn->prepare("SHOW COLUMNS FROM `$tableName` LIKE :columnName");
    $checkColumn->bindParam(':columnName', $column);
    $checkColumn->execute();
    
    if ($checkColumn->rowCount() == 0) {
        echo json_encode([
            'success' => false,
            'message' => 'العمود غير موجود: ' . $column
        ]);
        exit;
    }
    
    // التحقق من وجود الصف (SR) والقيمة الحالية
    $checkCurrentValue = $conn->prepare("SELECT `$column` FROM `$tableName` WHERE SR = :row");
    $checkCurrentValue->bindParam(':row', $row);
    $checkCurrentValue->execute();
    
    if ($checkCurrentValue->rowCount() == 0) {
        // إذا لم يكن الصف موجوداً، نقوم بإدراجه أولاً
        $insertRow = $conn->prepare("INSERT INTO `$tableName` (SR, `$column`) VALUES (:row, :value)");
        $insertRow->bindParam(':row', $row);
        $insertRow->bindParam(':value', $value);
        $insertRow->execute();
        
        echo json_encode([
            'success' => true,
            'message' => 'تم إضافة صف جديد وتحديث البيانات بنجاح'
        ]);
    } else {
        // إذا كان الصف موجوداً، نتحقق إذا كانت القيمة مختلفة
        $currentData = $checkCurrentValue->fetch(PDO::FETCH_ASSOC);
        $currentValue = $currentData[$column] ?? '';
        
        if ($currentValue == $value) {
            // إذا كانت القيمة نفسها، نعتبر العملية ناجحة ولكن لا داعي للتحديث
            echo json_encode([
                'success' => true,
                'message' => 'القيمة لم تتغير، لا داعي للتحديث'
            ]);
        } else {
            // إذا كانت القيمة مختلفة، نقوم بالتحديث
            $sql = "UPDATE `$tableName` SET `$column` = :value WHERE SR = :row";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':value', $value);
            $stmt->bindParam(':row', $row);
            $stmt->execute();
            
            echo json_encode([
                'success' => true,
                'message' => 'تم تحديث البيانات بنجاح'
            ]);
        }
    }
    
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'خطأ في الاتصال بقاعدة البيانات: ' . $e->getMessage()
    ]);
}

$conn = null;
?>