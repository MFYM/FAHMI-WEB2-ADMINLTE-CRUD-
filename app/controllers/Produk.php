<?php

class Produk extends Controller{
    public function index($page = 1) {
        $data['judul'] = 'Produk';
        $limit = 10;
        $offset = ($page - 1) * $limit;
    
        $data['produk'] = $this->model('Produk_model')->getProdukWithPagination($limit, $offset);
        $totalProduk = $this->model('Produk_model')->getTotalProduk();
        $data['totalPages'] = ceil($totalProduk / $limit);
        $data['currentPage'] = $page;
    
        $this->view('templates/header', $data);
        $this->view('produk/index', $data);
        $this->view('templates/footer');
    }
    
    
    public function detail($kode_barang){
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->model('Produk_model')->getProdukById($kode_barang);
        $this->view("templates/header", $data);
        $this->view('produk/detail',$data);
        $this->view('templates/footer');
    }

    public function Tambah(){
        if ($this->model('Produk_model')->tambahDataProduk($_POST) > 0) {
            header('Location: '. BASEURL .'/produk');
            exit;
        }
    }

    public function Delete($kode_barang) {
        try {
            if ($this->model('Produk_model')->deleteDataProduk($kode_barang) > 0) {
                header('Location: ' . BASEURL . '/produk');
                exit;
            } else {
                echo 'Gagal Menghapus Data.';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    

    
        public function Edit($kode_barang){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->model('Produk_model')->editDataProduk($_POST, $kode_barang) > 0) {
                    
                    header('Location: ' . BASEURL . '/produk');
                    exit;
                } else {
                    echo 'Gagal Mengupdate Data.';
                }
            } else {
                
                $data['judul'] = 'Edit Produk';
                $data['produk'] = $this->model('Produk_model')->getProdukById($kode_barang);
                
                $this->view('templates/header', $data);
                $this->view('produk/edit', $data);
                $this->view('templates/footer');
            }
        }
        
    
}