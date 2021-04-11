 <?php
    session_start();

    $db = new mysqli("127.0.0.1:3306", "root", "sample-pwd");
    $db->set_charset("utf8");

    function mq($sql)
    {
        global $db;
        return $db->query($sql);
    }

    ?>