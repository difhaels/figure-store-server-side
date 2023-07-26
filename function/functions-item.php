<?php
require '../function/functions.php';
// fungsi untuk manambahkan daftar
function create($data)
{
    global $koneksi;
    $name = htmlspecialchars($data["name"]);
    $code = htmlspecialchars($data["code"]);
    $stock = htmlspecialchars($data["stock"]);
    $price = htmlspecialchars($data["price"]);
    $type = htmlspecialchars($data["type"]);
    $source = htmlspecialchars($data["source"]);
    $dimensions = htmlspecialchars($data["dimensions"]);
    $material = htmlspecialchars($data["material"]);

    // uploud image
    $image = uploud('image', 'item');
    // jika image tidak ada maka akan failed, karena image pertama adalah required
    if (!$image) {
        return false;
    }

    // upload sub image
    if ($_FILES['image1']['error'] === 4) {
        $image1 = "image1";
    } else {
        $image1 = uploud('image1', 'sub');
    }

    if ($_FILES['image2']['error'] === 4) {
        $image2 = "image2";
    } else {
        $image2 = uploud('image2', 'sub');
    }

    if ($_FILES['image3']['error'] === 4) {
        $image3 = "image3";
    } else {
        $image3 = uploud('image3', 'sub');
    }

    if ($_FILES['image4']['error'] === 4) {
        $image4 = "image4";
    } else {
        $image4 = uploud('image4', 'sub');
    }

    $query = "INSERT INTO item (id, name, code, stock, price, type, source, dimensions, material, image, image1, image2, image3, image4) VALUES ('', '$name','$code', '$stock', '$price', '$type', '$source', '$dimensions', '$material', '$image', '$image1', '$image2', '$image3', '$image4')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi uploud
function uploud($name, $folder)
{
    $namaFile = $_FILES[$name]['name'];
    $ukuranFile = $_FILES[$name]['size'];
    $error = $_FILES[$name]['error'];
    $tmpName = $_FILES[$name]['tmp_name'];

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
    move_uploaded_file($tmpName, '../img/' . $folder . '/' . $namaFile);

    return $namaFile;
}


// fungsi untuk mengubah / Update daftar
function update($data)
{
    global $koneksi;

    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $code = htmlspecialchars($data["code"]);
    $stock = htmlspecialchars($data["stock"]);
    $price = htmlspecialchars($data["price"]);
    $type = htmlspecialchars($data["type"]);
    $source = htmlspecialchars($data["source"]);
    $dimensions = htmlspecialchars($data["dimensions"]);
    $material = htmlspecialchars($data["material"]);

    $oldImage = $data["oldImage"];
    $oldImage1 = $data["oldImage1"];
    $oldImage2 = $data["oldImage2"];
    $oldImage3 = $data["oldImage3"];
    $oldImage4 = $data["oldImage4"];

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = uploud('image', 'item');
    }

    if ($_FILES['image1']['error'] === 4) {
        $image1 = $oldImage1;
    } else {
        $image1 = uploud('image1', 'sub');
    }

    if ($_FILES['image2']['error'] === 4) {
        $image2 = $oldImage2;
    } else {
        $image2 = uploud('image2', 'sub');
    }

    if ($_FILES['image3']['error'] === 4) {
        $image3 = $oldImage3;
    } else {
        $image3 = uploud('image3', 'sub');
    }

    if ($_FILES['image4']['error'] === 4) {
        $image4 = $oldImage4;
    } else {
        $image4 = uploud('image4', 'sub');
    }

    $query = "UPDATE item SET image='$image', image1 = '$image1', image2 = '$image2', image3 = '$image3', image4 = '$image4', name = '$name', code = '$code', stock = '$stock', price = '$price', type = '$type', source = '$source', dimensions = '$dimensions', material = '$material' WHERE id = $id";

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
