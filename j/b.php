<?php
include_once("connectdb.php");

// ส่วนบันทึกข้อมูล
if(isset($_POST['Submit'])) {
    $pname = $_POST['pname'];
    $rid = $_POST['rid'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    
    $sql2 = "INSERT INTO `provinces` (`p_id`, `p_name`, `r_id`) VALUES (NULL, '$pname', '$rid')";
    mysqli_query($conn, $sql2) or die("insert ไม่ได้");
    
    $pic_id = mysqli_insert_id($conn);
    copy($_FILES['pimage']['tmp_name'], "images/".$pic_id.".".$ext);
    
    echo "<script>window.location.href='b.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการข้อมูลจังหวัด</title>
</head>
<body>
    <h1>ข้อมูลจังหวัด -- พีรพัฒน์ ศรีห้วยไพร</h1>

    <form method="post" action="" enctype="multipart/form-data">
        ชื่อจังหวัด: <input type="text" name="pname" autofocus required> <br>
        รูปภาพ: <input type="file" name="pimage" required> <br>
        ชื่อภาค: 
        <select name="rid">
        <?php
            $sql3 = "SELECT * FROM `regions` ORDER BY r_name ASC";
            $rs3 = mysqli_query($conn, $sql3);
            while($data3 = mysqli_fetch_array($rs3)){
                echo "<option value='".$data3['r_id']."'>".$data3['r_name']."</option>";
            }
        ?>
        </select>
        <br><br>
        <button type="submit" name="Submit">บันทึก</button>
    </form>

    <hr>

    <table border="1" width="80%">
        <tr>
            <th>รหัส</th>
            <th>จังหวัด</th>
            <th>รูปภาพ</th>
            <th>ภาค</th>
        </tr>
        <?php
            // ดึงข้อมูลจังหวัดมาแสดงร่วมกับชื่อภาค
            $sql = "SELECT * FROM provinces 
                    INNER JOIN regions ON provinces.r_id = regions.r_id 
                    ORDER BY provinces.p_id DESC";
            $rs = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($rs)){
        ?>
        <tr>
            <td align="center"><?php echo $data['p_id']; ?></td>
            <td><?php echo $data['p_name']; ?></td>
            <td align="center">
                <img src="images/<?php echo $data['p_id']; ?>.jpg" width="150">
            </td>
            <td><?php echo $data['r_name']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>