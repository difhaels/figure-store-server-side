<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
    die;
}
require '../function/functions.php';

$transactions = read("SELECT * FROM transaction");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-slate-200 ">
    <nav>
        <a href="../index.php">
            <img src="../img/icon/back.png" alt="back" class="nav-a">
        </a>
        <div class="flex gap-6">
            <a href="transaction.php">
                <img src="../img/icon/pemesanan.png" class="nav-a">
            </a>
            <a href="../item/create.php">
                <img src="../img/icon/create.png" class="nav-a">
            </a>
            <a href="admin.php">
                <img src="../img/icon/admin.png" class="nav-a">
            </a>
            <a href="../index.php">
                <img src="../img/icon/logout.png" class="nav-a">
            </a>
        </div>
    </nav>

    <div class="py-20">
        <?php foreach ($transactions as $transaction) : ?>
            <div class="bg-white w-[80%] lg:w-[35%] mx-auto px-3 py-4 rounded-lg my-5">
                <div class="flex items-center relative">
                    <img src="../img/item/<?= $transaction['item_image'] ?>" alt="<?= $transaction['item_name'] ?>" class="h-16">
                    <h1 class="pl-3"><?= $transaction['item_name'] ?></h1>
                    <h1 class="font-bold absolute right-3">Rp<?= number_format($transaction['item_price'], 0, ',', '.'); ?></h1>
                </div>

                <div class="bg-slate-200 h-[1px] w-[100%] mx-auto my-3"></div>

                <div>
                    <h1><strong>Ordered by :</strong> <?= $transaction["transaction_name"] ?></h1>
                    <h1><strong>Contact :</strong> <?= $transaction["transaction_notlp"] ?></h1>
                    <strong>Address : </strong>
                    <h1><?= $transaction["transaction_alamat"] ?></h1>
                </div>

                <div class="bg-slate-200 h-[1px] w-[100%] mx-auto my-3"></div>

                <div class="flex justify-between">
                    <a href="transfer.php?ti=<?= $transaction['transaction_info'] ?>&tn=<?= $transaction['transaction_name'] ?>" class="button-yellow">Bukti transfer</a>
                    <a href="confirm.php?id=<?= $transaction['id'] ?>" class="button-green">Confirm</a>
                </div>

                <div class="bg-slate-200 h-[1px] w-[100%] mx-auto my-3"></div>


                <?php
                $textColor = "";
                $transaction["status"] === "sedang diproses!" ? $textColor = "text-green-500" :  $textColor =  "";
                ?>
                <h1 class="inline">Status : </h1>
                <h1 class="<?= $textColor ?> inline"><?= $transaction['status'] ?></h1>
            </div>
        <?php endforeach; ?>
        <?php if (!$transactions) : ?>
            <h1>Tidak ada pesanan!</h1>
        <?php endif; ?>
    </div>
</body>

</html>