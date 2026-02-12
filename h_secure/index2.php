<?php
// 1. บังคับเปิด Error เพื่อดูว่าทำไมหน้าถึงว่าง
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. ตรวจสอบไฟล์เช็ค Login (ถ้าไฟล์นี้พัง หน้าจะว่างทันที)
if (file_exists("check_login.php")) {
    include_once("check_login.php");
} else {
    die("Error: ไม่พบไฟล์ check_login.php กรุณาตรวจสอบการวางไฟล์!");
}

// 3. ป้องกันกรณี Session ไม่มีค่า
$admin_name = isset($_SESSION['aname']) ? $_SESSION['aname'] : "Admin";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #212529; color: white; }
        .nav-link { color: rgba(255,255,255,.75); transition: 0.3s; padding: 12px 20px; border-radius: 8px; margin: 4px 10px; }
        .nav-link:hover, .nav-link.active { color: #fff; background: rgba(255,255,255,.1); }
        .nav-link.active { background: #0d6efd; }
        .nav-link.text-danger:hover { background: rgba(220, 53, 69, 0.1); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0">
            <div class="p-4 text-center">
                <i class="bi bi-person-circle fs-1"></i>
                <h5 class="mt-2"><?php echo $admin_name; ?></h5>
                <span class="badge bg-success">Online</span>
            </div>
            <hr class="mx-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index2.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php"><i class="bi bi-cart3 me-2"></i> จัดการออเดอร์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                </li>
                
                <li class="nav-item mt-5">
                    <hr class="mx-3">
                    <a class="nav-link text-danger fw-bold" href="logout.php" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                        <i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5 text-center">
            <div class="py-5 shadow-sm bg-white rounded-4 mt-5">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                <h1 class="mt-3 fw-bold">ระบบทำงานปกติ</h1>
                <p class="text-muted">ยินดีต้อนรับเข้าสู่ระบบจัดการหลังบ้าน คุณคือ: <strong><?php echo $admin_name; ?></strong></p>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.