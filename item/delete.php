<?php
require '../function/functions-item.php';
$id = $_GET["item_id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = '../index.php';
        </script>
        ";
};
