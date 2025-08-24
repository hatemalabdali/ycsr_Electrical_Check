<script>
     ////////////////////////////////////////*************************************///////////////////////////////////
        // الدالة المسؤولة عن جمع وحفظ البيانات

        ////////////////////////////////////////*************************************///////////////////////////////////
        // الدالة المسؤولة عن جمع وحفظ البيانات
        ////////////////////////////////////////*************************************///////////////////////////////////
        // الدالة المسؤولة عن جمع وحفظ البيانات
        function saveInspectionData() {
            const states = [];
            const srs = [];

            const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
            const rowsToSave = inspectionTableBody.querySelectorAll('tr[data-sr]');

            // أولاً، جمع بيانات الأعمدة من المجموعة الأولى (الأعمدة 3 و 4)
            rowsToSave.forEach(row => {
                const sr = row.getAttribute('data-sr');
                srs.push(sr);

                const state1 = row.querySelector('td:nth-child(3)').textContent.trim();
                states.push(state1);
            });

            // ثم، جمع بيانات الأعمدة من المجموعة الثانية (الأعمدة 6 و 7)
            rowsToSave.forEach(row => {
                const state2 = row.querySelector('td:nth-child(6)').textContent.trim();
                states.push(state2);
            });

            console.log("States Array to be sent:", states);

            const postData = {
                states: states,
                srs: srs
            };

            fetch('save_data.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(postData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('تم حفظ البيانات بنجاح!');
                    } else {
                        alert('حدث خطأ أثناء الحفظ: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('حدث خطأ غير متوقع أثناء حفظ البيانات.');
                });
        }
</script>
// --------------------------------------------------------------------------


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
    if (!isset($data['states']) || !isset($data['srs'])) {
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
    $conn->set_charset("utf8mb4");
    // 6. التحقق من نجاح الاتصال
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]);
        exit();
    }

    // 7. جمع البيانات من المصفوفة
    $stateValues = $data['states'];
    $srValues = $data['srs'];

    // 8. إعداد وحفظ البيانات
    $inspectionQuery = "UPDATE ACB_MCC1_2025 SET state = ? WHERE SR = ?";
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

        $stmt->bind_param("si", $state, $sr);

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

        $stmt->bind_param("si", $state, $sr);

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
