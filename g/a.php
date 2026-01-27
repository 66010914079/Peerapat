<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
</head>
<body>
    <h1>พีรพัฒน์ ศรีห้วยไพร (บีม)</h1>
    
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>สินค้า</th>
            <th>ประเภทสินค้า</th>
            <th>วันที่</th>
            <th>ประเทศ</th>
            <th>จำนวนเงิน</th>
            <th>รูป</th>
</tr>
<?php
include_once("connectdb.php");
//$sql = "SELECT * FROM `popsupermarket` 
// WHERE p_country = 'Sweden' 
//AND p_category='Vegetables'
 //ORDER BY p_product_name ASC";
$sql ="SELECT * FROM `popsupermarket` ";
$rs = mysqli_query($conn, $sql);
$total=0;
while ($data = mysqli_fetch_array($rs)){
    $total +=$data['p_amount'];
?>
<tr>
    <td><?php echo $data['p_order_id'];?></id>
    <td><?php echo $data['p_product_name'];?></id>
    <td><?php echo $data['p_category'];?></id>
    <td><?php echo $data['p_date'];?></id>
    <td><?php echo $data['p_country'];?></id>
    <td align="right"><?php echo number_format($data['p_amount'],0);?></td>
    <td><img src="img/<?php echo $data['p_product_name'];?>.jpg" width="50"></td>
</tr>
    <?php } ?>

<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><?php echo number_format($total,0);?></b></td>
    <td>&nbsp;</td>
</tr>
</table>
</html>