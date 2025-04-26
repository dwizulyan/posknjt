<?php
include("../config/connection.php");
include("../config/db.php");
session_start();
$userId = $_SESSION['id'];
$user = $db->getKaryawanById($connect, $userId);

if (isset($_POST['simpan']))
{
    $currDate = date("Y-m-d");
    $namaKaryawan = $_POST["nama_karyawan"];
    $nomorHp =  $_POST["nomor_hp"];
    $jabatan = $_POST["jabatan"];
    try
    {
        $db->updateKaryawan($connect, $userId, $namaKaryawan, $nomorHp, $jabatan, $currDate);
        header("Location:../manajemen_user.php");
    }
    catch (Exception $err)
    {
        echo $err;
    }
}

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body>
    <form class="w-full h-screen flex flex-col items-center justify-center bg-neutral-100" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="w-[50%]  flex flex-col gap-5 bg-white p-5 rounded-lg border border-neutral-300">
            <h1 class="text-3xl font-bold">Edit Data Karyawan</h1>
            <div class="flex flex-col gap-1">
                <label>Nama Karyawan</label>
                <input placeholder="<?= $user[0]["nama_karyawan"] ?>" value="<?= $user[0]["nama_karyawan"] ?>" type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" name="nama_karyawan" />
            </div>
            <div class="flex flex-col gap-1">
                <label>Nomor HP</label>
                <input placeholder="<?= $user[0]["nomor_hp"] ?>" value="<?= $user[0]["nomor_hp"] ?>" type=" text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" name="nomor_hp" />
            </div>
            <div class="flex flex-col gap-1">
                <label>Jabatan</label>
                <input placeholder="<?= $user[0]["jabatan"] ?>" value="<?= $user[0]["jabatan"] ?>" type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" name="jabatan" />
            </div>
            <div class="flex items-center gap-5">
                <button type="submit" name="simpan" class="px-5 py-1 rounded-lg border border-neutral-300 text-neutral-900 hover:cursor-pointer hover:bg-neutral-900 hover:text-neutral-100 transition-all ">Simpan</button>
                <a href="../manajemen_user.php">
                    <button type="button" class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-100 hover:cursor-pointer hover:bg-neutral-800 transition-all">Batal</button>
                </a>
            </div>
        </div>
    </form>
</body>

</html>