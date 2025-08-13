<?php

session_start(); // تأكد من استدعاء هذه الدالة في بداية الملف وقبل أي إخراج HTML!
if ($_SESSION['username'] === "Osama Al-Maqarmi") {

    $arabicname = "أســامــة المــقـرمــي";
}

if ($_SESSION['username'] === "Hatem Alabdali") {

    $arabicname =  "م/ حــاتم العـبـدلــي";
}

if ($_SESSION['username'] === "Khalid Hammoud") {

    $arabicname =  "م/ خــالــد نــاشــر";
}

if ($_SESSION['username'] === "Khalid Al-Maqarmi") {

    $arabicname =  "م/ خــالــد المــقـرمــي";
}

if ($_SESSION['username'] === "Akram Samir") {

    $arabicname =  "أكــرم سـمـيــر";
}

if ($_SESSION['username'] === "Riyadh Al-Rajhi") {

    $arabicname =  "ريــاض الراجــحــي";
}

if ($_SESSION['username'] === "Bassem Abdeljawad") {

    $arabicname =  "م/ بــاسم عـبـد الجــواد";
}

if ($_SESSION['username'] === "Murad Al-Dabai") {

    $arabicname =  "مــراد الـدبـعــي";
}

if ($_SESSION['username'] === "Younes") {

    $arabicname =  "يــونــس عبـــيد";
}

if ($_SESSION['username'] === "Mohammed Abdulrab") {

    $arabicname =  "م/ مـحـمـد الـزيلعـــي";
}

if ($_SESSION['username'] === "Mahmoud Al-Shumairi") {

    $arabicname =  "م/ مـحـمـود الـشـمـيـري";
}
if ($_SESSION['username'] === "Ameen Al-Shumairi") {

    $arabicname =  "م/ أمـــيــن الـشـمـيـري";
}


// 1. معالجة قيم العام، الشهر، والمحول:

//    - إعطاء الأولوية للقيم المستلمة عبر GET (من النموذج بعد الإرسال).

//    - إذا لم توجد قيم في GET، استخدم القيم المخزنة في الجلسة.

//    - إذا لم توجد قيم في الجلسة، استخدم التاريخ الحالي كافتراضي للسنة والشهر، والمحول الافتراضي '1'.



$_SESSION['year_groups'] = isset($_GET['year_groups']) && $_GET['year_groups'] !== '' ? $_GET['year_groups'] : (empty($_SESSION['year_groups']) ? date("Y") : $_SESSION['year_groups']);

$_SESSION['month_groups'] = isset($_GET['month_groups']) && $_GET['month_groups'] !== '' ? $_GET['month_groups'] : (empty($_SESSION['month_groups']) ? date("m") : $_SESSION['month_groups']);

$_SESSION['transfrmer_groups'] = isset($_GET['transfrmer_groups']) && $_GET['transfrmer_groups'] !== '' ? $_GET['transfrmer_groups'] : (empty($_SESSION['transfrmer_groups']) ? '1' : $_SESSION['transfrmer_groups']);



// هذا السطر كان موجودًا في الكود الخاص بك، ويمكن الاحتفاظ به إذا كان له غرض معين،

// ولكن تذكر أن JavaScript لا يمكنه تعديل $_SESSION مباشرة.

$_SESSION['mark1'] = '';

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>الفحص الاسبوعي للمحولات</title>

    <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">

</head>

