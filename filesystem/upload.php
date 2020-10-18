<?php
    // var_dump($_FILES);
    // echo "<BR>";
    // echo "===========分隔顯示========";
    // echo "<BR>";

    // var_dump($_FILES['img']);
    // echo $_FILES["img"]["name"];
    // echo "<BR>";
    // echo $_FILES["img"]["type"];
    // echo "<BR>";
    // echo $_FILES["img"]["tmp_name"];
    // echo "<BR>";
    // echo $_FILES["img"]["error"];  錯誤碼 0:無錯誤 1~5：各有不同意義
    // echo "<BR>";
    // echo $_FILES["img"]["size"];
    // echo "<BR>";
    
    // echo "===========分隔顯示========";
    // echo "<BR>";

    extract($_FILES["img"]);
    // echo $name;
    // echo "<BR>";
    // echo $type;
    // echo "<BR>";
    // echo $tmp_name;
    // echo "<BR>";
    // echo $error;
    // echo "<BR>";
    // echo $size;

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
            header("refresh:1;url=index.php");
        } else {
            echo "上傳失敗";
        }
    } else {
        echo "上傳錯誤";
    }
?>