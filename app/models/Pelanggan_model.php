<?php

class Pelanggan_model{
    private $table = 'pelanggan';
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function getPelangganWithPagination($limit, $offset) {
        $this->db->query("SELECT * FROM $this->table LIMIT :limit OFFSET :offset");
        $this->db->bind('limit', $limit, PDO::PARAM_INT);
        $this->db->bind('offset', $offset, PDO::PARAM_INT);
        return $this->db->resultSet();
    }
        
    public function getAllPelanggan() {
        $this->db->query("SELECT COUNT(*) as total FROM $this->table");
        return $this->db->single()['total'];
    }

    public function getPelangganById($id_pelanggan){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_pelanggan=:id_pelanggan');
        $this->db->bind('id_pelanggan',$id_pelanggan);
        return $this->db->single();
    }
    public function tambahDataPelanggan($data) {

        $query = "INSERT INTO pelanggan (id_pelanggan ,nama_pelanggan, alamat) VALUES (:id_pelanggan,:nama_pelanggan, :alamat)";
        $this->db->query($query); 
        $this->db->bind('id_pelanggan', $data['id_pelanggan']);
        $this->db->bind('nama_pelanggan', $data['nama_pelanggan']);
        $this->db->bind('alamat', $data['alamat']);
    
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataPelanggan($data) {
        $query = "UPDATE pelanggan SET 
                    id_pelanggan = :id_pelanggan,
                    nama_pelanggan = :nama_pelanggan,
                    alamat = :alamat
                     WHERE id_pelanggan = :id_pelanggan";
        
        
        $this->db->query($query); 
        $this->db->bind('id_pelanggan', $data['id_pelanggan']);
        $this->db->bind('nama_pelanggan', $data['nama_pelanggan']);
        $this->db->bind('alamat', $data['alamat']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function deleteDataPelanggan($id_pelanggan) {
        // Check if the customer has related transactions
        $this->db->query("SELECT COUNT(*) as count FROM transaksi WHERE id_pelanggan = :id_pelanggan");
        $this->db->bind(':id_pelanggan', $id_pelanggan);
        $count = $this->db->single()['count'];
    
        if ($count > 0) {
            throw new Exception("Data Pelanggan memiliki transaksi terkait, tidak dapat dihapus.");
        }

        $this->db->query("DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
        $this->db->bind(':id_pelanggan', $id_pelanggan);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
}