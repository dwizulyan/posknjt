<?php
include("./config/connection.php");
include("./config/db.php");

$karyawan = $db->getKaryawan($connect);

session_start();

if (isset($_POST["register"]))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    try
    {
        $req = $db->tambahUserLogin($connect, $username, $email, $password);
        header("Location:./login.php");
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
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="bg-neutral-100 flex w-full h-screen items-center justify-center">
            <div class="w-[50%] p-5 bg-white border border-neutral-300 rounded-lg flex flex-col gap-5">
                <h1 class="text-3xl font-bold">Register</h1>
                <div class="flex flex-col gap-1">
                    <label>Email</label>
                    <input type='email' class="focus:outline-neutral-300 px-3 py-1 border border-neutral-300 rounded-lg" name="email" />
                </div>
                <div class="flex flex-col gap-1">
                    <label>Username</label>
                    <input type='text' class="focus:outline-neutral-300 px-3 py-1 border border-neutral-300 rounded-lg" name="username" />
                </div>

                <div class="flex flex-col gap-1">
                    <label>Password</label>
                    <input type='password' class="focus:outline-neutral-300 px-3 py-1 border border-neutral-300 rounded-lg" name="password" />
                </div>
                <button type="submit" name="register" class="px-5 py-2 hover:text-white hover:bg-neutral-900 rounded-lg border border-neutral-900 text-neutral-900 hover:cursor-pointer transition-all">Daftar</button>
            </div>
        </div>
    </form>
</body>

</html>