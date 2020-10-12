<?php
try {
    require_once("pdo.php");
    $sql = "SELECT * FROM students WHERE ID=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]); //注意：這裡要給陣列
    $row = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php include("./template/header.php"); ?>
<h2>學員資料 #<?php echo $row["ID"]; ?></h2>
<ul>
    <li>姓名：<?php echo $row["name"]; ?></li>
    <li>電話：<?php echo $row["phone"]; ?></li>
    <li>E-mail<?php echo $row["mail"]; ?></li>
    <li>性別：<?php echo $row["gender"]; ?></li>
    <li>學歷：<?php echo $row["edu"]; ?></li>
    <li>專長：<?php echo $row["skills"]; ?></li>
    <li>備註：<?php echo $row["remark"] === "" ? "無" : $row["remark"]; ?></li>
</ul>
<a href="index.php">回學員列表</a>
<?php include("./template/footer.php"); ?>