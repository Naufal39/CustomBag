<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
    }
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
    public function shop(){
        $this->load->view('struktur/meta');
        $this->load->view('struktur/header');
        
        $data["products"] = $this->product_model->getAll();
        $this->load->view("pages/shop", $data);
 
        $this->load->view('struktur/footer');
    }
    public function single($id = null){
        $this->load->view('struktur/meta');
        $this->load->view('struktur/header');

        $product = $this->product_model;
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        $this->load->view('pages/shop-single', $data);

        $this->load->view('struktur/footer');
    }
}