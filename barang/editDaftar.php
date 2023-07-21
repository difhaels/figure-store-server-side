<?php
require("../function/functions.php");

// ambil data id dari url get
$id = $_GET["id"];

$daftar = tampil("SELECT * FROM daftar WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // cek keberhasilan
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = '../index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Daftar</title>
</head>

<body>
    <h1>Edit Daftar</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $daftar["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Ubah Nama</label><br>
                <input type="text" name="nama" id="nama" required value="<?= $daftar["nama"]; ?>">
            </li>
            <li>
                <label for="tahun">Ubah Stok</label><br>
                <input type="text" name="tahun" id="tahun" required value="<?= $daftar["stok"]; ?>">
            </li>
            <li>
                <label for="harga">Ubah Harga</label><br>
                <input type="text" name="harga" id="harga" required value="<?= $daftar["harga"]; ?>">
            </li>
        </ul>
        <p>Jangan diedit jika tidak ingin diedit</p>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="../index.php">back</a>
</body>

</html>