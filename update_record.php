<?php
// update_record.php

session_start();

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

    // اسم الجدول من الجلسة
    $tableName = $_SESSION['tablen'] ?? null;

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
    $column = $_POST['column'] ?? null;
    $value = $_POST['value'] ?? null;

    $engineerName = $_SESSION['username'] ?? 'Unknown Engineer';

    if ($id === null || $column === null) {
        echo json_encode(['status' => 'error', 'message' => 'Missing ID or Column.']);
        $conn->close();
        exit();
    }

    // الخطوة 1: جلب قيمة عمود Eng للصف المحدد
    $sql_get_eng = "SELECT Eng FROM `" . $tableName . "` WHERE `id` = ?";
    $stmt_get_eng = $conn->prepare($sql_get_eng);
    if ($stmt_get_eng === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare get Eng failed: ' . $conn->error]);
        $conn->close();
        exit();
    }
    $stmt_get_eng->bind_param('i', $id);
    $stmt_get_eng->execute();
    $result_get_eng = $stmt_get_eng->get_result();
    $row_eng = $result_get_eng->fetch_assoc();
    $stmt_get_eng->close();

    $currentEng = $row_eng['Eng'] ?? ''; // القيمة الحالية لعمود Eng

    // الشرط: لا يتم تحديث vibration أو temperature إلا إذا كان Eng فارغًا أو يساوي اسم المهندس الحالي
    $canUpdateVibrationTemperature = (empty($currentEng) || trim($currentEng) === $engineerName);

    // التحقق مما إذا كان العمود المراد تحديثه هو vibration أو temperature
    if (($column === 'vibration' || $column === 'temperature') && !$canUpdateVibrationTemperature) {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized: Cannot update ' . $column . ' unless Eng column is empty or matches your username.']);
        $conn->close();
        exit();
    }

    // الخطوة 2: تحديث العمود المحدد (vibration أو temperature أو أي عمود آخر)
    $sql_update_column = "UPDATE `" . $tableName . "` SET `" . $column . "` = ? WHERE `id` = ?";
    $stmt_update_column = $conn->prepare($sql_update_column);
    if ($stmt_update_column === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare update column failed: ' . $conn->error]);
        $conn->close();
        exit();
    }
    $stmt_update_column->bind_param('si', $value, $id);
    if (!$stmt_update_column->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Execute update column failed: ' . $stmt_update_column->error]);
        $stmt_update_column->close();
        $conn->close();
        exit();
    }
    $stmt_update_column->close();

    // الخطوة 3: جلب الصف مرة أخرى للتحقق من الشروط لتحديث عمود Eng
    $sql_select = "SELECT visualcheck, abnormalsound, cleaning, performance, vibration, temperature, Eng FROM `" . $tableName . "` WHERE `id` = ?";
    $stmt_select = $conn->prepare($sql_select);
    if ($stmt_select === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare select failed: ' . $conn->error]);
        $conn->close();
        exit();
    }
    $stmt_select->bind_param('i', $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $row = $result->fetch_assoc();
    $stmt_select->close();

    if ($row) {
        // الشروط المطلوبة لتحديث عمود Eng
        $is_eng_valid = (empty($row['Eng']) || trim($row['Eng']) === $engineerName);
        $is_four_columns_filled = (!empty($row['visualcheck']) && !empty($row['abnormalsound']) && !empty($row['cleaning']) && !empty($row['performance']));
        $is_one_of_two_filled = (!empty($row['vibration']) && !empty($row['temperature']));

        // الخطوة 4: إذا كانت الشروط صحيحة، قم بتحديث عمود Eng
        if ($is_eng_valid && $is_four_columns_filled && $is_one_of_two_filled) {
            $sql_update_eng = "UPDATE `" . $tableName . "` SET `Eng` = ? WHERE `id` = ?";
            $stmt_update_eng = $conn->prepare($sql_update_eng);
            if ($stmt_update_eng) {
                $stmt_update_eng->bind_param('si', $engineerName, $id);
                $stmt_update_eng->execute();
                $stmt_update_eng->close();
            }
        }
    }

    echo json_encode(['status' => 'success']);

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
