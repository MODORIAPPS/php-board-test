<?php

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>메인페이지</title>
</head>

<body>
    <h3>여기에 유저 정보가 뜨면 될듯.</h3>
    <?php
    if (isset($_SESSION['userid'])) {
        echo "<h2>{$_SESSION['userid']} 님 환영합니다.</h2>";
    } else {
        echo "<h4>학생 먼저 로그인 부터 하시게나,,,</h4>";
    }
    ?>
    <a href="./auth/login.php"><input type="button" value="로그인"></a>
    <a href="./auth/register.php"><input type="button" value="회원가입"></a>

    <a href="./controller/logout.php"><input type="button" value="로그아웃" /></a>
</body>

</html>