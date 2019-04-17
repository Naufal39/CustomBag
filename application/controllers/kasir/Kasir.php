<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller{
    public function index()
    {
        $this->load->view('templates/kasir/kasir_header');
        $this->load->view('kasir/kasir');
        $this->load->view('templates/kasir/kasir_footer');
    }

    public function persediaan(){
        $this->load->view('templates/kasir/kasir_header');
        $this->load->view('kasir/persediaan');
        $this->load->view('templates/kasir/kasir_footer');
    }

    public function pesan(){
        $this->load->view('templates/kasir/kasir_header');
        $this->load->view('kasir/pesan');
        $this->load->view('templates/kasir/kasir_footer');
    }
}