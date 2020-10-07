<?php
require_once('conn.php');
$sql = "select * from students";
$result = mysqli_query($conn, $sql);
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
</head>

<body>
    <h1>hello title</h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>姓名</th>
            <th>mail</th>
            <th>電話</th>
            <th></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="show.php?id=<?php echo $row['ID']; ?>">檢視</a>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                        <input type="submit" value="刪除" onclick="return confirm('確認刪除？')">
                    </form>
                    <a href="edit.php?id=<?php echo $row["ID"];?>">編輯</a>
                </td>
                <!-- 用連結傳參數，使用 get -->
            </tr>
        <?php }?>
    </table>

</body>
</html>