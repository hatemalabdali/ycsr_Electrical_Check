<?php
// أضف هذا السطر في أعلى الملف إذا لم يكن موجوداً
session_start();

// تفعيل عرض الأخطاء للمساعدة في التطوير
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// تعيين نوع المحتوى كـ JSON
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'error' => "Invalid request method."]);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    // 1. تعريف جميع المتغيرات من البيانات المستقبلة
    // if (!isset($data['conds']) || !isset($data['notes']) || !isset($data['srs']) || !isset($data['note']) || !isset($data['recommends']) || !isset($data['breaker']) || !isset($data['year']) || !isset($data['prepared_by']) || !isset($data['date_value'])) {
    //     echo json_encode(['success' => false, 'error' => "Missing or invalid data."]);
    //     exit;
    // }

    if (!isset($data['conds']) || !isset($data['notes']) || !isset($data['breaker']) || !isset($data['year']) 
        || !isset($data['srs2']) || !isset($data['AGRDS']) || !isset($data['BGRDS'])
    || !isset($data['CGRDS'])|| !isset($data['ABS']) || !isset($data['BCS']) || !isset($data['CAS'])
    || !isset($data['noteValue']) || !isset($data['prepared_by']) || !isset($data['date_value'])) {
        echo json_encode(['success' => false, 'error' => "Missing or invalid data."]);
        exit;
    }

    $stateValues = $data['conds'];
    $needMaintValues = $data['notes'];
    $srValues = $data['srs'];
    $srValues2 = $data['srs2'];
    $AGRDS = $data['AGRDS'];
    $BGRDS = $data['BGRDS'];
    $CGRDS = $data['CGRDS'];
    $ABS = $data['ABS'];
    $BCS = $data['BCS'];
    $CAS = $data['CAS'];
    $breakerName = $data['breaker'];
    $yearValue = $data['year'];
    $noteValue = $data['noteValue'];
    $Tested_By = $data['prepared_by'];
    $date_value = $data['date_value'];
    
    // بناء اسم الجدول بشكل ديناميكي
    $tableName = $breakerName . '_' . $yearValue;

    // 2. إعدادات الاتصال بقاعدة البيانات
    $servername = "sql202.infinityfree.com";
    $username = "if0_39426096";
    $password = "WKa8VQVTNfi";
    $dbname = 'if0_39426096_mwt';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }
    $conn->set_charset("utf8mb4");

    // 3. استخراج اسم المستخدم من الجلسة (مصدر موثوق)
    $loggedInUser = $_SESSION['username'] ?? '';
    
    // 4. التحقق من صلاحية التعديل لكل سجل قبل البدء بعملية الحفظ
    for ($i = 0; $i < count($srValues); $i++) {
        $sr = $srValues[$i];
        
        $checkQuery = "SELECT Tested_By FROM `$tableName` WHERE SR = ?";
        $stmt_check = $conn->prepare($checkQuery);
        if ($stmt_check === false) {
             echo json_encode(['success' => false, 'error' => 'Prepare statement failed (check): ' . $conn->error]);
             $conn->close();
             exit();
        }
        $stmt_check->bind_param("i", $sr);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
        $row = $result->fetch_assoc();
        $currentPreparedBy = $row['Tested_By'];
        $stmt_check->close();
    
        if (!empty($currentPreparedBy) && $currentPreparedBy !== $loggedInUser) {
            echo json_encode(['success' => false, 'error' => "لا تملك صلاحية تعديل السجل رقم #$sr. لقد تم إعداده مسبقاً من قبل مستخدم آخر."]);
            $conn->close();
            exit();
        }
    }
    // استعلام لتحديث عمود 'state' و 'notes'
    $inspectionQuery = "UPDATE `$tableName` SET cond = ?, Note = ? WHERE SR = ?";
    $stmt = $conn->prepare($inspectionQuery);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'error' => 'Prepare statement failed: ' . $conn->error]);
        $conn->close();
        exit();
    }

    // حفظ بيانات الأعمدة الأولى (الصفوف من 1 إلى 13)
    for ($i = 0; $i < count($srValues); $i++) {
        $sr = $srValues[$i];
        $state = $stateValues[$i];
        $needMaint = $needMaintValues[$i];
        
        $stmt->bind_param("ssi", $state, $needMaint, $sr);

        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'error' => 'Failed to save data: ' . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit();
        }
    }
    
    // حفظ بيانات الأعمدة الثانية (الصفوف من 14 إلى 26)
    for ($i = 0; $i < count($srValues); $i++) {
        $sr = $srValues[$i] + 15;
        $state = $stateValues[$i + 15];
        $needMaint = $needMaintValues[$i + 15];

        $stmt->bind_param("ssi", $state, $needMaint, $sr);

        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'error' => 'Failed to save data: ' . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit();
        }
    }


    //**********************************     */
    $inspectionQuery = "UPDATE `$tableName` SET A_G = ?, B_G = ?, C_G = ?,A_B = ?,B_C = ?,C_A = ? WHERE SR = ?";
    $stmt = $conn->prepare($inspectionQuery);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'error' => 'Prepare statement failed: ' . $conn->error]);
        $conn->close();
        exit();
    }

    // حفظ بيانات الأعمدة الأولى (الصفوف من 1 إلى 13)
    for ($i = 0; $i < count($srValues2); $i++) {
        $sr2 = $srValues2[$i];
        $Agrdss = $AGRDS[$i];
        $Bgrdss = $BGRDS[$i];
        $Cgrdss = $CGRDS[$i];
        $ab = $ABS[$i];
        $bc = $BCS[$i];
        $ca = $CAS[$i];
        
        $stmt->bind_param("ssssssi", $Agrdss, $Bgrdss, $Cgrdss,$ab,$bc,$ca, $sr2);

        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'error' => 'Failed to save data: ' . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit();
        }
    }
    
    // حفظ بيانات الأعمدة الثانية (الصفوف من 14 إلى 26)
   
    //**********************************     */


    // تم تعديل الاستعلام ليشمل prepared_by
    $otherDataQuery = "UPDATE `$tableName` SET Note_Val_Phase = ?,Tested_By = ?,Last_Date = ? WHERE SR = 1";
    $stmtOther = $conn->prepare($otherDataQuery);
    if ($stmtOther === false) {
        echo json_encode(['success' => false, 'error' => 'Prepare statement for other data failed: ' . $conn->error]);
        $conn->close();
        exit();
    }
    // تم تعديل ربط المتغيرات ليشمل prepared_by
    $stmtOther->bind_param("sss", $noteValue ,$Tested_By , $date_value);
    if (!$stmtOther->execute()) {
        echo json_encode(['success' => false, 'error' => 'Failed to save other data: ' . $stmtOther->error]);
        $stmtOther->close();
        $conn->close();
        exit();
    }
    $stmtOther->close();

    $stmt->close();
    $conn->close();

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>