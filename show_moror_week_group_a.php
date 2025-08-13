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
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <title>الفحص الاسبوعي للمحولات</title> -->



    <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">

    <link rel="manifest" href="manifest.json?v=<?php echo filemtime('manifest.json'); ?>">



</head>

<body>

    <div class="formshowmotor">

        <form method="get" name="form" action="" id="myForm">

            <!-- <h1>اختر فاكهتك المفضلة:</h1> -->

            <!-- <label for=""><?php echo $arabicname; ?></label> -->



            <!-- <label for="fruits">الفاكهة:</label> -->

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





            <!-- <br><br>

        <input type="submit" value="إرسال"> -->



            <input type="text" placeholder="Enter Data" name="tyear" id="tyear">

            <input type="text" placeholder="Enter Data" name="tmonth" id="tmonth">

            <input type="text" placeholder="Enter Data" name="tweek" id="tweek">

            <input type="text" placeholder="Enter Data" name="tday" id="tday">



            <button name="btn" id="btn"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""></button>



            <!-- <input type="submit" value="خروج" name="btnback" id="btnback" onclick="handleExitClick(event)"> -->



            <button class="print-button" onclick="handleExitClick(event)"><img class="pdf_img" src="imgs/exit.png"
                    alt=""></button>



            <button class="print-button" onclick="window.print()"><img class="pdf_img" src="imgs/printdoc2.png"
                    alt=""></button>



            <!-- <button id="savePdfBtn2" class="print-button">

    PDF 

    <span id="pdfLoadingIndicator" style="display: none; margin-left: 5px; color: blue;">جاري الحفظ...</span>

