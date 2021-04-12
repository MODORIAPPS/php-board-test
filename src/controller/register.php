<?php
session_start();

include "../db.php";
include "../password.php";

$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$name = $_POST['name'];
$email = $_POST['email'];

$sql = mq("insert into user (user_password,user_name,user_email) values('" . $userpw . "','" . $name . "','" . $email . "')");

?>
<meta charset="utf-8" />
<script type="text/javascript">
    alert('회원가입이 완료되었습니다.');
</script>
<meta http-equiv="refresh" content="0 url=/">