<?php
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
} catch (PDOException $e) {
    $e->getMessage();
}
?>

<?php include("./template/header.php");?>
<?php include("./template/nav.php");?>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>電話</th>
                    </tr>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td>
                                <a href="show.php?id=<?php echo $row["ID"]; ?>" class="btn btn-primary">檢視</a>
                                <a href="edit.php?id=<?php echo $row["ID"]; ?>" class="btn btn-success">編輯</a>
                                
                                <!-- 刪除避免被攻擊，使用 post 傳輸 -->
                                <form action="delete.php" method="post" class="d-inline-block">
                                    <input type="hidden" name="id" value=<?php echo $row["ID"]; ?> >
                                    <input type="submit" value="刪除" class="btn btn-danger" onclick="return confirm('確認刪除？')">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
<?php include("./template/footer.php");?>