<?php
require("../function/functions-item.php");

// ambil data id dari url get
$id = $_GET["id"];

$item = read("SELECT * FROM item WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // cek keberhasilan
    if (update($_POST) > 0) {
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $item["id"]; ?>">
        <input type="hidden" name="oldImage" value="<?= $item["image"]; ?>">
        <ul>
            <li>
                <label for="name">Ubah name</label><br>
                <input type="text" name="name" id="name" required value="<?= $item["name"]; ?>">
            </li>
            <li>
                <label for="stock">Ubah stock</label><br>
                <input type="text" name="stock" id="stock" required value="<?= $item["stock"]; ?>">
            </li>
            <li>
                <label for="price">Ubah price</label><br>
                <input type="text" name="price" id="price" required value="<?= $item["price"]; ?>">
            </li>
            <li>
                <label for="image">Ubah gambar</label><br>
                <img src="../img/item/<?= $item['image'] ?>" alt="image">
                <input type="file" name="image" id="image">
            </li>
        </ul>
        <p>Jangan diedit jika tidak ingin diedit</p>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="../index.php">back</a>
</body>

</html>