<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พีรพัฒน์ ศรีห้วยไพร (บีม)</title>
</head>
<body>
    <h1>พีรพัฒน์ ศรีห้วยไพร (บีม)</h1>

    <form method="post" action="">
        กรอกตัวเลขคะแนน: 
        <input type="number" name="score" min="0" max="100" autofocus required>
        <button type="submit" name="Submit">OK</button>
    </form>
    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $score = $_POST['score'];
        $grade = "";

        if ($score > 100) {
            echo "<h3 style='color:red;'>100</h3>";
        } else {

            if ($score >= 80) {
                $grade = "A";
            } elseif ($score >= 70) {
                $grade = "B";
            } elseif ($score >= 60) {
                $grade = "C";
            } elseif ($score >= 50) {
                $grade = "D";
            } else {
                $grade = "F";
            }

            echo "<h3>คะแนน $score ได้เกรด $grade</h3>";
        }
    }
    ?>
</body>
</html>