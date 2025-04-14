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
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Manajemen Karyawan</h1>
                </a>
                <a href="./manajemen_barang.php">
                    <h1 class="text-neutral-900 bg-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Manajemen Barang</h1>
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
        <div class="w-[80%] h-full p-5 overflow-y-scroll">
            <h1 class="text-4xl font-bold mb-5">Manajemen Barang</h1>
            <div class="w-full h-full bg-white rounded-lg border-neutral-300 border p-5 flex flex-col gap-2">
                <div class="grid grid-cols-5">
                    <h1 class="font-bold">Id Barang</h1>
                    <h1 class="font-bold">Nama Barang</h1>
                    <h1 class="font-bold">Stok Barang</h1>
                    <h1 class="font-bold">Harga Barang</h1>
                    <h1 class="font-bold">Aksi</h1>
                </div>

                <div class="w-full h-[1px] bg-neutral-300"></div>
                <div class="grid grid-cols-5">
                    <h1 class="">1543231</h1>
                    <h1 class="">Burger Bangor</h1>
                    <h1 class="">15</h1>
                    <h1 class="">15000</h1>
                    <div class="">
                        <button class="px-5 py-1 rounded-lg bg-neutral-100 text-neutral-900 hover:cursor-pointer hover:bg-neutral-200 transition-all display-edit">Edit</button>
                        <button class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-100 hover:cursor-pointer hover:bg-neutral-700 transition-all">Hapus</button>
                    </div>
                </div>

                <div class="w-full h-[1px] bg-neutral-300"></div>
            </div>
        </div>

    </div>
    <div class="w-full h-screen bg-[rgba(0,0,0,0.2)] absolute overflow-hidden edit-barang-page hidden left-0 top-0">
        <form class="absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] w-[30%] h-[50vh] bg-white rounded-lg border border-neutral-300 p-5">
            <div class="w-full h-screen flex flex-col gap-5 relative">
                <h1 class="text-3xl font-bold">Edit Data Karyawan</h1>
                <div class="flex flex-col gap-1">
                    <label>Nama Karyawan</label>
                    <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" />
                </div>
                <div class="flex flex-col gap-1">
                    <label>Nomor Karyawan</label>
                    <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" />
                </div>
                <div class="flex flex-col gap-1">
                    <label>Jabatan</label>
                    <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" />
                </div>
                <div class="flex items-center gap-5">
                    <button class="px-5 py-1 rounded-lg bg-neutral-100 text-neutral-900 hover:cursor-pointer hover:bg-neutral-200 transition-all ">Edit</button>
                    <button class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-100 hover:cursor-pointer hover:bg-neutral-700 transition-all">Batal</button>
                </div>
            </div>
            <div class="absolute right-5 top-5 rounded-full bg-neutral-900 w-[25px] h-[25px] flex items-center justify-center text-white hover:cursor-pointer hover:bg-neutral-700 transition-all close-edit">x</div>
        </form>
    </div>
    <script src="./script/manajemen_barang.js"></script>
</body>

</html>