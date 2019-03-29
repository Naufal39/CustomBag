<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller{
    public function index()
    {
        $this->load->view('templates/gudang/gudang_header');
        $this->load->view('pages/gudang/gudang');
        $this->load->view('templates/gudang/gudang_footer');
    }

    public function persediaan(){
        $this->load->view('templates/gudang/gudang_header');
        $this->load->view('pages/gudang/persediaan');
        $this->load->view('templates/gudang/gudang_footer');
    }

    public function pesan(){
        $this->load->view('templates/gudang/gudang_header');
        $this->load->view('pages/gudang/pesan');
        $this->load->view('templates/gudang/gudang_footer');
    }
}