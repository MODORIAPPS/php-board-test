<?php
session_start();

include "../db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>로그인</title>
</head>

<body>
    <form method="post" action="../controller/login.php">
        <table align="center" border="0" cellspacing="0" width="300">
            <tr>
                <td width="130" colspan="1">
                    <input type="text" name="user_email" class="inph">
                </td>
                <td rowspan="2" align="center" width="100">
                    <button type="submit" id="btn">로그인</button>
                </td>
            </tr>
            <tr>
                <td width="130" colspan="1">
                    <input type="password" name="user_password" class="inph">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" class="mem">
                    <a href="/auth/register.php">회원가입 하시겠습니까?</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>