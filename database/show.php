<?php
    require_once("conn.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM students where id={$id}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    // var_dump($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>檢視資料</title>
</head>
<body>
    <h1>學員資料 #<?php echo $row['ID'];?></h1>
    <ul>
        <li>姓名：<?php echo $row['name']; ?></li>
        <li>電話：<?php echo $row['phone']; ?></li>
        <li>郵件：<?php echo $row['mail']; ?></li>
        <li>姓別：<?php echo $row['gender']; ?></li>
        <li>學歷：<?php echo $row['edu']; ?></li>
        <li>專長：<?php echo $row['skills']; ?></li>
        <li>備註：<?php echo $row['remark'] === "" ? "無":$row["remark"]; ?></li>
    </ul>
    <a href="index2.php">回學員列表</a>
</body>
</html>
