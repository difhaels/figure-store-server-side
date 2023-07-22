<?php
session_start();
// cek user udah login belum | agar tidak sembarangan orang yg dapat menambahkan data
if (!isset($_SESSION["login"])) {
    header("Location: ../admin/login.php");
    exit;
}
require("../function/functions-item.php");

if (isset($_POST["submit"])) {
    // cek keberhasilan
    if (create($_POST) > 0) {
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
                <label for="name">Nama Barang :</label><br>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="stock">Jumlah Stok Saat Ini :</label><br>
                <input type="text" name="stock" id="stock" required>
            </li>
            <li>
                <label for="price">price :</label><br>
                <input type="text" name="price" id="price" required>
            </li>
            <li>
                <label for="image">image :</label><br>
                <input type="file" name="image" id="image">
            </li>
        </ul>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="../index.php">back</a>
</body>

</html>