<?php
    include("function.php");
    extract($_POST);
    $auth = auth($user,$pw);

    switch ($auth) {
        case 0 :
            echo "<script>alert('登入成功！！')</script>";
            header("refresh:0:url=index.php");
            break;
        case 1:
            echo "<script>alert('帳號密碼錯誤')</script>";
            header("refresh:0:url=index.php");
            break;
        case 2:
            echo "<script>alert('請輸入帳號或密碼')</script>";
            header("refresh:0:url=index.php");
            break;
        default:
            echo "<script>alert('請輸入帳號或密碼')</script>";
            header("refresh:0:url=index.php");
    }
?>