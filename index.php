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

<body class="main">
    <nav class="bg-bg2 py-3 lg:py-5 text-white flex items-center fixed w-full justify-between px-3 lg:px-10 z-50">
        <div class="flex items-end">
            <h1 class="font-extrabold text-lg lg:text-4xl">FIGURE STORE</h1>
            <h1 class="text-[9px] lg:text-base pt-2 lg:pt-0">.server side</h1>
        </div>
        <div class="flex gap-6">
            <a href="admin/transaction.php">
                <img src="./img/icon/pemesanan.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
            <a href="item/create.php">
                <img src="./img/icon/create.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
            <a href="admin/admin.php">
                <img src="./img/icon/admin.png" class="w-[25px] lg:w-[35px] change-color">
            </a>
            <a href="admin/logout.php">
                <img src="./img/icon/logout.png" class="w-[25px] lg:w-[35px] change-color">
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