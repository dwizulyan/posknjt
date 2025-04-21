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
    <div class="w-full h-screen bg-[rgba(0,0,0,0.2)] absolute overflow-hidden edit-barang-page left-0 top-0">
        <form class="absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] w-[30%] h-[50vh] bg-white rounded-lg border border-neutral-300 p-5">
            <div class="w-full h-screen flex flex-col gap-5 relative">
                <h1 class="text-3xl font-bold">Edit Data Barang</h1>
                <div class="flex flex-col gap-1">
                    <label>Barang</label>
                    <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" />
                </div>
                <div class="flex flex-col gap-1">
                    <label>Harga Barang</label>
                    <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" />
                </div>
                <div class="flex flex-col gap-1">
                    <label>Stok</label>
                    <input type="text" class="w-[100%] px-2 py-1 rounded-lg border border-neutral-300 focus:outline-none" />
                </div>
                <div class="flex items-center gap-5">
                    <button class="px-5 py-1 rounded-lg bg-neutral-100 text-neutral-100 hover:cursor-pointer hover:bg-neutral-700 transition-all ">Edit</button>
                    <button class="px-5 py-1 rounded-lg bg-neutral-900 text-neutral-900 hover:cursor-pointer hover:bg-neutral-200 transition-all">Batal</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>