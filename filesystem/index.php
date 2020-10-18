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
        $imgs = glob("./images/*");
        $imgs_num = count($imgs);
        var_dump($imgs);
        echo "<div>目前計有{$imgs_num}張圖片</div>";
        foreach ($imgs as $img) {
    ?>
        <img src="<?php echo $img; ?>" width=30%>
        <form action="delete.php" method="post">
            <input type="hidden" name="img" value="<?php echo $img;?>">
            <input type="submit" value="刪除" onclick="return confirm('確認刪除？')">
        </form>
        <?php }?>

</body>
</html>