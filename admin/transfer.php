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
    <nav class="bg-bg2 py-3 lg:py-5 text-white flex items-center fixed w-full justify-between px-3 lg:px-10 z-50">
        <div class="flex items-end">
            <h1 class="font-extrabold text-lg lg:text-4xl">FIGURE STORE</h1>
            <h1 class="text-[9px] lg:text-base pt-2 lg:pt-0">.server side</h1>
        </div>
        <div class="flex gap-6">
            <a href="transaction.php">
                <img src="../img/icon/pemesanan.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
            <a href="../item/create.php">
                <img src="../img/icon/create.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
            <a href="admin.php">
                <img src="../img/icon/admin.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
            <a href="transaction.php">
                <img src="../img/icon/logout.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
        </div>
    </nav>
    <div>
        <h3 class="pt-32 pb-5 text-center">Bukti transfer by <?= $name ?></h3>
        <img src="../img/transaction/<?= $image ?>" alt="error" class="w-80 mx-auto">
    </div>
</body>

</html>