<?php
session_start();

// معالجة تسجيل الخروج أولاً قبل أي إخراج HTML
if (isset($_POST['logout'])) {
  $_SESSION['loggedin'] = false;
  $_SESSION['username'] = '';
  $_SESSION['userno'] = '';
  $_SESSION['passwrd'] = '';

  // إضافة رأس للتوجيه مع الخروج
  header("Location: index.php");
  exit(); // التأكد من إنهاء التنفيذ بعد التوجيه
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الفحص السنوي للتأريض </title>

  <style>
    /* تنسيقات التصميم الجديدة فقط */
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
    }

    .main_top_head {
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
      color: white;
      padding: 15px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 1000px;
      margin-bottom: 20px;
    }

    .main_top_head img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 20px;
      border: 3px solid white;
    }

    .main_top_head h1 {
      font-size: 24px;
      text-align: center;
      margin: 0;
    }

    .page_label {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 1000px;
      margin-bottom: 20px;
      text-align: center;
    }

    .page_label h1:first-child {
      color: #1e3c72;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .page_label hr {
      border: 1px solid #e0e0e0;
      margin: 15px 0;
    }

    .page_label h1:last-child {
      background-color: rgb(166, 220, 27);
      padding: 15px;
      border-radius: 8px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 15px;
      font-size: 22px;
    }

    .main_btns {
      width: 100%;
      max-width: 1000px;
      margin-bottom: 20px;
    }

    .form {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    /* إزالة أي تنسيقات خاصة بالعنصر form */
    .form form {
      display: contents;
      /* هذا يجعل العنصر form شفافاً للتخطيط */
    }

    .form button {
      background: linear-gradient(145deg, #1e3c72, #2a5298);
      color: white;
      border: none;
      padding: 20px 15px;
      border-radius: 12px;
      font-size: 18px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 140px;
      width: 100%;
      /* للتأكد من أن كل الأزرار بنفس العرض */
    }

    .form button:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      background: linear-gradient(145deg, #2a5298, #3a6bd1);
    }

    .pdf_img {
      width: 40px;
      height: 40px;
      margin-bottom: 10px;
      filter: invert(1);
    }

    .chang_my_pass {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .conteiner {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.4);
      width: 90%;
      max-width: 400px;
      text-align: center;
    }

    .subject {
      font-size: 22px;
      font-weight: bold;
      color: #1e3c72;
      display: block;
      margin-bottom: 15px;
    }

    .conteiner label {
      display: block;
      margin: 10px 0 5px;
      text-align: right;
      font-weight: bold;
    }

    .conteiner input {
      width: 100%;
      padding: 12px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      margin: 10px 0;
    }

    .conteiner button {
      background: linear-gradient(145deg, #1e3c72, #2a5298);
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      margin: 10px 5px;
      transition: all 0.3s ease;
    }

    .conteiner button:hover {
      background: linear-gradient(145deg, #2a5298, #3a6bd1);
    }

    #dateshow {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 1000px;
      margin-bottom: 20px;
    }

    .calendar-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .calendar-nav button {
      background: #1e3c72;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .calendars-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 20px;
    }

    .calendar {
      flex: 1;
      min-width: 300px;
    }

    body>img {
      display: block;
      margin: 20px auto;
      max-width: 200px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
      .main_top_head {
        flex-direction: column;
        text-align: center;
      }

      .main_top_head img {
        margin: 10px 0;
      }

      .form {
        grid-template-columns: 1fr;
      }

      .page_label h1:last-child {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <div class="main_top_head">
    <img src="imgs/hsa_icon.jpg" alt="">
    <h1>الشركة اليمنية لتكرير السكر</h1>
    <img src="imgs/ycsr_icon.jpg" alt="">
  </div>

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
      <button onclick="Earthing_Maint" id="Eart_Maint_Page"><img class="pdf_img" src="imgs/maint2.png" alt=""><br>اجراء الفحص</button>
      <button onclick="Earting_Show" id="Earth_Show_Pge"><img class="pdf_img" src="imgs/tableshowimg2.png" alt=""><br>عرض وطباعة</button>
      <button onclick="back_to_main_page()" id="btn_frm_transformer_to_main"><img class="pdf_img" src="imgs/exit.png" alt=""><br>خروج</button>
      <form method="post" action="">
        <button name="Edit_pass" id="Edit_pass"><img class="pdf_img" src="imgs/pass2.png" alt=""><br>تغيير كلمة المرور</button>
        <button name="logout" id="logout"><img class="pdf_img" src="imgs/logout2.png" alt=""><br>تسجيل الخروج</button>
      </form>

      
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
    header("Refresh: 0; url=" . $current_page);
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
  <script>
    // دالة للعودة للصفحة الرئيسية

    // دالة لمحاكاة عمل التقويم (سيتم استبدالها بالكود الحقيقي)
    document.addEventListener('DOMContentLoaded', function() {
      const now = new Date();
      const day = now.getDate();
      const month = now.toLocaleDateString('ar-AR', {
        month: 'long'
      });
      const year = now.getFullYear();
      const formattedDate = `${day} ${month} ${year}`;

      const currentMonthYearElement = document.getElementById('currentMonthYear');
      if (currentMonthYearElement) {
        currentMonthYearElement.textContent = formattedDate;
      }

      // الأكواد الأخرى الموجودة في ملف m5.js
      // ...
    });
  </script>

  <script src="m5.js?v=<?php echo filemtime('m5.js'); ?>"></script><br>

  <?php
  // تم نقل معالجة تسجيل الخروج إلى أعلى الصفحة
  ?>
  <img src="imgs/earth3.png" alt="">
</body>

</html>