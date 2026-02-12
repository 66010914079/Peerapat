<?php
// 1. ดึงไฟล์เชื่อมต่อฐานข้อมูล (ใช้ไฟล์ที่มีอยู่แล้วในโฟลเดอร์หลัก)
include_once("../connectdb.php"); 

echo "<h1>Welcome to Folder J</h1>";
echo "<h3>Owner: Peerapat</h3>";

// 2. ทดสอบดึงข้อมูลจากตาราง regions (ตามตัวอย่างในไฟล์ a.php ของคุณ)
$sql = "SELECT * FROM regions";
$query = mysqli_query($conn, $sql);

if (!$query) {
    echo "Error: " . mysqli_error($conn);
} else {
    echo "<h4>Data from Database:</h4>";
    echo "<ul>";
    while($row = mysqli_fetch_array($query)) {
        echo "<li>ID: " . $row['r_id'] . " - Name: " . $row['r_name'] . "</li>";
    }
    echo "</ul>";
}

echo "<hr>";
echo "Current Time: " . date("Y-m-d H:i:s");
?>