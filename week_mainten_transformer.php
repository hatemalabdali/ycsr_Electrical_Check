<?php

session_start();



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

    <!-- <link rel="stylesheet" href="mainpage.css"> -->
    <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">

</head>

<body>

    <div class="formshowTranformer">

        <form method="get" name="form" action="" id="myForm">

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



            <input type="text" placeholder="Enter Data" name="tyear" id="tyear">

            <input type="text" placeholder="Enter Data" name="tmonth" id="tmonth">

            <input type="text" placeholder="Enter Data" name="tweek" id="tweek">

            <input type="text" placeholder="Enter Data" name="tday" id="tday">

            <!-- <input type="submit" value="عرض الجدول" name="btn" id="btn"> -->

            <button name="btn" id="btn"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""></button>

            <!-- <input type="submit" value="خروج" name="btnback" id="btnback" onclick="handleExitClick(event)"> -->

            <button class="print-button" name="btnback" id="btnback" onclick="handleExitClick(event)"><img
                    class="pdf_img" src="imgs/exit.png" alt=""></button>



            <!-- <button class="print-button" onclick="window.print()">اطبع هذا المستند</button> -->

            <button class="print-button" onclick="window.print()"><img class="pdf_img" src="imgs/printdoc2.png"
                    alt=""></button>

            <button class="print-button" name="send" id="send" onclick="handleSendClick1(event)"><img class="pdf_img"
                    src="imgs/wsend2.png" alt=""></button>

            <button class="print-button" name="send" id="send" onclick="handleSendClick2(event)"><img class="pdf_img"
                    src="imgs/wsend3.png" alt=""></button>
        </form>

    </div>

    <br>

    <script>


    </script>

    <?php


    echo '<div class="container2">';

    echo '<div class="conx1">';

    echo '<img class="transimageShow" src="imgs/4.png" alt="">';

    echo '<div class="conx2">';

    echo ' <h1 style="text-align: center;">قائمة الفحص اليومية للمحول</h1> ';

    echo '<h3 style="text-align: center;"><strong>Daily Inspection Checklist for the Transformer</strong></h3>';

    echo '</div>';

    echo '</div>';

    echo '<div class="info-section">';

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


    $conn->set_charset("utf8mb4");
    // التحقق من الاتصال

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

    $_SESSION['tableName'] = $table_name;



    $sql = "SELECT `id`, `Activities`, `Status`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `table_name`, `Eng` FROM `$table_name` WHERE 1";

    $result = $conn->query($sql);

    $myvalues = 'لم يتم الفحص';

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
            echo "<th class=\"day-header\" data-day=\"$i\">"; // تم التعديل هنا
            echo $i;
            echo "</th>";
        }
        echo "</tr>";

        echo "</thead>";

        echo "<tbody>";

        // إخراج البيانات لكل صف
        $motor_tags = [];

        $whatsapp_message = '';

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";

            echo "<td>" . htmlspecialchars($row["Activities"]) . "</td>";

            echo "<td>" . htmlspecialchars($row["Status"]) . "</td>";

            $_SESSION['Engineer'] = $row["Eng"];

            $rowId = htmlspecialchars($row["id"]); // الحصول على معرف الصف الحالي


            $motor_tags[] = "اليوم    :  " . $i . "  >>  " . "\n";

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
                    // if ($row[$day_column] !== '') {
                    $myvalues = $state_text !== '' ? $state_text : ' (لم يتم الفحص)';
                    if ($row['Status'] === 'Amps') {
                        $myvalues .= '  أمبير  ';
                    }
                    if ($row['Status'] === 'Deg') {
                        $myvalues .= '  درجة مئوية  ';
                    }
                    if ($row['Status'] === 'Deg.') {
                        $myvalues .= '  درجة مئوية  ';
                    }

                    $motor_tags[] = "(" . $rowId . ")" . $row["Activities"] . "\n" . '(' . $myvalues . ')' . "\n";

                    // }
                } else {

                    // إذا كان العمود غير موجود (مثلاً لأيام غير موجودة في الشهر)

                    $state_text = '';

                    $db_value = '';

                    $color = 'black';
                }

                // if ($row[$day_column] !== '') {

                //     $myvalues = $row[$day_column];
                // } else {
                //     $myvalues = ' (لم يتم الفحص)';
                // }
                // $motor_tags[] = $row['Activities'] . "\n" . '(' . $myvalues . ')' . "\n";

                // إخراج خلية الجدول مع خصائص data- و class و style

                // 'clickable-day' هو فئة لسهولة استهدافها بواسطة JavaScript

                if ($rowId <= 3) {

                    $msg = "<td>";
                    $msg .= "<input type=\"number\" lang=\"en\" class=\"auto-save3 \" data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";' value='" . $state_text . "'>";
                    $msg .= "</td>";
                } elseif ($rowId === '8') {
                    $msg = "<td>";
                    $msg .= "<input type=\"number\" lang=\"en\" class=\"auto-save3 \" data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";' value='" . $state_text . "'>";
                    $msg .= "</td>";
                } elseif ($rowId === '9') {
                    $msg = "<td>";
                    $msg .= "<input type=\"number\" lang=\"en\" class=\"auto-save3 \" data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";' value='" . $state_text . "'>";
                    $msg .= "</td>";
                } else {
                    $msg = "<td class='zz clickable-day' data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";'>" . $state_text . "</td>";
                }
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
        // $_SESSION['motor_tags'] =
        //     $motor_tags[0] . "\n" . $motor_tags[1] . "\n" . $motor_tags[2] . "\n" . $motor_tags[3]
        //     . "\n" . $motor_tags[4]
        //     . "\n" . $motor_tags[5]
        //     . "\n" . $motor_tags[6]
        //     . "\n" . $motor_tags[7]
        //     . "\n" . $motor_tags[8]
        //     . "\n" . $motor_tags[9]
        //     . "\n" . $motor_tags[10]
        //     . "\n" . $motor_tags[11]
        //     . "\n" . $motor_tags[12]
        //     . "\n" . $motor_tags[13]
        //     . "\n" . $motor_tags[14]
        //     . "\n" . $motor_tags[15]
        //     . "\n" . $motor_tags[16]
        //     . "\n" . $motor_tags[17]
        //     . "\n" . $motor_tags[18]
        //     . "\n" . $motor_tags[19]
        //     . "\n" . $motor_tags[20]
        //     . "\n";
        $A = -1;

        foreach ($motor_tags as $day) {
            $A++;
            $_SESSION["x-" . $A] = $motor_tags[$A];
            $_SESSION['nomber'] = $A;
        }

        $whatsapp_message = "  تقرير  الفحص اليومي للمحولات "  . "\n";
        $whatsapp_message .= "العام :  " . $_SESSION['year_groups'] . "\n";
        $whatsapp_message .= "الشهر :  " . date('n', strtotime($monthName)) . "   ( " . $monthName . " )" . "\n";
        $whatsapp_message .= "المحول :  " . $_SESSION['transfrmer_groups'] . "\n";
        $whatsapp_message .= "بواسطة :  " . $arabicname . "\n";
        $whatsapp_message .= "\n" . "   ***************************" . "\n";
        $whatsapp_message .= implode("\n", $motor_tags);
        // تخزين العلامات في الجلسة إذا كنت بحاجة إليها لاحقًا
        $encoded_whatsapp_message = htmlspecialchars(urlencode($whatsapp_message));
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



    <script>
        // مصفوفة لتخزين الأيام المحددة
        const selectedDays = [];

        // الحصول على جميع خلايا رؤوس الأيام
        // لاحظ التغيير من .day-cell إلى .day-header
        const dayHeaders = document.querySelectorAll('.day-header');

        // إضافة معالج حدث لكل رأس عمود
        dayHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const day = header.dataset.day; // الحصول على رقم اليوم من السمة data-day

                // التحقق مما إذا كان اليوم محددًا بالفعل
                const index = selectedDays.indexOf(day);

                if (index > -1) {
                    // إذا كان محددًا، قم بإلغاء تحديده
                    selectedDays.splice(index, 1);
                    header.classList.remove('selected');
                } else {
                    // إذا لم يكن محددًا، قم بتحديده
                    selectedDays.push(day);
                    header.classList.add('selected');
                }

                // يمكنك هنا عرض الأيام المحددة في مكان ما لراحة المستخدم
                console.log('Selected days:', selectedDays);
            });
        });

        // دالة الإرسال تبقى كما هي، لأنها تعتمد على مصفوفة selectedDays
        function handleSendClick1(event) {
            event.preventDefault();

            if (selectedDays.length === 0) {
                alert("الرجاء تحديد الأيام التي تريد إرسال التقرير لها.");
                return;
            }

            selectedDays.sort((a, b) => a - b);

            // بناء كائن البيانات لإرساله إلى الخادم
            const postData = {
                days: selectedDays,
                // يمكنك إضافة أي بيانات أخرى تحتاجها هنا، مثل الشهر أو السنة
                // month: 'july',
                // year: '2025'
            };

            // **استخدام fetch() لإرسال البيانات إلى ملف PHP**
            fetch('generate_report.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(postData)
                })
                .then(response => {
                    // التحقق من نجاح الاستجابة
                    if (!response.ok) {
                        throw new Error('فشل في جلب التقرير من الخادم.');
                    }
                    return response.text(); // الحصول على النص الكامل للتقرير
                })
                .then(reportText => {
                    // بمجرد الحصول على نص التقرير من الخادم، نقوم بتشفيره
                    const encodedMessage = encodeURIComponent(reportText);

                    // إعداد وإطلاق رابط الواتساب
                    const phoneNumber = '771598385';
                    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

                    window.open(whatsappUrl, '_blank');
                })
                .catch(error => {
                    // التعامل مع الأخطاء
                    console.error('There was an error:', error);
                    alert('حدث خطأ في إنشاء التقرير. الرجاء المحاولة لاحقاً.');
                });
        }

        function handleSendClick2(event) {
            event.preventDefault();

            if (selectedDays.length === 0) {
                alert("الرجاء تحديد الأيام التي تريد إرسال التقرير لها.");
                return;
            }

            selectedDays.sort((a, b) => a - b);

            // بناء كائن البيانات لإرساله إلى الخادم
            const postData = {
                days: selectedDays,
                // يمكنك إضافة أي بيانات أخرى تحتاجها هنا، مثل الشهر أو السنة
                // month: 'july',
                // year: '2025'
            };

            // **استخدام fetch() لإرسال البيانات إلى ملف PHP**
            fetch('generate_report.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(postData)
                })
                .then(response => {
                    // التحقق من نجاح الاستجابة
                    if (!response.ok) {
                        throw new Error('فشل في جلب التقرير من الخادم.');
                    }
                    return response.text(); // الحصول على النص الكامل للتقرير
                })
                .then(reportText => {
                    // بمجرد الحصول على نص التقرير من الخادم، نقوم بتشفيره
                    const encodedMessage = encodeURIComponent(reportText);

                    // إعداد وإطلاق رابط الواتساب
                    const phoneNumber = '776402808';
                    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

                    window.open(whatsappUrl, '_blank');
                })
                .catch(error => {
                    // التعامل مع الأخطاء
                    console.error('There was an error:', error);
                    alert('حدث خطأ في إنشاء التقرير. الرجاء المحاولة لاحقاً.');
                });
        }


        // اسمع لحدث onchange على جميع حقول الإدخال التي لها class="auto-save-trans"
        document.querySelectorAll('.auto-save3').forEach(input => {
            input.addEventListener('change', function() {
                const rowId = this.getAttribute('data-row-id');
                const day = this.getAttribute('data-day');
                const value = this.value;



                // إرسال طلب AJAX
                fetch('update_transformer_daily.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `id=${encodeURIComponent(rowId)}&day=${encodeURIComponent(day)}&value=${encodeURIComponent(value)}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            console.log('تم الحفظ بنجاح!');
                        } else {
                            console.error('فشل الحفظ:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('حدث خطأ في الاتصال:', error);
                    });
            });
        });



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











        document.addEventListener('DOMContentLoaded', function() {

            // اختيار جميع الخلايا التي لديها الفئة 'clickable-day'

            const clickableCells = document.querySelectorAll('.clickable-day');



            clickableCells.forEach(cell => {

                cell.addEventListener('click', function() {

                    const rowId = this.dataset.rowId; // معرف الصف (id النشاط)

                    const day = this.dataset.day; // رقم اليوم (اسم العمود)

                    let currentValue = this.dataset
                        .currentValue; // القيمة الحالية في DB (1, 2, أو فارغ)



                    let newStateText = ''; // النص الجديد للخلية

                    let newDbValue = ''; // القيمة الجديدة لحفظها في DB

                    let newColor = ''; // اللون الجديد للخلية



                    // تحديد الحالة التالية بناءً على القيمة الحالية

                    if (currentValue === '2') { // إذا كانت صح (2)، تصبح خطأ (1)

                        newStateText = '❌'; // علامة X

                        newDbValue = '1';

                        newColor = 'red';

                    } else if (currentValue === '1') { // إذا كانت خطأ (1)، تصبح فارغة

                        newStateText = ''; // فارغ

                        newDbValue = ''; // قيمة فارغة لقاعدة البيانات

                        newColor = 'black'; // لون افتراضي

                    } else { // إذا كانت فارغة، تصبح صح (2)

                        newStateText = '✔️'; // علامة صح

                        newDbValue = '2';

                        newColor = 'blue';

                    }



                    // تحديث محتوى الخلية ولونها في الواجهة

                    this.innerHTML = newStateText;

                    this.style.color = newColor;

                    this.dataset.currentValue = newDbValue; // تحديث القيمة في خاصية data-



                    // إرسال طلب Ajax لتحديث قاعدة البيانات

                    const xhr = new XMLHttpRequest();

                    xhr.open('POST', 'update_status.php',
                        true); // اسم ملف PHP الذي سيتعامل مع التحديث

                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');



                    xhr.onreadystatechange = function() {

                        if (xhr.readyState === 4 && xhr.status === 200) {

                            // يمكنك معالجة استجابة الخادم هنا (مثلاً، رسالة نجاح أو فشل)

                            const response = JSON.parse(xhr.responseText);

                            if (response.status === 'success') {

                                console.log('Database updated successfully!');

                            } else {

                                console.error('Database update failed: ' + response.message);

                                // في حالة الفشل، يمكنك التفكير في إعادة الخلية إلى حالتها السابقة

                            }

                        }

                    };

                    // إرسال البيانات (id الصف، رقم اليوم، والقيمة الجديدة)

                    const data = 'id=' + encodeURIComponent(rowId) +

                        '&day=' + encodeURIComponent(day) +

                        '&value=' + encodeURIComponent(newDbValue);

                    xhr.send(data);

                });

            });

        });
    </script>



</body>

</html>