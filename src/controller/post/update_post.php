<?php
session_start();
include "../../db.php";

$post_id = $_GET['post_id'];
$post_title = $_GET['title'];
$post_content = $_GET['content'];

$result = mq("UPDATE post SET title='".$post_title."', content='".$post_content."' WHERE id=$post_id");
?>
<meta charset="utf-8">
<script>
    alert("수정되었습니다!");
    location.href = "/";
</script>