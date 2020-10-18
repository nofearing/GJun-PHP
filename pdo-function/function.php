<?php
    function showAll(){
        try {
        require_once("pdo.php");
        $sql = "SELECT * FROM students";

        //預備陳述式，防止 sql 注入攻擊
        $stmt = $pdo->prepare($sql);  //與之前的寫法唯一不同之處
        $stmt->execute();  //執行查詢，類似 mysqli_query($conn,$sql);

        $rows = array();   //宣告陣列變數：把資料存在陣列，在同一程式裡可以重複取用
        while ($data = $stmt->fetch()) {    //逐一取值
            $rows[] = $data;    //將值存入陣列變數中
        }
        return $rows;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function show($id){
        try {
            require_once("pdo.php");
            $sql = "SELECT * FROM students WHERE ID=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]); //注意：這裡要給陣列
            $row = $stmt->fetch();
            return $row;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function store($name, $phone, $mail, $gender, $edu, $skills, $remark){
        try {
            require("pdo.php");
            $sql = "INSERT INTO students(name,phone,mail,gender,edu,skills,remark)  VALUE(?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $phone, $mail, $gender, $edu, $skills, $remark]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function delete($id){
        try {
            require_once("pdo.php");
            $sql = "delete from students where ID=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function update($name, $phone, $mail, $gender, $edu, $skills, $remark, $id){
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
            $stmt->execute([$name, $phone, $mail, $gender, $edu, $skills, $remark, $id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
