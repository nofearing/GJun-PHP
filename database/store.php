<?php
    require_once("conn.php");
    
    extract($_POST);
    if (empty($name) || ctype_space($name)) {
        echo "<div>姓名不得為空</div>";
    } else {
        echo "<div>姓名:" . trim($name) . "</div>";
    }

    if (empty($phone) || ctype_space($phone)) {
        echo "<div>電話不得為空</div>";
    } else {
        echo "<div>電話:" . trim($phone) . "</div>";
    }

    if (empty($mail) || ctype_space($mail)) {
        echo "<div>Mail不得為空</div>";
    } else {
        echo "<div>Mail:" . trim($mail) . "</div>";
    }

    echo "<div>性別:{$gender}</div>";
    echo "<div>學歷:{$edu}</div>";

    if (isset($skills)) {
        echo "<div>專長:" . implode(",", $skills) . "</div>";
        $skills = implode(",",$skills);
    }


    echo "<div>備註:{$remark}</div>";

    $sql = "INSERT INTO students(name,phone,mail,gender,edu,skills,remark) VALUES ('$name','$phone','$mail','$gender','$edu','$skills','$remark')";
    // 字串用雙引號包住，裡面的變數自動轉譯變數值，且包裹變數的單引號仍會保留。
    // 參考資料：https://github.com/Lidemy/mentor-program-kristxeng/issues/27

    mysqli_query($conn,$sql);

    header("refresh:1;url=index2.php");
    echo "<SCRIPT>alert('資料已新增');</SCRIPT>";
    // 注意：雙引號裡面要包單引號！！

    // header("LOCATION:index.php");
?>