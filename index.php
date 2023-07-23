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

<body class="bg-bg2">
    <div class="flex">

        <div class="w-[20%] h-[100vh] bg-bg1 pt-5 fixed">
            <a href="">
                <div class="grou side-option">Pesananan</div>
            </a>
            <a href="item/create.php">

                <div class="side-option">Tambah Item</div>
            </a>
            <a href="admin/admin.php">
                <div class="side-option">Admin</div>
            </a>
            <a href="admin/logout.php">
                <div class="side-option">Logout</div>
            </a>
        </div>

        <div class="w-[80%] p-10 absolute right-0">
            <h1 class="tittle mb-5 mx-auto flex justify-center text-white">Anime Store - Server Side</h1>
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