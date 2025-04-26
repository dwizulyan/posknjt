<?php
include("./config/connection.php");
include("./config/db.php");
session_start();
if (isset($_GET['edit']))
{
    $_SESSION['id'] = $_GET['id'];
    header("Location:./edit/edit_barang.php");
}
$barang = $db->getBarang($connect);

?>
<!doctype html>
<html>

<head>
    <title>Manajemen Barang</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
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
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Identitas Outlet</h1>
                </a>
                <a href="./manajemen_user.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Manajemen Karyawan</h1>
                </a>
                <a href="./manajemen_barang.php">
                    <h1 class="text-white bg-neutral-900 border borrder-neutral-300 px-5 py-2 rounded-lg transition-all">Manajemen Barang</h1>
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
        <div class="w-[80%] h-full p-5 overflow-y-scroll">
            <div class="flex items-center justify-between">
                <h1 class="text-4xl font-bold mb-5">Manajemen Barang</h1>
                <a href="./tambah/tambah_barang.php">
                    <button class="border border-neutral-900 text-neutral-900 px-4 py-1 hover:bg-neutral-900 hover:text-white hover:cursor-pointer transition-all rounded-lg">Tambah Data</button>
                </a>
            </div>
            <div class="w-full h-full bg-white rounded-lg border-neutral-300 border p-5 flex flex-col gap-2">
                <div class="grid grid-cols-5">
                    <h1 class="font-bold">Id Barang</h1>
                    <h1 class="font-bold">Nama Barang</h1>
                    <h1 class="font-bold">Stok Barang</h1>
                    <h1 class="font-bold">Harga Barang</h1>
                    <h1 class="font-bold">Aksi</h1>
                </div>

                <div class="w-full h-[1px] bg-neutral-300"></div>
                <?php if (count($barang) > 0): ?>
                    <?php foreach ($barang as $barang): ?>
                        <div class="grid grid-cols-5">
                            <h1 class=""><?= $barang['id'] ?></h1>
                            <h1 class=""><?= $barang['nama_barang'] ?></h1>
                            <h1 class=""><?= $barang["stok_barang"] ?></h1>
                            <h1 class=""><?= $barang['harga'] ?></h1>
                            <div class="flex gap-2 items-center">
                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="id" value="<?= $barang['id'] ?>">
                                    <button type="submit" name="edit" class="px-5 py-1 rounded-lg border border-neutral-900 hover:text-white hover:bg-neutral-900 text-neutral-900 hover:cursor-pointer  transition-all display-edit">Edit</button>
                                </form>
                                <form action="./hapus/hapus_barang.php" method="post">
                                    <input type="hidden" value="<?= $barang["id"] ?>" name="id">
                                    <button class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-100 hover:cursor-pointer hover:bg-neutral-700 transition-all">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-full h-[1px] bg-neutral-300"></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h1>Tidak ada barang tersedia</h1>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <script src="./script/manajemen_barang.js"></script>
</body>

</html>