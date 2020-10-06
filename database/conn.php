<?php
    $db_host = 'localhost';
    $db_user = "admin";
    $db_pw = "admin";
    $db_name = "php1320200916";

    $conn = mysqli_connect($db_host,$db_user,$db_pw,$db_name,"3307");

    mysqli_query($conn,"SET NAMES utf8");
?>