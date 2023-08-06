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
    <nav>
        <a href="transaction.php">
            <img src="../img/icon/back.png" alt="back" class="nav-a">
        </a>
        <div class="flex gap-6">
            <a href="transaction.php">
                <img src="../img/icon/pemesanan.png" class="nav-a">
            </a>
            <a href=" ../item/create.php">
                <img src="../img/icon/create.png" class="nav-a">
            </a>
            <a href=" admin.php">
                <img src="../img/icon/admin.png" class="nav-a">
            </a>
            <a href=" transaction.php">
                <img src="../img/icon/logout.png" class="nav-a">
            </a>
        </div>
    </nav>
    <div>
        <h3 class=" pt-32 pb-5 text-center">Bukti transfer by <?= $name ?></h3>
        <img src="../img/transaction/<?= $image ?>" alt="error" class="w-80 mx-auto">
    </div>
</body>

</html>