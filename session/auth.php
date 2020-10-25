<?php
    session_start();
    // extract($_POST);

    // $_SESSION['USER'] = $user;
    // $_SESSION['PW']= $pw;
    $_SESSION["AUTH"] = $_POST; //將 $_POST 一次存進 session，例：一個變量解決會員資料

    extract($_SESSION["AUTH"]);

    echo $user."您好。您的密碼是：".$pw;
    header("refresh:3;url=index.php");
?>