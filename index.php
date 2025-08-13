<?php
session_start();

$Xservername =  "sql202.infinityfree.com";
$Xusername = "if0_39426096";
$Xpassword = "WKa8VQVTNfi";
$Xdbname = 'if0_39426096_mwt';

// $Xservername =  "localhost";
// $Xusername = "root";
// $Xpassword = "";
// $Xdbname = 'mwt';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <link rel="stylesheet" href="mainpage.css?v=<?php echo filemtime('mainpage.css'); ?>">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"> -->
    <style>
        @font-face {
            font-family: 'Cairo';
            src: url('fonts/Cairo-Regular.woff2') format('woff2'),
                url('fonts/Cairo-Regular.woff') format('woff');
            font-weight: 00;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Cairo';
            src: url('fonts/Cairo-Bold.woff2') format('woff2'),
                url('fonts/Cairo-Bold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        body {
            font-family: 'Cairo', sans-serif;
            /* background: linear-gradient(to right, #6a11cb, #2575fc); */

            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }

        .main_top_head h1 {
            font-size: 400%;

        }

        .login-container {
            margin-left: 35%;
            background-color: #ffffff;
            padding-left: 4%;
            padding-right: 4%;
            padding-top: 1%;
            padding-bottom: 1%;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            color: #333;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .login-container .input-group {
            margin-bottom: 20px;
            text-align: right;
        }

        .login-container .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        .login-container .input-group input[type="text"],
        .login-container .input-group input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            direction: rtl;
            /* Ensure text input is RTL */
        }

        .login-container .input-group input[type="text"]:focus,
        .login-container .input-group input[type="password"]:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
        }

        .login-container button {
            width: 100%;
            padding: 15px;
            background-color: #2575fc;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-container button:hover {
            background-color: #1a5acb;
            transform: translateY(-2px);
        }

        .login-container .message {
            margin-top: 25px;
            padding: 15px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
        }

        .login-container .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .login-container .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px 480px  */
        @media (max-width: 480px) {
            @font-face {
                font-family: 'Cairo';
                src: url('fonts/Cairo-Regular.woff2') format('woff2'),
                    url('fonts/Cairo-Regular.woff') format('woff');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cairo';
                src: url('fonts/Cairo-Bold.woff2') format('woff2'),
                    url('fonts/Cairo-Bold.woff') format('woff');
                font-weight: 700;
                font-style: normal;
                font-display: swap;
            }

            body {
                font-family: 'Cairo', sans-serif;
                /* background: linear-gradient(to right, #6a11cb, #2575fc); */

                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                color: #333;
            }

            .main_top_head h1 {
                font-size: 100%;

            }

            .login-container {
                margin-left: 0;
                background-color: #ffffff;
                padding-left: 4%;
                padding-right: 4%;
                padding-top: 1%;
                padding-bottom: 1%;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                width: 100%;
                max-width: 400px;
                text-align: center;
                animation: fadeIn 1s ease-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .login-container h2 {
                color: #333;
                margin-bottom: 30px;
                font-weight: 700;
            }

            .login-container .input-group {
                margin-bottom: 20px;
                text-align: right;
            }

            .login-container .input-group label {
                display: block;
                margin-bottom: 8px;
                color: #555;
                font-weight: 600;
            }

            .login-container .input-group input[type="text"],
            .login-container .input-group input[type="password"] {
                width: calc(100% - 20px);
                padding: 12px 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 16px;
                direction: rtl;
                /* Ensure text input is RTL */
            }

            .login-container .input-group input[type="text"]:focus,
            .login-container .input-group input[type="password"]:focus {
                border-color: #2575fc;
                outline: none;
                box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
            }

            .login-container button {
                width: 100%;
                padding: 15px;
                background-color: #2575fc;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 18px;
                font-weight: 700;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .login-container button:hover {
                background-color: #1a5acb;
                transform: translateY(-2px);
            }

            .login-container .message {
                margin-top: 25px;
                padding: 15px;
                border-radius: 8px;
                font-weight: 600;
                text-align: center;
            }

            .login-container .message.success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }

            .login-container .message.error {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }

        }

        /* 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px 9000px  */
        @media (max-width: 820px) and (orientation: landscape) {
            @font-face {
                font-family: 'Cairo';
                src: url('fonts/Cairo-Regular.woff2') format('woff2'),
                    url('fonts/Cairo-Regular.woff') format('woff');
                font-weight: 400;
                font-style: normal;
                font-display: swap;
            }

            @font-face {
                font-family: 'Cairo';
                src: url('fonts/Cairo-Bold.woff2') format('woff2'),
                    url('fonts/Cairo-Bold.woff') format('woff');
                font-weight: 700;
                font-style: normal;
                font-display: swap;
            }

            body {
                font-family: 'Cairo', sans-serif;
                /* background: linear-gradient(to right, #6a11cb, #2575fc); */

                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                color: #333;
            }

            .main_top_head h1 {
                font-size: 200%;

            }

            .login-container {
                margin-left: 25%;
                background-color: #ffffff;
                padding-left: 4%;
                padding-right: 4%;
                padding-top: 1%;
                padding-bottom: 1%;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                width: 100%;
                max-width: 400px;
                text-align: center;
                animation: fadeIn 1s ease-out;

            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .login-container h2 {
                color: #333;
                margin-bottom: 30px;
                font-weight: 700;
            }

            .login-container .input-group {
                margin-bottom: 20px;
                text-align: right;
            }

            .login-container .input-group label {
                display: block;
                margin-bottom: 8px;
                color: #555;
                font-weight: 600;
            }

            .login-container .input-group input[type="text"],
            .login-container .input-group input[type="password"] {
                width: calc(100% - 20px);
                padding: 12px 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 16px;
                direction: rtl;
                /* Ensure text input is RTL */
            }

            .login-container .input-group input[type="text"]:focus,
            .login-container .input-group input[type="password"]:focus {
                border-color: #2575fc;
                outline: none;
                box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
            }

            .login-container button {
                width: 100%;
                padding: 15px;
                background-color: #2575fc;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 18px;
                font-weight: 700;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .login-container button:hover {
                background-color: #1a5acb;
                transform: translateY(-2px);
            }

            .login-container .message {
                margin-top: 25px;
                padding: 15px;
                border-radius: 8px;
                font-weight: 600;
                text-align: center;
            }

            .login-container .message.success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }

            .login-container .message.error {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
        }
    </style>

    <div class="main_top_head">
        <img src="imgs/hsa_icon.jpg" alt="">
        <h1>الشركة اليمنية لتكرير السكر</h1>
        <img src="imgs/ycsr_icon.jpg" alt="">

    </div>
</head>

<body>

    <!-- <div class="btns">
        <button onclick()="transformers_btn" id="transformers_test">الفحص الاسبوعي للمحولات</button>
        <button onclick()="motors_btn" id="motors_test">الفحص الاسبوعي للمحركات</button>
    </div> -->
    <!-- <script src="m4.js"></script> -->
    <div class="login-container">
        <h2>تسجيل الدخول</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="user_identifier">اسم المستخدم أو رقم المستخدم:</label>
                <input placeholder="أدخل اسم المستخدم أو كوده" value="<?php
                                                                        // تأكد من بدء الجلسة في بداية الملف (session_start();)
                                                                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                                                            if (isset($_SESSION['username']) && $_SESSION['username'] !== '') {
                                                                                echo htmlspecialchars($_SESSION['username']);
                                                                            } elseif (isset($_SESSION['userno']) && $_SESSION['userno'] !== '') {
                                                                                echo htmlspecialchars($_SESSION['userno']);
                                                                            }
                                                                        }
                                                                        ?>" type="text" id="user_identifier" name="user_identifier" required>
            </div>
            <div class="input-group">
                <label for="password">كلمة المرور:</label>
                <input value="<?php
                                // if($_SESSION['loggedin'] === true){
                                //                 if(!$_SESSION['username']==''){
                                //                     echo $_SESSION['passwrd'];       
                                //                 } 
                                //         }
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                                    if (isset($_SESSION['username']) && $_SESSION['username'] !== '') {
                                        echo htmlspecialchars($_SESSION['username']);
                                    } elseif (isset($_SESSION['passwrd']) && $_SESSION['passwrd'] !== '') {
                                        echo htmlspecialchars($_SESSION['passwrd']);
                                    }
                                }

                                ?>" type="password" id="password" name="password" required>
            </div>
            <button id="regbtnnn" type="submit">تسجيل الدخول</button>
        </form>


        <?php
        // Database connection details

        $servername = $Xservername; // غالباً ما يكون localhost
        $username = $Xusername; // اسم مستخدم قاعدة البيانات الخاص بك
        $password = $Xpassword; // كلمة مرور قاعدة البيانات الخاصة بك
        $dbname = $Xdbname;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
        // Check connection
        if ($conn->connect_error) {
            die("<div class='message error'>فشل الاتصال بقاعدة البيانات: " . $conn->connect_error . "</div>");
        }

        // Process login form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_identifier = $_POST['user_identifier'];
            $input_password = $_POST['password'];

            // Prepare statement to prevent SQL injection
            // Searches for user by user_no OR user_name
            $stmt = $conn->prepare("SELECT user_name,user_no, passwordd FROM users WHERE user_no = ? OR user_name = ?");
            // "ss" indicates two string parameters
            $stmt->bind_param("ss", $user_identifier, $user_identifier);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // User found, fetch their data
                $user = $result->fetch_assoc();
                $stored_password = $user['passwordd'];
                $user_name = $user['user_name'];
                $user_no =  $user['user_no'];
                $passwrd =  $user['passwordd'];

                // Verify password
                // IMPORTANT: In a real-world application, ALWAYS hash passwords in the database
                // and use password_verify($input_password, $hashed_stored_password) here.
                // For this example, it's a direct comparison as per your provided data.
                if ($input_password === $stored_password) {
                    // Login successful
                    // echo "<div class='message success'>تم التسجيل بنجاح! مرحباً بك يا " . htmlspecialchars($user_name) . " 👋</div>";
                    // In a real application, you would start a session here:

                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $user_name;
                    $_SESSION['userno'] = $user_no;
                    $_SESSION['passwrd'] = $passwrd;

                    // Then redirect the user to a protected page:
                    // header("Location: index.php");
                    // exit();
                } else {
                    // Password does not match
                    echo "<div class='message error'>كلمة المرور غير صحيحة.</div>";
                }
            } else {
                // User identifier (user_no or user_name) not found
                echo "<div class='message error'>اسم المستخدم أو رقم المستخدم غير موجود.</div>";
            }

            $stmt->close(); // Close the prepared statement
        }

        $conn->close(); // Close the database connection

        ?>

    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // echo "<hr>";
        // echo $_SESSION['loggedin'];
        // echo "<hr>";
        // echo $_SESSION['userno'];
        // echo "<hr>";
        // echo $_SESSION['username'];
        // echo "<hr>";
        // echo $_SESSION['passwrd'];
        // echo "<hr>";

       
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo ' <div class="btns">
                    <button onclick="transformers_btn()" id="transformers_test"><img class="rig_img" src="imgs/transformerimg.png" alt=""> الفحص اليومي للمحولات</button>
                    <button onclick="motors_btn()" id="motors_test"><img class="rig_img" src="imgs/motorimg2.png" alt=""> الفحص الاسبوعي للمحركات</button>
                    <button onclick="earth_btn()" id="earth_test"><img class="rig_img" src="imgs/earth.png" alt="">فحص الأرضي</button>
                    <button onclick="MCB_btn()" id="MCB_test"><img class="rig_img" src="imgs/mcb2.png" alt="">فحص القواطع MCB</button>
                </div>';
        echo '<script src="m5.js?v=' . filemtime('m5.js') . '"></script><br>';
    }

    }


    // if($_SESSION['loggedin'] === true){
    //              if(!$_SESSION['username']==''){
    //                 echo $_SESSION['username'];       
    //             }
    //             elseif(!$_SESSION['userno']==''){
    //             echo $_SESSION['userno'];
    //             }  
    //      }
    //     else{
    //             echo "";
    //         }

    // if($_SESSION['loggedin'] === true){
    //                     if(!$_SESSION['username']==''){
    //                         echo $_SESSION['passwrd'];       
    //                     } 
    //             }
    //             else{
    //                     echo "";
    //                 }


    ?>
</body>

</html>