<?php
include("../config/connection.php");
include("../config/db.php");
session_start();

$id = $_SESSION['id'];
$barang = $db->getBarangById($connect, $id);

if (isset($_POST["simpan"]))
{
    $namaBarang = $_POST['nama_barang'];
    $stokBarang = $_POST['stok_barang'];
    $hargaBarang = $_POST['harga_barang'];
    $currDate = date("Y-m-d");
    try
    {

        $db->updateBarang($connect, $id, $namaBarang, $hargaBarang, $stokBarang, $currDate);
        header("Location:../manajemen_barang.php");
    }
    catch (Exception $err)
    {
        echo $err;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w-full h-screen bg-neutral-100 p-5 flex items-center justify-center">
        <div class="w-[50%] h-max p-5 flex flex-col bg-white rounded-lg border border-neutral-300 gap-5 relative">
            <h1 class="text-3xl font-bold">Edit Data Barang</h1>
            <div class="flex flex-col gap-1">
                <label>Nama Barang</label>
                <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" placeholder="<?= $barang[0]['nama_barang'] ?>" value="<?= $barang[0]['nama_barang'] ?>" name="nama_barang" />
            </div>
            <div class="flex flex-col gap-1">
                <label>Harga Barang</label>
                <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" placeholder="<?= $barang[0]['harga'] ?>" value="<?= $barang[0]['harga'] ?>" name="harga_barang" />
            </div>
            <div class="flex flex-col gap-1">
                <label>Stok</label>
                <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" placeholder="<?= $barang[0]['stok_barang'] ?>" value="<?= $barang[0]['stok_barang'] ?>" name="stok_barang" />
            </div>
            <div class="flex items-center gap-5">
                <button type="submit" name="simpan" class="px-5 py-1 rounded-lg border border-neutral-900 text-neutral-900 hover:cursor-pointer hover:bg-neutral-900 hover:text-white transition-all ">Edit</button>
                <a href="../manajemen_barang.php">
                    <button type="button" class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-100 hover:cursor-pointer hover:bg-neutral-700 transition-all">Batal</button>
                </a>
            </div>
        </div>
    </form>
    </div>
</body>

</html>