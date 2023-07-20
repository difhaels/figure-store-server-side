<?php
// cek user udah login belum
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek apakah tombol daftar sudah ditekan
if (isset($_POST["daftar"])) {
    // cek keberhasilan
    if (tambahAdmin($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil dimasukan!');
        </script>
        ";
    }
}

// membaca table admin
$admins = tampil("SELECT * FROM admin");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
    <div>
        <a href="index.php">back to home</a>
    </div>
    <div>
        <h1>Tambah Admin</h1>
        <form action="" method="post">
            <input type="text" name="username" placeholder="masukan username">
            <input type="password" name="password" placeholder="masukan password">
            <input type="submit" name="daftar" placeholder="daftar">
        </form>
    </div>
    <div>
        <h1>Daftar Admin</h1>
        <?php foreach ($admins as $admin) : ?>
            <ul>
                <li><?= $admin['username'] ?></li>
            </ul>
        <?php endforeach; ?>
    </div>
</body>

</html>