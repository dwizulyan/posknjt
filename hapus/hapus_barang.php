<?php
include("../config/connection.php");
include("../config/db.php");

if (isset($_POST["id"]))
{
    $id = $_POST['id'];
    $db->hapusBarang($connect, $id);
    header("Location:../manajemen_barang.php");
}
else
{
    echo "Gabisa";
}
