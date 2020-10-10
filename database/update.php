<?php 
    require_once("conn.php");
    extract($_POST);
    $skills = implode(",",$skills);
    $sql = "UPDATE students
            SET 
                name = {$name},
                mail =  {$mail},
                edu  = {$edu},
                gender = {$gender},
                skills = {$skills}, //TODO:這個地方有問題！
                remark = {$remark},
            WHERE
                ID = {$id};
    ";
    mysqli_query($conn,$sql);
    echo "<SCRIPT>alert('資料修改完成！');</SCRIPT>";
    header("refresh:1;url=index2.php");

