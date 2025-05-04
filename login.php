<?php
require("./config/connection.php");
require("./config/db.php");
session_start();

if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $db->getUserLogin($connect, $username, $password);
    if (count($user) > 0)
    {
        $_SESSION['isLogin'] = true;
        $_SESSION['username'] = $user[0]["username"];
        $_SESSION['email'] = $user[0]["email"];
        $_SESSION['role'] = $user[0]['roleType'];
        header("Location:./");
    }
    else
    {
        echo "Something went wrong";
    }
}
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
    <div class='w-full h-screen flex bg-neutral-100 items-center justify-center'>
        <form class="w-[40%]" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="w-full p-5 bg-white border border-neutral-300 rounded-lg flex flex-col gap-3">
                <h1 class="text-4xl font-bold">Login</h1>
                <div class="flex flex-col gap-1">
                    <label>Username</label>
                    <input type='text' class="focus:outline-neutral-300 px-3 py-1 border border-neutral-300 rounded-lg" name="username" />
                </div>
                <div class="flex flex-col gap-1">
                    <label>Password</label>
                    <input type='password' class="focus:outline-neutral-300 px-3 py-1 border border-neutral-300 rounded-lg" name="password" />
                </div>
                <button type="submit" name="login" class="px-5 py-2 hover:text-white hover:bg-neutral-900 rounded-lg border border-neutral-900 text-neutral-900 hover:cursor-pointer transition-all">Masuk</button>
            </div>
        </form>
    </div>

</body>

</html>