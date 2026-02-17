<?php
include_once("connectdb.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // คำสั่งลบข้อมูลภาคตามรหัส r_id
    $sql = "DELETE FROM `regions` WHERE `r_id` = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        // ลบสำเร็จ ให้เด้งกลับไปหน้า a.php
        echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location.href='a.php';</script>";
    } else {
        // ลบไม่สำเร็จ (เช่น มีข้อมูลจังหวัดเชื่อมโยงอยู่)
        echo "<script>alert('ไม่สามารถลบได้ เนื่องจากมีข้อมูลจังหวัดใช้งานภาคนี้อยู่'); window.location.href='a.php';</script>";
    }
} else {
    // ถ้าไม่มีการส่งค่า id มา ให้กลับไปหน้า a.php
    header("Location: a.php");
}
?>