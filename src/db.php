 <?php
    session_start();

    $db = new mysqli("db", "root", "sample-pwd", "services", 3306);
    // $db->set_charset("utf8");

    function mq($sql)
    {
        global $db;
        return $db->query($sql);
    }

    ?>