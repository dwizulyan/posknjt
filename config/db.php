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
    function tambahUserLogin($connect, $username, $email, $password, $role = "User")
    {
        try
        {
            $query = $connect->prepare("INSERT INTO user (username,email,password,roleType) VALUES(?,?,?,?)");
            $query->bind_param("ssss", $username, $email, $password, $role);
            $query->execute();
            $query->close();
            return 0;
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function tambahTransaksi($connect, $namaPembeli, $tanggalPembelian, $uangBayar, $totalBayar, $detailBarang)
    {
        try
        {
            $query = $connect->prepare("INSERT INTO transaksi (nama_pembeli,tanggal_pembelian, uang_bayar, total_bayar) VALUES(?,?,?,?)");
            $query->bind_param("ssss", $namaPembeli, $tanggalPembelian, $uangBayar, $totalBayar);
            $query->execute();

            if ($query->affected_rows <= 0) throw new Exception("Gagal Insert data");

            $transaksiId = $query->insert_id;
            foreach ($detailBarang as $barang)
            {
                $this->tambahBarangTransaksi($connect, $transaksiId, $barang['nama_barang'], $barang["harga_barang"], $barang["kuantitas_beli"]);
                $this->updateStokBarang($connect, $barang['id_barang'], $barang['kuantitas_beli']);
            }
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function tambahBarangTransaksi($connect, $idTransaksi, $namaBarang, $hargaBarang, $kuantitasBarang)
    {
        try
        {
            $query = $connect->prepare("INSERT INTO detail_barang_dibeli (transaksi_id,nama_barang,harga,kuantitas) VALUES(?,?,?,?)");
            $query->bind_param("isss", $idTransaksi, $namaBarang, $hargaBarang, $kuantitasBarang);
            $query->execute();
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function updateStokBarang($connect, $idBarang, $kuantitasBarang)
    {
        try
        {
            $stok = $connect->prepare("SELECT (stok_barang) FROM barang WHERE id = ?");
            $stok->bind_param("i", $idBarang);
            $stok->execute();
            $stokBarang = $stok->get_result()->fetch_all(MYSQLI_ASSOC);
            $updateStok = $stokBarang[0]['stok_barang'] - $kuantitasBarang;
            $query = $connect->prepare("UPDATE barang SET stok_barang=? WHERE id = ?");
            $query->bind_param("si", $updateStok, $idBarang);
            $query->execute();
            $query->close();
            $stok->close();
        }
        catch (Exception $err)
        {
            return $err;
        }
    }
    function getTransaction($connect)
    {
        try
        {
            $transaction = "SELECT t.id, t.nama_pembeli, t.tanggal_pembelian, t.uang_bayar, t.total_bayar, d.nama_barang, d.harga, d.kuantitas FROM transaksi as t LEFT JOIN detail_barang_dibeli as d ON t.id = d.transaksi_id ORDER BY t.id";
            $res = $connect->query($transaction);

            $data = [];
            while ($row = $res->fetch_assoc())
            {
                $id = $row['id'];

                if (!isset($data[$id]))
                {
                    $data[$id] = [
                        "nama_pembeli" => $row['nama_pembeli'],
                        "tanggal_pembelian" => $row['tanggal_pembelian'],
                        "uang_bayar" => $row['uang_bayar'],
                        "total_bayar" => $row['total_bayar']
                    ];
                }
                if ($row['nama_barang'])
                {
                    $data[$id]["barang_dibeli"][] = [
                        "nama_barang" => $row['nama_barang'],
                        "harga" => $row["harga"],
                        "kuantitas" => $row['kuantitas']
                    ];
                }
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
