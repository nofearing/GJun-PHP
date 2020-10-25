<?php
try {
    require_once("pdo.php");
    $sql = "SELECT * FROM gallery";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = array();
    while ($data = $stmt->fetch()) {
        $rows[] = $data;
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
    <form action="delete.php" method="POST">
        <div><input type="submit" value="刪除"></div>
        <!-- 加入多重刪除功能 -->
        <?php
        foreach ($rows as $row) { ?>
            <!-- 使用 LABEL ，使點擊圖片就能選取 checkbox  -->
            <label for="<?php echo $row['path']; ?>">
                <img src="images/<?php echo $row['path']; ?>" width="200">
            </label>
            <input type="hidden" name="path[]" value="<?php echo $row['path']; ?>">
            <input type="checkbox" name="del[]" id="<?php echo $row['path']; ?>" value="<?php echo $row['id']; ?>">
        <?php } ?>
    </form>

</body>

</html>