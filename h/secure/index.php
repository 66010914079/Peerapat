<?php
// 1. เปิดการแจ้งเตือน Error ทั้งหมด
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. เริ่ม Session (ต้องอยู่บรรทัดบนสุดเสมอ)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 3. เชื่อมต่อฐานข้อมูล (ตรวจสอบชื่อไฟล์ connectdb.php ให้ถูกต้อง)
if (file_exists("../connectdb.php")) {
    include_once("../connectdb.php");
} else {
    die("<center style='margin-top:50px; color:red;'>ไม่พบไฟล์ connectdb.php กรุณาตรวจสอบ!</center>");
}

// 4. ส่วนประมวลผลการ Login
$error_msg = "";
if (isset($_POST['Submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['auser']);
    $pwd  = $_POST['apwd'];

    // ใช้ SQL แบบปลอดภัย
    $sql = "SELECT * FROM admin WHERE a_username = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_array($result)) {
        // ตรวจสอบรหัสผ่าน
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
            exit;
        } else {
            $error_msg = "รหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error_msg = "ไม่พบชื่อผู้ใช้งานนี้";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | พีรพัฒน์ (บีม)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background: #f4f7f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3 class="text-center fw-bold mb-4 text-primary">เข้าสู่ระบบหลังบ้าน</h3>
    <p class="text-center text-muted mb-4 small">ผู้ดูแลระบบ: พีรพัฒน์ ศรีห้วยไพร (บีม)</p>

    <?php if ($error_msg != ""): ?>
        <div class="alert alert-danger py-2 small text-center"><?php echo $error_msg; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label small">Username</label>
            <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" required autofocus>
        </div>
        <div class="mb-4">
            <label class="form-label small">Password</label>
            <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
        </div>
        <button type="submit" name="Submit" class="btn btn-primary w-100 py-2 fw-bold">Login</button>
    </form>
</div>

</body>
</html>