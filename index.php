<?php
// memulai session agar bisa menggunakan $_SESSION
session_start();

// cek user udah login belum? jika belum akan pindah ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: admin/login.php");
    exit;
}

require('function/functions.php');

// menampilkan daftar
$daftars = read("SELECT * FROM item");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kasir App</title>
    <link rel="stylesheet" href="./css/output.css">
</head>

<body class="p-5 bg-[#54efc3] mx-10">
    <div>
        <a href="">Pembayaran</a>
        <a href="item/create.php">Tambah Daftar</a>
        <a href="admin/admin.php">Admin</a>
        <a href="">Register Member</a>
    </div>
    <h1 class="tittle mb-5">Kasir App - Admin Side</h1>
    <a href="admin/logout.php">Logout</a>
    <div class="flex flex-wrap gap-2">

        <?php foreach ($daftars as $daftar) : ?>
            <div class="daftar">
                <h1 class="daftar-nama"><?= $daftar["name"] ?></h1>
                <img src="./img/item/<?= $daftar["image"] ?>" alt="<?= $daftar["name"] ?>" class="daftar-gambar">
                <div class="daftar-keterangan-1">
                    <h1 class="daftar-keterangan-1-1">Rp. <?= $daftar["price"] ?></h1>
                    <h1 class="daftar-keterangan-1-1">Stock : <?= $daftar["stock"] ?></h1>
                </div>
                <div class="px-5 flex justify-center items-center gap-5">
                    <a href="item/update.php?id=<?= $daftar['id'] ?>">Edit</a>
                    <a href="item/delete.php?id=<?= $daftar['id'] ?>" onclick="return confirm('Tekan ok untuk hapus')">
                        <img src="./img/icon/delete.png" alt="delete" width="25">
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</body>

</html>