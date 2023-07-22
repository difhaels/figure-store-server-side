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
$daftars = tampil("SELECT * FROM item");

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
        <a href="barang/tambahBarang.php">Tambah Daftar</a>
        <a href="admin/admin.php">Admin</a>
        <a href="">Register Member</a>
    </div>
    <h1 class="tittle mb-5">Kasir App - Admin Side</h1>
    <a href="admin/logout.php">Logout</a>
    <div class="flex flex-wrap gap-2">

        <?php foreach ($daftars as $daftar) : ?>
            <div class="daftar">
                <h1 class="daftar-nama"><?= $daftar["nama"] ?></h1>
                <img src="./img/daftar/<?= $daftar["gambar"] ?>" alt="<?= $daftar["nama"] ?>" class="daftar-gambar">
                <div class="daftar-keterangan-1">
                    <h1 class="daftar-keterangan-1-1"><?= $daftar["harga"] ?></h1>
                    <h1 class="daftar-keterangan-1-1">Stock : <?= $daftar["stok"] ?></h1>
                </div>
                <div class="px-5 flex justify-center items-center gap-5">
                    <a href="barang/editDaftar.php?id=<?= $daftar['id'] ?>">Edit</a>
                    <a href="barang/hapusDaftar.php?id=<?= $daftar['id'] ?>" onclick="return confirm('Tekan ok untuk hapus')">
                        <img src="./img/icon/delete.png" alt="delete" width="25">
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</body>

</html>