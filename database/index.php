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
    <a href="create.php">新增資料</a>
    <table border="1">
        <tr>
            <th>#</th>
            <th>姓名</th>
            <th>mail</th>
            <th>電話</th>
            <th>性別</th>
            <th>學歷</th>
            <th>專長</th>
            <th>備註</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['mail'] . "</td>";
            
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>