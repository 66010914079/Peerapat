<?php
// เช็คว่ามีการเปิด Session หรือยัง ถ้ายังให้เปิด (ป้องกัน Notice: Session already active)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ตรวจสอบว่ามีตัวแปร login หรือไม่
if (!isset($_SESSION['aname']) || empty($_SESSION['aname'])) {
    // ถ้าไม่มีให้เด้งไปหน้า login ด้วย Javascript เพื่อป้องกันอาการหน้าขาว
    echo "<script>
            alert('กรุณาเข้าสู่ระบบ');
            window.location.href='login.php'; 
          </script>";
    exit();
}
?>