<?php

// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "kasir");

// function untuk menampilkan
function tampil($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function untuk menambah data admin
function tambahAdmin($data)
{
    global $koneksi;
    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO admin VAlUES ('', '$username', '$password')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi untuk menghapus data / Delete admin
function hapusAdmin($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM admin WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
// fungsi untuk manambahkan daftar
function tambahDaftar($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);

    // uploud gamabr
    $gambar = uploud();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO daftar VALUES ('', '$gambar','$nama', '$stok', '$harga')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi uploud
function uploud()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

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
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../img/daftar/' . $namaFileBaru);

    return $namaFileBaru;
}

// fungsi untuk mengubah / Update daftar
function ubah($data)
{
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploud();
    }

    $query = "UPDATE daftar SET gambar='$gambar', nama = '$nama', stok = '$stok', harga = '$harga' WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi untuk menghapus data / Delete daftar
function hapusDaftar($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM daftar WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
