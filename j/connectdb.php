<?php
$servername = "localhost";
$username = "root"; // ถ้ายังไม่ได้ ให้ลองถามอาจารย์ว่ามี User เฉพาะโปรเจกต์ไหม
$password = "Pw_660109140636769"; 
$dbname = "4079db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    // แก้ให้แสดง Error ที่ละเอียดขึ้นเพื่อหาจุดผิด
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "SET NAMES utf8");
?>