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

    $arabicname = "م/ أمـــيــن الـشـمـيـري";
}


?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>الفحص الاسبوعي للمحركات</title>

    <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">



    <div class="yemen_company2">

        <img src="imgs/hsa_icon.jpg" alt="">

        <div class="h">

            <h1>YEMEN COMPANY FOR SUGAR REFINERY</h1>

            <h1>ELECTRICAL DEPARTMENT</h1>

            <h2 id="grooop">REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST</h2>







        </div>

        <img src="imgs/ycsr_icon.jpg" alt="">

    </div>

    <div class="oneline2">

        <h1 id="Periodic_date"> Periodic Date:</h1>



        <h1 id="day_label">day</h1>

        <h1 id="slah1" class="slah">/</h1>

        <h1 id="month_label">month</h1>

        <h1 id="slah3" class="slah">/</h1>

        <h1 id="year_label">year</h1>







        <h1 id="to"> To</h1>







        <h1 id="day_labe2">day</h1>

        <h1 id="slah2" class="slah">/</h1>

        <h1 id="month_labe2">month</h1>

        <h1 id="slah4" class="slah">/</h1>

        <h1 id="year_labe2">year</h1>



    </div>

    <br>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // استرجاع المتغيرات من Local Storage

            const year = localStorage.getItem('chosenYear');

            const month = localStorage.getItem('chosenMonth');

            const day = localStorage.getItem('chosenDay');

            const week = localStorage.getItem('chosenWeek');



            let tyear = document.getElementById('tyear');

            let tmonth = document.getElementById('tmonth');

            let tweek = document.getElementById('tweek');

            let tday = document.getElementById('tday');



            tyear.value = year;

            tmonth.value = month;

            tweek.value = week;

            tday.value = day;









            let month_label = document.getElementById('month_label');

            let month_labe2 = document.getElementById('month_labe2');

            let day_label = document.getElementById('day_label');

            let day_labe2 = document.getElementById('day_labe2');

            let year_label = document.getElementById('year_label');

            let year_labe2 = document.getElementById('year_labe2');



            let Periodic_date = document.getElementById('Periodic_date');

            let to = document.getElementById('to');





            month_label.textContent = month;

            month_labe2.textContent = month;



            year_label.textContent = year;

            year_labe2.textContent = year;

            ////////////////////////////////////

            // في ملف JavaScript الخاص بـ new_page.php



            document.addEventListener('DOMContentLoaded', function() {

                const urlParams = new URLSearchParams(window.location.search);



                const year = parseInt(urlParams.get('year'));

                const week = parseInt(urlParams.get('week'));







                if (!isNaN(year) && !isNaN(week)) {

                    const weekDates = getWeekRangeDates(year, week);



                    // قم بعرض هذه التواريخ في صفحتك

                    const startDateDiv = document.getElementById('weekStartDate');

                    const endDateDiv = document.getElementById('weekEndDate');



                    if (startDateDiv) {

                        startDateDiv.textContent =
                            `تاريخ بداية الأسبوع: ${weekDates.firstDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`;

                    }

                    if (endDateDiv) {

                        endDateDiv.textContent =
                            `تاريخ نهاية الأسبوع: ${weekDates.lastDay.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`;

                    }



                    console.log(`تم استلام السنة: ${year}, الأسبوع: ${week}`);

                    console.log('أول يوم في الأسبوع:', weekDates.firstDay);

                    console.log('آخر يوم في الأسبوع:', weekDates.lastDay);



                } else {

                    console.warn("خطأ: لم يتم العثور على قيم السنة أو الأسبوع في الرابط.");

                }

            });



            // الدالة getWeekRangeDates يجب أن تكون معرفة في نفس الملف JS أو ملف آخر تم استيراده.



            function getWeekRangeDates(year, weekNumber) {

                // نفس الكود الذي تم شرحه أعلاه

                const jan4 = new Date(year, 0, 4);

                const jan4Day = (jan4.getDay() === 0) ? 7 : jan4.getDay(); // 1 = الاثنين, 7 = الأحد

                const firstMondayOfYear = new Date(jan4.getFullYear(), 0, 4 - jan4Day +
                    1); // هذا هو أول اثنين في السنة أو آخر اثنين من السنة السابقة



                const firstDayOfWeek = new Date(firstMondayOfYear.getFullYear(), firstMondayOfYear.getMonth(),
                    firstMondayOfYear.getDate() + (weekNumber - 1) * 7);

                const lastDayOfWeek = new Date(firstDayOfWeek.getFullYear(), firstDayOfWeek.getMonth(),
                    firstDayOfWeek.getDate() + 6);



                return {

                    firstDay: firstDayOfWeek,

                    lastDay: lastDayOfWeek

                };

            }

            ///////////////////////////////////

            day_label.textContent = getWeekRangeDates(year, week).firstDay.getDate();

            day_labe2.textContent = getWeekRangeDates(year, week).lastDay.getDate();









            if ((day_label.textContent - day_labe2.textContent) > 6) {





                let test = day - day_labe2.textContent;

                if (test <= 0) {



                    month_label.textContent = month_label.textContent - 1;

                } else {



                    month_labe2.textContent = month_labe2.textContent++ + 1;

                }

            }

            if (month_label.textContent == 0) {

                month_label.textContent = 12;

            }

            if (month_labe2.textContent == 13) {

                month_labe2.textContent = 1;

            }





            // أو استرجاع الكائن:

            const chosenDateString = localStorage.getItem('chosenDate');

            if (chosenDateString) {

                const chosenDateData = JSON.parse(chosenDateString); // تحويل الـ string إلى كائن

                console.log("Received data from Local Storage:");

                console.log(
                    `Year: ${chosenDateData.year}, Month: ${chosenDateData.month}, Day: ${chosenDateData.day}, Week: ${chosenDateData.week}`
                );

                // يمكنك الآن استخدام chosenDateData.year وهكذا

            }



            // لا تنسَ إزالة البيانات من Local Storage إذا لم تعد بحاجة إليها

            // localStorage.removeItem('chosenYear');

            // localStorage.removeItem('chosenMonth');

            // localStorage.removeItem('chosenDay');

            // localStorage.removeItem('chosenWeek');

            // أو

            // localStorage.removeItem('chosenDate');

        });
    </script>

