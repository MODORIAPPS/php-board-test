<?php
session_start();
include "./db.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>메인페이지</title>
    <link rel="stylesheet" href="./styles/index.css" />
</head>

<body>
    <div class="header">
        <div class="userinfo">
            <!-- <h3>여기에 유저 정보가 뜨면 될듯.</h3> -->
            <?php
            if (isset($_SESSION['user_email'])) {
                echo "<h2>{$_SESSION['user_name']} 님 환영합니다.</h2>";
            } else {
                echo "<h4>로그인해주십쇼.</h4>";
            }
            ?>
        </div>

        <div class="toolbar">

            <!-- Conditional Rendering -->

            <?php if (isset($_SESSION['user_email'])) : ?>
                <a href="./controller/logout.php"><input type="button" value="로그아웃" /></a>
            <?php else : ?>
                <a href="./auth/login.php"><input type="button" value="로그인"></a>
                <a href="./auth/register.php"><input type="button" value="회원가입"></a>
            <?php endif; ?>


        </div>
    </div>
    <div>
        <?php if (isset($_SESSION['user_email'])) : ?>
            <div class="divider"></div>
            <h4>새 게시물 작성하기</h4>
            <form method="post" action="./controller/post/new_post.php">
                <table>
                    <tr>
                        <td>
                            <input placeholder="제목" type="text" name="title" class="inph">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea placeholder="내용" name="content" class="inph"></textarea>
                        </td>
                    </tr>
                    <td>
                        <button type="submit" id="btn">작성</button>
                    </td>
                </table>
            </form>
        <?php endif; ?>
    </div>
    <div class="divider"></div>
    <div class="posts">
        <h2>게시판</h2>
        <ul class="post_list">
            <?php
            $query = "select u.user_name, p.id as post_id, p.title, p.content, p.created_at FROM post p LEFT JOIN user u ON p.user_id = u.user_id;";
            $sql = mq($query);

            while ($row = $sql->fetch_array()) {
                $post_id = $row['post_id'];
                if ($_SESSION['user_name'] == $row['user_name']) {
                    echo "<li id='id_" . $row['post_id'] . "'>
                    <div>
                        <h2>" . $row['title'] . "</h2>
                        <textarea >" . $row['content'] . "</textarea>

                        <p>작성자 : " . $row['user_name'] . "</p>
                    </div>
                    <div class='actions'>
                        <button onClick='deletePost($post_id)'>삭제</button>
                        <button onClick='updatePost($post_id)'>수정</button>
                    </div>
                </li>";
                } else {
                    echo "<li id='id_" . $row['post_id'] . "'>
                    <div>
                        <h2>" . $row['title'] . "</h2>
                        <textarea readonly >" . $row['content'] . "</textarea>

                        <p>작성자 : " . $row['user_name'] . "</p>
                    </div>
                </li>";
                }
            }

            ?>
        </ul>
    </div>
    <script>
        function deletePost($post_id) {
            var result = confirm("삭제하시겠습니까");
            if (result) {
                location.href = "/controller/post/delete_post.php?post_id=<?php echo $post_id ?>";
            }
        }

        function updatePost(id) {
            // var id = $post_id;
            var title = document.querySelector(`#id_${id} > div > h2`).firstChild.nodeValue;
            var content = document.querySelector(`#id_${id} > div > textarea`).value;
            console.log(title, content);

            var result = confirm("수정하시겠습니까");
            if (result) {
                location.href = `/controller/post/update_post.php?post_id=${id}&title=${title}&content=${content}`;
            }
        }
    </script>
</body>

</html>