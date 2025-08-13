<?php
session_start();
header('Content-Type: application/json');

$Xservername =  "sql202.infinityfree.com";
$Xusername = "if0_39426096";
$Xpassword = "WKa8VQVTNfi";
$Xdbname = 'if0_39426096_mwt';

// $Xservername =  "localhost";
// $Xusername = "root";
// $Xpassword = "";
// $Xdbname = 'mwt';

// Check if a user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول لتعديل البيانات.']);
    exit();
}

$loggedInUser = $_SESSION['username'];

// Connect to the database
$conn = new mysqli($Xservername, $Xusername, $Xpassword, $Xdbname);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'فشل الاتصال بقاعدة البيانات: ' . $conn->connect_error]);
    exit();
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['id'], $data['column'], $data['value'], $data['table'])) {
    echo json_encode(['status' => 'error', 'message' => 'بيانات غير مكتملة.']);
    $conn->close();
    exit();
}

$id = $data['id'];
$column = $data['column'];
$value = $data['value'];
$tableName = $data['table'];

$allowedColumns = ['REMARK', 'STATUS', 'RATING (A)', 'SENSEVITY(Ma)'];
if (!in_array($column, $allowedColumns)) {
    echo json_encode(['status' => 'error', 'message' => 'اسم العمود غير صالح.']);
    $conn->close();
    exit();
}

// 1. Check user authorization before any update
$check_eng_sql = "SELECT Eng FROM `$tableName` WHERE `SR.NO.` = ?";
$stmt_check = $conn->prepare($check_eng_sql);
$stmt_check->bind_param("s", $id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();
$row_check = $result_check->fetch_assoc();

if ($row_check) {
    $currentEng = trim($row_check['Eng']);
    if ($currentEng !== '' && $currentEng !== $loggedInUser) {
        echo json_encode(['status' => 'error', 'message' => 'لا يمكنك تعديل هذا الصف. تم إدخال البيانات بواسطة شخص آخر.']);
        $stmt_check->close();
        $conn->close();
        exit();
    }
}
$stmt_check->close();

// 2. Perform the initial update for the specific cell
$safeColumn = "`" . $conn->real_escape_string($column) . "`";
$update_sql = "UPDATE `$tableName` SET $safeColumn = ? WHERE `SR.NO.` = ?";
$stmt_update = $conn->prepare($update_sql);
$stmt_update->bind_param("ss", $value, $id);

if (!$stmt_update->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'خطأ في التحديث: ' . $stmt_update->error]);
    $stmt_update->close();
    $conn->close();
    exit();
}
$stmt_update->close();

// 3. After the update, check if all mandatory fields are filled to update the 'Eng' column
$mandatory_columns_sql = "SELECT `SENSEVITY(Ma)`, `RATING (A)`, `STATUS`, Eng FROM `$tableName` WHERE `SR.NO.` = ?";
$stmt_mandatory = $conn->prepare($mandatory_columns_sql);
$stmt_mandatory->bind_param("s", $id);
$stmt_mandatory->execute();
$result_mandatory = $stmt_mandatory->get_result();
$row_mandatory = $result_mandatory->fetch_assoc();
$stmt_mandatory->close();

$engUpdated = false;
if ($row_mandatory) {
    $sensevity_filled = trim($row_mandatory['SENSEVITY(Ma)']) !== '';
    $rating_filled = trim($row_mandatory['RATING (A)']) !== '';
    $status_filled = trim($row_mandatory['STATUS']) !== '';
    $eng_empty = trim($row_mandatory['Eng']) === '';

    // Check if all mandatory fields are filled AND Eng is empty
    if ($sensevity_filled && $rating_filled && $status_filled && $eng_empty) {
        $update_eng_sql = "UPDATE `$tableName` SET Eng = ? WHERE `SR.NO.` = ?";
        $stmt_eng = $conn->prepare($update_eng_sql);
        $stmt_eng->bind_param("ss", $loggedInUser, $id);
        
        if ($stmt_eng->execute()) {
            $engUpdated = true;
        }
        $stmt_eng->close();
    }
}

$conn->close();
echo json_encode(['status' => 'success', 'message' => 'تم التحديث بنجاح.', 'engUpdated' => $engUpdated]);
?>