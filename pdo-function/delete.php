<?php
    include("function.php");
    delete($_POST['id']);
    
    header("location:index.php");
?>