<?php
require("./config/connection.php");
require("./config/db.php");

$outlet =  $db->getOutletIdentity($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Outlet</title>
    <link rel="stylesheet" href="./src/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body>
    <div class="w-full h-screen flex bg-neutral-100">
        <!-- Sidebar -->
        <div class="w-[20%] h-full p-5">
            <div class="w-full h-full flex rounded-lg flex-col gap-5 p-5 bg-white border border-neutral-200">
                <a href="./outlet_identity.php">
                    <h1 class="text-white bg-neutral-900 border borrder-neutral-300 px-5 py-2 rounded-lg transition-all">Identitas Outlet</h1>
                </a>
                <a href="./manajemen_user.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Manajemen Karyawan</h1>
                </a>
                <a href="./manajemen_barang.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Manajemen Barang</h1>
                </a>
                <a href="./transaksi_penjualan.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Transaksi</h1>
                </a>
                <a href="./laporan.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Laporan</h1>
                </a>

                <a href="./logout.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Logout</h1>
                </a>

            </div>
        </div>
        <!-- Main Content -->
        <div class="w-[80%] h-full p-5">
            <h1 class="text-4xl mb-5 font-bold">Identitas Outlet</h1>
            <div class="flex flex-col w-[60%] p-5 gap-5 bg-white border border-neutral-300 rounded-lg">
                <div class="flex w-full justify-between">
                    <h1 class="font-bold">Nama Pemilik</h1>
                    <h1 class="text-neutral-600"><?= $outlet["nama_pemilik"] ?></h1>
                </div>
                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="flex w-full justify-between">
                    <h1 class="font-bold">Nama Outlet</h1>
                    <h1 class="text-neutral-600"><?= $outlet["nama_outlet"] ?></h1>
                </div>

                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="flex w-full justify-between">
                    <h1 class="font-bold">Nomor Rusaha</h1>
                    <h1 class="text-neutral-600"><?= $outlet["nomor_usaha"] ?></h1>
                </div>

                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="flex w-full justify-between">
                    <h1 class="font-bold">Contact Person</h1>
                    <h1 class="text-neutral-600"><?= $outlet["contact_person"] ?></h1>
                </div>

                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="flex w-full justify-between">
                    <h1 class="font-bold">Alamat</h1>
                    <h1 class="text-neutral-600"><?= $outlet["alamat"] ?></h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>