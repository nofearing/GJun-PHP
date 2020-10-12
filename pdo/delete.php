<?php
    try {
        require_once("pdo.php");
        $sql ="delete from students where ID=?";
        $stmt = $pdo ->prepare($sql);
        $stmt->execute([$_POST['id']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("location:index.php");
?>