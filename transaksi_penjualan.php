<?php
include("./config/connection.php");
include("./config/db.php");
include("./config/utils.php");
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true && !isset($_SESSION["username"]) && !isset($_SESSION['email']))
{
    header("Location:./login.php");
}

$produk = $db->getBarang($connect);
$total = 0;

$transaksi = $db->getTransaction($connect);

if (isset($_POST['buat_transaksi']))
{
    $_SESSION["errMsg"] = [];
    $tanggalPembelian = $_POST['tanggal_pembelian'];
    $barangDibeli = $_POST['kuantitas'];
    $namaPembeli = $_POST['nama_pembeli'];

    foreach ($barangDibeli as $key => $qty)
    {
        foreach ($produk as $barang)
        {
            if ($barang['id'] == $key)
            {
                if ($barang['stok_barang'] < $qty)
                {
                    $_SESSION["errMsg"][] = "Pesanan " . $barang['nama_barang'] . " melebihi stok";
                }
            }
        }
    }
    if (count($_SESSION["errMsg"]) == 0)
    {
        $_SESSION['errMsg'] = [];
        $_SESSION['keranjang'] = [
            "nama_pembeli" => $namaPembeli,
            "barang_dibeli" => $barangDibeli,
            "tanggal_pembelian" => $tanggalPembelian
        ];
        header("Location:./konfirmasi_pembelian.php");
    }
}

?>
<!doctype html>
<html>

