<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('struktur/meta');
		$this->load->view('struktur/header');
		$this->load->view('loginform');
		$this->load->view('struktur/footer');
	}

	public function ceklogin()
	{
		if(isset ($_POST['login'])){
			$user = $this->input->post('user', true);
			$pass = $this->input->post('pass', true);
			$cek = $this->app_model->proseslogin($user, $pass);
			$hasil = count($cek);
			if ($hasil > 0){
				$loginData = $this->db->get_where('tb_user', array('username' => $user, 'password' => $pass))->row();
				if ($loginData->level=='admin'){
					redirect(site_url('admin/overview'));
				}elseif ($loginData->level=='gudang'){
					redirect('gudang/index');
				}
				elseif ($loginData->level=='kasir'){
					redirect('kasir/kasir/index');
				}
			}
			else{
				redirect('welcome/index');

			}
		}
	}

	// public function admin(){
	// 	$this->load->view("admin/overview");
	// }

	
	// public function gudang(){
	// 	$this->load->view('templates/gudang_header');
	// 	$this->load->view('pages/gudang/gudang');
	// 	$this->load->view('templates/gudang_footer');
	// }

	
	// public function kasir(){
	// 	$this->load->view('pages/kasir/kasir');
	// }

	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome/index');
	}

}
