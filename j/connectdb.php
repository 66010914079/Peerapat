<?php
$conn = mysqli_connect("localhost", "root", "Pw_660109140636769", "4079db");
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}
mysqli_query($conn, "SET NAMES utf8"); // ตั้งค่ารองรับภาษาไทย
?>