<head>
    <title>Transaksi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="overflow-x-hidden">
    <?php if (count($_SESSION['errMsg']) > 0): ?>
        <div class="absolute w-[50%] flex flex-col gap-3  top-0 p-5  z-[99] animate-error">
            <?php foreach ($_SESSION["errMsg"] as $err): ?>
                <h1 class="text-red-900 bg-red-300 border border-red-700 px-3 py-2 rounded-lg ">Peringatan : <?= $err ?></h1>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="w-full h-screen flex bg-neutral-100">

        <!-- Sidebar -->
        <div class="w-[20%] h-full p-5">
            <div class="w-full h-full flex rounded-lg flex-col gap-5 p-5 relative bg-white border border-neutral-200">
                <a href="./outlet_identity.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Identitas Outlet</h1>
                </a>
                <a href="./manajemen_karyawan.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Manajemen Karyawan</h1>
                </a>
                <a href="./manajemen_barang.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Manajemen Barang</h1>
                </a>
                <a href="./transaksi_penjualan.php">
                    <h1 class="text-white bg-neutral-900 border borrder-neutral-300 px-5 py-2 rounded-lg transition-all">Transaksi</h1>
                </a>
                <a href="./laporan.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Laporan</h1>
                </a>
                <a href="./user_profile.php">
                    <div class="px-3 py-3 w-full absolute left-0 bottom-0 rounded-bl-lg rounded-br-lg bg-neutral-950 flex items-center gap-3 cursor-pointer hover:bg-neutral-800">
                        <div class="w-[30px] h-[30px] rounded-full bg-neutral-100"></div>
                        <h1 class="font-bold text-sm text-neutral-100"><?= $_SESSION['username'] ?></h1>
                    </div>
                </a>
            </div>
        </div>
        <!-- Main Content -->
        <div class="w-[80%] h-full p-5 overflow-y-scroll">
            <h1 class="text-4xl font-bold">Transaksi Penjualan</h1>
            <div class="flex gap-2 items-center">
                <button class="btn-tampil-transaksi bg-white rounded-lg px-4 py-2 border border-neutral-300 hover:bg-neutral-900 hover:text-white hover:cursor-pointer transaction-all mt-5">Transaksi Baru</button>
                <button class="btn-tampil-histori bg-white rounded-lg px-4 py-2 border border-neutral-300 hover:bg-neutral-900 hover:text-white hover:cursor-pointer transaction-all mt-5">History Transaksi</button>
            </div>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="form-transaksi hidden">
                <div class="flex flex-col gap-5 w-full mt-5 p-5 bg-white rounded-lg border border-neutral-300">
                    <h1 class="text-4xl font-bold">Transaksi Baru</h1>
                    <div class="flex justify-between items-center gap-5">
                        <div class="flex flex-col gap-1 w-[50%]">
                            <label for="">Nama Pembeli</label>
                            <input type="text" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none" name="nama_pembeli" />
                        </div>
                        <div class="flex flex-col gap-1 w-[50%]">
                            <label for="">Tanggal Pembelian</label>
                            <input type="date" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none" value="<?= date("Y-m-d") ?>" name="tanggal_pembelian" />
                        </div>

                    </div>
                    <div class="flex flex-col gap-1">
                        <h1>List Produk</h1>
                        <div class="grid grid-cols-5 gap-5">
                            <?php foreach ($produk as $produk): ?>
                                <div class="w-[125px] flex flex-col gap-3">
                                    <div class="w-[125px] h-[125px] bg-neutral-300 rounded-lg"></div>
                                    <h1 class="text-center"><?= $produk["nama_barang"] ?></h1>
                                    <h1 class="text-sm text-neutral-400 text-center">Stok : <?= $produk['stok_barang'] ?></h1>
                                    <input type="number" name="kuantitas[<?= $produk["id"] ?>]" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none w-[125px] text-center" value="0" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button class="px-3 py-1 border border-neutral-300 bg-white rounded-lg hover:bg-neutral-900 hover:text-white hover:cursor-pointer transition-all" name="buat_transaksi">Buat Transaksi</button>
                </div>
            </form>
            <div class="w-full grid grid-cols-2 mt-5 gap-5 history ">
                <?php foreach ($transaksi as $transaksi)
                { ?>
                    <div class="p-5 bg-white rounded-lg border border-neutral-300  gap-2 flex flex-col">
                        <div class="flex items-start justify-between">
                            <h1 class="font-bold">Pembelian oleh</h1>
                            <h1 class="text-neutral-600"><?= $transaksi['nama_pembeli'] ?></h1>
                        </div>
                        <div class="flex items-start justify-between">
                            <h1 class="font-bold">Tanggal Pembelian</h1>
                            <h1 class="text-neutral-600"><?= $transaksi['tanggal_pembelian'] ?></h1>
                        </div>
                        <div class="w-full h-[1px] bg-neutral-300"></div>
                        <div class="w-full grid grid-cols-4">
                            <h1>Nama Barang</h1>
                            <h1 class="text-right">Harga</h1>
                            <h1 class="text-right">Kuantitas</h1>
                            <h1 class="text-right">Total</h1>
                        </div>
                        <div class="w-full h-[1px] bg-neutral-100"></div>
                        <?php foreach ($transaksi['barang_dibeli'] as $barang)
                        { ?>
                            <?php $total += $barang['harga'] ?>
                            <div class="w-full grid grid-cols-4">
                                <h1 class=" text-neutral-600 text-sm"><?= $barang['nama_barang'] ?></h1>
                                <h1 class="text-right text-neutral-600 text-sm">Rp<?= $utils->currencyFormat($barang['harga']) ?></h1>
                                <h1 class="text-right text-neutral-600 text-sm"><?= $barang['kuantitas'] ?></h1>
                                <h1 class="text-right text-neutral-600 text-sm">Rp<?= $utils->currencyFormat($barang['harga'] * $barang['kuantitas']) ?></h1>
                            </div>
                        <?php } ?>
                        <div class="w-full h-[1px] bg-neutral-300"></div>
                        <div class="flex justify-between">
                            <h1 class="font-bold text-sm">Total Biaya</h1>
                            <h1 class="text-sm text-neutral-600">Rp<?= $utils->currencyFormat($total) ?></h1>
                        </div>
                        <div class="flex justify-between">
                            <h1 class="font-bold text-sm">Membayar</h1>
                            <h1 class="text-sm text-neutral-600">Rp<?= $utils->currencyFormat($transaksi['uang_bayar']) ?></h1>
                        </div>
                        <div class="flex justify-between">
                            <h1 class="font-bold text-sm">Kembalian</h1>
                            <h1 class="text-sm text-neutral-600">Rp<?= $utils->currencyFormat($transaksi['uang_bayar'] - $total) ?></h1>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="./app.js"></script>
</body>

</html>