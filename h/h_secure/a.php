<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
</head>

<body>
<h1>a.php</h1>

<?php
$_SESSION['name'] = "พีรพัฒน์ ศรีห้วยไพร";
$_SESSION['nickname'] = "บีม";

echo $_SESSION['name']."<br>";
echo $_SESSION['nickname']."<br>";

?>
</body>
</html>