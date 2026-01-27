<!doctype html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
  
  <!-- Link to Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Optional: Custom CSS to enhance form styling -->
  <style>
    body {
      background-color: #f4f7fa;
      padding-top: 50px;
    }

    h1 {
      color: #007bff;
      text-align: center;
      margin-bottom: 30px;
    }

    .container {
      max-width: 600px;
      margin: auto;
    }

    .form-label {
      font-weight: bold;
    }

    .form-control {
      margin-bottom: 15px;
    }

    .btn-custom {
      width: 100%;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .color-box {
      width: 50px;
      height: 50px;
      border-radius: 4px;
      display: inline-block;
      margin-top: 5px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>ฟอร์มสมัครสมาชิก -- พีรพัฒน์ ศรีห้วยไพร (บีม)</h1>

    <form method="post" action="">
      <!-- ชื่อ-สกุล -->
      <div class="form-group">
        <label for="fullname" class="form-label">ชื่อ-สกุล</label>
        <input type="text" name="fullname" id="fullname" class="form-control" required autofocus>
      </div>

      <!-- เบอร์โทร -->
      <div class="form-group">
        <label for="phone" class="form-label">เบอร์โทร</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
      </div>

      <!-- ความสูง -->
      <div class="form-group">
        <label for="height" class="form-label">ความสูง</label>
        <input type="number" name="height" id="height" class="form-control" step="5" min="100" max="220" required>
      </div>

      <!-- สีที่ชอบ -->
      <div class="form-group">
        <label for="color" class="form-label">สีที่ชอบ</label>
        <input type="color" name="color" id="color" class="form-control">
        <div class="color-box" style="background: {{isset($color) ? $color : ''}};"></div>
      </div>

      <!-- สาขาวิชา -->
      <div class="form-group">
        <label for="major" class="form-label">สาขาวิชา</label>
        <select name="major" id="major" class="form-control">
          <option value="การบัญชี">การบัญชี</option>
          <option value="การจัดการ">การจัดการ</option>
          <option value="การตลาด">การตลาด</option>
          <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
        </select>
      </div>

      <!-- ปุ่มต่าง ๆ -->
      <div class="form-group">
        <button type="submit" name="Submit" class="btn btn-primary btn-custom">สมัครสมาชิก</button>
      </div>
      
      <div class="form-group">
        <button type="reset" class="btn btn-secondary btn-custom">Reset</button>
      </div>

      <div class="form-group">
        <button type="button" class="btn btn-info btn-custom" onClick="window.location='https://www.msu.ac.th';">Go to MSU</button>
      </div>

      <div class="form-group">
        <button type="button" class="btn btn-success btn-custom" onClick="window.print();">พิมพ์</button>
      </div>
    </form>

    <hr>

    <?php
    if (isset($_POST['Submit'])) {
      $fullname = $_POST['fullname'];
      $phone = $_POST['phone'];
      $height = $_POST['height'];
      $color = $_POST['color'];
      $major = $_POST['major'];

      echo "<p>ชื่อ-สกุล: ".$fullname."</p>";
      echo "<p>เบอร์โทร: ".$phone."</p>";
      echo "<p>ความสูง: ".$height." ซม.</p>";
      echo "<p>สีที่ชอบ: <div style='width: 50px; height: 50px; background-color: {$color}; border-radius: 4px;'></div></p>";
      echo "<p>สาขาวิชา: ".$major."</p>";
    }
    ?>

  </div>

  <!-- Link to Bootstrap 5.3 JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
