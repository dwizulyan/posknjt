<?php
include("./config/connection.php");
include("./config/db.php");
include("./config/utils.php");

session_start();

$keranjang = $_SESSION['keranjang'];
$detailBarang = [];

$ambilBarang = $db->getBarang($connect);
$total = 0;

foreach ($keranjang['barang_dibeli'] as $key => $qty)
{
    foreach ($ambilBarang as $barang)
    {
        if ($barang['id'] == $key)
        {
            $detailBarang[] = [
                "id_barang" => $barang['id'],
                "nama_barang" => $barang['nama_barang'],
                "harga_barang" => $barang['harga'],
                "kuantitas_beli" => $qty,
            ];
        }
    }
}

if (isset($_POST['konfirmasi']))
{
    $totalBayar = $_POST['total_bayar'];
    $uangBayar = $_POST['uang_bayar'];
    $namaPembeli = $keranjang['nama_pembeli'];
    $tanggalBeli = $keranjang['tanggal_pembelian'];
    $barangDibeli = $detailBarang;
    echo $db->tambahTransaksi($connect, $namaPembeli, $tanggalBeli, $uangBayar, $totalBayar, $barangDibeli);
    $_SESSION['uang_bayar'] = $uangBayar;
    $_SESSION['total_bayar'] = $totalBayar;
    header("Location:./final_transaksi.php");
}



?>
<!doctype html>
<html>

<head>
    <title>Konfirmasi Transaksi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="w-full h-screen flex items-center bg-neutral-100 justify-center print:hidden">
        <div class="w-[450px] p-5 rounded-lg flex flex-col bg-white border border-neutral-300">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="w-full">
                    <h1 class="text-center text-xl font-bold">Detail Transaksi</h1>
                    <div class="my-3 w-full h-[1px] bg-neutral-300"></div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-neutral-500">Atas Nama : <?= $keranjang['nama_pembeli'] ?></h1>
                        <h1 class="text-neutral-500"><?= $keranjang['tanggal_pembelian'] ?></h1>
                    </div>
                    <div class="my-3 w-full h-[1px] bg-neutral-300"></div>
                    <div class="grid grid-cols-4">
                        <h1 class="text-left text-sm">Barang</h1>
                        <h1 class="text-right text-sm">Harga</h1>
                        <h1 class="text-right text-sm">Kuantitas</h1>
                        <h1 class="text-right text-sm">Total</h1>
                    </div>
                    <div class="my-3 w-full h-[1px] bg-neutral-100"></div>
                    <?php foreach ($detailBarang as $barang): ?>
                        <?php $total += ($barang["harga_barang"] * $barang['kuantitas_beli']) ?>
                        <div class="grid grid-cols-4">
                            <h1 class="text-left text-sm text-neutral-500"><?= $barang['nama_barang'] ?></h1>
                            <h1 class="text-right text-sm text-neutral-500">Rp<?= $utils->currencyFormat($barang["harga_barang"]) ?></h1>
                            <h1 class="text-right text-sm text-neutral-500"><?= $barang["kuantitas_beli"] ?></h1>
                            <h1 class="text-right text-sm text-neutral-500">Rp<?= $utils->currencyFormat($barang['harga_barang'] * $barang['kuantitas_beli']) ?></h1>
                        </div>
                        <div class="my-2 w-full h-[1px] bg-neutral-100"></div>

                    <?php endforeach; ?>
                    <div class="flex items-center justify-between">
                        <h1 class="text-sm font-bold">Total Harga</h1>
                        <input type="hidden" name="total_bayar" value="<?= $total ?>">
                        <h1 class="text-sm text-neutral-500">Rp<?= $utils->currencyFormat($total) ?></h1>
                    </div>
                    <div class="mt-3 flex items-center justify-between">
                        <h1 class="text-sm font-bold">Uang Bayar</h1>
                        <input type="number" class="text-sm px-3 py-1 border border-neutral-300 bg-neutral-100 rounded-lg text-right" required name="uang_bayar">
                    </div>
                    <button type="submit" name="konfirmasi" class="px-3 py-2 mt-5 rounded-lg hover:bg-neutral-900 hover:text-white hover:cursor-pointer w-full transition-all border border-neutral-300">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>