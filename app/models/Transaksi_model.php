<?php
class Transaksi_model {
    private $viewTransaksi = 'view_transaksi';
    private $viewDetail = 'view_detail_transaksi';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getTransaksiWithPagination($limit, $offset) {
        $this->db->query("SELECT * FROM $this->viewTransaksi LIMIT :limit OFFSET :offset");
        $this->db->bind('limit', $limit, PDO::PARAM_INT);
        $this->db->bind('offset', $offset, PDO::PARAM_INT);
        return $this->db->resultSet();
    }
        
    public function getAllTransaksi() {
        $this->db->query("SELECT COUNT(*) as total FROM $this->viewTransaksi");
        return $this->db->single()['total'];
    }

    public function getTransaksiById($id_transaksi) {
        $this->db->query('SELECT * FROM ' . $this->viewDetail . ' WHERE id_transaksi = :id_transaksi');
        $this->db->bind('id_transaksi', $id_transaksi);
        return $this->db->single();
    }

    public function tambahDataTransaksi($data) {
        try {
            $this->db->query('SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan');
            $this->db->bind('id_pelanggan', $data['id_pelanggan']);
            $existingPelanggan = $this->db->single();

            if (!$existingPelanggan) {
                $queryPelanggan = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat) VALUES (:id_pelanggan, :nama_pelanggan, :alamat)";
                $this->db->query($queryPelanggan);
                $this->db->bind('id_pelanggan', $data['id_pelanggan']);
                $this->db->bind('nama_pelanggan', $data['nama_pelanggan']);
                $this->db->bind('alamat', $data['alamat']);
                $this->db->execute();
            }

            $queryTransaksi = "INSERT INTO transaksi (id_transaksi, id_pelanggan, kode_barang, jumlah) VALUES (:id_transaksi, :id_pelanggan, :kode_barang, :jumlah)";
            $this->db->query($queryTransaksi);
            $this->db->bind('id_transaksi', $data['id_transaksi']);
            $this->db->bind('id_pelanggan', $data['id_pelanggan']);
            $this->db->bind('kode_barang', $data['kode_barang']);
            $this->db->bind('jumlah', $data['jumlah']);
            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    

    
}

