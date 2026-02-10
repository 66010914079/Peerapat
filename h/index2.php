<?php
include_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <h1>หน้าหลักแอดมิน - Dashboard</h1>

    <?php echo $_SESSION['aname']; ?>

    <ul>
        <a href="index2.php"><li>หน้าหลักแอดมิน</li></a>
        <a href="products.php"><li>จัดการสินค้า</li></a>
        <a href="orders.php"><li>จัดการออเดอร์</li></a>
        <a href="customers.php"><li>จัดการลูกค้า</li></a>
        <a href="logout.php"><li>ออกจากระบบ</li></a>
</ul>
</body>
</html>