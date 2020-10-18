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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="create.php">新增學員資料</a>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>電話</th>
                        <th>mail</th>
                        <th>姓別</th>
                        <th>學歷</th>
                        <th>專長</th>
                        <th>備註</th>
                    </tr>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['mail']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['edu']; ?></td>
                        <td><?php echo $row['skills']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>