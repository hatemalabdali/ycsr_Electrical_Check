<?php
// Start the session to store user's selected year and logged-in user name
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// PHP code for database connection and data retrieval
$data = [];

// This is a placeholder for the logged-in user name.
$loggedInUser = isset($_SESSION['username']) ? $_SESSION['username'] : 'TestUser';

// Check if a year is selected from the dropdown
if (isset($_GET['year']) && !empty($_GET['year'])) {
    $selectedYear = $_GET['year'];
    $_SESSION['selectedYear'] = $selectedYear;
} elseif (isset($_SESSION['selectedYear'])) {
    $selectedYear = $_SESSION['selectedYear'];
} else {
    $selectedYear = '2025';
    $_SESSION['selectedYear'] = $selectedYear;
}

// Database connection details
$servername = "sql202.infinityfree.com";
$username = "if0_39426096";
$password = "WKa8VQVTNfi";
$dbname = 'if0_39426096_mwt';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableName = "earthingTable_" . $selectedYear;

// تنظيف البيانات أولاً قبل جلبها
cleanEmptyData($conn, $tableName);

// SQL query to fetch all data from the corresponding table
$sql = "SELECT `SR.NO.`, `PIT NO`, `PIT LOCATION`, `r_with_grid`, `r_without_grid`, `status`, `name`, `action` FROM `" . $tableName . "` ORDER BY `SR.NO.` ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// الحصول على أسماء المهندسين الفريدة من الجدول
$engineers = [];
if (!empty($data)) {
    foreach ($data as $row) {
        if (!empty($row['name']) && !in_array($row['name'], $engineers)) {
            $engineers[] = $row['name'];
        }
    }
}
$engineersList = implode('، ', $engineers);

$conn->close();

