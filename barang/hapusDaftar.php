<?php
require '../function/functions.php';
$id = $_GET["id"];

if (hapusDaftar($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = '../index.php';
        </script>
        ";
};
