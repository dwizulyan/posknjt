<?php
include("./config/connection.php");
include("./config/db.php");
include("./config/utils.php");

$transaction = $db->getTransaction($connect);
echo '<pre>';
echo var_dump($transaction);
echo '</pre>';
