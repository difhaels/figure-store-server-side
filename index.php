<?php
// memulai session agar bisa menggunakan $_SESSION
session_start();

// cek user udah login belum? jika belum akan pindah ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: admin/login.php");
    exit;
}

require('function/functions.php');

// menampilkan item
$items = read("SELECT * FROM item");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figrue Store Server Side</title>
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class="body">
    <nav>
        <div class="flex items-end">
            <h1 class="nav-tittle">FIGURE STORE</h1>
            <h1 class="nav-sub-tittle">.server side</h1>
        </div>
        <div class="flex gap-6">
            <a href="admin/transaction.php">
                <img src="./img/icon/pemesanan.png" class="nav-a">
            </a>
            <a href="item/create.php">
                <img src="./img/icon/create.png" class="nav-a">
            </a>
            <a href="admin/admin.php">
                <img src="./img/icon/admin.png" class="nav-a">
            </a>
            <a href="admin/logout.php">
                <img src="./img/icon/logout.png" class="nav-a">
            </a>
        </div>
    </nav>

    <div class="p-10 pt-40 lg:pt-32">
        <div class="flex flex-wrap gap-2 justify-center">

            <?php foreach ($items as $item) : ?>
                <div class="item">
                    <h1 class="item-nama"><?= $item["item_name"] ?></h1>
                    <img src="./img/item/<?= $item["item_image"] ?>" alt="<?= $item["item_name"] ?>" class="item-gambar">
                    <div class="item-keterangan-1">
                        <h1 class="item-keterangan-1-1">Rp. <?= $item["item_price"] ?></h1>
                        <h1 class="item-keterangan-1-1">Stock : <?= $item["item_stock"] ?></h1>
                    </div>
                    <div class="px-5 flex justify-center items-center gap-1 mb-3">
                        <a href="item/detail.php?item_id=<?= $item['item_id'] ?>" class="button-red">Detail</a>
                        <a href="item/update.php?item_id=<?= $item['item_id'] ?>" class="button-yellow">Edit</a>
                        <a href="item/delete.php?item_id=<?= $item['item_id'] ?>" onclick="return confirm('Tekan ok untuk hapus')" class="delete">
                            <img src="./img/icon/delete.png" alt="delete" width="25">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>