</button> -->

            <button id="savePdfBtn2" class="print-button">

                <img class="pdf_img" src="imgs/pdfimg3.png" alt="">

                <span id="pdfLoadingIndicator" style="display: none; margin-left: 5px; color: blue;">جاري
                    الحفظ...</span>

            </button>



            <!-- <button class="print-button" id="savePdfBtn" style="margin-top: 20px;">حفظ كملف PDF</button> -->

            <!-- <button class="print-button" id="saveCsvBtn" style="margin-top: 10px;">حفظ كملف CSV (Excel)</button> -->



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

                motors_groups.value = storedValue; // قم بتعيينها كقيمة للعنصر Select

                let grooop = document.getElementById('grooop');

                if (storedValue === "group_a") {

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





        // 
    </script>

    <div class="container3">

        <div class="yemen_company">

            <img src="imgs/hsa_icon.jpg" alt="">

            <div class="h">

                <h1>YEMEN COMPANY FOR SUGAR REFINERY</h1>

                <h1>ELECTRICAL DEPARTMENT</h1>

                <h2 id="grooop">REFINERY ELECTRICAL MOTORS WEEKELY CHECK LIST</h2>







            </div>

            <img src="imgs/ycsr_icon.jpg" alt="">

        </div>

        <div class="oneline">

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

        <!-- <script src="m4.js"></script> -->







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

                let year_label = document.getElementById('year_label');

                let year_labe2 = document.getElementById('year_labe2');



                tyear.value = year;

                tmonth.value = month;

                tweek.value = week;

                tday.value = day;









                let month_label = document.getElementById('month_label');

                let month_labe2 = document.getElementById('month_labe2');

                let day_label = document.getElementById('day_label');

                let day_labe2 = document.getElementById('day_labe2');







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

                        year_label.textContent = year_label.textContent - 1;

                    } else {



                        month_labe2.textContent = month_labe2.textContent++ + 1;

                        year_labe2.textContent = year_labe2.textContent++ + 1;

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

        <?php

        echo "<hr>";

        $group = "group";

        if (isset($_GET['motors_groups'])) {

            $group = $_GET['motors_groups'];
        } else {

            // $group= "group_a";

        }







        echo "<hr>";















        // استعلام SQL لجلب البيانات

        // تأكد من أنك تختار 11 عمودًا هنا بالأسماء الصحيحة من جدولك

        // استبدل col1, col2, ... col11 بأسماء الأعمدة الفعلية من جدولك







        if (isset($_GET['btn'])) {

            $year = $_GET['tyear'];

            $month = $_GET['tmonth'];

            $week = $_GET['tweek'];

            $day = $_GET['tday'];







            // group Tables 2025

            if ($year == 2025) {

                if ($group === "group_a") {

                    $table_name = "group_a_2025";

                    show($table_name);
                } elseif ($group === "group_a1") {

                    $table_name = "group_a1_2025";

                    show($table_name);
                } elseif ($group === "group_a2") {

                    $table_name = "group_a2_2025";

                    show($table_name);
                } elseif ($group === "group_b") {

                    $table_name = "group_b_2025";

                    show($table_name);
                } elseif ($group === "group_b1") {

                    $table_name = "group_b1_2025";

                    show($table_name);
                } elseif ($group === "group_c") {

                    $table_name = "group_c_2025";

                    show($table_name);
                } elseif ($group === "group_c1") {

                    $table_name = "group_c1_2025";

                    show($table_name);
                }

                //  elseif($group==="all"){

                //      $table_name = "group_a_2025";

                //     show($table_name);

                //      $table_name = "group_a1_2025";

                //     show($table_name);

                //     $table_name = "group_a2_2025";

                //     show($table_name);

                //     $table_name = "group_b_2025";

                //     show($table_name);

                //     $table_name = "group_b1_2025";

                //     show($table_name);

                //     $table_name = "group_c_2025";

                //     show($table_name);

                //     $table_name = "group_c_2025";

                //     show($table_name);

                // }



            }



            // group Tables 2026

            elseif ($year == 2026) {

                if ($group === "group_a") {

                    $table_name = "group_a_2026";

                    show($table_name);
                } elseif ($group === "group_a1") {

                    $table_name = "group_a1_2026";

                    show($table_name);
                } elseif ($group === "group_a2") {

                    $table_name = "group_a2_2026";

                    show($table_name);
                } elseif ($group === "group_b") {

                    $table_name = "group_b_2026";

                    show($table_name);
                } elseif ($group === "group_b1") {

                    $table_name = "group_b1_2026";

                    show($table_name);
                } elseif ($group === "group_c") {

                    $table_name = "group_c_2026";

                    show($table_name);
                } elseif ($group === "group_c1") {

                    $table_name = "group_c1_2026";

                    show($table_name);
                }

                //  elseif($group==="all"){

                //      $table_name = "group_a_2026";

                //     show($table_name);

                //      $table_name = "group_a1_2025";

                //     show($table_name);

                // }

            }









            // إنشاء الاتصال



        }





        function show($table_name)
        {

            $year = $_GET['tyear'];

            $month = $_GET['tmonth'];

            $week = $_GET['tweek'];

            $day = $_GET['tday'];

            $mamemo = '';

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







            $sql = "SELECT id, week_id, tagno, motorname, visualcheck, abnormalsound, vibration, temperature, cleaning, performance, comments , Eng FROM $table_name WHERE week_id = '$week' ";



            $result = $conn->query($sql);

            // التحقق مما إذا كانت هناك نتائج

            if ($result->num_rows > 0) {

                // echo '<div class="container3">';
                echo '<div class="container5">';
                echo "<table>";

                echo "<thead>";

                echo "<tr>";

                // رؤوس الأعمدة (ثابتة 11 عمودًا)

                // قم بتغيير هذه العناوين لتتناسب مع بياناتك

                // echo "<th>Sr</th>";

                // echo "<th>week_id</th>";

                echo "<th>TAG.NO.</th>";

                echo "<th style=\" text-align: left;\">MOTOR NAME</th>";

                echo "<th>Visualk</th>";

                echo "<th>sound</th>";

                echo "<th>Vibr</th>";

                echo "<th>Temp.</th>";

                echo "<th>Clean</th>";

                echo "<th>perform</th>";

                echo "<th>comm</th>";

                echo "<th>Eng</th>";

                // echo "<th></th>";

                echo "</tr>";

                echo "</thead>";

                echo "<tbody>";



                // إخراج البيانات لكل صف

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";

                    // هنا، استخدم أسماء الأعمدة الفعلية من جدول قاعدة البيانات الخاص بك

                    // سيتكرر هذا الجزء لإنشاء صف لكل سجل في قاعدة البيانات

                    // echo "<td>" . $row["id"] . "</td>";

                    // echo "<td>" . $row["week_id"] . "</td>";

                    echo "<td>" . $row["tagno"] . "</td>";

                    echo "<td style=\" text-align: left;\">" . $row["motorname"] . "</td>";

                    // echo "<td>" . $row["visualcheck"] . "</td>";

                    if ($row["visualcheck"] == 1) {

                        echo "<td style=\" color: rgb(222, 18, 18);\">" . "NOK" . "</td>";
                    } elseif ($row["visualcheck"] == 2) {

                        echo "<td style=\" color: rgb(62, 18, 222);\">" . "OK" . "</td>";
                    } else {

                        echo "<td>" . $row["visualcheck"] . "</td>";
                    }



                    // echo "<td>" . $row["abnormalsound"] . "</td>";

                    if ($row["abnormalsound"] == 1) {

                        echo "<td style=\" color: rgb(222, 18, 18); \">" . "NOK" . "</td>";
                    } elseif ($row["abnormalsound"] == 2) {

                        echo "<td style=\" color: rgb(62, 18, 222); \">" . "OK" . "</td>";
                    } else {

                        echo "<td>" . $row["abnormalsound"] . "</td>";
                    }



                    // echo "<td>" . $row["vibration"] . "</td>";
                    $vipClass = getVibrationClass($row["vibration"]);
                    $vipp = $row["vibration"];
                    echo "<td class=\"$vipClass\">" . $vipp . "</td>";







                    // echo "<td>" . $row["temperature"] . "</td>";
                    $tempClass = getTemperatureClass($row["temperature"]);
                    $tempp = $row["temperature"];
                    echo "<td class=\"$tempClass\">" . $tempp . "</td>";






                    // echo "<td>" . $row["cleaning"] . "</td>";

                    if ($row["cleaning"] == 1) {

                        echo "<td style=\" color: rgb(222, 18, 18);\">" . "NOK" . "</td>";
                    } elseif ($row["cleaning"] == 2) {

                        echo "<td style=\" color: rgb(62, 18, 222); \">" . "OK" . "</td>";
                    } else {

                        echo "<td>" . $row["cleaning"] . "</td>";
                    }





                    // echo "<td>" . $row["performance"] . "</td>";

                    if ($row["performance"] == 1) {

                        echo "<td style=\" color: rgb(222, 18, 18); \">" . "NOK" . "</td>";
                    } elseif ($row["performance"] == 2) {

                        echo "<td style=\" color: rgb(62, 18, 222); \">" . "OK" . "</td>";
                    } else {

                        echo "<td>" . $row["performance"] . "</td>";
                    }





                    echo "<td >" . $row["comments"] . "</td>";

                    echo "<td>" . $row["Eng"] . "</td>";



                    echo "</tr>";
                }

                echo "</tbody>";



                echo "</table>";

                echo '</div>';
            } else {

                echo "<p>لا توجد بيانات لعرضها في الجدول.</p>";
            }



            // إغلاق الاتصال بقاعدة البيانات

            $conn->close();

            echo '<div class="tail" id="tail">

            <h3 class="Intail1">ENGINEER</h3>

                <h3 class="Intail2">QF-ELEC-006-R00</h3>

                <h3 class="Intail3">SUPERVISOR</h3>

            </div>';



            // echo '<div class="tail4" id="tail">

            // <h3 class="Intail5">HATEM ALABDALI</h3>



            //     <h3 class="Intail6">KHALED ALMAQRAMI</h3>

            // </div>';



        }



        ?>



    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> -->

    <script src="js/html2pdf.bundle.min.js"></script>





    <script src="your_script2.js"></script>





</body>

</html>