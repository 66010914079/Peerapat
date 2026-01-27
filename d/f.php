<?php
// ตรวจสอบว่ามีการส่งข้อมูลแบบ POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // ดึงข้อมูลจากฟอร์ม
    $position = $_POST['position'] ?? 'ไม่ระบุ';
    $prefix = $_POST['prefix'] ?? 'ไม่ระบุ';
    $firstName = $_POST['firstName'] ?? 'ไม่ระบุ';
    $lastName = $_POST['lastName'] ?? 'ไม่ระบุ';
    $dob = $_POST['dob'] ?? 'ไม่ระบุ';
    $education = $_POST['education'] ?? 'ไม่ระบุ';
    $major = $_POST['major'] ?? 'ไม่ระบุ';
    $skills = $_POST['skills'] ?? 'ไม่ระบุ';
    $experience = $_POST['experience'] ?? 'ไม่ระบุ';
    
    // สำหรับการจัดการไฟล์ (resume) จะต้องมีโค้ดเพิ่มเติมเพื่ออัปโหลดไฟล์จริง
    // แต่สำหรับการแสดงผลข้อมูลที่ส่งมาตามโจทย์ เราจะแสดงสถานะของไฟล์แทน
    $resume_status = "ไม่ได้มีการอัปโหลดไฟล์จริงในโค้ดนี้ (ต้องใช้ฟังก์ชัน move_uploaded_file)";
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
        $resume_name = $_FILES['resume']['name'];
        $resume_type = $_FILES['resume']['type'];
        $resume_size = $_FILES['resume']['size'];
        $resume_status = "ไฟล์ที่แนบ: **" . htmlspecialchars($resume_name) . "** (ขนาด: " . number_format($resume_size / 1024, 2) . " KB)";
        
        // *หมายเหตุ: หากต้องการอัปโหลดไฟล์จริง ต้องกำหนด 'enctype="multipart/form-data"' ในแท็ก <form> ของ HTML ด้วย*
    }

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการสมัครงาน - PeerapatCreative.th</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef; /* สีพื้นหลังอ่อนๆ */
        }
        .container {
            max-width: 900px;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .data-label {
            font-weight: bold;
            color: #007bff; /* สีน้ำเงิน */
        }
        .data-value {
            margin-bottom: 15px;
            padding-left: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mb-4 text-success">✅ ข้อมูลการสมัครงานที่ได้รับ</h2>
        <p class="text-center mb-5">บริษัท PeerapatCreative.th ขอขอบคุณที่คุณสนใจร่วมงานกับเรา</p>

        <h4 class="text-primary mt-4 mb-3">📍 ตำแหน่งที่ต้องการสมัคร</h4>
        <div class="row">
            <div class="col-md-12">
                <p class="data-label">ตำแหน่งที่สมัคร:</p>
                <p class="data-value lead">
                    <?php 
                        // แปลง value (เช่น Software_Developer) ให้เป็นข้อความที่อ่านได้
                        $position_map = [
                            'Software_Developer' => 'นักพัฒนาซอฟต์แวร์ (Software Developer)',
                            'Data_Analyst' => 'นักวิเคราะห์ข้อมูล (Data Analyst)',
                            'UX_Designer' => 'นักออกแบบประสบการณ์ผู้ใช้ (UX/UI Designer)',
                            'Marketing_Specialist' => 'ผู้เชี่ยวชาญด้านการตลาดดิจิทัล (Digital Marketing Specialist)',
                            'HR_Specialist' => 'เจ้าหน้าที่ฝ่ายทรัพยากรบุคคล (HR Specialist)'
                        ];
                        echo $position_map[$position] ?? htmlspecialchars($position);
                    ?>
                </p>
            </div>
        </div>
        
        <hr>

        <h4 class="text-primary mt-4 mb-3">👤 ข้อมูลส่วนตัว</h4>
        <div class="row">
            <div class="col-md-6">
                <p class="data-label">ชื่อ-นามสกุล:</p>
                <p class="data-value fs-5"><?= htmlspecialchars($prefix . $firstName . " " . $lastName) ?></p>
            </div>
            <div class="col-md-6">
                <p class="data-label">วัน/เดือน/ปีเกิด:</p>
                <p class="data-value"><?= htmlspecialchars($dob) ?></p>
            </div>
        </div>
        
        <hr>

        <h4 class="text-primary mt-4 mb-3">🎓 ระดับการศึกษา</h4>
        <div class="row">
            <div class="col-md-6">
                <p class="data-label">ระดับการศึกษาสูงสุด:</p>
                <p class="data-value"><?= htmlspecialchars($education) ?></p>
            </div>
            <div class="col-md-6">
                <p class="data-label">สาขา/วิชาเอก:</p>
                <p class="data-value"><?= htmlspecialchars($major) ?: 'ไม่ระบุ' ?></p>
            </div>
        </div>
        
        <hr>

        <h4 class="text-primary mt-4 mb-3">🛠️ ความสามารถพิเศษและประสบการณ์</h4>
        <div class="mb-3">
            <p class="data-label">ความสามารถพิเศษ (ทักษะเด่นๆ):</p>
            <div class="data-value alert alert-info"><?= nl2br(htmlspecialchars($skills) ?: 'ไม่ระบุความสามารถพิเศษ') ?></div>
        </div>
        <div class="mb-3">
            <p class="data-label">ประสบการณ์ทำงาน (สรุปย่อ):</p>
            <div class="data-value alert alert-secondary"><?= nl2br(htmlspecialchars($experience) ?: 'ไม่มีประสบการณ์ทำงานระบุ') ?></div>
        </div>
        
        <hr>

        <h4 class="text-primary mt-4 mb-3">📎 ไฟล์แนบ</h4>
        <div class="mb-3">
            <p class="data-label">Resume/CV:</p>
            <div class="data-value alert alert-success"><?= $resume_status ?></div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
} else {
    // กรณีไม่มีการส่งข้อมูลแบบ POST โดยตรง (เช่น เข้าถึง F.PHP โดยตรง)
    header("Location: /"); // เปลี่ยนเป็นหน้าที่ตั้งฟอร์มไว้
    exit;
}
?>