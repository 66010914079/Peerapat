<?php
// 1. ต้องเปิดด้วย <?php ที่บรรทัดแรกสุดเสมอ
require_once('connectdb.php'); 

$success_msg = "";

if (isset($_POST['submit_btn'])) {
    $pos = mysqli_real_escape_string($conn, $_POST['position']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $edu = mysqli_real_escape_string($conn, $_POST['education']);
    $skill = mysqli_real_escape_string($conn, $_POST['skill']);
    $exp = mysqli_real_escape_string($conn, $_POST['experience']);

    // บันทึกลงตาราง job_applications
    $sql = "INSERT INTO job_applications (position, title, fullname, birthday, education, skill, experience)
            VALUES ('$pos', '$title', '$fullname', '$birthday', '$edu', '$skill', '$exp')";

    if (mysqli_query($conn, $sql)) {
        $success_msg = "ส่งใบสมัครเรียบร้อยแล้ว!";
    }
}
// ปิดแท็ก PHP ก่อนเริ่มส่วน HTML
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แบบฟอร์มสมัครงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Tahoma', sans-serif; padding: 20px; }
        .form-card { max-width: 900px; margin: auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header-section { display: flex; align-items: center; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px; }
        .profile-img { width: 60px; height: 60px; background: #007bff; color: white; display: flex; align-items: center; justify-content: center; border-radius: 8px; font-size: 24px; font-weight: bold; margin-right: 20px; }
        .label-req::after { content: " *"; color: red; }
    </style>
</head>
<body>

<div class="form-card">
    <div class="header-section">
        <div class="profile-img">SH</div>
        <div>
            <h4 class="mb-0">พีรพัฒน์ ศรีห้วยไพร (บีม)</h4>
            <small class="text-muted">แบบฟอร์มสมัครงาน (Multiple Positions)</small>
        </div>
    </div>

    <?php if($success_msg != "") echo "<div class='alert alert-success'>$success_msg</div>"; ?>

    <form action="b.php" method="POST">
        <div class="mb-3">
            <label class="form-label label-req">ตำแหน่งที่ต้องการสมัคร</label>
            <select name="position" class="form-select" required>
                <option value="">-- เลือกตำแหน่ง --</option>
                <option value="Software Engineer">Software Engineer</option>
                <option value="IT Support">IT Support</option>
                <option value="Accounting">Accounting</option>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label label-req">คำนำหน้าชื่อ</label>
                <select name="title" class="form-select" required>
                    <option value="">-- กรุณาเลือก --</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="col-md-8">
                <label class="form-label label-req">ชื่อ-สกุล</label>
                <input type="text" name="fullname" class="form-control" placeholder="เช่น นายสมชาย ใจดี" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label label-req">วันเดือนปีเกิด</label>
                <input type="date" name="birthday" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label label-req">ระดับการศึกษา</label>
                <select name="education" class="form-select" required>
                    <option value="">-- เลือกระดับการศึกษา --</option>
                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                    <option value="ปริญญาโท">ปริญญาโท</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">ความสามารถพิเศษ</label>
            <textarea name="skill" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">ประสบการณ์ทำงาน</label>
            <textarea name="experience" class="form-control" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <button type="reset" class="btn btn-light border">ล้างข้อมูล</button>
            <button type="submit" name="submit_btn" class="btn btn-primary px-4">ส่งใบสมัคร</button>
            <a href="show_data.php" class="btn btn-info text-white">ดูรายชื่อทั้งหมด</a>
        </div>
    </form>
</div>

</body>
</html>