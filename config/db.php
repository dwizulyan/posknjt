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
    function getKaryawan($connect)
    {
        try
        {
            $query = "SELECT * FROM karyawan";
            $res = $connect->query($query);
            $data = [];
            while ($row = $res->fetch_assoc())
            {
                $data[] = $row;
            }

            return $data;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
}

$db = new Db();
