<?php include_once("connectdb.php"); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; padding-top: 20px; }
        .card { border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .table-img { width: 50px; height: 50px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container mb-5">
    <div class="card p-4">
        <h1 class="text-center mb-4">พีรพัฒน์ ศรีห้วยไพร (บีม) - รายการสินค้า</h1>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-hover" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>สินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>วันที่</th>
                        <th>ประเทศ</th>
                        <th class="text-end">จำนวนเงิน</th>
                        <th class="text-center">รูป</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `popsupermarket`";
                    $rs = mysqli_query($conn, $sql);
                    $total = 0;
                    while ($data = mysqli_fetch_array($rs)) {
                        $total += $data['p_amount'];
                    ?>
                    <tr>
                        <td><?php echo $data['p_order_id']; ?></td>
                        <td><strong><?php echo $data['p_product_name']; ?></strong></td>
                        <td><span class="badge bg-info text-dark"><?php echo $data['p_category']; ?></span></td>
                        <td><?php echo date('d/m/Y', strtotime($data['p_date'])); ?></td>
                        <td><?php echo $data['p_country']; ?></td>
                        <td class="text-end text-primary fw-bold"><?php echo number_format($data['p_amount'], 0); ?></td>
                        <td class="text-center">
                            <img src="img/<?php echo $data['p_product_name']; ?>.jpg" 
                                 alt="product" 
                                 class="table-img"
                                 onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th colspan="5" class="text-end">รวมทั้งสิ้น:</th>
                        <th class="text-end text-danger h5"><?php echo number_format($total, 0); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json" // เมนูภาษาไทย
            },
            "pageLength": 10,
            "order": [[ 0, "desc" ]] // เรียงจาก Order ID ล่าสุด
        });
    });
</script>

</body>
</html>