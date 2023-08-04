<?php
$image = $_GET["ti"];
$name = $_GET["tn"];

if (!isset($image)) {
    echo "
        <script>
            alert('Image not found');
            document.location.href = './transaction.php';
        </script>
        ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Transfer</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body>
    <h3>Bukti transfer by <?= $name ?></h3>
    <img src="../img/transaction/<?= $image ?>" alt="error">
</body>

</html>