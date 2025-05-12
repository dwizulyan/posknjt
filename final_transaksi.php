<?php
include("./config/connection.php");
include("./config/db.php");
include("./config/utils.php");

session_start();

$_SESSION['keranjang'] = [];

?>
<!doctype html>
<html>

<head>
    <title>Transaksi Sukses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="w-full h-screen flex items-center bg-neutral-100 justify-center print:hidden">
        <div class="w-[450px] p-5 border border-neutral-300 rounded-lg bg-white flex flex-col gap-3">
            <h1>Transaksi Sukses</h1>
            <div class="w-full h-[1px] bg-neutral-300"></div>
            <div class="flex justify-between items-center">
                <h1 class="font-bold">Total Harga</h1>
                <h1 class="text-sm text-neutral-600">Rp<?= $utils->currencyFormat($_SESSION["total_bayar"]) ?></h1>
            </div>
            <div class="flex justify-between items-center">
                <h1 class="font-bold">Uang Bayar</h1>
                <h1 class="text-sm text-neutral-600">Rp<?= $utils->currencyFormat($_SESSION["uang_bayar"]) ?></h1>
            </div>
            <div class="w-full h-[1px] bg-neutral-300"></div>
            <div class="flex justify-between items-center">
                <h1 class="font-bold">Kembalian</h1>
                <h1 class="text-sm text-neutral-600">Rp<?= $utils->currencyFormat($_SESSION['uang_bayar'] - $_SESSION["total_bayar"]) ?></h1>
            </div>
            <a href="./transaksi_penjualan.php">
                <button class="px-5 py-2 border border-neutral-300 text-neutral-900 rounded-lg hover:cursor-pointer hover:bg-neutral-900 hover:text-white transition-all">Kembali</button>
            </a>
        </div>
    </div>
</body>

</html>