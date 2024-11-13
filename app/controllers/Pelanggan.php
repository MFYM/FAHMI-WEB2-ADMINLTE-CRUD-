<?php

class Pelanggan extends Controller{
    public function index($page = 1) {
        $data['judul'] = 'Pelanggan';
        $limit = 10;
        $offset = ($page - 1) * $limit;
    
        $data['pelanggan'] = $this->model('Pelanggan_model')->getPelangganWithPagination($limit, $offset);
        $AllPelanggan = $this->model('Pelanggan_model')->getAllPelanggan();
        $data['totalPages'] = ceil($AllPelanggan / $limit);
        $data['currentPage'] = $page;
    
        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id_pelanggan){
        $data['judul'] = 'Detail Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getPelangganById($id_pelanggan);
        $this->view("templates/header", $data);
        $this->view('pelanggan/detail',$data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if ($this->model('Pelanggan_model')->tambahDataPelanggan($_POST) > 0) {
            header('Location: '. BASEURL .'/pelanggan');
            exit;
        }
    }

    public function Edit($id_pelanggan){
            
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Pelanggan_model')->editDataPelanggan($_POST, $id_pelanggan) > 0) {
                
                header('Location: ' . BASEURL . '/pelanggan');
                exit;
            } else {
                echo 'Gagal Mengupdate Data.';
            }
        } else {
            
            $data['judul'] = 'Edit Pelanggan';
            $data['produk'] = $this->model('Pelanggan_model')->getPelangganById($id_pelanggan);
            
            $this->view('templates/header', $data);
            $this->view('pelanggan/edit', $data);
            $this->view('templates/footer');
        }
    }
    public function Delete($id_pelanggan) {
        try {
            if ($this->model('Pelanggan_model')->deleteDataPelanggan($id_pelanggan) > 0) {
                header('Location: ' . BASEURL . '/pelanggan');
                exit;
            } else {
                echo 'Gagal Menghapus Data.';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
}