<?php
    extract($_POST);
    $skills = implode(",",$skills); //這行是重點！！ 將陣列轉為字串
    try {
        require_once("pdo.php");
        $sql = "UPDATE students
                SET 
                    name    = ?,
                    phone   = ?,
                    mail    = ?,
                    gender  = ?,
                    edu     = ?,
                    skills  = ?, 
                    remark  = ?
                WHERE
                    ID = ?
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $phone, $mail, $gender, $edu, $skills, $remark,$id]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("location:index.php");
?>