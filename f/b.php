<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
</head>
<body>
    <h1>พีรพัฒน์ ศรีห้วยไพร (บีม)</h1>

    <form method="post" action="">
        กรอกตัวเลข <input type="number" name="a" autofocus required>
        <button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if (isset($_POST['Submit'])){

    $gender = $_POST['a'];
 
    if ($gender == 1){
    echo "เพศชาย";
    }else if ($gender == 2){
    echo "เพศหญิง";
    }else if ($gender == 3){
    echo "เพศที่สาม";
    }else {
        echo "อื่นๆ";
    }    
}
?>
</body>
</html>