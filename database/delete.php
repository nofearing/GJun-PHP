<?php
    require_once('conn.php');
    $id =  $_POST['id'];
    $sql = "delete from students where id = {$id}";
    mysqli_query($conn,$sql);

    header("location:index2.php");