</head>

<body>

    <div class="form2">



        <form method="get" name="form" action="" id="myForm">

            <select id="motors_groups" name="motors_groups">

                <option value="">-- أختر المجموعة --</option>

                <option value="group_a">Group A</option>

                <option value="group_a1">Group A1</option>

                <option value="group_a2">Group A2</option>

                <option value="group_b">Group B</option>

                <option value="group_b1">Group B1</option>

                <option value="group_c">Group C</option>

                <option value="group_c1">Group C1</option>

            </select>

            <input type="text" placeholder="Enter Data" name="tyear" id="tyear">

            <input type="text" placeholder="Enter Data" name="tmonth" id="tmonth">

            <input type="text" placeholder="Enter Data" name="tweek" id="tweek">

            <input type="text" placeholder="Enter Data" name="tday" id="tday">

            <button name="btn" id="btn"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""></button>

            <button class="print-button" name="btnback" id="btnback" onclick="handleExitClick(event)"><img
                    class="pdf_img" src="imgs/exit.png" alt=""></button>

            <button class="print-button" name="send" id="send" onclick="handleSendClick1(event)"><img class="pdf_img"
                    src="imgs/wsend2.png" alt=""></button>

            <button class="print-button" name="send" id="send" onclick="handleSendClick2(event)"><img class="pdf_img"
                    src="imgs/wsend3.png" alt=""></button>



        </form>



    </div>

    <script>
        let tail = document.getElementById('tail');

        let btn = document.getElementById('btn');







        let motors_groups = document.getElementById('motors_groups');



        // 1. عند تغيير القيمة في القائمة المنسدلة، قم بتخزينها في localStorage

        motors_groups.addEventListener('change', function() {

            let selectedValue = this.value; // القيمة المختارة حاليًا

            let grooop = document.getElementById('grooop');

            if (selectedValue === "group_a") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A )';

            } else if (selectedValue === "group_a1") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A1 )';

            } else if (selectedValue === "group_a2") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A2 )';

            } else if (selectedValue === "group_b") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B )';

            } else if (selectedValue === "group_b1") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B1 )';

            } else if (selectedValue === "group_c") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C )';

            } else if (selectedValue === "group_c1") {

                grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C1 )';

            }

            btn.click();

            localStorage.setItem('lastSelectedMotorGroup', selectedValue); // تخزينها باسم 'lastSelectedMotorGroup'

            console.log('تم تخزين القيمة:', selectedValue); // للمراجعة في وحدة التحكم

        });

        document.addEventListener('DOMContentLoaded', function() {



            let storedValue = localStorage.getItem('lastSelectedMotorGroup'); // استرجاع القيمة المخزنة

            if (storedValue) { // إذا وجدت قيمة مخزنة



                motors_groups.value = storedValue;

                let grooop = document.getElementById('grooop');

                if (storedValue === "group_a") {

                    $ggg = "group_a";

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A )';

                } else if (storedValue === "group_a1") {

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A1 )';

                } else if (storedValue === "group_a2") {

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( A2 )';

                } else if (storedValue === "group_b") {

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B )';

                } else if (storedValue === "group_b1") {

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( B1 )';

                } else if (storedValue === "group_c") {

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C )';

                } else if (storedValue === "group_c1") {

                    grooop.textContent = 'REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST' + '  ' + 'GROUP ( C1 )';

                }







                console.log('تم استعادة القيمة:', storedValue); // للمراجعة في وحدة التحكم

            }

        });





        btn.addEventListener("click", myFunction);



        function myFunction() {

            tail.style.visibility = "visible";



        }



        function handleExitClick(event) {

            // منع السلوك الافتراضي لزر الـ submit (وهو إرسال الفورم)

            event.preventDefault();



            // الآن سيتم تنفيذ أمر إعادة التوجيه

            document.location = 'weekly_motors.php';



            // يمكنك إضافة رسالة تأكيد هنا إذا أردت قبل إعادة التوجيه

            // alert("جاري الخروج والعودة للصفحة الرئيسية.");

        }
    </script>

    <?php



    function getTemperatureClass($temperature)
    {
        // نحول القيمة إلى رقم للتأكد
        $tempValue = (float)$temperature;

        if ($tempValue === 0.0) {
            // إذا كانت القيمة 0، قد يعني هذا أنها لم يتم إدخالها بعد
            return 'temp-default';
        } elseif ($tempValue < 70) {
            return 'temp-normal';
        } elseif ($tempValue >= 70 && $tempValue < 85) {
            return 'temp-elevated';
        } else { // >= 85
            return 'temp-critical';
        }
    }

    function getVibrationClass($vibrationn)
    {
        // نحول القيمة إلى رقم للتأكد
        $vibrValue = (float)$vibrationn;

        if ($vibrValue === 0.0) {
            // إذا كانت القيمة 0، قد يعني هذا أنها لم يتم إدخالها بعد
            return 'vip-default';
        } elseif ($vibrValue < 1.8) {
            return 'vip-normal';
        } elseif ($vibrValue >= 1.8  && $vibrValue < 4.5) {
            return 'vip-elevated';
        } elseif ($vibrValue >= 4.5  && $vibrValue < 11.2) {
            return 'vip-under-critical';
        } else { // >= 85
            return 'vip-critical';
        }
    }


    $group = "group";

    if (isset($_GET['motors_groups'])) {

        $group = $_GET['motors_groups'];
    } else {

        // $group= "group_a";

    }





    // echo $group;  





    $mamemo = '';



    // معلومات الاتصال بقاعدة البيانات

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



    // إنشاء الاتصال (يفضل أن يكون في مكان واحد)

    $conn = new mysqli($servername, $username, $password, $dbname);

    $conn->set_charset("utf8mb4");

    // التحقق من الاتصال

    if ($conn->connect_error) {

        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }



    // تعريف المتغيرات الافتراضية أو استرجاعها من GET إذا كان طلب عرض البيانات

    $year = isset($_GET['tyear']) ? $_GET['tyear'] : null;

    $month = isset($_GET['tmonth']) ? $_GET['tmonth'] : null;

    $week = isset($_GET['tweek']) ? $_GET['tweek'] : null;

    $day = isset($_GET['tday']) ? $_GET['tday'] : null;



    // المتغير الذي سيحتوي على اسم الجدول

    $table_name = ""; // قيمة افتراضية



    if (isset($_GET['btn'])) {

        $year = $_GET['tyear'];

        $month = $_GET['tmonth'];

        $week = $_GET['tweek'];

        $day = $_GET['tday'];

        // group Tables 2025

        if ($year == 2025) {

            if ($group === "group_a") {

                $table_name = "group_a_2025";
            } elseif ($group === "group_a1") {

                $table_name = "group_a1_2025";
            } elseif ($group === "group_a2") {

                $table_name = "group_a2_2025";
            } elseif ($group === "group_b") {

                $table_name = "group_b_2025";
            } elseif ($group === "group_b1") {

                $table_name = "group_b1_2025";
            } elseif ($group === "group_c") {

                $table_name = "group_c_2025";
            } elseif ($group === "group_c1") {

                $table_name = "group_c1_2025";
            }
        }



        // group Tables 2026

        elseif ($year == 2026) {

            if ($group === "group_a") {

                $table_name = "group_a_2026";
            } elseif ($group === "group_a1") {

                $table_name = "group_a1_2026";
            } elseif ($group === "group_a2") {

                $table_name = "group_a2_2026";
            } elseif ($group === "group_b") {

                $table_name = "group_b_2026";
            } elseif ($group === "group_b1") {

                $table_name = "group_b1_2026";
            } elseif ($group === "group_c") {

                $table_name = "group_c_2026";
            } elseif ($group === "group_c1") {

                $table_name = "group_c1_2026";
            }
        }



        $_SESSION['tablen'] = $table_name;









        // $table_name = "group_a"; // اسم الجدول الذي تريد عرض بياناته



        // إنشاء الاتصال

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8mb4");
        // التحقق من الاتصال

        if ($conn->connect_error) {

            die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
        }

        // echo $week;

        $sql = "SELECT id, week_id, tagno, motorname, visualcheck, abnormalsound, vibration, temperature, cleaning, performance, comments, table_name ,Eng FROM $table_name WHERE week_id = '$week' ";



        $result = $conn->query($sql);

        // التحقق مما إذا كانت هناك نتائج

        if ($result->num_rows > 0) {


            // بداية الكود المضاف لتفريغ الأعمدة إذا كان Eng فارغًا
            $sql_cleanup = "UPDATE `" . $table_name . "` 
                            SET 
                                `visualcheck` = '', 
                                `abnormalsound` = '', 
                                `vibration` = '', 
                                `temperature` = '', 
                                `cleaning` = '', 
                                `performance` = '', 
                                `comments` = '' 
                            WHERE `week_id` = ? AND (`Eng` = '' OR `Eng` IS NULL)";

            $stmt_cleanup = $conn->prepare($sql_cleanup);
            if ($stmt_cleanup === false) {
                // يمكنك إضافة معالجة خطأ هنا إذا لزم الأمر
                die("خطأ في إعداد استعلام التنظيف: " . $conn->error);
            }
            $stmt_cleanup->bind_param('s', $week);
            $stmt_cleanup->execute();
            $stmt_cleanup->close();
            // نهاية الكود المضاف





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


            $year = isset($_GET['tyear']) ? $_GET['tyear'] : null;

            $month = isset($_GET['tmonth']) ? $_GET['tmonth'] : null;

            $week = isset($_GET['tweek']) ? $_GET['tweek'] : null;

            $day = isset($_GET['tday']) ? $_GET['tday'] : null;




            $sql = "SELECT id, week_id, tagno, motorname, visualcheck, abnormalsound, vibration, temperature, cleaning, performance, comments, table_name ,Eng FROM $table_name WHERE week_id = '$week' ";

            $result = $conn->query($sql);



            // التحقق مما إذا كانت هناك نتائج

            if ($result->num_rows > 0) {
                echo '<div class="container4">';
                echo "<table>";

                echo "<thead>";

                echo "<tr>";

                echo "<th rowspan=\"2\">Tag.NO</th>";

                echo "<th rowspan=\"2\">MOTOR NAME</th>";

                echo "<th rowspan=\"2\">Visualk</th>";
                echo "<th rowspan=\"2\">Sound</th>";
                echo "<th rowspan=\"2\">Clean</th>";
                echo "<th rowspan=\"2\">Perfom</th>";
                echo "<th rowspan=\"2\">Vibr</th>";
                echo "<th rowspan=\"2\">Temp</th>";
                echo "<th rowspan=\"2\">comments</th>";
                echo "<th rowspan=\"2\">Eng</th>";

                echo "</tr>";


                echo "</thead>";

                echo "<tbody>";

                // إخراج البيانات لكل صف

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" . htmlspecialchars($row["tagno"]) . "</td>";

                    echo "<td>" . htmlspecialchars($row["motorname"]) . "</td>";



                    $_SESSION['Engineer'] = $row["Eng"];

                    $rowId = htmlspecialchars($row["id"]); // الحصول على معرف الصف الحالي



                    for ($i = 1; $i <= 4; $i++) {

                        $day_column = (string)$i; // اسم العمود هو رقم اليوم

                        $state_text = ''; // النص الذي سيظهر في الخلية (صح/خطأ/فارغ)

                        $db_value = ''; // القيمة التي ستحفظ في قاعدة البيانات (1, 2, أو فارغ)

                        $color = ''; // لون النص

                        if ($i === 1) {
                            $state_text = $row["visualcheck"];
                            if ($state_text == '1') {
                                $state_text = '❌';
                                $db_value = '1';
                                $color = 'red';
                            } else if ($state_text == '2') {
                                $state_text = '✔️';
                                $db_value = '2';
                                $color = 'blue';
                            } else {
                                $state_text = '';
                                $db_value = '';
                                $color = 'black';
                            }
                        }
                        if ($i === 2) {
                            $state_text = $row["abnormalsound"];
                            if ($state_text == '1') {
                                $state_text = '❌';
                                $db_value = '1';
                                $color = 'red';
                            } else if ($state_text == '2') {
                                $state_text = '✔️';
                                $db_value = '2';
                                $color = 'blue';
                            } else {
                                $state_text = '';
                                $db_value = '';
                                $color = 'black';
                            }
                        }
                        if ($i === 3) {
                            $state_text = $row["cleaning"];
                            if ($state_text == '1') {
                                $state_text = '❌';
                                $db_value = '1';
                                $color = 'red';
                            } else if ($state_text == '2') {
                                $state_text = '✔️';
                                $db_value = '2';
                                $color = 'blue';
                            } else {
                                $state_text = '';
                                $db_value = '';
                                $color = 'black';
                            }
                        }
                        if ($i === 4) {
                            $state_text = $row["performance"];
                            if ($state_text == '1') {
                                $state_text = '❌';
                                $db_value = '1';
                                $color = 'red';
                            } else if ($state_text == '2') {
                                $state_text = '✔️';
                                $db_value = '2';
                                $color = 'blue';
                            } else {
                                $state_text = '';
                                $db_value = '';
                                $color = 'black';
                            }
                        }
                        if ($i === 5) {
                            $state_text = $row["vibration"];
                        }
                        if ($i === 6) {
                            $state_text = $row["temperature"];
                        }
                        if ($i === 7) {
                            $state_text = $row["comments"];
                        }
                        if ($i === 8) {
                            $state_text = $row["Eng"];
                        }

                        // التحقق من وجود العمود وتحديد الحالة والنص واللون




                        // إخراج خلية الجدول مع خصائص data- و class و style

                        // 'clickable-day' هو فئة لسهولة استهدافها بواسطة JavaScript



                        echo "<td class='zz clickable-day2' data-row-id='" . $rowId . "' data-day='" . $day_column . "' data-current-value='" . $db_value . "' style='color: " . $color . ";'>" . $state_text . "</td>";
                    }
                    // echo "<td>" . htmlspecialchars($row["vibration"]) . "</td>";
                    $vipClass = getVibrationClass($row["vibration"]);
                    echo "<td>";
                    echo "<input type=\"number\" lang=\"en\" class=\"auto-save " . $vipClass . "\" data-id=\"" . htmlspecialchars($row["id"]) . "\" data-column=\"vibration\" value=\"" . htmlspecialchars($row["vibration"]) . "\">";
                    echo "</td>";

                    // الخلية الثانية: الحرارة
                    echo "<td>";
                    // Using the function to determine the dynamic class
                    $tempClass = getTemperatureClass($row["temperature"]);
                    // Add the lang="en" attribute here to force English numeral display
                    echo "<input type=\"number\" lang=\"en\" class=\"auto-save " . $tempClass . "\" data-id=\"" . htmlspecialchars($row["id"]) . "\" data-column=\"temperature\" value=\"" . htmlspecialchars($row["temperature"]) . "\">";
                    echo "</td>";

                    // الخلية الثالثة: التعليقات
                    echo "<td>";
                    echo "<input type=\"text\" class=\"auto-save\" data-id=\"" . htmlspecialchars($row["id"]) . "\" data-column=\"comments\" value=\"" . htmlspecialchars($row["comments"]) . "\">";
                    echo "</td>";

                    echo "<td>" . htmlspecialchars($row["Eng"]) . "</td>";
                    // echo "<input type=\"text\" class=\"Eng_td\" data-id=\"" . htmlspecialchars($row["id"]) . "\" data-column=\"Eng\" value=\"" . htmlspecialchars($row["Eng"]) . "\">";
                    // echo "<input type=\"text\" class=\"Eng_td\" data-id=\"" . htmlspecialchars($row["id"]) . "\" data-column=\"Eng\" value=\"" . htmlspecialchars($row["Eng"]) . "\">";
                    // echo "</td>";

                    echo "</tr>";
                }

                echo "</tbody>";





                echo "</table>";
                echo '</div>';
            } else {

                echo "<p>لا توجد بيانات لعرضها للجدول: <code>" . htmlspecialchars($table_name) . "</code></p>";
            }



            // إغلاق الاتصال بقاعدة البيانات

            $conn->close();




            // echo $rowId;
            // echo $table_name;

            $_SESSION['tableName'] = $table_name;
        } else {

            echo "<p>لا توجد بيانات لعرضها في الجدول.</p>";
        }



        // إغلاق الاتصال بقاعدة البيانات









    }









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


    $table_name3 = $_SESSION['tablen'];





    // 2. التحقق من تسجيل الدخول واسم المستخدم

    $whatsapp_message = "لا توجد بيانات محركات متاحة."; // رسالة افتراضية

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['username'])) {

        $current_engineer = $_SESSION['username'];



        // 3. الاتصال بقاعدة البيانات

        $conn = new mysqli($servername, $username, $password, $dbname);


        $conn->set_charset("utf8mb4");
        // التحقق من الاتصال

        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);
        }



        // 4. استعلام البيانات (استخدم العبارات المحضرة للأمان)

        // افترض أن جدول المحركات اسمه 'motors' وبه الأعمدة 'tagno' و 'Eng'

        $sql = "SELECT tagno, motorname , visualcheck , abnormalsound , vibration , temperature , cleaning , performance , comments	 FROM $table_name3 WHERE Eng = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $current_engineer); // "s" تعني string

        $stmt->execute();

        $result = $stmt->get_result();



        $motor_tags = []; // مصفوفة لتخزين الـ tagno



        function getFormattedDateTime()
        {
            // Set the locale to Arabic for correct day and month names

            // 1. **ضبط المنطقة الزمنية (Timezone) أولاً**
            // هذا هو السطر الأهم لحل مشكلة فارق الساعة
            // تحتاج لاستبدال 'Africa/Cairo' بالمنطقة الزمنية المناسبة لموقعك
            // أمثلة: 'Asia/Riyadh', 'Asia/Aden', 'Africa/Cairo', 'Europe/London'
            date_default_timezone_set('Asia/Aden'); // تم التعديل إلى 'Asia/Aden' لتوقيت اليمن
            setlocale(LC_TIME, 'ar_AR.utf8', 'ar_AR', 'ara');

            // Get the current timestamp
            $timestamp = time();

            // Format the date

            $date = strftime('%d-%m-%Y', $timestamp);
            $formattedDate = "تاريخ : " . $date;

            // Format the day of the week
            $day = strftime('%A', $timestamp);
            $formattedDayv = $day;
            if ($formattedDayv === "Sunday") {
                $formattedDay = "اليوم : الأحد";
            } elseif ($formattedDayv === "Monday") {
                $formattedDay = "اليوم : الأثنين";
            } elseif ($formattedDayv === "Tuesday") {
                $formattedDay = "اليوم : الثلاثاء";
            } elseif ($formattedDayv === "Wednesday") {
                $formattedDay = "اليوم : الأربعاء";
            } elseif ($formattedDayv === "Thursday") {
                $formattedDay = "اليوم : الخميس";
            } elseif ($formattedDayv === "Friday") {
                $formattedDay = "اليوم : الجمعة";
            } elseif ($formattedDayv === "Saturday") {
                $formattedDay = "اليوم : السبت";
            } else {
                $formattedDay = "اليوم : " . $day;
            }
            // Format the time (with AM/PM adjusted for Arabic, if necessary, though 24-hour is often clearer)
            // For 12-hour format with صباحًا/مساءً, we need custom logic or a specific locale setting
            // Let's use a 24-hour format which is universally understood, or a more direct 12-hour approach with AM/PM.
            // For precise "صباحًا" or "مساءًا", we'll do a conditional check.
            $hour = date('h', $timestamp); // 12-hour format with leading zeros
            $minute = date('i', $timestamp); // Minutes with leading zeros
            $ampm = date('a', $timestamp); // 'am' or 'pm'

            $arabicAmPm = ($ampm == 'am') ? 'صباحا' : 'مساءا';

            $formattedTime = "الوقت : " . $hour . " : " . $minute . " " . $arabicAmPm;

            // Group (hardcoded as per your example)
            if (isset($_GET['motors_groups'])) {

                $groupv = "المجموعة : " . $_GET['motors_groups'];
            } else {
                $groupv = "المجموعة : " . 'group_a_2025';
            }


            // Combine all parts
            return $formattedDate . "\n" .
                $formattedDay . "\n" .
                $formattedTime . "\n" .
                $groupv;
        }

        // Call the function and print the output
        $tartindex = getFormattedDateTime();








        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                if ($row["visualcheck"] === '2') {

                    $visual = 'OK';
                } elseif ($row["visualcheck"] === '1') {

                    $visual = 'BAD';
                } else {

                    $visual = 'لم يتم الفحص';
                }



                if ($row["abnormalsound"] === '2') {

                    $sound = 'OK';
                } elseif ($row["abnormalsound"] === '1') {

                    $sound = 'BAD';
                } else {

                    $sound = 'لم يتم الفحص';
                }



                // if ($row["vibration"] === '') {
                //     $vibr = 'غير محدد';
                // } else {
                //     $vibr = $row['vibration'];
                // }

                $viprFormatting = ''; // Default to no formatting
                $vibr = $row['vibration']; // Get the temperature value directly

                // **التغيير هنا:** معالجة القيمة الفارغة أو غير المحددة أولاً
                if (empty($vibr)) {
                    $vibr = 'لم يتم الفحص';
                    $viprFormatting = ''; // Ensure no special formatting for "لم يتم الفحص"
                } else {
                    // Convert to a number for comparison only if it's not empty
                    $vibrValue = (float)$vibr;

                    if ($vibrValue > 11.2) {
                        // Critical: Bold + Strikethrough
                        $viprFormatting = '*~'; // Start with Bold and Strikethrough
                        $vibr .= '~*++'; // End with Strikethrough and Bold
                    } elseif ($vibrValue >= 4.5 && $vibrValue <= 11.2) {
                        // Elevated: Bold
                        $viprFormatting = '*~'; // Start with Bold
                        $vibr .= '~*+'; // End with Bold
                    } elseif ($vibrValue >= 1.8 && $vibrValue <= 4.5) {
                        // Elevated: Bold
                        $viprFormatting = '*'; // Start with Bold
                        $vibr .= '*'; // End with Bold
                    }
                }




                // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                // New logic to determine the formatting based on temperature
                $tempFormatting = ''; // Default to no formatting
                $tempret = $row['temperature']; // Get the temperature value directly

                // **التغيير هنا:** معالجة القيمة الفارغة أو غير المحددة أولاً
                if (empty($tempret)) {
                    $tempret = 'لم يتم الفحص';
                    $tempFormatting = ''; // Ensure no special formatting for "لم يتم الفحص"
                } else {
                    // Convert to a number for comparison only if it's not empty
                    $tempValue = (float)$tempret;

                    if ($tempValue > 85) {
                        // Critical: Bold + Strikethrough
                        $tempFormatting = '*~'; // Start with Bold and Strikethrough
                        $tempret .= '~++*'; // End with Strikethrough and Bold
                    } elseif ($tempValue >= 70 && $tempValue <= 85) {
                        // Elevated: Bold
                        $tempFormatting = '*'; // Start with Bold
                        $tempret .= '*+'; // End with Bold
                    }
                }
                // Normal (below 70) and 'لم يتم الفحص' will have no special formatting
                // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


                if ($row["cleaning"] === '2') {
                    $cleann = 'OK';
                } elseif ($row["cleaning"] === '1') {
                    $cleann = 'BAD';
                } else {
                    $cleann = 'لم يتم الفحص';
                }

                if ($row["performance"] === '2') {
                    $perfor = 'OK';
                } elseif ($row["performance"] === '1') {
                    $perfor = 'BAD';
                } else {
                    $perfor = 'لم يتم الفحص';
                }

                if ($row["comments"] === '') {
                    $commentt = 'لا يوجد';
                } else {
                    $commentt = $row['comments'];
                }

                // We will now include the formatting in the temperature line
                $motor_tags[] = " رقم المحرك : " . $row['tagno'] . "\n" . $row['motorname']  . "\n" . " (فحص نظري: " . $visual . ")"
                    . "\n" . " ( الصوت: " . $sound . ")" . "\n" . " (درجة الاهتزاز : " . $viprFormatting . $vibr . ")"
                    . "\n" . " ( درجة الحرارة : " . $tempFormatting . $tempret . ")"
                    . "\n" . " ( النظافة: " . $cleann . ")" . "\n" . " ( الأداء: " . $perfor . ")" . "\n" . " [" . " ( تعليق: " . $commentt . ")" . "\n";
            }
        }


        // 5. بناء الرسالة

        if (!empty($motor_tags)) {

            $whatsapp_message = "تقرير  الفحص الأسبوعي للمحركات: "  . "\n\n" . $tartindex . "\n" . "______________" . "\n";
            $whatsapp_message .= implode("\n", $motor_tags);
            $whatsapp_message .= "\n\n . $arabicname";
        } else {

            $whatsapp_message = "عذرًا، لا توجد محركات مسجلة للمهندس " . $current_engineer . " في الوقت الحالي.";
        }



        $stmt->close();

        $conn->close();
    } else {

        // إذا لم يكن المستخدم مسجلاً للدخول

        $whatsapp_message = "الرجاء تسجيل الدخول لعرض تقرير المحركات.";
    }



    // تشفير الرسالة لضمان عملها بشكل صحيح في رابط الواتساب

    $encoded_whatsapp_message = htmlspecialchars(urlencode($whatsapp_message));



    ?>





    <script>
        // هذا الكود جافا سكربت لحفظ البيانات الخاصة ب درجة الحرارة والاهنزاز واتعليقات الى قاعدة البيانات
        // اسمع لحدث onchange على جميع حقول الإدخال التي لها class="auto-save"
        // اسمع لحدث onchange على جميع حقول الإدخال التي لها class="auto-save"
        document.querySelectorAll('.auto-save').forEach(input => {
            input.addEventListener('change', function() {
                const id = this.getAttribute('data-id');
                const column = this.getAttribute('data-column');
                const value = this.value;

                // >>>>>>>>>>>>>>>>>> إضافة جديدة هنا <<<<<<<<<<<<<<<<
                // إذا كان العمود هو 'temperature'، قم بتحديث الفئة فورًا
                if (column === 'temperature') {
                    updateInputClass(this, value);
                }
                // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

                // إرسال طلب AJAX
                fetch('update_record.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `id=${encodeURIComponent(id)}&column=${encodeURIComponent(column)}&value=${encodeURIComponent(value)}`
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

        // >>>>>>>>>>>>>>>>>> دالة جديدة هنا <<<<<<<<<<<<<<<<
        function updateInputClass(inputElement, value) {
            // إزالة جميع فئات الألوان الموجودة
            inputElement.classList.remove('temp-normal', 'temp-elevated', 'temp-critical', 'temp-default');

            // تحديد الفئة الجديدة بناءً على القيمة
            const tempValue = parseFloat(value);
            let newClass = 'temp-default';
            if (!isNaN(tempValue)) {
                if (tempValue < 70) {
                    newClass = 'temp-normal';
                } else if (tempValue >= 70 && tempValue < 85) {
                    newClass = 'temp-elevated';
                } else {
                    newClass = 'temp-critical';
                }
            }

            // إضافة الفئة الجديدة
            inputElement.classList.add(newClass);
        }
        // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        // هذا الكود جافا سكربت لحفظ البيانات الخاصة ب درجة الحرارة والاهنزاز واتعليقات الى قاعدة البيانات

        // --- الجزء الثاني: كود JavaScript ---



        function handleSendClick1(event) {
            event.preventDefault(); // منع السلوك الافتراضي للزر
            const phoneNumber = '771598385'; // رقم الهاتف المستهدف
            const message = "<?php echo $encoded_whatsapp_message; ?>";
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
            window.open(whatsappUrl, '_blank');
        }

        function handleSendClick2(event) {
            event.preventDefault(); // منع السلوك الافتراضي للزر
            const phoneNumber = '776402808'; // رقم الهاتف المستهدف
            const message = "<?php echo $encoded_whatsapp_message; ?>";
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
            window.open(whatsappUrl, '_blank');
        }



        //++++++++++++++++++++++++++++++++++++++++++++++++++++




        function handleExitClick(event) {

            event.preventDefault(); // منع السلوك الافتراضي لزر الـ submit

            document.location = 'weekly_motors.php'; // إعادة التوجيه

        }











        document.addEventListener('DOMContentLoaded', function() {

            const clickableCells2 = document.querySelectorAll('.clickable-day2');



            clickableCells2.forEach(cell => {

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

                    xhr.open('POST', 'update_status2.php',
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