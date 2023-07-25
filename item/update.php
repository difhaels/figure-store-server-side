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
            alert('Updated Success!');
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
    <link rel="stylesheet" href="../css/output.css">
</head>

<body>
    <div class="bg-bg2 py-5 text-white flex items-center fixed w-full justify-between px-10">
        <div class="flex items-end">
            <a href="../index.php">
                <h1 class="font-extrabold text-4xl">FIGURE STORE</h1>
            </a>
            <h1>.server side</h1>
        </div>
        <div class="flex gap-6">
            <a href="">
                <img src="./img/icon/pemesanan.png" class="w-[70px] lg:w-[45px] change-color">
            </a>
            <a href="item/create.php">
                <img src="./img/icon/create.png" class="w-[66px] lg:w-[42px] change-color">
            </a>
            <a href="admin/admin.php">
                <img src="./img/icon/admin.png" class="w-[66px] lg:w-[42px] change-color">
            </a>
            <a href="admin/logout.php">
                <img src="./img/icon/logout.png" class="w-[65px] lg:w-[41px] change-color">
            </a>
        </div>
    </div>

    <div class="pt-32">
        <h1>Edit Daftar</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $item["id"]; ?>">
            <input type="hidden" name="oldImage" value="<?= $item["image"]; ?>">
            <div class="border-2 w-fit">
                <h1>name</h1>
                <h1>lama</h1>
                <input type="text" name="name" id="name" required value="<?= $item["name"]; ?>">
            </div>
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
            <p>*Jangan diedit jika tidak ingin diedit</p>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <a href="../index.php">back</a>
</body>

</html>