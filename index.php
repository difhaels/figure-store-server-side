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
    <title>Kasir App</title>
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class="bg-[#4FC0D0]">
    <div class="flex">

        <ul class="w-[20%] h-[100vh] bg-[#1B6B93] pt-5 fixed">
            <li class="side-option">
                <a href="">Pesananan</a>
            </li>
            <li class="side-option">
                <a href="item/create.php">Tambah Item</a>
            </li>
            <li class="side-option">
                <a href="admin/admin.php">Admin</a>
            </li>
            <li class="side-option">
                <a href="admin/logout.php">Logout</a>
            </li>
        </ul>

        <div class="w-[80%] p-10 absolute right-0">
            <h1 class="tittle mb-5 mx-auto flex justify-center">Anime Store - Server Side</h1>
            <div class="flex flex-wrap gap-2 justify-center">

                <?php foreach ($items as $item) : ?>
                    <div class="item">
                        <h1 class="item-nama"><?= $item["name"] ?></h1>
                        <img src="./img/item/<?= $item["image"] ?>" alt="<?= $item["name"] ?>" class="item-gambar">
                        <div class="item-keterangan-1">
                            <h1 class="item-keterangan-1-1">Rp. <?= $item["price"] ?></h1>
                            <h1 class="item-keterangan-1-1">Stock : <?= $item["stock"] ?></h1>
                        </div>
                        <div class="px-5 flex justify-center items-center gap-5 mb-3">
                            <a href="item/update.php?id=<?= $item['id'] ?>" class="button-yellow">Edit</a>
                            <a href="item/delete.php?id=<?= $item['id'] ?>" onclick="return confirm('Tekan ok untuk hapus')" class="delete">
                                <img src="./img/icon/delete.png" alt="delete" width="25">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>

</body>

</html>