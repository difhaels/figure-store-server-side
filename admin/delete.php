<?php
require '../function/functions.php';
require '../function/functions-admin.php';
$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'admin.php';
        </script>
        ";
};
