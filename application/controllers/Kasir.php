<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller{
    public function index()
    {
        $this->load->view('templates/kasir/kasir_header');
        $this->load->view('pages/kasir/kasir');
        $this->load->view('templates/kasir/kasir_footer');
    }

    public function persediaan(){
        $this->load->view('templates/kasir/kasir_header');
        $this->load->view('pages/kasir/persediaan');
        $this->load->view('templates/kasir/kasir_footer');
    }

    public function pesan(){
        $this->load->view('templates/kasir/kasir_header');
        $this->load->view('pages/kasir/pesan');
        $this->load->view('templates/kasir/kasir_footer');
    }
}