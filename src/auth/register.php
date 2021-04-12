<?php
session_start();

include "../db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>회원가입 폼</title>
</head>

<body>
    <form method="post" action="../controller/register.php">
        <h1>회원가입 폼</h1>
        <fieldset>
            <legend>입력사항</legend>
            <table>
                <tr>
                    <td>이메일</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" size="35" name="userpw" placeholder="비밀번호"></td>
                </tr>
                <tr>
                    <td>이름</td>
                    <td><input type="text" size="35" name="name" placeholder="이름"></td>
                </tr>
            </table>

            <input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />

        </fieldset>
    </form>
</body>

</html>