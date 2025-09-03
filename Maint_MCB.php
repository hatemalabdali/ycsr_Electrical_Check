<?php
session_start();
// يجب عليك التأكد من أن $_SESSION['username'] يحتوي على اسم المستخدم الحالي.
// في هذا المثال، سنفترض أنه تم تسجيل الدخول بنجاح.
// يمكنك تعديل هذا الجزء حسب طريقة تسجيل الدخول في مشروعك.
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'الاسم_الافتراضي'; // يمكنك تعيين اسم مستخدم افتراضي للتجربة
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة بيانات MCB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #edd456;
            --dark-color: #582f0e;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --border-color: #dee2e6;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid var(--secondary-color);
        }

        .header h1 {
            margin-bottom: 10px;
            font-size: 28px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .container {
            width: 95%;
            margin: auto;
            padding: 10px;
        }


        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: var(--light-color);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 15px;
        }

        .controls form {
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: center;
            flex-wrap: wrap;
        }

        .controls label {
            font-weight: 600;
            color: var(--dark-color);
        }

        #year-select {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .controls select {
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            background-color: white;
            font-size: 16px;
            color: #333;
            cursor: pointer;
            transition: border-color 0.3s;
            min-width: 150px;
        }

        .back-button {
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            margin: 5px 10px;
        }

        .info-table {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
            direction: ltr;
        }

        .info-table img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .responsive-table-container {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            direction: rtl;
            min-width: 800px;
            /* ضمان عرض أدنى للجدول للتمرير الأفقي */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px 5px;
            /* تقليل المساحة الداخلية */
            text-align: center;
            white-space: nowrap;
        }

        td.editable {
            cursor: pointer;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .table-title,
        .table-header {
            background-color: #e9ecef;
            font-weight: bold;
        }

        .status-ok {
            color: green;
            font-weight: bold;
        }

        .status-not-ok {
            color: red;
            font-weight: bold;
        }

        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            background-color: #25D366;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
            transform: translateY(-2px);
        }

        .telegram-btn {
            display: inline-flex;
            align-items: center;
            background-color: #0088cc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .telegram-btn:hover {
            background-color: #006699;
            transform: translateY(-2px);
        }

        .whatsapp-btn i,
        .telegram-btn i {
            margin-left: 8px;
        }

        /* Media Queries for mobile and tablets */
        @media (max-width: 768px) {
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                text-align: center;
                width: 200%;
            }

            .heade .header h1 {
                font-size: 22px;
            }

            .header p {
                font-size: 14px;
            }

            .container {
                width: 100%;
                margin: auto;
                padding: 10px;
            }

            h2 {
                color: #333;
                margin-bottom: 10px;
            }

            .controls {
                padding: 10px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: row-reverse;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                margin-bottom: 20px;
            }

            .controls form {
                display: flex;
                align-items: center;
                flex-grow: 1;
                justify-content: center;
                flex-wrap: wrap;
            }

            .controls label,
            .controls select {
                margin: 5px 10px;
                font-size: 200%;
            }

            .back-button {
                padding: 8px 15px;
                font-size: 14px;
                cursor: pointer;
                border: none;
                border-radius: 5px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                margin: 5px 10px;
            }

            .info-table {
                width: 100%;
                margin-top: 10px;
                margin-bottom: 20px;
                direction: ltr;

            }

            .info-table img {
                max-width: 150%;
                height: auto;
                display: block;
            }

            .responsive-table-container {
                overflow-x: auto;
                width: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                direction: rtl;
                min-width: 800px;
                /* ضمان عرض أدنى للجدول للتمرير الأفقي */
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px 5px;
                /* تقليل المساحة الداخلية */
                text-align: center;
                white-space: nowrap;
            }

            td.editable {
                cursor: pointer;
            }

            th {
                background-color: #f2f2f2;
                color: #333;
            }

            .table-title,
            .table-header {
                background-color: #e9ecef;
                font-weight: bold;
            }

            .status-ok {
                color: green;
                font-weight: bold;
            }

            .status-not-ok {
                color: red;
                font-weight: bold;
            }

        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Breakers Data Management MCB</h1>
        <p>إدارة بيانات القواطع MCB</p>
    </div>
    <div class="container">


        <div class="controls">
            <a href="mcb.php" class="back-button">العودة إلى صفحة الإدخال</a>
            <form id="data-form" action="" method="get">
                <label for="year-select">العام:</label>
                <select id="year-select" name="year" onchange="this.form.submit()">
                    <?php
                    $currentYear = isset($_GET['year']) ? $_GET['year'] : (isset($_SESSION['selected_year']) ? $_SESSION['selected_year'] : '2024');
                    $_SESSION['selected_year'] = $currentYear;
                    for ($i = 2024; $i <= 2030; $i++) {
                        $selected = ($currentYear == $i) ? ' selected' : '';
                        echo "<option value=\"$i\"$selected>$i</option>";
                    }
                    ?>
                </select>

                <label for="month-select">الشهر:</label>
                <select id="month-select" name="month" onchange="this.form.submit()">
                    <?php
                    $currentMonth = isset($_GET['month']) ? $_GET['month'] : (isset($_SESSION['selected_month']) ? $_SESSION['selected_month'] : '4');
                    $_SESSION['selected_month'] = $currentMonth;
                    ?>
                    <option value="4" <?php echo ($currentMonth == '4' ? ' selected' : ''); ?>>أبريل</option>
                    <option value="8" <?php echo ($currentMonth == '8' ? ' selected' : ''); ?>>أغسطس</option>
                    <option value="12" <?php echo ($currentMonth == '12' ? ' selected' : ''); ?>>ديسمبر</option>
                </select>
            </form>
            <!-- في مكان مناسب في صفحتك -->
            <div class="buttons-container">
                <a href="#" class="whatsapp-btn" id="whatsappSupervisor">
                    <i class="fab fa-whatsapp"></i> إرسال للمشرف
                </a>
                <a href="#" class="telegram-btn" id="telegramManager">
                    <i class="fab fa-telegram"></i> إرسال لرئيس القسم
                </a>
            </div>
        </div>

        <h3 id="table-date"></h3>

        <table class="info-table">
            <thead>
                <tr class="table-header">
                    <td rowspan="1" style="width:8%"></td>
                    <td style="width:23%"></td>
                    <td style="width:23%"></td>
                    <td style="width:23%"></td>
                    <td style="width:23%"></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="5" style="padding: 0; border: none;"><img src="imgs/4.png" alt="Company Logo"></td>
                    <td>Title</td>
                    <td>( ELCB
                        List of ELCB )قائمة بجميع أجهزة </td>
                    <td>Date</td>
                    <td><?php echo date('d/m/Y'); ?></td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>Electrical department</td>
                    <td>Rev. No.</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Document. No:</td>
                    <td>L-ELEC-015</td>
                    <td>Page</td>
                    <td>1-2</td>
                </tr>
                <tr>
                    <td>Prepared By</td>
                    <td id="prepared-by-cell"><?php echo htmlspecialchars($preparedByNames); ?></td>
                    <td>تاريخ أول تعديل</td>
                    <td id="first-modification-date-cell"></td>
                </tr>
                <tr>
                    <td>Approved by</td>
                    <td>E : Khalid Al-Maqarmi</td>
                    <td>تاريخ آخر تعديل</td>
                    <td id="last-modification-date-cell"></td>
                </tr>
            </tbody>
        </table>
        <div class="responsive-table-container">
            <table style="width: 100%;">
                <thead>
                    <tr class="table-header">
                        <td>Eng</td>
                        <td>REMARK</td>
                        <td>STATUS</td>
                        <td>RATING (A)</td>
                        <td>SENSEVITY(Ma)</td>
                        <td>NO. POLE</td>
                        <td>TYPE</td>
                        <td>LOCATION</td>
                        <td>SR.NO.</td>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $Xservername = "sql202.infinityfree.com";
                    $Xusername = "if0_39426096";
                    $Xpassword = "WKa8VQVTNfi";
                    $Xdbname = 'if0_39426096_mwt';

                    // $Xservername =  "localhost";
                    // $Xusername = "root";
                    // $Xpassword = "";
                    // $Xdbname = 'mwt';

                    $servername = $Xservername; // غالباً ما يكون localhost
                    $username = $Xusername; // اسم مستخدم قاعدة البيانات الخاص بك
                    $password = $Xpassword; // كلمة مرور قاعدة البيانات الخاصة بك
                    $dbname = $Xdbname;

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $conn->set_charset("utf8mb4");

                    if ($conn->connect_error) {
                        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
                    }

                    function getTableName($month, $year)
                    {
                        return "MCB_" . $month . "_" . $year;
                    }

                    $selectedYear = isset($_GET['year']) ? $_GET['year'] : (isset($_SESSION['selected_year']) ? $_SESSION['selected_year'] : '2024');
                    $selectedMonth = isset($_GET['month']) ? $_GET['month'] : (isset($_SESSION['selected_month']) ? $_SESSION['selected_month'] : '4');

                    $tableName = getTableName($selectedMonth, $selectedYear);
                    $preparedByNames = '';

                    $check_table_sql = "SHOW TABLES LIKE '$tableName'";
                    $table_exists = $conn->query($check_table_sql);

                    if ($table_exists && $table_exists->num_rows > 0) {
                        // تفريغ الصفوف غير المكتملة (مع تجاهل حقل تاريخ التعديل)
                        $reset_sql = "UPDATE `$tableName` SET
                                 `REMARK` = '',
                                 `STATUS` = '',
                                 `RATING (A)` = '',
                                 `SENSEVITY(Ma)` = ''
                                 WHERE (`Eng` = '' OR `Eng` IS NULL)
                                 AND (`REMARK` != '' OR `STATUS` != '' OR `RATING (A)` != '' OR `SENSEVITY(Ma)` != '')";
                        $conn->query($reset_sql);

                        // جمع أسماء المهندسين
                        $eng_sql = "SELECT DISTINCT Eng FROM `$tableName` WHERE `Eng` != '' AND `Eng` IS NOT NULL";
                        $eng_result = $conn->query($eng_sql);
                        if ($eng_result && $eng_result->num_rows > 0) {
                            $names = [];
                            while ($row = $eng_result->fetch_assoc()) {
                                $names[] = htmlspecialchars($row['Eng']);
                            }
                            $preparedByNames = implode(", ", $names);
                        }

                        // --- الكود الجديد لجمع التواريخ ---
                        $firstModificationDate = '';
                        $lastModificationDate = '';

                        $first_date_sql = "SELECT MIN(modification_date) AS first_date FROM `$tableName` WHERE `modification_date` IS NOT NULL";
                        $first_date_result = $conn->query($first_date_sql);
                        if ($first_date_result && $row = $first_date_result->fetch_assoc()) {
                            $firstModificationDate = htmlspecialchars($row['first_date']);
                        }

                        $last_date_sql = "SELECT MAX(modification_date) AS last_date FROM `$tableName` WHERE `modification_date` IS NOT NULL";
                        $last_date_result = $conn->query($last_date_sql);
                        if ($last_date_result && $row = $last_date_result->fetch_assoc()) {
                            $lastModificationDate = htmlspecialchars($row['last_date']);
                        }
                        // --- نهاية الكود الجديد ---

                        // عرض البيانات في الجدول
                        $sql = "SELECT Eng, REMARK, STATUS, `RATING (A)`, `SENSEVITY(Ma)`, `NO. POLE`, TYPE, LOCATION, `SR.NO.` FROM `$tableName`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<script>
                            document.getElementById("table-date").innerHTML = "تاريخ التقرير: ' . date("Y-m-d H:i:s") . '";
                        </script>';

                            // تحديث الخلايا Prepared By وتواريخ التعديل هنا
                            echo '<script>
                            document.getElementById("prepared-by-cell").innerHTML = "' . htmlspecialchars($preparedByNames) . '";
                            document.getElementById("first-modification-date-cell").innerHTML = "' . htmlspecialchars($firstModificationDate) . '";
                            document.getElementById("last-modification-date-cell").innerHTML = "' . htmlspecialchars($lastModificationDate) . '";
                        </script>';

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr id='row-" . htmlspecialchars($row['SR.NO.']) . "'>";
                                echo "<td>" . htmlspecialchars($row['Eng']) . "</td>";
                                echo "<td class='editable' data-column='REMARK' data-id='" . htmlspecialchars($row['SR.NO.']) . "'>" . htmlspecialchars($row['REMARK']) . "</td>";
                                echo "<td class='editable status-cell' data-column='STATUS' data-id='" . htmlspecialchars($row['SR.NO.']) . "'>" . htmlspecialchars($row['STATUS']) . "</td>";
                                echo "<td class='editable' data-column='RATING (A)' data-id='" . htmlspecialchars($row['SR.NO.']) . "'>" . htmlspecialchars($row['RATING (A)']) . "</td>";
                                echo "<td class='editable' data-column='SENSEVITY(Ma)' data-id='" . htmlspecialchars($row['SR.NO.']) . "'>" . htmlspecialchars($row['SENSEVITY(Ma)']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['NO. POLE']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['TYPE']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['LOCATION']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['SR.NO.']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>لا توجد بيانات في هذا الجدول.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>الجدول `" . htmlspecialchars($tableName) . "` غير موجود.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tableBody = document.getElementById('table-body');
            const tableName = '<?php echo $tableName; ?>';
            const loggedInUser = '<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>';

            tableBody.addEventListener('click', (e) => {
                const cell = e.target;
                if (cell.classList.contains('editable')) {
                    const row = cell.closest('tr');
                    const engCell = row.querySelector('td:first-child');
                    const engValue = engCell.textContent.trim();

                    if (engValue !== '' && engValue !== loggedInUser) {
                        alert('لا يمكنك تعديل هذا الصف. تم إدخال البيانات بواسطة شخص آخر.');
                        return;
                    }

                    const column = cell.dataset.column;
                    const id = cell.dataset.id;

                    if (column === 'STATUS') {
                        let currentValue = cell.textContent.trim();
                        let newValue = '';
                        let newClass = '';
                        if (currentValue === '') {
                            newValue = '✅';
                            newClass = 'status-ok';
                        } else if (currentValue === '✅') {
                            newValue = '❌';
                            newClass = 'status-not-ok';
                        }

                        cell.textContent = newValue;
                        cell.className = 'editable status-cell ' + newClass;
                        updateDatabase(id, column, newValue);

                    } else {
                        const originalValue = cell.textContent.trim();
                        cell.innerHTML = `<input type="text" value="${originalValue}" style="width: 100%; box-sizing: border-box; text-align: center;">`;
                        const input = cell.querySelector('input');
                        input.focus();

                        input.addEventListener('blur', () => {
                            const newValue = input.value.trim();
                            cell.textContent = newValue;
                            if (newValue !== originalValue) {
                                updateDatabase(id, column, newValue);
                            }
                        });

                        input.addEventListener('keydown', (event) => {
                            if (event.key === 'Enter') {
                                input.blur();
                            }
                        });
                    }
                }
            });

            function updateDatabase(id, column, value) {
                const data = {
                    id: id,
                    column: column,
                    value: value,
                    table: tableName
                };

                fetch('update_data.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(result => {
                        console.log('Success:', result);
                        if (result.status === 'success') {
                            if (result.engUpdated) {
                                const row = document.getElementById('row-' + id);
                                const engCell = row.querySelector('td:first-child');
                                engCell.textContent = loggedInUser;
                            }
                            console.log('Database updated successfully.');
                        } else {
                            alert('حدث خطأ أثناء تحديث البيانات: ' + result.message);
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('حدث خطأ في الاتصال بالخادم.');
                    });
            }
        });
        // دالة إرسال رسالة الواتساب
        function sendWhatsApp(phoneNumber, message) {
            var encodedMessage = encodeURIComponent(message);
            window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
        }

        // دالة إنشاء محتوى الرسالة (تعديلها حسب احتياجات الصفحة)
        function createReportMessage() {
            var currentDate = new Date().toLocaleDateString('ar-EG');

            // الحصول على السنة والشهر من الجلسة (سيتم تمريرها من PHP)
            var selectedYear = "<?php echo isset($_SESSION['selected_year']) ? $_SESSION['selected_year'] : date('Y'); ?>";
            var selectedMonth = "<?php echo isset($_SESSION['selected_month']) ? $_SESSION['selected_month'] : date('m'); ?>";

            // اسم الجدول بناء على البادئة والشهر والسنة
            var tableName = "MCB_" + selectedMonth + "_" + selectedYear;

            // جلب أسماء المهندسين من PHP (سيتم تعبئتها من قاعدة البيانات)
            var engineers = "<?php
                                if (isset($_SESSION['selected_year']) && isset($_SESSION['selected_month'])) {
                                    $year = $_SESSION['selected_year'];
                                    $month = $_SESSION['selected_month'];
                                    $tableName = 'MCB_' . $month . '_' . $year;

                                    // استعلام لجلب أسماء المهندسين الفريدة
                                    $servername = 'sql202.infinityfree.com';
                                    $username = 'if0_39426096';
                                    $password = 'WKa8VQVTNfi';
                                    $dbname = 'if0_39426096_mwt';

                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    $conn->set_charset('utf8mb4');

                                    if (!$conn->connect_error) {
                                        $sql = 'SELECT DISTINCT `Eng` FROM `' . $tableName . '` WHERE `Eng` IS NOT NULL AND `Eng` != ""';
                                        $result = $conn->query($sql);
                                        $engineersList = [];

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $engineersList[] = $row['Eng'];
                                            }
                                        }
                                        echo implode('، ', $engineersList);
                                        $conn->close();
                                    }
                                }
                                ?>";

            var message = `🔧 أشعار فحص القواطع (MCB)
📅 التاريخ: ${currentDate}
📋 الشهر/السنة: ${selectedMonth}/${selectedYear}

تم إجراء الفحص الدوري للقواطع الكهربائية بنجاح.

👨‍💼 المهندسون المشاركون في الفحص:
${engineers || 'لم يتم تسجيل أسماء المهندسين'}

📊 هذا تقرير تلقائي من النظام الإلكتروني

شكراً لكم 👨‍💼
فريق الصيانة الكهربائية ⚡`;

            return message;
        }

        // معالجة النقر على الأزرار
        document.getElementById('whatsappSupervisor').addEventListener('click', function(e) {
            e.preventDefault();
            var message = createReportMessage();
            sendWhatsApp('771598385', message);
        });

        document.getElementById('telegramManager').addEventListener('click', function(e) {
            e.preventDefault();
            var message = createReportMessage();
            sendWhatsApp('776402808', message);
        });
    </script>
</body>

</html>