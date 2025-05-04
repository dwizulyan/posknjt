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
    function getKaryawanById($connect, $id)
    {
        try
        {
            $query = $connect->prepare("SELECT * FROM karyawan where id = ?");
            $query->bind_param("s", $id);
            $query->execute();
            $res = $query->get_result();
            $data = $res->fetch_all(MYSQLI_ASSOC);

            return $data;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function updateKaryawan($connect, $id, $namaKaryawan, $nomorHp, $jabatan, $currDate)
    {
        try
        {
            $query = $connect->prepare("UPDATE karyawan SET nama_karyawan=?, nomor_hp=?, jabatan=?, updated_at=? WHERE id = ?");
            $query->bind_param("sssss", $namaKaryawan, $nomorHp, $jabatan, $currDate, $id);
            $query->execute();
            $query->close();
            return;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }

    function tambahKaryawan($connect, $namaKaryawan, $nomorHp, $jabatan, $currDate)
    {
        try
        {
            $query = $connect->prepare("INSERT INTO karyawan (nama_karyawan, nomor_hp, jabatan, created_at) VALUES(?,?,?,?)");
            $query->bind_param("ssss", $namaKaryawan, $nomorHp, $jabatan, $currDate);
            $query->execute();
            $query->close();
            return;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function hapusKaryawan($connect, $id)
    {
        try
        {
            $query = $connect->prepare("DELETE FROM karyawan WHERE id = ?");
            $query->bind_param("s", $id);
            $query->execute();
            $query->close();
            return;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function getBarang($connect)
    {
        try
        {
            $query = "SELECT * FROM barang";
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
    function getBarangById($connect, $id)
    {
        try
        {
            $query = $connect->prepare("SELECT * FROM barang where id = ?");
            $query->bind_param("s", $id);
            $query->execute();
            $res = $query->get_result();
            $data = $res->fetch_all(MYSQLI_ASSOC);

            return $data;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function updateBarang($connect, $id, $namaBarang, $hargaBarang, $stok, $currDate)
    {
        try
        {
            $query = $connect->prepare("UPDATE barang SET nama_barang=?, harga=?, stok_barang=?, updated_at=? WHERE id = ?");
            $query->bind_param("sssss", $namaBarang, $hargaBarang, $stok, $currDate, $id);
            $query->execute();
            $query->close();
            return;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function hapusBarang($connect, $id)
    {
        try
        {
            $query = $connect->prepare("DELETE FROM barang WHERE id = ?");
            $query->bind_param("s", $id);
            $query->execute();
            $query->close();
            return;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function tambahBarang($connect, $namaBarang, $stokBarang, $hargaBarang, $currDate)
    {
        try
        {
            $query = $connect->prepare("INSERT INTO barang (nama_barang,stok_barang,harga,created_at) VALUES(?,?,?,?)");
            $query->bind_param("ssss", $namaBarang, $stokBarang, $hargaBarang, $currDate);
            $query->execute();
            $query->close();
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function getUserLogin($connect, $username, $password)
    {
        try
        {
            $query = $connect->prepare("SELECT id,email,username,roleType FROM user where username = ? AND password = ?");
            $query->bind_param("ss", $username, $password);
            $query->execute();
            $res = $query->get_result();
            $data = $res->fetch_all(MYSQLI_ASSOC);

            return $data;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
}

$db = new Db();