// دالة تنظيف البيانات من الخلايا الفارغة
function cleanEmptyData($connection, $tableName)
{
    $cleanSql = "UPDATE `$tableName` 
                SET `status` = '', `action` = '', `r_with_grid` = '', `r_without_grid` = ''
                WHERE (`name` IS NULL OR `name` = '')";

    if ($connection->query($cleanSql)) {
        error_log("تم تنظيف البيانات في الجدول: $tableName");
    } else {
        error_log("خطأ في تنظيف البيانات: " . $connection->error);
    }
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Earthing Maintenance</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* أنماط CSS السابقة تبقى كما هي */
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #edd456;
            --dark-color: #582f0e;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --border-color: #dee2e6;
            --whatsapp-color: #25D366;
            --telegram-color: #0088cc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
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

        .controls-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: var(--light-color);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 15px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background-color: #385d8a;
            transform: translateY(-2px);
        }

        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            background-color: var(--whatsapp-color);
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
            background-color: var(--telegram-color);
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

        .year-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .year-selector label {
            font-weight: 600;
            color: var(--dark-color);
        }

        .year-selector select {
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

        .year-selector select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.2);
        }

        .buttons-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .table-container {
            overflow-x: auto;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            direction: ltr;
            margin: 0 auto;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid var(--border-color);
            padding: 10px;
            text-align: center;
        }

        .titlee {
            background-color: var(--secondary-color);
            font-weight: 800;
            border: 2px solid var(--dark-color);
            border-radius: 5px;
            padding: 10px;
        }

        td {
            font-family: 'Times New Roman', Times, serif;
        }

        .status-ok {
            color: var(--success-color);
            font-weight: bold;
        }

        .status-repair {
            color: var(--danger-color);
            font-weight: bold;
        }

        .footer {
            padding: 20px;
            background-color: var(--light-color);
            border-top: 1px solid var(--border-color);
        }

        .notes {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid var(--primary-color);
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .signature-box {
            text-align: center;
            flex: 1;
            min-width: 150px;
        }

        .signature-box p {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .signature-line {
            height: 1px;
            background-color: #333;
            margin: 15px 0 5px;
        }

        img {
            max-height: 100px;
            width: auto;
        }

        /* New styles for interactive cells */
        .editable {
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .editable:hover {
            background-color: rgba(74, 111, 165, 0.1);
        }

        .status-cell {
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .controls-container {
                flex-direction: column;
                align-items: stretch;
            }

            .year-selector {
                width: 100%;
                justify-content: center;
            }

            .buttons-container {
                width: 100%;
                justify-content: center;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 8px 5px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .header h1 {
                font-size: 22px;
            }

            .header p {
                font-size: 14px;
            }

            .year-selector {
                flex-direction: column;
                align-items: stretch;
            }

            .year-selector select {
                width: 100%;
            }

            .buttons-container {
                flex-direction: column;
            }

            .whatsapp-btn,
            .telegram-btn {
                width: 100%;
                justify-content: center;
            }

            .signatures {
                flex-direction: column;
                gap: 20px;
            }

            img {
                max-height: 80px;
            }
        }

        @media (max-width: 480px) {
            .header {
                padding: 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .controls-container {
                padding: 15px;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
            }

            th,
            td {
                padding: 6px 3px;
                font-size: 11px;
            }

            .titlee {
                padding: 8px 4px;
                font-size: 11px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Earth Pit Resistance Check</h1>
            <p>قائمة لحفر التأريض في الشركة - List for Earthing pits in the company</p>
        </div>

        <div class="controls-container">
            <a href="Earting.php" class="back-btn">العودة للصفحة السابقة</a>

            <div class="year-selector">
                <label for="year-select">اختر السنة:</label>
                <form action="" method="GET">
                    <select name="year" id="year-select" onchange="this.form.submit()">
                        <option value="">--اختر سنة--</option>
                        <option value="2025" <?php echo ($selectedYear == '2025') ? 'selected' : ''; ?>>2025</option>
                        <option value="2026" <?php echo ($selectedYear == '2026') ? 'selected' : ''; ?>>2026</option>
                        <option value="2027" <?php echo ($selectedYear == '2027') ? 'selected' : ''; ?>>2027</option>
                        <option value="2028" <?php echo ($selectedYear == '2028') ? 'selected' : ''; ?>>2028</option>
                        <option value="2029" <?php echo ($selectedYear == '2029') ? 'selected' : ''; ?>>2029</option>
                        <option value="2030" <?php echo ($selectedYear == '2030') ? 'selected' : ''; ?>>2030</option>
                    </select>
                </form>
            </div>

            <div class="buttons-container">
                <a href="#" class="whatsapp-btn" id="whatsappSupervisor">
                    <i class="fab fa-whatsapp"></i> إرسال للمشرف
                </a>
                <a href="#" class="telegram-btn" id="telegramManager">
                    <i class="fab fa-telegram"></i> إرسال لرئيس القسم
                </a>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <td rowspan="2"><img src="imgs/4.png" alt="ملاحظات"></td>
                        <td>Title</td>
                        <td colspan="4">قائمة لحفر التأريض في الشركة<br>List for Earthing pits in the company</td>
                        <td>Date</td>
                        <td id="dateCell"></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td colspan="4">Electrical department</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="titlee">S.NO</td>
                        <td rowspan="2" class="titlee">PIT NO</td>
                        <td rowspan="2" class="titlee">PIT LOCATION</td>
                        <td colspan="2" class="titlee">RESISTANCE IN OHMS</td>
                        <td rowspan="2" class="titlee">STATUS(GOOD/NEED<br>ACTIONREPAIRE /REPLACE)</td>
                        <td rowspan="2" class="titlee">NAME</td>
                        <td rowspan="2" class="titlee">ACTION</td>
                    </tr>
                    <tr>
                        <td class="titlee">WITH GRID</td>
                        <td class="titlee">WITHOUTGRID</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        foreach ($data as $row) {
                            $statusClass = '';
                            if (isset($row['status'])) {
                                $statusClass = ($row['status'] == 'OK') ? 'status-ok' : (($row['status'] == 'REPAIR') ? 'status-repair' : '');
                            }

                            echo "<tr data-sno='" . htmlspecialchars($row['SR.NO.']) . "'>";
                            echo "<td>" . htmlspecialchars($row['SR.NO.']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['PIT NO']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['PIT LOCATION']) . "</td>";
                            echo "<td class='editable' data-column='r_with_grid'>" . (isset($row['r_with_grid']) ? htmlspecialchars($row['r_with_grid']) : '') . "</td>";
                            echo "<td class='editable' data-column='r_without_grid'>" . (isset($row['r_without_grid']) ? htmlspecialchars($row['r_without_grid']) : '') . "</td>";
                            echo "<td class='editable status-cell " . htmlspecialchars($statusClass) . "' data-column='status'>" . (isset($row['status']) ? htmlspecialchars($row['status']) : '') . "</td>";
                            echo "<td class='name-cell'>" . (isset($row['name']) ? htmlspecialchars($row['name']) : '') . "</td>";
                            echo "<td class='editable' data-column='action'>" . (isset($row['action']) ? htmlspecialchars($row['action']) : '') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' style='text-align: center; padding: 20px;'>No data found for the selected year.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <div class="notes">
                <p>NOT:MAX RESISTANCE EQUAL</p>
            </div>

            <div class="signatures">
                <div class="signature-box">
                    <p>SUPERVISOR</p>
                    <div class="signature-line"></div>
                </div>

                <div class="signature-box">
                    <p>QF-ELEC-017-R02</p>
                </div>

                <div class="signature-box">
                    <p>S.H</p>
                    <div class="signature-line"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to handle saving data
            function saveData(sno, column, value) {
                var loggedInUser = "<?php echo $loggedInUser; ?>";
                var tableName = "<?php echo $tableName; ?>";

                $.ajax({
                    url: 'update_earthdata.php',
                    type: 'POST',
                    data: {
                        sno: sno,
                        column: column,
                        value: value,
                        tableName: tableName,
                        user: loggedInUser
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            // Update the NAME cell if a name was returned
                            if (response.name) {
                                $('tr[data-sno="' + sno + '"] .name-cell').text(response.name);
                            }
                        } else {
                            alert('Error updating data: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error connecting to server.');
                    }
                });
            }

            // Editable text cells
            $('.editable[data-column="r_with_grid"], .editable[data-column="r_without_grid"], .editable[data-column="action"]').on('click', function() {
                var td = $(this);
                var originalValue = td.text().trim();
                var sno = td.parent().data('sno');
                var column = td.data('column');

                // Replace cell with input field
                var input = $('<input type="text" class="form-control">').val(originalValue);
                td.html(input);
                input.focus();

                // Save data on blur or enter key press
                input.on('blur', function() {
                    var newValue = $(this).val().trim();
                    td.text(newValue);
                    if (newValue !== originalValue) {
                        saveData(sno, column, newValue);
                    }
                }).on('keypress', function(e) {
                    if (e.which == 13) {
                        $(this).blur();
                    }
                });
            });

            // Status toggle cell
            $('.status-cell').on('click', function() {
                var td = $(this);
                var sno = td.parent().data('sno');
                var column = td.data('column');
                var currentValue = td.text().trim();
                var newValue = '';
                var newClass = '';

                if (currentValue === 'OK') {
                    newValue = 'REPAIR';
                    newClass = 'status-repair';
                } else if (currentValue === 'REPAIR') {
                    newValue = '';
                    newClass = '';
                } else {
                    newValue = 'OK';
                    newClass = 'status-ok';
                }

                td.text(newValue).removeClass('status-ok status-repair').addClass(newClass);
                saveData(sno, column, newValue);
            });

            // WhatsApp message functions
            function sendWhatsApp(phoneNumber, message) {
                var encodedMessage = encodeURIComponent(message);
                window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
            }

            // إنشاء رسالة التقرير
            function createReportMessage() {
                var year = "<?php echo $selectedYear; ?>";
                var engineers = "<?php echo $engineersList; ?>";
                var currentDate = new Date().toLocaleDateString('ar-EG');

                var message = `تقرير فحص نقاط التأريض - العام ${year}
            
تم إجراء فحص نقاط التأريض للفترة المحددة بتاريخ ${currentDate}

المهندسون المشاركون في الفحص:
${engineers}

تم الانتهاء من جميع الفحوصات وتسجيل النتائج في النظام.

شكراً لكم`;

                return message;
            }

            // إرسال للمشرف
            $('#whatsappSupervisor').on('click', function(e) {
                e.preventDefault();
                var message = createReportMessage();
                sendWhatsApp('771598385', message);
            });

            // إرسال لرئيس القسم
            $('#telegramManager').on('click', function(e) {
                e.preventDefault();
                var message = createReportMessage();
                sendWhatsApp('776402808', message);
            });

        });

        document.getElementById('dateCell').textContent = new Date().toLocaleDateString();
    </script>
</body>

</html>