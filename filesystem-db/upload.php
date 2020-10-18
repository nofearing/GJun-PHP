<?php
    extract($_FILES['img']);
    // 上傳會先丟到暫存區，沒有問題才會存到指定路徑。
    switch ($type) { //解析 $_FILES["img"]["type"] 的值
        case 'image/jpeg':
            $path = md5(time()).".jpeg"; //利用時間戳記＋MD5編碼，以免上傳檔名重複
            break;
        case 'image/png':
            $path = md5(time()).".png"; 
            break;
        case 'image/gif':
            $path = md5(time()).".gif"; 
            break;
        default:
            echo "請上傳正確的圖片";
            return;
    }

    $target = "./images/".$path;  //指定的存放路徑
    if ($error === 0) {  //解析 $_FILES["img"]["error"] 的錯誤碼，"0"為沒有錯誤。
        if (move_uploaded_file($tmp_name,$target)) {  // move_uploaded_file() 是重點！！
            echo "上傳成功";
            try {
                require_once("pdo.php");
                $sql ="INSERT INTO gallery(name,path) VALUES(?,?)";
                $stmt = $pdo -> prepare($sql);
                $stmt ->execute([$name,$path]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            header("refresh:1;url=index.php");
        } else {
            echo "上傳失敗";
        }
    } else {
        echo "上傳錯誤";
    }
?>