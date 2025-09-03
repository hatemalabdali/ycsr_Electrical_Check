<?php
// logout.php
session_start();

// مسح جميع بيانات الجلسة
$_SESSION = array();

// إذا wanted تدمير الجلسة completamente
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// إعادة التوجيه
header('Location: index.php');
exit;
?>