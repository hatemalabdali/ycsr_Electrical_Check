<?php

// update_status.php

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

    $tableName = $_SESSION['tablen'] ?? null;

    if ($tableName === null) {
        echo json_encode(['status' => 'error', 'message' => 'Table name not found in session.']);
        exit();
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }

    $id = $_POST['id'] ?? null;
    $day = $_POST['day'] ?? null;
    $value = $_POST['value'] ?? null;
    $engineerName = $_SESSION['username'] ?? 'Unknown Engineer';

    if ($id === null || $day === null) {
        echo json_encode(['status' => 'error', 'message' => 'Missing ID or Day parameter.']);
        $conn->close();
        exit();
    }

    $day = (int)$day;
    if ($day < 1 || $day > 4) { // Assuming days 1-4 correspond to the four check columns
        echo json_encode(['status' => 'error', 'message' => 'Invalid day parameter. Day must be between 1 and 4.']);
        $conn->close();
        exit();
    }

    $dbValue = null;
    if ($value === '1' || $value === '2') {
        $dbValue = $value;
    }

    $colom = '';
    if ($day === 1) {
        $colom = 'visualcheck';
    } elseif ($day === 2) {
        $colom = 'abnormalsound';
    } elseif ($day === 3) {
        $colom = 'cleaning';
    } elseif ($day === 4) {
        $colom = 'performance';
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Column not recognized for the given day.']);
        $conn->close();
        exit();
    }

    // --- الخطوة 1: جلب القيم الأصلية لـ 'Eng' فقط للتحقق من التخطي المبكر ---
    $initialEngSql = "SELECT Eng FROM `" . $tableName . "` WHERE `id` = ?";
    $initialEngStmt = $conn->prepare($initialEngSql);
    if ($initialEngStmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare initial Eng fetch failed: ' . $conn->error]);
        $conn->close();
        exit();
    }
    $initialEngStmt->bind_param('i', $id);
    $initialEngStmt->execute();
    $initialEngResult = $initialEngStmt->get_result();
    $initialEngRow = $initialEngResult->fetch_assoc();
    $initialEngStmt->close();

    $existingEngineer = trim($initialEngRow['Eng'] ?? '');

    // إذا كان Eng ممتلئاً بمهندس آخر، لا نسمح بالتحديث على الإطلاق
    if (!empty($existingEngineer) && $existingEngineer !== $engineerName) {
        echo json_encode(['status' => 'skipped', 'message' => 'Update skipped: This entry is already completed by another engineer.']);
        $conn->close();
        exit();
    }

    // --- الخطوة 2: تحديث العمود الذي تم النقر عليه (`$colom`) ---
    if (empty($existingEngineer) || $existingEngineer === $_SESSION['username']) {
        $sql_update_colom = "UPDATE `" . $tableName . "` SET `" . $colom . "` = ? WHERE `id` = ?";
        $stmt_colom = $conn->prepare($sql_update_colom);
        if ($stmt_colom === false) {
            echo json_encode(['status' => 'error', 'message' => 'Prepare column update failed: ' . $conn->error]);
            $conn->close();
            exit();
        }
        $stmt_colom->bind_param('si', $dbValue, $id);
        if (!$stmt_colom->execute()) {
            echo json_encode(['status' => 'error', 'message' => 'Column update failed: ' . $stmt_colom->error]);
            $stmt_colom->close();
            $conn->close();
            exit();
        }
        $stmt_colom->close();
    } else {
        echo json_encode(['status' => 'skipped', 'message' => 'Update skipped: Engineer name already exists for this entry.']);
    }    // إذا كان 'Eng' غير فارغ، أرسل رسالة بأن التحديث لم يتم


    // --- الخطوة 3: *بعد التحديث الأول*، أعد جلب جميع بيانات الصف لتقييم الاكتمال ---
    // هذا هو المفتاح! نحتاج إلى أحدث القيم من قاعدة البيانات
    $updatedRowDataSql = "SELECT visualcheck, abnormalsound, cleaning, performance, vibration, temperature, comments FROM `" . $tableName . "` WHERE `id` = ?";
    $updatedRowDataStmt = $conn->prepare($updatedRowDataSql);
    if ($updatedRowDataStmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare updated data fetch failed: ' . $conn->error]);
        $conn->close();
        exit();
    }
    $updatedRowDataStmt->bind_param('i', $id);
    $updatedRowDataStmt->execute();
    $updatedRowDataResult = $updatedRowDataStmt->get_result();
    $updatedRowData = $updatedRowDataResult->fetch_assoc();
    $updatedRowDataStmt->close();

    $shouldUpdateEng = false;
    $engToReturn = null;
    $message = 'Column updated successfully.'; // رسالة افتراضية للنجاح

    if ($updatedRowData) {
        // --- الخطوة 4: التحقق من اكتمال جميع الأعمدة المطلوبة (المنطق الجديد) ---
        $isRowFullyPopulated = false; // افتراض أن الصف غير مكتمل

        // 4.1: التحقق من أن 'vibration' و 'temperature' ممتلئان
        $isVibrationAndTempFilled =
            !empty(trim($updatedRowData['vibration'] ?? '')) &&
            !empty(trim($updatedRowData['temperature'] ?? ''));

        if ($isVibrationAndTempFilled) {
            // 4.2: التحقق من أن ثلاثة على الأقل من الأعمدة الأربعة الأخرى ممتلئة
            $fourCheckColumns = [
                'visualcheck',
                'abnormalsound',
                'cleaning',
                'performance'
            ];

            $filledCount = 0;
            foreach ($fourCheckColumns as $column) {
                if (!empty(trim($updatedRowData[$column] ?? ''))) {
                    $filledCount++;
                }
            }

            // إذا كان 3 أو أكثر من الأعمدة الأربعة ممتلئة
            if ($filledCount >= 4) {
                $isRowFullyPopulated = true;
            }
        }

        // --- الخطوة 5: تحديث عمود 'Eng' إذا كان الصف مكتملاً والشروط الأخرى مستوفاة ---
        if ($isRowFullyPopulated && (empty($existingEngineer) || $existingEngineer === $engineerName)) {
            $sql_update_eng = "UPDATE `" . $tableName . "` SET `Eng` = ? WHERE `id` = ?";
            $stmt_eng = $conn->prepare($sql_update_eng);
            if ($stmt_eng === false) {
                echo json_encode(['status' => 'error', 'message' => 'Prepare final Eng update failed: ' . $conn->error]);
                $conn->close();
                exit();
            }
            $stmt_eng->bind_param('si', $engineerName, $id);
            if ($stmt_eng->execute()) {
                $shouldUpdateEng = true;
                $engToReturn = $engineerName;
                $message = 'Column and Engineer name updated successfully.';
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Final Eng update failed: ' . $stmt_eng->error]);
                $stmt_eng->close();
                $conn->close();
                exit();
            }
            $stmt_eng->close();
        } else {
            $message = 'Column updated, row not yet complete, or Eng already filled by another engineer.';
        }
    } else {
        $message = 'Column updated, but row data could not be re-fetched for completion check.';
    }

    // --- الخطوة 6: إرسال الاستجابة النهائية إلى JavaScript ---
    echo json_encode([
        'status' => 'success',
        'message' => $message,
        'engUpdated' => $shouldUpdateEng,
        'engineerName' => $engToReturn
    ]);

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
