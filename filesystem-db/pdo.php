<?php
    $db_host = "localhost:3307"; //因為更改 port，所以要另外設定
    $db_user = "admin";
    $db_pw  = "admin";
    $db_name = "php1320200916";
    $db_charset = "utf8mb4"; //mb4 編碼相容 emoji

    try {
        $dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
        $pdo = new PDO($dsn, $db_user, $db_pw);
    } catch (PDOException $e) { //固定寫法，背起來
        echo $e -> getMessage(); //固定寫法，背起來
    }