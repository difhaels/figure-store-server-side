<?php
session_start();
// cek user udah login belum | agar tidak sembarangan orang yg dapat menambahkan data
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login.php");
    exit;
}
require("../function/functions.php");
if (isset($_POST["submit"])) {

    // cek keberhasilan
    if (tambahDaftar($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil dimasukan!');
            document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
        </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Daftar Barang</title>
</head>

<body>
    <h1>Tambah Daftar Barang</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama Barang :</label><br>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="stok">Jumlah Stok Saat Ini :</label><br>
                <input type="text" name="stok" id="stok" required>
            </li>
            <li>
                <label for="harga">Harga :</label><br>
                <input type="text" name="harga" id="harga" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label><br>
                <input type="file" name="gambar" id="gambar">
            </li>
        </ul>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="../index.php">back</a>
</body>

</html>