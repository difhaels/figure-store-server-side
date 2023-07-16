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
        <div class="daftar">
            <h1 class="daftar-nama">Mie Ayam bawang</h1>
            <img src="./daftar/mieayambawang.jpg" alt="mieayam" class="daftar-gambar">
            <div class="daftar-keterangan-1">
                <h1 class="daftar-keterangan-1-1">Rp.10000</h1>
                <h1 class="daftar-keterangan-1-1">Stock : 50</h1>
            </div>
        </div>
    </div>
</body>

</html>