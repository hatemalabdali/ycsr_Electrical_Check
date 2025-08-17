<?php
// Start the session to store user's selected year
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// PHP code for database connection and data retrieval
$data = [];

// Check if a year is selected from the dropdown
if (isset($_GET['year']) && !empty($_GET['year'])) {
    $selectedYear = $_GET['year'];
    // Save the selected year in the session
    $_SESSION['selectedYear'] = $selectedYear;
} elseif (isset($_SESSION['selectedYear'])) {
    // If no year is selected, check if one is saved in the session
    $selectedYear = $_SESSION['selectedYear'];
} else {
    // If it's the first time, default to 2025
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

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableName = "earthingTable_" . $selectedYear;

// SQL query to fetch all required data from the corresponding table
$sql = "SELECT `SR.NO.`, `PIT NO`, `PIT LOCATION`, `r_with_grid`, `r_without_grid`, `status`, `name` FROM `" . $tableName . "` ORDER BY `SR.NO.` ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch all rows into an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earth Pit Resistance Check - Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .controls-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 25%;
            margin-right: 25%;
        }

        .header-content {
            position: relative;
            text-align: center;
            margin-top: 20px;
        }

        .header-content h1 {
            margin: 0;
            display: inline-block;
        }

        .header-content .image-container {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            margin-left: 20px;
        }

        .header-content .image-container img {
            max-height: 100px;
            width: auto;
        }

        .header-info-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .header-info-container div {
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            direction: ltr;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #edc811ff;
        }

        td {
            font-family: 'Times New Roman', Times, serif;
        }

        .status-ok {
            color: green;
            font-weight: bold;
        }

        .status-repair {
            color: red;
            font-weight: bold;
        }

        .back-btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        select {
            padding: 8px;
            border-radius: 5px;
        }

        .tail {
            display: flex;
            width: 90%;
            justify-content: space-between;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 500;
        }

        .l1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 500;
        }

       @media (max-width: 480px) {
            .controls-container {
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-left: 25%;
                margin-right: 25%;
                width: 150%;
            }

            .header-content {
                position: relative;
                text-align: center;
                margin-top: 20px;
                 width: 190%;
            }

            .header-content h1 {
                margin: 0;
                margin-left: 15%;
                display: inline-block;
            }

            .header-content .image-container {
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                margin-left: 20px;
            }

            .header-content .image-container img {
                max-height: 100px;
                width: auto;
            }

            .header-info-container {
                display: flex;
                justify-content: space-between;
                width: 190%;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .header-info-container div {
                margin-left: 5%;
                text-align: left;
                width: 100%;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                direction: ltr;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }

            th {
                background-color: #edc811ff;
            }

            td {
                font-family: 'Times New Roman', Times, serif;
            }

            .status-ok {
                color: green;
                font-weight: bold;
            }

            .status-repair {
                color: red;
                font-weight: bold;
            }

            .back-btn {
                padding: 10px 20px;
                background-color: #007BFF;
                color: white;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                text-decoration: none;
            }

            select {
                padding: 8px;
                border-radius: 5px;
            }

            .tail {
                display: flex;
                width: 90%;
                justify-content: space-between;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-weight: 500;
            }

            .l1 {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-weight: 500;
            }
        }
    </style>
</head>

<body>

    <div class="controls-container">
        <a href="Earting.php" class="back-btn">العودة للصفحة السابقة</a>
        <form action="" method="GET">
            <label for="year-select">اختر السنة:</label>
            <select name="year" id="year-select" onchange="this.form.submit()">
                <option value="">--اختر سنة--</option>
                <option value="2025" <?php echo (isset($selectedYear) && $selectedYear == '2025') ? 'selected' : ''; ?>>2025</option>
                <option value="2026" <?php echo (isset($selectedYear) && $selectedYear == '2026') ? 'selected' : ''; ?>>2026</option>
                <option value="2027" <?php echo (isset($selectedYear) && $selectedYear == '2027') ? 'selected' : ''; ?>>2027</option>
                <option value="2028" <?php echo (isset($selectedYear) && $selectedYear == '2028') ? 'selected' : ''; ?>>2028</option>
                <option value="2029" <?php echo (isset($selectedYear) && $selectedYear == '2029') ? 'selected' : ''; ?>>2029</option>
                <option value="2030" <?php echo (isset($selectedYear) && $selectedYear == '2030') ? 'selected' : ''; ?>>2030</option>
            </select>
        </form>
    </div>

    <div class="header-content">
        <h1>قائمة الحفر التاريض في الشركة<br>List for Earthing pits in the company</h1>
        <div class="image-container">
            <img src="imgs/4.png" alt="ملاحظات">
        </div>
    </div>

    <div class="header-info-container">
        <div>
            <div>YCSR</div>
            <div>Department: Electrical department.</div>
        </div>
        <div>
            <div>Date: 20/06/23</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>PIT NO</th>
                <th>PIT LOCATION</th>
                <th>RESISTANCE <br> WITH GRID <br>(IN OHMS)</th>
                <th>RESISTANCE <br> WITHOUT GRID <br>(IN OHMS)</th>
                <th>STATUS</th>
                <th>NAME</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data)) {
                foreach ($data as $row) {
                    $actionValue = '';
                    if ($row['SR.NO.'] == '29' || $row['SR.NO.'] == '34' || $row['SR.NO.'] == '35') {
                        $actionValue = 'need to repair';
                    }

                    $statusClass = '';
                    if (isset($row['status'])) {
                        $statusClass = ($row['status'] == 'OK') ? 'status-ok' : 'status-repair';
                    }

                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['SR.NO.']) . "</td>"; // S.NO
                    echo "<td>" . htmlspecialchars($row['PIT NO']) . "</td>"; // PIT NO
                    echo "<td>" . htmlspecialchars($row['PIT LOCATION']) . "</td>"; // PIT LOCATION
                    echo "<td>" . (isset($row['r_with_grid']) ? htmlspecialchars($row['r_with_grid']) : '') . "</td>"; // RESISTANCE WITH GRID
                    echo "<td>" . (isset($row['r_without_grid']) ? htmlspecialchars($row['r_without_grid']) : '') . "</td>"; // RESISTANCE WITHOUT GRID
                    echo "<td class='" . htmlspecialchars($statusClass) . "'>" . (isset($row['status']) ? htmlspecialchars($row['status']) : '') . "</td>"; // STATUS
                    echo "<td>" . (isset($row['name']) ? htmlspecialchars($row['name']) : '') . "</td>"; // NAME
                    echo "<td>" . htmlspecialchars($actionValue) . "</td>"; // ACTION
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data found for the selected year.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <div class="l1">
        <p>NOT:MAX RESISTANCE EQUAL</p>
    </div>
    <div class="tail">

        <div class="l2">
            <p>SUPERVISOR</p>
        </div>
        <div class="l3">
            <p>QF-ELEC-017-R02</p>
        </div>
        <div class="l4">
            <p>S.H</p>
        </div>
    </div>

</body>

</html>