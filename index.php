<?php
require('functions.php');
$daftars = tampil("SELECT * FROM daftar");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kasir App</title>
    <link rel="stylesheet" href="./css/output.css">
    <!-- <meta http-equiv="refresh" content="5"> -->
</head>

<body class="p-5 bg-[#54efc3]">
    <h1 class="tittle">Kasir App - Admin Side</h1>
    <div class="flex flex-wrap gap-5">
        <?php foreach ($daftars as $daftar) : ?>
            <div class="daftar">
                <h1 class="daftar-nama"><?= $daftar["nama"] ?></h1>
                <img src="./daftar/<?= $daftar["gambar"] ?>.jpg" alt="<?= $daftar["nama"] ?>" class="daftar-gambar">
                <div class="daftar-keterangan-1">
                    <h1 class="daftar-keterangan-1-1"><?= $daftar["harga"] ?></h1>
                    <h1 class="daftar-keterangan-1-1">Stock : <?= $daftar["stok"] ?></h1>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>