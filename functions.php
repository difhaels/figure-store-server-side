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

// untuk menambah data admin
function tambahAdmin($data)
{
    global $koneksi;
    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO admin VAlUES ('', '$username', '$password')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
