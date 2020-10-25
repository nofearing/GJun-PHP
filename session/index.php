<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (!$_SESSION) { ?>
        <form action="auth.php" method="post">
            <div>
                <label for="user">使用者</label>
            </div>
            <div>
                <input type="text" name="user" id="user">
            </div>
            <div>
                <label for="pw">密碼</label>
            </div>
            <div>
                <input type="text" name="pw" id="pw">
            </div>
            <div>
                <input type="submit" value="登入">
            </div>
        </form>
    <?php } else { ?>
        <div>
            <a href="logout.php">登出</a>
        </div>
    <?php } ?>
    <div>
        <?php
        
        // if() 只用判斷「變量真偽」，假如變量 $_SESSION['AUTH'] 不存在，if($_SESSION['AUTH']) 會報錯。為了檢查變量是否存存，可以先套一層 isset() 

        if (isset($_SESSION['AUTH'])) {
            echo $_SESSION['AUTH']['user'] . "您好。您的密碼是：" . $_SESSION['AUTH']['pw'];
        }
        ?>
    </div>
</body>

</html>