<?php

session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>الفحص السنوي للتأريض </title>

  <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">



  <div class="main_top_head">

    <img src="imgs/hsa_icon.jpg" alt="">

    <h1>الشركة اليمنية لتكرير السكر</h1>

    <img src="imgs/ycsr_icon.jpg" alt="">

  </div>



</head>

<body>

  <div class="page_label">

    <h1>الفحص السنوي للتأريض </h1>

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

      <button onclick="Earthing_Maint" id="Eart_Maint_Page"><img class="pdf_img" src="imgs/maint2.png" alt=""><br>اجراء الفحص</button>

      <button onclick="Earting_Show" id="Earth_Show_Pge"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""><br>عرض وطباعة</button>



      <button onclick="back_to_main_page" id="btn_frm_transformer_to_main"><img class="pdf_img" src="imgs/exit.png" alt=""><br>خروج</button>

    </div>



  </div>



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