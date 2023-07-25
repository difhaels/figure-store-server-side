<?php
require '../function/functions.php';
// fungsi untuk manambahkan daftar
function create($data)
{
    global $koneksi;
    $name = htmlspecialchars($data["name"]);
    $stock = htmlspecialchars($data["stock"]);
    $price = htmlspecialchars($data["price"]);

    // uploud gamabr
    $image = uploud();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO item (id, name, code, image, image1, image2, image3, image4, stock, price, type, source, dimensions, material) VALUES ('', '$name','', '$image', '', '', '', '', '$stock', '$price', '', '', '', '')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi uploud
function uploud()
{
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek ada gambar atau tidak (4 = tidak ada gambar yang diuploud)
    if ($error === 4) {
        echo "
        <script>
            alert('Uploud gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    // cek yang diup gambar bukan
    $ekstensiGambarValid = ['png', 'jpeg', 'jpg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Anda harus menguploud gambar');
        </script>
        ";
        return false;
    }

    // cek ukuran gambar 2mb max
    if ($ukuranFile > 2000000) {
        echo "
        <script>
            alert('Ukuran file terlalu besar max 2 mb');
        </script>
        ";
        return false;
    }

    // lolos pengecekan, 
    // akan mengisi file img/daftar dari tambahBarang karena dia yang menjalankan function ini
    move_uploaded_file($tmpName, '../img/item/' . $namaFile);

    return $namaFile;
}


// fungsi untuk mengubah / Update daftar
function update($data)
{
    global $koneksi;

    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $stock = htmlspecialchars($data["stock"]);
    $price = htmlspecialchars($data["price"]);
    $oldImage = $data["oldImage"];

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = uploud();
    }

    $query = "UPDATE item SET image='$image', name = '$name', stock = '$stock', price = '$price' WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


// fungsi untuk menghapus data / Delete daftar
function delete($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM item WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
