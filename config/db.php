<?php
class Db
{
    function getOutletIdentity($connect)
    {
        try
        {
            $query = "SELECT * FROM identitas_outlet";
            $res = $connect->query($query);
            return $res->fetch_assoc();
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
}

$db = new Db();
