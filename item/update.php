<?php
require("../function/functions-item.php");

// ambil data id dari url get
$id = $_GET["item_id"];

$item = read("SELECT * FROM item WHERE item_id = $id")[0];

if (isset($_POST["submit"])) {
    // cek keberhasilan
    if (update($_POST) > 0) {
        echo "
        <script>
            alert('Updated Success!');
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
    <nav class="bg-bg2 py-3 lg:py-5 text-white flex items-center fixed w-full justify-between px-3 lg:px-10">
        <a href="../index.php">
            <img src="../img/icon/back.png" alt="back" class="w-[25px] lg:w-[35px] change-color">
        </a>
        <div class="flex gap-6">
            <a href="../admin/transaction.php">
                <img src="../img/icon/pemesanan.png" class="w-[70px] lg:w-[45px] change-color">
            </a>
            <a href="../item/create.php">
                <img src="../img/icon/create.png" class="w-[66px] lg:w-[42px] change-color">
            </a>
            <a href="../admin/admin.php">
                <img src="../img/icon/admin.png" class="w-[66px] lg:w-[42px] change-color">
            </a>
            <a href="../index.php">
                <img src="../img/icon/logout.png" class="w-[65px] lg:w-[41px] change-color">
            </a>
        </div>
    </nav>

    <div class="pt-32 px-10">
        <h1>*Jangan diedit jika tidak ingin diedit</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $item["item_id"]; ?>">
            <input type="hidden" name="oldImage" value="<?= $item["item_image"]; ?>">
            <input type="hidden" name="oldImage1" value="<?= $item["item_image1"]; ?>">
            <input type="hidden" name="oldImage2" value="<?= $item["item_image2"]; ?>">
            <input type="hidden" name="oldImage3" value="<?= $item["item_image3"]; ?>">
            <input type="hidden" name="oldImage4" value="<?= $item["item_image4"]; ?>">

            <div class="flex flex-wrap gap-3">

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">NAME</h1>
                    <h1 class="bg-purple-500 text-white">OLD VALUE</h1>
                    <h1>NEW VALUE (INPUT HERE)</h1>
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Name</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_name"]; ?></h1>
                    <input type="text" name="name" id="name" required value="<?= $item["item_name"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Code</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_code"]; ?></h1>
                    <input type="text" name="code" id="code" required value="<?= $item["item_code"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Stock</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_stock"]; ?></h1>
                    <input type="text" name="stock" id="stock" required value="<?= $item["item_stock"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Price</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_price"]; ?></h1>
                    <input type="text" name="price" id="price" required value="<?= $item["item_price"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Type</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_type"]; ?></h1>
                    <input type="text" name="type" id="type" required value="<?= $item["item_type"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Source</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_source"]; ?></h1>
                    <input type="text" name="source" id="source" required value="<?= $item["item_source"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Dimensions</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_dimensions"]; ?></h1>
                    <input type="text" name="dimensions" id="dimensions" required value="<?= $item["item_dimensions"]; ?>" class="w-[80%]">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Material</h1>
                    <h1 class="bg-purple-500 text-white"><?= $item["item_material"]; ?></h1>
                    <input type="text" name="material" id="material" required value="<?= $item["item_material"]; ?>" class="w-[80%]">
                </div>

            </div>

            <h1 class="pt-10 pb-1">*image, sub image diisi jika ada foto tambahan</h1>
            <h1 class="pb-3">*Refresh setelah update image, untuk melihat hasil</h1>

            <div class="flex flex-wrap gap-3">

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Image</h1>
                    <div class="bg-purple-500">
                        <img src="../img/item/<?= $item['item_image'] ?>" alt="image" class="h-32 ">
                    </div>
                    <input type="file" name="image" id="image">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Sub-image1</h1>
                    <div class="bg-purple-500">
                        <img src="../img/sub/<?= $item['item_image1'] ?>" alt="image1" class="h-32 ">
                    </div>
                    <input type="file" name="image1" id="image1">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Sub-image2</h1>
                    <div class="bg-purple-500">
                        <img src="../img/sub/<?= $item['item_image2'] ?>" alt="image2" class="h-32 ">
                    </div>
                    <input type="file" name="image2" id="image2">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Sub-image3</h1>
                    <div class="bg-purple-500">
                        <img src="../img/sub/<?= $item['item_image3'] ?>" alt="image3" class="h-32 ">
                    </div>
                    <input type="file" name="image3" id="image3">
                </div>

                <div class="border-2 border-black text-center w-[200px]">
                    <h1 class="bg-[#E7230D] text-white">Sub-image4</h1>
                    <div class="bg-purple-500">
                        <img src="../img/sub/<?= $item['item_image4'] ?>" alt="image4" class="h-32 ">
                    </div>
                    <input type="file" name="image4" id="image4">
                </div>

            </div>

            <button type="submit" name="submit" class="button-red mt-5">Submit</button>
        </form>
    </div>
</body>

</html>