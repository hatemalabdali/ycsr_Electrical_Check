<?php
// تفعيل عرض الأخطاء للمساعدة في التطوير
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// تعيين نوع المحتوى كـ JSON
header('Content-Type: application/json');

try {
    // 1. التحقق من أن طريقة الطلب هي POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'error' => "Invalid request method."]);
        exit;
    }

    // 2. فك تشفير البيانات المرسلة من جافا سكريبت
    $data = json_decode(file_get_contents('php://input'), true);

    // 3. التحقق من وجود كافة البيانات المطلوبة
    if (!isset($data['states']) || !isset($data['need_maint']) || !isset($data['srs'])) {
        echo json_encode(['success' => false, 'error' => "Missing or invalid data."]);
        exit;
    }

    // 4. إعدادات الاتصال بقاعدة البيانات
    $servername = "sql202.infinityfree.com";
    $username = "if0_39426096";
    $password = "WKa8VQVTNfi";
    $dbname = 'if0_39426096_mwt';

    // 5. إنشاء الاتصال
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 6. التحقق من نجاح الاتصال
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }

    // إعداد ترميز الأحرف
    $conn->set_charset("utf8mb4");

    // 7. جمع البيانات من المصفوفة
    $stateValues = $data['states'];
    $needMaintValues = $data['need_maint'];
    $srValues = $data['srs'];

    // 8. إعداد وحفظ البيانات
    $inspectionQuery = "UPDATE ACB_MCC1_2025 SET state = ?, need_maint = ? WHERE SR = ?";
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
        $sr = $srValues[$i] + 13;
        $state = $stateValues[$i + 13];
        $needMaint = $needMaintValues[$i + 13];

        $stmt->bind_param("ssi", $state, $needMaint, $sr);

        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'error' => 'Failed to save data: ' . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit();
        }
    }

    $stmt->close();
    $conn->close();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
