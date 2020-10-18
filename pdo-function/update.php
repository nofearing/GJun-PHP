<?php
    extract($_POST);
    include("function.php");

    $skills = implode(",",$skills); //這行是重點！！ 將陣列轉為字串
    
    update($name, $phone, $mail, $gender, $edu, $skills, $remark, $id);
    header("location:index.php");
?>