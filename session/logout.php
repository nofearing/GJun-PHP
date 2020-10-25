<?php
    session_start();
    //刪除所有SESSION
    session_destroy();

    unset($_SESSION['AUTH']);
    header("refresh:2;url=index.php");
?>