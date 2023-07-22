<?php
require '../function/functions.php';

// function untuk menambah data admin
function create($data)
{
    global $koneksi;
    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO admin VAlUES ('', '$username', '$password')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi untuk menghapus data / Delete admin
function delete($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM admin WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