<body>

    <div class="formshowTranformer31">

        <form method="get" name="form" action="" id="myForm">
            <!-- <label for=""><?php echo $arabicname; ?></label> -->
            <select id="transfrmer_groups" name="transfrmer_groups">

                <option value="">-- حدد المحول --</option>

                <option value="1">Transformer 1</option>

                <option value="2">Transformer 2</option>

                <option value="3">Transformer 3</option>

                <option value="5">Transformer 5</option>

            </select>



            <select id="year_groups" name="year_groups">

                <option value="">-- حدد العام --</option>

                <option value="2025">2025</option>

                <option value="2026">2026</option>

                <option value="2027">2027</option>

                <option value="2028">2028</option>

                <option value="2029">2029</option>

                <option value="2030">2030</option>

            </select>



            <select id="month_groups" name="month_groups">

                <option value="">-- حدد الشهر --</option>

                <option value="1"> January 01</option>

                <option value="2"> February 02</option>

                <option value="3"> March 03</option>

                <option value="4"> April 04</option>

                <option value="5"> May 05</option>

                <option value="6"> June 06</option>

                <option value="7"> July 07</option>

                <option value="8"> August 08</option>

                <option value="9"> September 09</option>

                <option value="10"> October 10</option>

                <option value="11"> November 11</option>

                <option value="12"> December 12</option>

            </select>



            <input style="display: none;" type="text" placeholder="Enter Data" name="tyear" id="tyear">

            <input style="display: none;" type="text" placeholder="Enter Data" name="tmonth" id="tmonth">

            <input style="display: none;" type="text" placeholder="Enter Data" name="tweek" id="tweek">

            <input style="display: none;" type="text" placeholder="Enter Data" name="tday" id="tday">

            <!-- <input type="submit" value="عرض الجدول" name="btn" id="btn"> -->

            <button name="btn" id="btn"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""></button>

            <!-- <input type="submit" value="خروج" name="btnback" id="btnback" onclick="handleExitClick(event)"> -->

            <button class="print-button" name="btnback" id="btnback" onclick="handleExitClick(event)"><img class="pdf_img" src="imgs/exit.png" alt=""></button>



            <!-- <button class="print-button" onclick="window.print()">اطبع هذا المستند</button> -->

            <button class="print-button" onclick="window.print()"><img class="pdf_img" src="imgs/printdoc2.png" alt=""></button>

            <!-- <button id="savePdfBtn" class="print-button">PDF</button> -->



            <button id="savePdfBtn" class="print-button">

                <img class="pdf_img" src="imgs/pdfimg3.png" alt="">

                <span id="pdfLoadingIndicator" style="display: none; margin-left: 5px; color: blue;">جاري الحفظ...</span>

            </button>

        </form>

    </div>

    <br>



    <?php

    echo '<div class="container1">';

    echo '<div class="conx31">';

    echo '<img class="transimageShow3" src="imgs/4.png" alt="">';

    echo '<div class="conx32">';

    echo ' <h1 style="text-align: center;">قائمة الفحص اليومية للمحول</h1> ';

    echo '<h3 style="text-align: center;"><strong>Daily Inspection Checklist for the Transformer</strong></h3>';

    echo '</div>';

    echo '</div>';

    echo '<div class="info-section3">';

    echo '<p><strong>Site: refinery</strong> <span></span></p>';

    echo '<p><strong>Department: Electrical department</strong></p>';

    // 2. تحديث عناصر العرض في PHP لتعكس قيم الجلسة/GET الحالية

    echo '<p id="year_P"><strong>Year:  <span id="displayYear">' . htmlspecialchars($_SESSION['year_groups']) . '</span></strong></p>';

    echo '<p id="month_P"><strong>Month:  <span id="displayMonth">' . htmlspecialchars($_SESSION['month_groups']) . '</span></strong></p>';

    echo '<p id="transformer_P"><strong>Transformer No.: <span id="displayTransformer">' . htmlspecialchars($_SESSION['transfrmer_groups']) . '</span></strong></p>';

    echo '</div>';





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

    $conn = new mysqli($servername, $username, $password, $dbname);



    // التحقق من الاتصال

    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {

        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }



    // 3. بناء اسم الجدول ديناميكيًا باستخدام قيم الجلسة/GET

    // تحويل رقم الشهر إلى اسم الشهر الكامل (مثال: '07' إلى 'july')

    $monthName = strtolower(date("F", mktime(0, 0, 0, $_SESSION['month_groups'], 10)));

    $table_name = $monthName . '_' . $_SESSION['year_groups'] . '_' . $_SESSION['transfrmer_groups'];



    // فحص أمان اسم الجدول (مهم جدًا لمنع حقن SQL)

    // يجب أن يحتوي اسم الجدول فقط على أحرف إنجليزية صغيرة، أرقام، وشرطات سفلية.

    if (!preg_match('/^[a-z_0-9]+$/', $table_name)) {

        // في حالة وجود حرف غير مسموح به، استخدم اسم جدول افتراضي آمن

        $table_name = 'default_table_name'; // أو قم بمعالجة الخطأ بطريقة أخرى

        error_log("Invalid table name generated: " . $table_name); // تسجيل الخطأ

    }



    $sql = "SELECT `id`, `Activities`, `Status`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `table_name`, `Eng` FROM `$table_name` WHERE 1";

    $result = $conn->query($sql);



    // التحقق مما إذا كانت هناك نتائج

    if ($result->num_rows > 0) {

        echo "<table>";

        echo "<thead>";

        echo "<tr>";

        echo "<th rowspan=\"2\">S.R</th>";

        echo "<th rowspan=\"2\">Activities</th>";

        echo "<th rowspan=\"2\">Status</th>";

        echo "<th colspan=\"31\">Day</th>";

        echo "</tr>";



        echo "<tr>";

        for ($i = 1; $i <= 31; $i++) {

            echo "<th class='z'>";

            echo $i;

            echo "</th>";
        }

        echo "</tr>";

        echo "</thead>";

        echo "<tbody>";

        // إخراج البيانات لكل صف

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";

            echo "<td>" . htmlspecialchars($row["Activities"]) . "</td>";

            echo "<td>" . htmlspecialchars($row["Status"]) . "</td>";

            $_SESSION['Engineer'] = $row["Eng"];

            $rowId = htmlspecialchars($row["id"]); // الحصول على معرف الصف الحالي


            for ($i = 1; $i <= 31; $i++) {

                $day_column = (string)$i; // اسم العمود هو رقم اليوم

                $state_text = ''; // النص الذي سيظهر في الخلية (صح/خطأ/فارغ)

                $db_value = ''; // القيمة التي ستحفظ في قاعدة البيانات (1, 2, أو فارغ)

                $color = ''; // لون النص



                // التحقق من وجود العمود وتحديد الحالة والنص واللون

                if (isset($row[$day_column])) {
                    if ($rowId <= 3) {
                        $state_text = $row[$day_column]; // افتراضياً، لا يوجد نص
                    } elseif ($rowId === '8') {
                        $state_text = $row[$day_column]; // افتراضياً، لا يوجد نص
                    } elseif ($rowId === '9') {
                        $state_text = $row[$day_column]; // افتراضياً، لا يوجد نص
                    } else {
                        if ($row[$day_column] === "1") {

                            $state_text = '❌'; // علامة X

                            $db_value = '1';

                            $color = 'red';
                        } else if ($row[$day_column] === "2") {

                            $state_text = '✔️'; // علامة صح

                            $db_value = '2';

                            $color = 'blue';
                        } else {

                            $state_text = ''; // فارغ

                            $db_value = ''; // قيمة فارغة لقاعدة البيانات (يمكنك استخدام NULL لاحقًا)

                            $color = 'black'; // لون افتراضي

                        }
                    }
                } else {

                    // إذا كان العمود غير موجود (مثلاً لأيام غير موجودة في الشهر)

                    $state_text = '';

                    $db_value = '';

                    $color = 'black';
                }



                // إخراج خلية الجدول مع خصائص data- و class و style

                // 'clickable-day' هو فئة لسهولة استهدافها بواسطة JavaScript

                $msg = "<td class='zz clickable-day' data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";'>" . $state_text . "</td>";
                // $msg = "<td class='zz clickable-day' data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";'>" . $state_text . "</td>";

                echo $msg;
            }


            echo "</tr>";
        }

        echo "</tbody>";



        echo '<tfoot>

        

    <tr>

        

        <td colspan="10">Technician: ' . htmlspecialchars($_SESSION['Engineer']) . '</td>

        

        <td colspan="10">Shift Engineer: Khalid Al-Maqarmi</td>

        <td colspan="10">ELECTRICAL H.S :  Khalid Hammoud</td>

        

    </tr>

    

