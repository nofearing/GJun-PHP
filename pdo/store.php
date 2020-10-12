<?php
    extract($_POST);
    
    if (isset($skills)) {
        $skills = implode(",",$skills);
    }else{
        $skills = ''; //表單防呆：如果專長為空，implode 將空陣列轉字串會報錯，則存入空值
    }

    try {
        require("pdo.php");
        $sql = "INSERT INTO students(name,phone,mail,gender,edu,skills,remark)  VALUE(?,?,?,?,?,?,?)";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$name, $phone, $mail, $gender, $edu, $skills, $remark]);
    } catch (PDOException $e) {
        $e -> getMessage();
    }
    
    header("Refresh:0;url=index.php");
    echo "<SCRIPT>alert('資料已新增')</SCRIPT>";

?>