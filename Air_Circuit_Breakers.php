<?php

session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>فحص القواطع الهوائية</title>

    <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">

    <style>
        .select-container {
            position: relative;
            width: 250px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: 1px solid #e0e0e0;
            width: 40%;
            margin-left: 30%;
            margin-top: 0.2%;
        }

        .select-label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        .custom-select {
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 6px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-select:hover {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .custom-select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* تنسيق أسهم القائمة المنسدلة */
        .select-container::after {
            content: '\25BC';
            /* سهم للأسفل */
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(20%);
            font-size: 12px;
            color: #555;
            pointer-events: none;
            transition: transform 0.3s ease;
        }

        .custom-select:focus+.select-container::after {
            transform: translateY(20%) rotate(180deg);
        }

        /* تنسيق الخيارات */
        .custom-select option {
            padding: 10px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }
    </style>

    <div class="main_top_head">

        <img src="imgs/hsa_icon.jpg" alt="">

        <h1>الشركة اليمنية لتكرير السكر</h1>

        <img src="imgs/ycsr_icon.jpg" alt="">

    </div>



</head>

<body>

    <div class="page_label">

        <h1>فحص القواطع الهوائية</h1>

        <hr>

        <h1 style="background-color: rgb(166, 220, 27);"> مرحـــــبا :

            <?php

            if ($_SESSION['username'] === "Osama Al-Maqarmi") {

                echo "أســامــة المــقـرمــي";
            }

            if ($_SESSION['username'] === "Hatem Alabdali") {

                echo "حــاتم العـبـدلــي";
            }

            if ($_SESSION['username'] === "Khalid Hammoud") {

                echo "خــالــد نــاشــر";
            }

            if ($_SESSION['username'] === "Khalid Al-Maqarmi") {

                echo "خــالــد المــقـرمــي";
            }

            if ($_SESSION['username'] === "Akram Samir") {

                echo "أكــرم سـمـيــر";
            }

            if ($_SESSION['username'] === "Riyadh Al-Rajhi") {

                echo "ريــاض الراجــحــي";
            }

            if ($_SESSION['username'] === "Bassem Abdeljawad") {

                echo "بــاسم عـبـد الجــواد";
            }

            if ($_SESSION['username'] === "Murad Al-Dabai") {

                echo "مــراد الـدبـعــي";
            }

            if ($_SESSION['username'] === "Younes") {

                echo "يــونــس";
            }

            if ($_SESSION['username'] === "Mohammed Abdulrab") {

                echo "مـحـمـد الـزيلعـــي";
            }

            if ($_SESSION['username'] === "Mahmoud Al-Shumairi") {

                echo "مـحـمـود الـشـمـيـري";
            }
            if ($_SESSION['username'] === "Ameen Al-Shumairi") {

                echo "م/ أمـــيــن الـشـمـيـري";
            }

            ?>
        </h1>

    </div>



    <div class="main_btns">



        <div class="form">





            <form method="post" action="">



                <button name="Edit_pass" id="Edit_pass"><img class="pdf_img" src="imgs/pass2.png" alt=""><br>تغيير كلمة المرور</button>

                <button name="logout" id="logout"><img class="pdf_img" src="imgs/logout2.png" alt=""><br>تسجيل الخروج</button>



            </form>

            <button id="Air_C_Maint"><img class="pdf_img" src="imgs/maint2.png" alt=""><br>اجراء الفحص</button>

            <button id="Air_C_Show"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""><br>عرض وطباعة</button>



            <button onclick="back_to_main_page" id="btn_frm_transformer_to_main"><img class="pdf_img" src="imgs/exit.png" alt=""><br>خروج</button>

        </div>



    </div>

    <div class="select-container">
        <label for="year-select" class="select-label">اختر السنة:</label>
        <select id="year-select" class="custom-select">
            <option value="" disabled selected>-- اختر سنة --</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
        </select>
    </div>

    <div class="select-container">
        <label for="breaker-select" class="select-label">اختر القاطع:</label>
        <select id="breaker-select" class="custom-select">
            <option value="" disabled selected>-- اختر قاطع --</option>
            <option value="ACB_MCC1">ACB_MCC1</option>
            <option value="ACB_MCC2">ACB_MCC2</option>
            <option value="ACB_MCC5">ACB_MCC5</option>
            <option value="ACB_EME_MCC5">ACB_EME_MCC5</option>
            <option value="ACB_MOT_10_730">ACB_MOT_10-730</option>
            <option value="ACB_MOT_10_740">ACB_MOT_10_740</option>
            <option value="ACB_MCC2B">ACB_MCC2B</option>
            <option value="ACB_REF_MCC2B">ACB_REF_MCC2B</option>
            <option value="ACB_MCC3A">ACB_MCC3A</option>
            <option value="ACB_MCC3C">ACB_MCC3C</option>

            <option value="ACB_RO_TR_OUT">ACB_RO_TR_OUT</option>
            <option value="ACB_RO_TR_Q11">ACB_RO_TR_Q11</option>
            <option value="ACB_RO_TR_Q12">ACB_RO_TR_Q12</option>
            <option value="ACB_RO_TR_Q13">ACB_RO_TR_Q13</option>
            <option value="ACB_RO_TR_Q14">ACB_RO_TR_Q14</option>
            <option value="ACB_RO_TR_Q15">ACB_RO_TR_Q15</option>
            <option value="ACB_RO_TR_Q17">ACB_RO_TR_Q17</option>

            <option value="ACB_SILO_TR_OUT">ACB_SILO_TR_OUT</option>
            <option value="ACB_SILO_Q12">ACB_SILO_Q12</option>
            <option value="ACB_SILO_Q13">ACB_SILO_Q13</option>
            <option value="ACB_RAW_Q14">ACB_RAW_Q14</option>
            <option value="ACB_PACK_COMQ15">ACB_PACK_COMQ15</option>
            <option value="ACB_RAW_LGHT_Q16">ACB_RAW_LGHT_Q16</option>
            <option value="ACB_PACK_LGHT_Q17">ACB_PACK_LGHT_Q17</option>
            <option value="ACB_PACK_CONV_Q18">ACB_PACK_CONV_Q18</option>
            <option value="ACB_PACKING_MCC">ACB_PACKING_MCC</option>

            <option value="ACB_GATE_TR_OUT">ACB_GATE_TR_OUT</option>
            <option value="ACB_Q1_GATE_CENTRAL">ACB_Q1_GATE&CENTRAL</option>
            <option value="ACB_Q2S_STREET_LIGHT">ACB_Q2S_STREET_LIGHT</option>
            <option value="ACB_Q3CAR_WASH_KURIMI">CB_Q3CAR_WASH&KURIMI</option>
            <option value="ACB_Q5_WHEIGHIN">ACB_Q5_WHEIGHIN</option>
            <option value="ACB_Q4_WELL_PUMP3">ACB_Q4_WELL_PUMP3</option>
            <option value="ACB_Q6_WELL_PUMP4">ACB_PACK_LGHT_Q17</option>

            <option value="ACB_MCC3">ACB_MCC3</option>
            <option value="ACB_MCC3A_CO2">ACB_MCC3A_CO2</option>
            <option value="ACB_MCC3_WORKSH">ACB_MCC3_WORKSH</option>
            <option value="ACB_MCC3A_DMIN_B">ACB_MCC3A_DMIN.B</option>
            <option value="ACB_MCC3_CHALIT">ACB_MCC3_CHALIT</option>
            <option value="ACB_MCC3_EME_DG">ACB_MCC3_EME.DG</option>
            <option value="ACB_MCC3_DCS_LI">ACB_MCC3_DCS_LI</option>
            <option value="ACB_MCC3_AIR_CO">ACB_MCC3_AIR_CO</option>
            <option value="ACB_MCC3_REF_SR">ACB_MCC3_REF.SR</option>

            <option value="ACB_HOME_TR_OUT">ACB_HOME_TR_OUT</option>
            <option value="ACB_HOME_TR_TEC">ACB_HOME_TR_TEC</option>
            <option value="ACB_HOME_ENG">ACB_HOME_ENG</option>
        </select>
    </div>


    <script>
        // الحصول على عناصر القائمة المنسدلة
        const yearSelect = document.getElementById('year-select');
        const breakerSelect = document.getElementById('breaker-select');

        // وظيفة لحفظ القيمة في sessionStorage
        function saveSelection(selectElement) {
            sessionStorage.setItem(selectElement.id, selectElement.value);
        }

        // وظيفة لتحميل القيمة من sessionStorage
        function loadSelection(selectElement) {
            const savedValue = sessionStorage.getItem(selectElement.id);
            if (savedValue) {
                selectElement.value = savedValue;
            }
        }

        // تحميل القيم المحفوظة عند تحميل الصفحة
        window.addEventListener('load', () => {
            loadSelection(yearSelect);
            loadSelection(breakerSelect);
        });

        // حفظ القيمة عند تغيير الاختيار
        yearSelect.addEventListener('change', (event) => {
            saveSelection(event.target);
        });

        breakerSelect.addEventListener('change', (event) => {
            saveSelection(event.target);
        });
    </script>

    <?php

    if (isset($_POST['Edit_pass'])) {

        echo ' <div class="chang_my_pass">

          <div class="conteiner">

              <form method="post" action="">

                <br>

                <label class="subject">تغيير كلمة السر</label>

                <hr>

                <hr>

                <label>أدخل كلمة السر الجديدة</label>

                <input type="text" name="newpassword">

                <br>

                <br>

                <button type="submit" name="Save_new_pass">حفظ</button>

                <button type="submit" name="Cancel_new_pass">ألغاء</button>

                <br>

                <br>

              </form>

          </div>

       </div>';
    }

    if (isset($_POST['Save_new_pass'])) {


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
        $new_pass = mysqli_real_escape_string($conn, trim($_POST['newpassword']));

        $userr_NO = $_SESSION['userno'];

        $chpass = "UPDATE `users` SET `passwordd`='$new_pass' WHERE user_no = '$userr_NO'";

        mysqli_query($conn, $chpass);
    }

    if (isset($_POST['Cancel_new_pass'])) {

        $current_page = $_SERVER['PHP_SELF'];



        // إرسال رأس Refresh مع 0 ثانية لإعادة التحميل الفورية

        header("Refresh: 0; url=" . $current_page);



        // من الضروري استخدام exit() بعد header() لضمان توقف تنفيذ السكريبت الحالي

        // هذا يمنع أي محتوى إضافي من الإرسال إلى المتصفح بعد إعادة التوجيه

        exit();
    }

    ?>









    <div id="dateshow">

        <div class="calendar-nav">

            <button id="prevMonth">&lt;</button>

            <h3 id="currentMonthYear"></h3>

            <button id="nextMonth">&gt;</button>

        </div>

        <div class="calendars-container">

            <div id="lastMonthCalendar" class="calendar"></div>

            <div id="currentMonthCalendar" class="calendar"></div>

        </div>



    </div>



    <div style="display: none;" class="btns">

        <h1 id="yearh">year</h1>

        <h1 id="monthh">month</h1>

        <h1 id="weekh">week</h1>

        <h1 id="dayh">day</h1>



    </div>

    <script src="m5.js?v=' . filemtime('m5.js') . '"></script><br>

    <?php



    if (isset($_POST['logout'])) {

        $_SESSION['loggedin'] = false;

        $_SESSION['username'] = '';

        $_SESSION['userno'] = '';

        $_SESSION['passwrd'] = '';

        header("Location: " . 'index.php');
    }









    ?>

</body>

</html>