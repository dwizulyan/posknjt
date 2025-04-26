<?php
include("../config/connection.php");
include("../config/db.php");

if (isset($_POST["id"]))
{
    $id = $_POST['id'];
    $db->hapusKaryawan($connect, $id);
    header("Location:../manajemen_user.php");
}
else
{
    echo "Gabisa";
}
