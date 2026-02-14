<?php
$conn = mysqli_connect("localhost", "root", "Pw_660109140636769", "4079db"); 
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
mysqli_query($conn, "SET NAMES utf8");

$display_data = null;

if (isset($_POST['submit_btn'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $fav_color = mysqli_real_escape_string($conn, $_POST['fav_color']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);

    // บันทึกลงตาราง register
    $sql = "INSERT INTO register (fullname, phone, height, fav_color, major) 
            VALUES ('$fullname', '$phone', '$height', '$fav_color', '$major')";

    if (mysqli_query($conn, $sql)) {
        $display_data = $_POST;
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มสมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .form-title { color: #2b7bb9; font-weight: bold; margin-bottom: 5px; }
        .sub-title { font-size: 0.9rem; color: #666; margin-bottom: 30px; }
        .form-label { font-weight: 600; color: #333; }
        .btn-msu { background-color: #00cae3; color: white; border: none; }
        .btn-msu:hover { background-color: #00b5cc; color: white; }
        .result-box { 
            margin-top: 30px; 
            padding: 20px; 
            border-left: 6px solid #28a745; 
            background-color: #f9fffb; 
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <div class="text-center">
            <h1 class="form-title">ฟอร์มสมัครสมาชิก</h1>
            <p class="sub-title">พีรพัฒน์ ศรีห้วยไพร (บีม) -- Gemini</p>
        </div>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                <input type="text" name="fullname" class="form-control" placeholder="กรุณาใส่ชื่อ-สกุล" required>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control" placeholder="เช่น 0812345678" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ความสูง (ชม.) <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="number" name="height" class="form-control" placeholder="100 - 220" step="5" min="100" max="220" required>
                    <span class="input-group-text">ซม.</span>
                </div>
                <small class="text-muted">ใส่ค่าระหว่าง 100 ถึง 220 ชม. (เพิ่มทีละ 5)</small>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">สีที่ชอบ</label>
                <input type="color" name="fav_color" class="form-control form-control-color" value="#0d6efd" style="width: 60px;">
            </div>

            <div class="mb-4">
                <label class="form-label">สาขาวิชา</label>
                <select name="major" class="form-select">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="การเงิน">การเงิน</option>
                </select>
            </div>

            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <button type="submit" name="submit_btn" class="btn btn-primary px-4"><i class="fas fa-check-square"></i> สมัครสมาชิก</button>
                <button type="reset" class="btn btn-secondary px-4"><i class="fas fa-sync-alt"></i> ล้างข้อมูล (Reset)</button>
                <a href="https://www.msu.ac.th" target="_blank" class="btn btn-msu px-4"><i class="fas fa-rocket"></i> Go to MSU</a>
                <button type="button" onclick="window.print()" class="btn btn-outline-dark px-4"><i class="fas fa-print"></i> พิมพ์</button>
            </div>
        </form>

        <?php if ($display_data): ?>
            <div class="result-box">
                <h5 class="text-success mb-3"><i class="fas fa-check-circle"></i> ข้อมูลที่คุณกรอก (บันทึกลงระบบแล้ว):</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <p><b>ชื่อ-สกุล:</b> <?php echo htmlspecialchars($display_data['fullname']); ?></p>
                        <p><b>เบอร์โทร:</b> <?php echo htmlspecialchars($display_data['phone']); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <p><b>ความสูง:</b> <?php echo $display_data['height']; ?> ซม.</p>
                        <p><b>สาขาวิชา:</b> <?php echo $display_data['major']; ?></p>
                    </div>
                </div>
                <p class="mb-0"><b>สีที่เลือก:</b> <span style="display:inline-block; width:20px; height:20px; background-color:<?php echo $display_data['fav_color']; ?>; vertical-align:middle; border-radius:3px; border:1px solid #ddd;"></span> <?php echo $display_data['fav_color']; ?></p>
            </div>
        <?php endif; ?>

    </div>
</div>

</body>
</html>
