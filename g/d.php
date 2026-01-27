<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Tahoma', sans-serif; text-align: center; background: #f0f2f5; padding: 20px; }
        .card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); display: inline-block; margin: 10px; vertical-align: top; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th { background: #007bff; color: white; padding: 8px; }
        td { border-bottom: 1px solid #ddd; padding: 8px; }
        canvas { max-width: 400px; max-height: 300px; }
    </style>
</head>
<body>

    <h2>📊 สรุปยอดขายโดย : พีรพัฒน์ ศรีห้วยไพร (บีม)</h2>

    <div class="card">
        <table>
            <tr><th>ประเทศ</th><th>ยอดขาย</th></tr>
            <?php
            include_once("connectdb.php");
            $sql = "SELECT p_country, SUM(p_amount) AS total FROM `popsupermarket` GROUP BY p_country";
            $rs = mysqli_query($conn, $sql);
            $labels = []; $data = [];
            while ($row = mysqli_fetch_array($rs)){
                $labels[] = $row['p_country'];
                $data[] = $row['total'];
                echo "<tr><td>{$row['p_country']}</td><td align='right'>".number_format($row['total'])."</td></tr>";
            }
            ?>
        </table>
    </div>

    <div class="card"><canvas id="bar"></canvas></div>
    <div class="card"><canvas id="pie"></canvas></div>

    <script>
        const config = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{ 
                label: 'ยอดขาย', 
                data: <?php echo json_encode($data); ?>,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b']
            }]
        };
        new Chart(document.getElementById('bar'), { type: 'bar', data: config });
        new Chart(document.getElementById('pie'), { type: 'pie', data: config });
    </script>

</body>
</html>