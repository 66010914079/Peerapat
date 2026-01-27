<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>พีรพัฒน์ ศรีห้วยไพร (บีม) - ฟอร์มสมัครสมาชิก</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    /* ปรับแต่งเพิ่มเติมเล็กน้อย */
    .color-preview {
        width: 20px;
        height: 20px;
        border: 1px solid #ccc;
        display: inline-block;
        vertical-align: middle;
        margin-left: 5px;
    }
</style>

</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h3 mb-0">ฟอร์มสมัครสมาชิก -- พีรพัฒน์ ศรีห้วยไพร (บีม) -- Gemini</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="">

                        <div class="mb-3">
                            <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}">
                            <div class="form-text">ตัวอย่าง: 08XXXXXXXX</div>
                        </div>

                        <div class="mb-3">
                            <label for="height" class="form-label">ความสูง (ซม.) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="height" name="height" step="5" min="100" max="220" required>
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">สีที่ชอบ</label>
                            <input type="color" class="form-control form-control-color" id="color" name="color">
                        </div>

                        <div class="mb-3">
                            <label for="major" class="form-label">สาขาวิชา</label>
                            <select class="form-select" id="major" name="major">
                                <option value="การบัญชี">การบัญชี</option>
                                <option value="การจัดการ">การจัดการ</option>
                                <option value="การตลาด">การตลาด</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            </select>
                        </div>

                        <hr>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" name="Submit" class="btn btn-success me-md-2">✅ สมัครสมาชิก</button>
                            <button type="reset" class="btn btn-warning me-md-2">🔄 Reset</button>
                            <button type="button" class="btn btn-info text-white me-md-2" onClick="window.location='https://www.msu.ac.th';">📚 go to MSU</button>
                            <button type="button" class="btn btn-secondary" onClick="window.print();">🖨️ พิมพ์</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h2 class="h5 mb-0">ผลลัพธ์การสมัคร (PHP)</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_POST['Submit'])){
                        $fullname = $_POST['fullname'];
                        $phone = $_POST['phone'];
                        $height = $_POST['height'];
                        $color = $_POST['color'];
                        $major = $_POST['major'];
                        
                        echo "<p><strong>ชื่อ-สกุล:</strong> ".$fullname."</p>";
                        echo "<p><strong>เบอร์โทร:</strong> ".$phone."</p>";
                        echo "<p><strong>ความสูง:</strong> ".$height." ซม.</p>";
                        echo "<p><strong>สีที่ชอบ:</strong> ".$color." <span class='color-preview' style='background-color:{$color};'></span></p>";
                        echo "<p><strong>สาขาวิชา:</strong> ".$major."</p>";
                            
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>