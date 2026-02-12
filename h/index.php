<?php
session_start();
include_once("connectdb.php"); // แนะนำให้ย้ายมาไว้ด้านบนสุด
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Login: พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
</head>
<body>
    
<h1>เข้าสู่ระบบหลังบ้าน : พีรพัฒน์ ศรีห้วยไพร (บีม)</h1>
<form method="post" action="">
    Username: <input type="text" name="auser" autofocus required> <br>
    Password: <input type="password" name="apwd" required> <br>
    <button type="submit" name="Submit">Login</button>
</form>

<?php
if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement ป้องกัน SQL Injection
    $sql = "SELECT * FROM admin WHERE a_username = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_array($result)) {
        // 2. ตรวจสอบรหัสผ่านที่แฮชไว้ด้วย password_verify
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit;
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        }
    } else {
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
    }
}
?>

</body>
</html>