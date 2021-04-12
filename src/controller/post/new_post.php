<?php
session_start();
include "../../db.php";

$user_email = $_SESSION['user_email'];
$post_title = $_POST['title'];
$post_content = $_POST['content'];

$sql = mq("select * from user where user_email='" . $user_email . "'");
$user = $sql->fetch_array();

if (isset($user['user_id'])) {

    $result = mq("INSERT INTO post (user_id, title, content, created_at) VALUES('" . $user['user_id'] ."','" . $post_title ."','" . $post_content . "', now())");

    echo "<script>alert('작성되었습니다!'); history.back(); </script>";
} else {
    echo "<script>alert('올바르지 않은 접근입니다.');</script>";
}
