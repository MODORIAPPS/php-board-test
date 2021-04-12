<?php
session_start();
include "../../db.php";

$post_id = $_GET['post_id'];
// echo "<script>alert('$post_id')</script>";

$result = mq("DELETE FROM post WHERE id = $post_id");

?>
<meta charset="utf-8">
<script>
    alert("삭제되었습니다!");
    location.href = "/";
</script>