<?php
include("./config/connection.php");
include("./config/db.php");
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true && !isset($_SESSION["username"]) && !isset($_SESSION['email']))
{
    header("Location:./login.php");
}

$outlet = $db->getOutletIdentity($connect);
?>
<!doctype html>
<html>

<head>
    <title>Jeki's Outlet</title>
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
            <div class="w-full h-full flex rounded-lg relative flex-col gap-5 p-5 bg-white border border-neutral-200">
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
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Transaksi</h1>
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
        <div class="w-[80%] h-full  p-5">
            <h1 class="text-3xl">Halo <?= $_SESSION['username'] ?>, Selamat datang di toko <?= $outlet["nama_outlet"] ?></h1>
        </div>
    </div>
</body>

</html>