</tfoot>';

        echo "</table>";
    } else {

        echo "<p>لا توجد بيانات لعرضها للجدول: <code>" . htmlspecialchars($table_name) . "</code></p>";
    }



    // إغلاق الاتصال بقاعدة البيانات

    $conn->close();

    echo '</div>';

    echo ' <table>

     <tr>

        <td style="text-align:left;" colspan="2">Remarks</td>

    </tr>

    </table>';

    ?>

    <script src="js/html2pdf.bundle.min.js"></script>



    <script src="m5.js?v=' . filemtime('m5.js') . '"></script><br>



    <script>
        let btn = document.getElementById('btn');

        let transfrmer_groups = document.getElementById('transfrmer_groups');

        let year_groups = document.getElementById('year_groups');

        let month_groups = document.getElementById('month_groups');



        // الحصول على عناصر الـ span لعرض القيم

        let displayTransformerSpan = document.getElementById('displayTransformer');

        let displayYearSpan = document.getElementById('displayYear');

        let displayMonthSpan = document.getElementById('displayMonth');



        // 4. عند تحميل الصفحة، استرجع القيم من localStorage وقم بتعيينها للقوائم المنسدلة

        document.addEventListener('DOMContentLoaded', function() {

            // المحولات

            let storedTransformerValue = localStorage.getItem('lastSelectedTransformerGroup');

            if (storedTransformerValue) {

                transfrmer_groups.value = storedTransformerValue;

            }

            // السنة

            let storedYearValue = localStorage.getItem('lastSelectedYearGroup');

            if (storedYearValue) {

                year_groups.value = storedYearValue;

            }

            // الشهر

            let storedMonthValue = localStorage.getItem('lastSelectedMonthGroup');

            if (storedMonthValue) {

                month_groups.value = storedMonthValue;

            }



            // تحديث نص عناصر العرض بعد استعادة القيم، لضمان عرضها بشكل صحيح قبل أي تغيير

            // هذه الخطوة تضمن أن القيم المعروضة في P تتوافق مع القوائم المنسدلة بعد تحميل الصفحة من localStorage.

            displayTransformerSpan.textContent = transfrmer_groups.value;

            displayYearSpan.textContent = year_groups.value;

            displayMonthSpan.textContent = month_groups.value;

        });



        // 5. عند تغيير القيمة في القائمة المنسدلة، قم بتخزينها في localStorage وقم بإرسال النموذج

        transfrmer_groups.addEventListener('change', function() {

            let selectedValue = this.value;

            localStorage.setItem('lastSelectedTransformerGroup', selectedValue);

            displayTransformerSpan.textContent = selectedValue; // تحديث العنصر المرئي

            btn.click(); // إرسال النموذج (سيؤدي إلى إعادة تحميل الصفحة)

        });



        year_groups.addEventListener('change', function() {

            let selectedValue = this.value;

            localStorage.setItem('lastSelectedYearGroup', selectedValue);

            displayYearSpan.textContent = selectedValue; // تحديث العنصر المرئي

            btn.click(); // إرسال النموذج (سيؤدي إلى إعادة تحميل الصفحة)

        });



        month_groups.addEventListener('change', function() {

            let selectedValue = this.value;

            localStorage.setItem('lastSelectedMonthGroup', selectedValue);

            displayMonthSpan.textContent = selectedValue; // تحديث العنصر المرئي

            btn.click(); // إرسال النموذج (سيؤدي إلى إعادة تحميل الصفحة)

        });



        // وظائف أخرى (كما هي في الكود الأصلي)

        function myFunction() {

            // إذا كان لديك عنصر 'tail' وتريد التحكم في رؤيته

            let tail = document.getElementById('tail');

            if (tail) {

                tail.style.visibility = "visible";

            }

        }



        // أضف مستمع الحدث لزر "عرض الجدول"

        btn.addEventListener("click", myFunction);



        function handleExitClick(event) {

            event.preventDefault(); // منع السلوك الافتراضي لزر الـ submit

            document.location = 'weekly_transformers.php'; // إعادة التوجيه

        }
    </script>

</body>

</html>