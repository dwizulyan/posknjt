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
                    <h1 class="text-neutral-900 bg-neutral-100 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Manajemen Barang</h1>
                </a>


                <a href="./transaksi_penjualan.php">
                    <h1 class="text-neutral-900 bg-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-300 transition-all">Transaksi</h1>
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
            <h1 class="text-4xl font-bold">Transaksi Penjualan</h1>
            <div class="flex gap-2 items-center">
                <button class="btn-tampil-transaksi bg-white rounded-lg px-4 py-2 border border-neutral-300 hover:bg-neutral-200 hover:cursor-pointer transaction-all mt-5">Transaksi Baru</button>
                <button class="btn-tampil-histori bg-white rounded-lg px-4 py-2 border border-neutral-300 hover:bg-neutral-200 hover:cursor-pointer transaction-all mt-5">Histor Transaksi</button>
            </div>
            <form class="form-transaksi hidden">
                <div class="flex flex-col gap-3 w-[60%] mt-5 p-5 bg-neutral-200 rounded-lg">
                    <div class="flex flex-col gap-1">
                        <label for="">Nama Pembeli</label>
                        <input type="text" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Barang Yang Dibeli</label>
                        <input type="text" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Kuantitas</label>
                        <input type="number" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Tanggal Pembelian</label>
                        <input type="date" class="px-2 py-1 rounded-lg bg-white text-neutral-900 border border-neutral-300 focus:outline-none" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">Kasir</label>
                        <select name="" id="" class="bg-white px-2 py-1 border border-neutral-300 rounded-lg">
                            <option value="1">Kasir 1</option>
                            <option value="2">Kasir 2</option>
                            <option value="3">Kasir 3</option>
                        </select>

                    </div>
                    <button class="px-3 py-1 border border-neutral-300 bg-white rounded-lg hover:bg-neutral-300 hover:cursor-pointer transition-all">Buat</button>
                </div>
            </form>
            <div class="w-full grid grid-cols-3 mt-5 gap-5 history hidden">
                <div class="h-[200px] bg-white rounded-lg border border-neutral-300"></div>
                <div class="h-[200px] bg-white rounded-lg border border-neutral-300"></div>
                <div class="h-[200px] bg-white rounded-lg border border-neutral-300"></div>
                <div class="h-[200px] bg-white rounded-lg border border-neutral-300"></div>
            </div>
        </div>
    </div>
    <script src="./app.js"></script>
</body>

</html>