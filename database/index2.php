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
            <th></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="show.php?test=<?php echo $row['ID']; ?>">檢視</a></td>
                <!-- 用連結傳參數，使用 get -->
            </tr>
        <?php }?>
    </table>

</body>
</html>