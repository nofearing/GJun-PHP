<?php
    try {
        require_once("pdo.php");
        $sql = "SELECT * FROM gallery";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        $rows = array();
        while ($data = $stmt->fetch()) {
            $rows[]=$data;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>檔案上傳</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <!-- enctype 很重要！！ -->
        <input type="file" name="img">
        <input type="submit" value="檔案上傳">
    </form>
    <?php
        foreach ($rows as $row) {?>
            <img src="images/<?php echo $row['path']; ?>" width="200">
    <?php
        }
    ?>
    
</body>
</html>