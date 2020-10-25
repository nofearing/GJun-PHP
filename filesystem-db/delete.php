<?php 
    // $img = $_POST["img"];

    // unlink($img);
    // echo "檔案已刪除";
    // header("refresh:1;url=index.php");

    $del = $_POST['del'];
    $path = $_POST['path'];
    // var_dump($del);

    // 多重刪除
    foreach ($path as $p) {
        unlink("images/".$p);
    }
    foreach ($del as $d) {
        try {
            require_once("pdo.php");
            $sql = "DELETE FROM gallery WHERE id = ?";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute([$d]);
        } catch (PDOexception $e) {
            echo $e->getMessage();
        }
    }
    header("location:index.php");
?>