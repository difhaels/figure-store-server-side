<?php
require '../function/functions.php';
$id = $_GET["id"];

if (hapusAdmin($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'admin.php';
        </script>
        ";
};