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
