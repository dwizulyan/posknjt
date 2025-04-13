<?php
include("./config/connection.php");
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="w-full h-screen flex bg-neutral-100">
        <div class="w-[20%] h-full p-5">
            <div class="w-full h-full flex rounded-lg flex-col gap-5 p-5 bg-white border border-neutral-200">
                <a href="./outlet_identity.php">
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Identitas Outlet</h1>
                </a>
                <a href="./manajemen_user.php">
                    <h1 class="text-neutral-900 bg-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Manajemen Karyawan</h1>
                </a>
                <a href="./manajemen_barang.php">
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Manajemen Barang</h1>
                </a>
                <a href="./transaksi_penjualan.php">
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Transaksi</h1>
                </a>
                <a href="./ubah_password.php">
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Ubah Password</h1>
                </a>
                <a href="./laporan.php">
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Laporan</h1>
                </a>

                <a href="./logout.php">
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Logout</h1>
                </a>

            </div>
        </div>
        <div class="w-[80%] h-full p-5  overflow-y-scroll">
            <h1 class="text-4xl font-bold mb-5">Manajemen Karyawan</h1>
            <div class="w-full h-full bg-white p-5 border border-neutral-300 rounded-lg flex flex-col gap-2">
                <div class="grid grid-cols-12">
                    <h1 class="col-span-1 font-bold">Id</h1>
                    <h1 class="col-span-3 font-bold">Nama</h1>
                    <h1 class="col-span-3 font-bold">Nomor Hp</h1>
                    <h1 class="col-span-3 font-bold">Status</h1>
                    <h1 class="col-span-2 font-bold">Aksi</h1>
                </div>
                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="grid grid-cols-12">
                    <h1 class="col-span-1">1</h1>
                    <h1 class="col-span-3">Wapol</h1>
                    <h1 class="col-span-3">132-321-545-455</h1>
                    <h1 class="col-span-3">Kasir</h1>
                    <h1 class="col-span-2">Edit | Hapus</h1>
                </div>
                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="grid grid-cols-12">
                    <h1 class="col-span-1">2</h1>
                    <h1 class="col-span-3">Morgan</h1>
                    <h1 class="col-span-3">132-321-342-455</h1>
                    <h1 class="col-span-3">Staff Gudang</h1>
                    <h1 class="col-span-2">Edit | Hapus</h1>
                </div>
                <div class="w-full h-[1px] bg-neutral-300"></div>
            </div>
        </div>
</body>

</html>