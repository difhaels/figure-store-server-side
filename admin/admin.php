<?php
// cek user udah login belum
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require '../function/functions-admin.php';

// cek apakah tombol add sudah ditekan
if (isset($_POST["add"])) {
    // cek keberhasilan
    if (create($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil dimasukan!');
        </script>
        ";
    }
}

// membaca table admin
$admins = read("SELECT * FROM admin");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
    <div>
        <a href="../index.php">back to home</a>
    </div>
    <div>
        <h1>Tambah Admin</h1>
        <form action="" method="post">
            <input type="text" name="username" placeholder="masukan username">
            <input type="password" name="password" placeholder="masukan password">
            <button type="submit" name="add">tambah</button>
        </form>
    </div>
    <div>
        <h1>Daftar Admin</h1>
        <?php foreach ($admins as $admin) : ?>
            <ul>
                <li><?= $admin['username'] ?> <a href="delete.php?id=<?= $admin['id'] ?>" onclick="return confirm('Tekan ok untuk hapus')">hapus</a></li>
            </ul>
        <?php endforeach; ?>
    </div>
</body>

</html>