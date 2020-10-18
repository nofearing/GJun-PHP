<?php
    extract($_POST);
    include("function.php");

    if (isset($skills)) {
        $skills = implode(",",$skills);
    }else{
        $skills = ''; //表單防呆：如果專長為空，implode 將空陣列轉字串會報錯，則存入空值
    }

    store($name, $phone, $mail, $gender, $edu, $skills, $remark);
    
    header("Refresh:0;url=index.php");
    echo "<SCRIPT>alert('資料已新增')</SCRIPT>";

?>