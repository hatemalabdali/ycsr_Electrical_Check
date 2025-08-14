<?php
header('Content-Type: application/json');
session_start();

// Database connection details - make sure these match your database
$servername = "sql202.infinityfree.com";
$username = "if0_39426096";
$password = "WKa8VQVTNfi";
$dbname = 'if0_39426096_mwt';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sno = isset($_POST['sno']) ? $_POST['sno'] : null;
    $column = isset($_POST['column']) ? $_POST['column'] : null;
    $value = isset($_POST['value']) ? $_POST['value'] : null;
    $tableName = isset($_POST['tableName']) ? $_POST['tableName'] : null;
    
    $loggedInUser = $_SESSION['username'];

    if ($sno && $column && $tableName) {
        $nameToUpdate = null;

        // First, fetch the current name from the database to check permissions
        $checkPermissionSql = "SELECT `name` FROM `" . $tableName . "` WHERE `SR.NO.` = ?";
        $checkPermissionStmt = $conn->prepare($checkPermissionSql);
        $checkPermissionStmt->bind_param("s", $sno);
        $checkPermissionStmt->execute();
        $result = $checkPermissionStmt->get_result();
        $row = $result->fetch_assoc();
        $checkPermissionStmt->close();

        $currentName = isset($row['name']) ? $row['name'] : '';

        // Check the condition:
        // 1. The name field is empty OR
        // 2. The name field contains the current logged-in user's name
        if (empty($currentName) || $currentName === $loggedInUser) {
            // Permission granted, proceed with the update
            $stmt = $conn->prepare("UPDATE `" . $tableName . "` SET `" . $column . "` = ? WHERE `SR.NO.` = ?");
            $stmt->bind_param("ss", $value, $sno);

            if ($stmt->execute()) {
                // After successful update, re-fetch the row to check for auto-filling the name
                $checkSql = "SELECT `r_with_grid`, `r_without_grid`, `status`, `name` FROM `" . $tableName . "` WHERE `SR.NO.` = ?";
                $checkStmt = $conn->prepare($checkSql);
                $checkStmt->bind_param("s", $sno);
                $checkStmt->execute();
                $result = $checkStmt->get_result();
                $row = $result->fetch_assoc();
                $checkStmt->close();

                // Check if all three required columns are filled and the name column is empty
                if ($row && ($row['r_with_grid'] !== '' || $row['r_with_grid'] === '0') && ($row['r_without_grid'] !== '' || $row['r_without_grid'] === '0') && ($row['status'] !== '') && empty($row['name'])) {
                    // All conditions met, update the name column
                    $updateNameSql = "UPDATE `" . $tableName . "` SET `name` = ? WHERE `SR.NO.` = ?";
                    $updateNameStmt = $conn->prepare($updateNameSql);
                    $updateNameStmt->bind_param("ss", $loggedInUser, $sno);
                    if ($updateNameStmt->execute()) {
                        $nameToUpdate = $loggedInUser;
                    }
                    $updateNameStmt->close();
                }

                echo json_encode(['status' => 'success', 'message' => 'تم تحديث البيانات بنجاح.', 'name' => $nameToUpdate]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'فشل تنفيذ أمر التحديث: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            // Permission denied
            echo json_encode(['status' => 'error', 'message' => 'ليس لديك صلاحية لتعديل هذا الصف. الحقل مملوء باسم مستخدم آخر.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'البيانات المطلوبة مفقودة.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طريقة الطلب غير صالحة.']);
}
$conn->close();
?>