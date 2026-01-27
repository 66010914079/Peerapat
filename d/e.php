<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บริษัท PeerapatCreative.th</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* CSS เพิ่มเติมเล็กน้อย */
        body {
            background-color: #f8f9fa; /* สีพื้นหลังอ่อนๆ */
        }
        .container {
            max-width: 900px; /* กำหนดความกว้างสูงสุดของฟอร์ม */
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mb-4 text-primary">ฟอร์ม รับสมัครงาน พีรพัฒน์ ศรีห้วยไพร (บีม)</h2>
        <p class="text-center mb-5">บริษัท PeerapatCreative.th</p>
        
        <form action="#" method="POST">
            
            <fieldset class="mb-4 p-3 border rounded">
                <legend class="float-none w-auto px-2 fs-5 text-success">ตำแหน่งที่ต้องการสมัคร</legend>
                <div class="mb-3">
                    <label for="position" class="form-label fw-bold">เลือกตำแหน่งงานที่สนใจ <span class="text-danger">*</span></label>
                    <select class="form-select" id="position" name="position" required>
                        <option value="">-- กรุณาเลือกตำแหน่ง --</option>
                        <option value="Software_Developer">นักพัฒนาซอฟต์แวร์ (Software Developer)</option>
                        <option value="Data_Analyst">นักวิเคราะห์ข้อมูล (Data Analyst)</option>
                        <option value="UX_Designer">นักออกแบบประสบการณ์ผู้ใช้ (UX/UI Designer)</option>
                        <option value="Marketing_Specialist">ผู้เชี่ยวชาญด้านการตลาดดิจิทัล (Digital Marketing Specialist)</option>
                        <option value="HR_Specialist">เจ้าหน้าที่ฝ่ายทรัพยากรบุคคล (HR Specialist)</option>
                    </select>
                    <div class="form-text">กรุณาเลือกตำแหน่งงานที่คุณต้องการสมัคร</div>
                </div>
            </fieldset>

            ---

            <fieldset class="mb-4 p-3 border rounded">
                <legend class="float-none w-auto px-2 fs-5 text-success">ข้อมูลส่วนตัว</legend>
                
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label for="prefix" class="form-label fw-bold">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                        <select class="form-select" id="prefix" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="firstName" class="form-label fw-bold">ชื่อ (ภาษาไทย) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required placeholder="เช่น สมชาย">
                    </div>
                    <div class="col-md-4">
                        <label for="lastName" class="form-label fw-bold">นามสกุล (ภาษาไทย) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="เช่น ใจดี">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label fw-bold">วัน/เดือน/ปีเกิด <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                
            </fieldset>

            ---

            <fieldset class="mb-4 p-3 border rounded">
                <legend class="float-none w-auto px-2 fs-5 text-success">ระดับการศึกษา</legend>
                
                <div class="mb-3">
                    <label for="education" class="form-label fw-bold">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                    <select class="form-select" id="education" name="education" required>
                        <option value="">-- กรุณาเลือกระดับการศึกษา --</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                        <option value="ปวส">ปวส.</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="major" class="form-label fw-bold">สาขา/วิชาเอก</label>
                    <input type="text" class="form-control" id="major" name="major" placeholder="เช่น วิทยาการคอมพิวเตอร์">
                </div>
                
            </fieldset>
            
            ---

            <fieldset class="mb-4 p-3 border rounded">
                <legend class="float-none w-auto px-2 fs-5 text-success">ความสามารถพิเศษและประสบการณ์</legend>
                
                <div class="mb-3">
                    <label for="skills" class="form-label fw-bold">ความสามารถพิเศษ (โปรดระบุทักษะเด่นๆ)</label>
                    <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="เช่น ภาษาอังกฤษดีเยี่ยม (TOEIC 800), สามารถใช้ Python, R, และ SQL ได้อย่างชำนาญ"></textarea>
                </div>

                <div class="mb-3">
                    <label for="experience" class="form-label fw-bold">ประสบการณ์ทำงาน (สรุปย่อ)</label>
                    <textarea class="form-control" id="experience" name="experience" rows="4" placeholder="โปรดระบุประสบการณ์ทำงานที่เกี่ยวข้อง โดยเริ่มจากตำแหน่งล่าสุด"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="resume" class="form-label fw-bold">แนบไฟล์ Resume/CV <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                    <div class="form-text">รองรับไฟล์: PDF, DOC, DOCX เท่านั้น ขนาดไม่เกิน 5MB</div>
                </div>

            </fieldset>

            ---

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">ส่งใบสมัคร</button>
            </div>
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>