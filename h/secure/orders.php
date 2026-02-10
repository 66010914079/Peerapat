<?php
// ป้องกันหน้าว่างด้วยการเปิด error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("check_login.php");

// ป้องกันกรณี Session หลุด หน้าจะได้ไม่พัง
$admin_name = isset($_SESSION['aname']) ? $_SESSION['aname'] : "Admin";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการออเดอร์ | Admin System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background: #212529; color: white; box-shadow: 2px 0 5px rgba(0,0,0,0.1); }
        .nav-link { color: #adb5bd; transition: 0.3s; padding: 12px 20px; border-radius: 8px; margin: 4px 10px; }
        .nav-link:hover { color: #fff; background: rgba(255,255,255,0.1); }
        .nav-link.active { color: #fff; background: #0d6efd; }
        .card-order { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .status-pill { border-radius: 50px; padding: 5px 12px; font-size: 0.85rem; font-weight: 600; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0">
            <div class="text-center py-4">
                <i class="bi bi-person-circle fs-1"></i>
                <h6 class="mt-2 text-uppercase fw-bold"><?php echo $admin_name; ?></h6>
                <small class="text-success"><i class="bi bi-dot"></i> แอดมินออนไลน์</small>
            </div>
            <ul class="nav flex-column mt-2">
                <li class="nav-item"><a class="nav-link" href="index2.php"><i class="bi bi-speedometer2 me-2"></i> หน้าหลัก</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link active" href="orders.php"><i class="bi bi-cart3 me-2"></i> จัดการออเดอร์</a></li>
                <li class="nav-item"><a class="nav-link" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <hr class="mx-3 border-secondary">
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                <h1 class="h3 fw-bold">🛒 จัดการออเดอร์ (Orders)</h1>
                <div class="btn-group shadow-sm">
                    <button class="btn btn-outline-secondary btn-sm">ส่งออก Excel</button>
                    <button class="btn btn-primary btn-sm">รีเฟรชข้อมูล</button>
                </div>
            </div>

            <div class="card card-order overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">เลขที่ออเดอร์</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่สั่งซื้อ</th>
                                <th class="text-center">ยอดสุทธิ</th>
                                <th class="text-center">สถานะ</th>
                                <th class="text-end pe-4">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 fw-bold text-primary">#ORD-00124</td>
                                <td>คุณสมชาย ใจดี</td>
                                <td>2 ก.พ. 2026, 14:30</td>
                                <td class="text-center">฿2,450.00</td>
                                <td class="text-center">
                                    <span class="status-pill bg-warning-subtle text-warning">รอดำเนินการ</span>
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-light btn-sm border" title="ดูรายละเอียด"><i class="bi bi-eye text-primary"></i></button>
                                    <button class="btn btn-light btn-sm border" title="ยืนยันออเดอร์"><i class="bi bi-check-circle text-success"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 fw-bold text-primary">#ORD-00123</td>
                                <td>คุณมะลิ สวยงาม</td>
                                <td>1 ก.พ. 2026, 10:15</td>
                                <td class="text-center">฿890.00</td>
                                <td class="text-center">
                                    <span class="status-pill bg-success-subtle text-success">ชำระเงินแล้ว</span>
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-light btn-sm border"><i class="bi bi-eye text-primary"></i></button>
                                    <button class="btn btn-light btn-sm border"><i class="bi bi-printer text-dark"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <footer class="mt-4 text-center text-muted">
                <small>&copy; 2026 Admin Dashboard - จัดการออเดอร์หลังบ้าน</small>
            </footer>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>