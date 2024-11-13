<?php

class Transaksi extends Controller{
    public function index($page = 1) {
        $data['judul'] = 'Transaksi';
        $limit = 10;
        $offset = ($page - 1)* $limit;

        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiWithPagination($limit, $offset);
        $AllTransaksi = $this->model('Transaksi_model')->getAllTransaksi();
        $data['totalPages'] = ceil($AllTransaksi / $limit);
        $data['currentPage'] = $page;

        $this->view("templates/header", $data);
        $this->view('transaksi/index',$data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('Transaksi_model')->tambahDataTransaksi($_POST) > 0) {
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function detail($id_transaksi){
        $data['judul'] = 'Detail Transaksi';
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiById($id_transaksi);
        $this->view("templates/header", $data);
        $this->view('transaksi/detail',$data);
        $this->view('templates/footer');
    }
}