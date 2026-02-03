<?php
// ดึงไฟล์ตรวจสอบการล็อกอินมาใช้ (ห้ามพิมพ์ session_start ซ้ำในหน้านี้)
include_once("check_login.php");

// ป้องกันกรณี Session หลุด หน้าจะได้ไม่ค้าง
$admin_name = $_SESSION['aname'];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f0f2f5; }
        .sidebar { min-height: 100vh; background: #212529; color: white; }
        .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 8px; margin: 4px 10px; }
        .nav-link:hover, .nav-link.active { color: #fff; background: #0d6efd; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .product-img { width: 50px; height: 50px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 p-0 sidebar d-none d-md-block position-fixed">
            <div class="p-4 text-center">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($admin_name); ?>&background=0d6efd&color=fff" class="rounded-circle mb-3" width="60">
                <h6 class="mb-0"><?php echo $admin_name; ?></h6>
                <span class="badge bg-success mt-2">แอดมิน</span>
            </div>
            <div class="nav flex-column">
                <a class="nav-link" href="index2.php"><i class="bi bi-speedometer2 me-2"></i> หน้าหลัก</a>
                <a class="nav-link active" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                <a class="nav-link" href="orders.php"><i class="bi bi-cart3 me-2"></i> จัดการออเดอร์</a>
                <a class="nav-link" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                <hr class="mx-3 border-secondary">
                <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4" style="margin-left: auto;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">จัดการสินค้า</h2>
                <button class="btn btn-primary rounded-pill px-4 shadow">
                    <i class="bi bi-plus-circle me-2"></i>เพิ่มสินค้าใหม่
                </button>
            </div>

            <div class="card main-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 text-center">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3">รหัส</th>
                                    <th>รูปภาพ</th>
                                    <th class="text-start">ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>คงเหลือ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#P001</td>
                                    <td><img src="https://via.placeholder.com/50" class="product-img shadow-sm"></td>
                                    <td class="text-start fw-bold">Gaming Mouse Pro</td>
                                    <td>฿1,290</td>
                                    <td><span class="badge bg-success-subtle text-success">15 ชิ้น</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>