<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
     function hallo(){
        $this->load->view('struktur/meta');
        $this->load->view('struktur/header');
        $this->load->view('pages/index');
        $this->load->view('struktur/footer');
    }
    public function about(){
        $this->load->view('struktur/meta');
        $this->load->view('struktur/header');
        $this->load->view('pages/about');
        $this->load->view('struktur/footer');
    }
    public function kontak(){
        $this->load->view('struktur/meta');
        $this->load->view('struktur/header');
        $this->load->view('pages/kontak');
        $this->load->view('struktur/footer');
    }
}