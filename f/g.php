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
        แม่สูตรคูณบีมพีรพัฒน์
        <input type="number" name="a" min="2" max="100" autofocus required>
        <button type="submit" name="Submit">OK</button>
    </form>
    <hr>

    <?php 
if (isset($_POST['Submit'])){

    $m =$_POST['a'];

    for ($i=1;$i<12; $i++){
    $b = $m * $i;

    echo "{$m} x {$i} = {$b} <br>";
    }   
}
?>
</body>
</html>