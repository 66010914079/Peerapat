<?php
// 1. บังคับแสดง Error ทันทีถ้ามีจุดผิด (ป้องกันหน้าว่าง)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. จัดการ Session ให้ถูกต้อง (เช็คก่อนเปิด)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 3. ดึงไฟล์ Check Login และจัดการกรณีไฟล์หาย
if (file_exists("check_login.php")) {
    include_once("check_login.php");
} else {
    // ถ้าหาไฟล์ไม่เจอ ให้แจ้งเตือนแทนการปล่อยให้หน้าว่าง
    die("<div style='color:red; text-align:center; margin-top:50px;'>Error: ไม่พบไฟล์ check_login.php กรุณาตรวจสอบชื่อไฟล์!</div>");
}

// 4. เตรียมข้อมูล Admin (ถ้าไม่มีค่าให้ใส่ Guest แทนป้องกันหน้าพัง)
$admin_name = isset($_SESSION['aname']) ? $_SESSION['aname'] : "Admin";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการลูกค้า | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fc; }
        .sidebar { min-height: 100vh; background: #2c3e50; color: white; }
        .nav-link { color: rgba(255,255,255,.7); padding: 1rem 1.5rem; border-radius: 8px; margin: 0.2rem 0.8rem; }
        .nav-link:hover, .nav-link.active { color: #fff; background: rgba(255,255,255,.1); }
        .nav-link.active { background: #0d6efd; box-shadow: 0 4px 10px rgba(13,110,253,0.3); }
        .card { border: none; border-radius: 15px; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1); }
        .avatar-circle { width: 45px; height: 45px; background: #eee; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #555; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 p-0 sidebar d-none d-md-block position-fixed">
            <div class="p-4 text-center">
                <div class="mb-3">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($admin_name); ?>&background=0d6efd&color=fff" class="rounded-circle shadow" width="65">
                </div>
                <h6 class="mb-0 fw-bold"><?php echo $admin_name; ?></h6>
                <small class="text-info"><i class="bi bi-circle-fill fs-xs me-1"></i> ออนไลน์</small>
            </div>
            <div class="nav flex-column mt-3">
                <a class="nav-link" href="index2.php"><i class="bi bi-house-door me-2"></i> หน้าหลัก</a>
                <a class="nav-link" href="products.php"><i class="bi bi-box me-2"></i> จัดการสินค้า</a>
                <a class="nav-link" href="orders.php"><i class="bi bi-cart me-2"></i> จัดการออเดอร์</a>
                <a class="nav-link active" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                <hr class="mx-3 opacity-25">
                <a class="nav-link text-danger font-weight-bold" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark mb-0">👥 รายชื่อลูกค้า</h2>
                <div class="d-flex gap-2">
                    <button class="btn btn-white border shadow-sm btn-sm px-3"><i class="bi bi-download me-1"></i> Export</button>
                    <button class="btn btn-primary shadow-sm btn-sm px-3"><i class="bi bi-person-plus me-1"></i> เพิ่มลูกค้า</button>
                </div>
            </div>

            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0 ps-3">ลูกค้า</th>
                                <th class="border-0">ข้อมูลติดต่อ</th>
                                <th class="border-0 text-center">สถานะ</th>
                                <th class="border-0 text-end pe-3">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3">กข</div>
                                        <div>
                                            <div class="fw-bold">คุณกอไก่ ขไข่</div>
                                            <small class="text-muted">สมัครสมาชิกเมื่อ: 01/02/2026</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope small me-1"></i> customer@example.com</div>
                                    <div><i class="bi bi-telephone small me-1"></i> 081-234-5678</div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">ปกติ</span>
                                </td>
                                <td class="text-end pe-3">
                                    <div class="btn-group">
                                        <button class="btn btn-light btn-sm border" title="แก้ไข"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-light btn-sm border text-danger" title="ลบ"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <p class="text-center mt-4 text-muted small">ระบบจัดการข้อมูลลูกค้า v1.0</p>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>