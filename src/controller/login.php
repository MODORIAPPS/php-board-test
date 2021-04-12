<?php
session_start();
include "../db.php";
include "../password.php";

if ($_POST["user_email"] == "" || $_POST["user_password"] == "") {
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
} else {
    $password = $_POST['user_password'];
    $sql = mq("select * from user where user_email='" . $_POST['user_email'] . "'");
    $user = $sql->fetch_array();
    $hash_pw = $user['user_password'];

    if (password_verify($password, $hash_pw)) 
    {
        // $username = $user["user_name"];
        // echo "<script>alert('$username')</script>";
        $_SESSION['user_name'] = $user["user_name"];
        $_SESSION['user_email'] = $user["user_email"];
        $_SESSION['user_password'] = $user["user_password"];

        echo "<script>alert('로그인되었습니다.'); location.href='../index.php';</script>";
    } else { 
        echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
    }
}
?>
<meta charset="utf-8" />