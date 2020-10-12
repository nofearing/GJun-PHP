<?php 
    require_once("conn.php");
    extract($_POST); //將表單的關聯式陣列建立變量
    var_dump($skills);
    echo "<BR>";
    var_dump($id);
    // echo "<br>";
    // var_dump($_POST);
    $skills = implode(",",$skills); //把數組轉換為字串
    $sql = "UPDATE students
            SET 
                name    = '$name',
                phone   = '$phone',
                mail    = '$mail',
                edu     = '$edu',
                gender  = '$gender',
                skills  = '$skills', 
                remark  = '$remark'
            WHERE
                ID = $id
            "; //這裡的 $id 是由隱藏的按鈕（name =  id）所回傳的 value 
    echo $sql;
    mysqli_query($conn,$sql);
    // echo "<SCRIPT>alert('資料修改完成！');</SCRIPT>";
    // header("refresh:1;url=index2.php");

