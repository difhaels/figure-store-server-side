<?php
require '../function/functions.php';
$id = $_GET['id'];

$query = "UPDATE `transaction` SET `status` = 'sedang diproses!' WHERE `transaction`.`id` = $id;";
mysqli_query($koneksi, $query);
header("Location: transaction.php");
exit;
