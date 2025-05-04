<?php
include("./config/connection.php");
include("./config/db.php");

$karyawan = $db->getKaryawan($connect);

session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true && !isset($_SESSION["username"]) && !isset($_SESSION['email']))
{
    header("Location:./login.php");
}
if (isset($_GET["edit"]))
{
    $_SESSION['id'] = $_GET['id'];
    header("Location:./edit/edit_data_user.php");
}


?>
<!doctype html>
<html>

<head>
    <title>Manajemen Karyawan</title>
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
            <div class="w-full h-full flex rounded-lg flex-col relative gap-5 p-5 bg-white border border-neutral-200">
                <a href="./outlet_identity.php">
                    <h1 class="text-neutral-700 border border-neutral-300 px-5 py-2 rounded-lg hover:bg-neutral-900 hover:text-white transition-all">Identitas Outlet</h1>
                </a>
                <a href="./manajemen_karyawan.php">
                    <h1 class="text-white bg-neutral-900 border borrder-neutral-300 px-5 py-2 rounded-lg transition-all">Manajemen Karyawan</h1>
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
        <!-- Main Content -->
        <div class="w-[80%] h-full p-5  overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-4xl font-bold mb-5">Manajemen Karyawan</h1>
                <?php if ($_SESSION['role'] == "admin"): ?>
                    <a href="./tambah/tambah_karyawan.php">
                        <button class="border border-neutral-900 text-neutral-900 px-4 py-1 hover:bg-neutral-900 hover:text-white hover:cursor-pointer transition-all rounded-lg">Tambah Data</button>
                    </a>
                <?php endif ?>
            </div>
            <div class="w-full h-full bg-white p-5 border border-neutral-300 rounded-lg flex flex-col gap-2">
                <div class="grid grid-cols-12">
                    <h1 class="col-span-1 font-bold">Id</h1>
                    <h1 class="col-span-3 font-bold">Nama</h1>
                    <h1 class="col-span-3 font-bold">Nomor Hp</h1>
                    <h1 class="col-span-2 font-bold">Status</h1>
                    <h1 class="col-span-2 font-bold">Aksi</h1>
                </div>
                <div class="w-full h-[1px] bg-neutral-300"></div>
                <?php if (count($karyawan) > 0): ?>
                    <?php foreach ($karyawan as $value): ?>
                        <div class="grid grid-cols-12">
                            <h1 class="col-span-1"><?= $value["id"] ?></h1>
                            <h1 class="col-span-3"><?= $value["nama_karyawan"] ?></h1>
                            <h1 class="col-span-3"><?= $value["nomor_hp"] ?></h1>
                            <h1 class="col-span-2"><?= $value["jabatan"] ?></h1>
                            <?php if ($_SESSION["role"] == "admin"): ?>
                                <div class="col-span-2 flex items-center gap-1">
                                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                                        <input type="hidden" value=<?= $value['id'] ?> name="id" />
                                        <button class="px-5 py-1 rounded-lg border border-neutral-900 transition-all display-edit hover:text-white hover:bg-neutral-900 hover:cursor-pointer" type="submit" name="edit">Edit</button>
                                    </form>
                                    <form action="./hapus/hapus_karyawan.php" method="post">
                                        <input type="hidden" value="<?= $value["id"] ?>" name="id">
                                        <button class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-100 hover:cursor-pointer hover:bg-neutral-700 transition-all">Hapus</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <h1>Anda bukan admin</h1>
                            <?php endif ?>
                        </div>
                        <div class="w-full h-[1px] bg-neutral-300"></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h1>Tidak ditemukan data karyawan</h1>
                <?php endif; ?>
            </div>
        </div>
        <script src="./script/manajemen_user.js"></script>
</body>

</html>