<?php
    $a = [
        "name" => "Jason",
        "height" => 170,
        "weight" => 65,
        "age" => 38,
        "gender" => "male"
    ];

    foreach ($a as $key => $value) {
        echo "{$key}:{$value}";
        echo "<BR>";
    }
    
    $a_str = implode(",",$a);
    echo $a_str;
    echo "<BR>";

    $a_array = explode(",",$a_str);
    var_dump($a_array);

    $name = "Jason";
    $height = 170;
    $weight = 65;
    $age = 38;
    $gender = "male";

    echo "<BR>";
    $test = compact("name","height","weight","age","gender");
    
    foreach ($test as $test_key => $test_value) {
        echo "{$test_key}:{$test_value}";
        echo "<BR>";
    }
?>