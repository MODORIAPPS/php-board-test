    <?php
session_start();

include "../db.php";
include "../password.php";

$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$name = $_POST['name'];
$email = $_POST['email'];

if ($name == "" || $email == "" || $userpw == "") {
    echo "<script>alert('회원가입을 위한 정보를 모두 입력해주십시오.'); history.back();</script>";
} else {
    // TODO: 중복 유저 체크 필요
    $sql = mq("insert into user (user_password,user_name,user_email) values('" . $userpw . "','" . $name . "','" . $email . "')");
    echo "<script>alert('회원가입이 완료되었습니다.');</script>";
}

?>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="0 url=/">