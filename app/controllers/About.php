<?php

class About extends Controller{

    public function index(){
        $data ['judul'] = 'About';
        $this->view("templates/header", $data);
        $this->view("about/index");
        $this->view("templates/footer");
    }
    public function page(){

        $data ["judul"] = " ";
        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}