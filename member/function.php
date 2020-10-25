<?php
    function auth($user,$pw){
        try {
            if (empty($user)) {
                return 2;
                // 請輸入帳號或密碼
            }
            session_start();
            require_once("PDO.php");
            $sql = "SELECT * FROM users WHERE user=?";
            $stmt = $PDO->prepare($sql);
            $stmt->execute([$user]);
            $row = $stmt->fetch();

            if ($row && $row === $pw) {
                $_SESSION['AUTH']= $row;
                return 0;
                // echo "登入成功";
            } else {
                return 1;
                // echo "帳密錯誤";

            }
        }catch (PDOException $e) {
            return $e -> getMessage(); 
        }
    }