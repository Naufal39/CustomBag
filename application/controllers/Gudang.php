<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller{

  public function __construct(){
		parent::__construct();
    $this->load->model('M_gudang');
    $this->load->library('upload');
     $this->load->library('form_validation');
	}

  public function index(){
    
     
     $data = array(
           
            'avatar'    => $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'))
          );
      $data['list_data'] = $this->M_gudang->hitungJumlahAsset();
      $data['stokBarangMasuk'] = $this->M_gudang->sum('tb_barang_masuk','jumlah');
      $data['stokBarangKeluar'] = $this->M_gudang->sum('tb_barang_keluar','jumlah'); 
      $this->load->view('gudang/index',$data);

  }

  ####################################
        // DATA BARANG MASUK
  ####################################

  public function form_barangmasuk()
  {
    $data['list_satuan'] = $this->M_gudang->select('tb_satuan');
    $data['list_bahan']  = $this->M_gudang->select('tb_bahan');
    $data['list_tas']     = $this->M_gudang->select('tb_tas');
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/form_barangmasuk/form_insert',$data);
  }


   public function proses_template_masuk_insert(){
    $this->form_validation->set_rules('id_template_product','ID Template Product','required');
    $this->form_validation->set_rules('nama_template','Nama Template','required');
    $this->form_validation->set_rules('jenis_tas','Jenis Tas','required');
    $this->form_validation->set_rules('bag_depan','Bagian Depan','required');
    $this->form_validation->set_rules('unit_depan','Unit Depan','required');
    $this->form_validation->set_rules('bag_belakang','Bagian Belakang','required');
    $this->form_validation->set_rules('unit_belakang','Unit Belakang','required');
    $this->form_validation->set_rules('deskripsi','Deskripsi','required');

    if($this->form_validation->run() == TRUE)
    {
      $id_template_product = $this->input->post('id_template_product',TRUE);
      $nama_template= $this->input->post('nama_template',TRUE);
      $jenis_tas    = $this->input->post('jenis_tas',TRUE);
      $type_sleting = $this->input->post('type_sleting',TRUE);
      $bag_depan    = $this->input->post('bag_depan',TRUE);
      $unit_depan    = $this->input->post('unit_depan',TRUE);
      $bag_belakang = $this->input->post('bag_belakang',TRUE);
      $unit_belakang = $this->input->post('unit_belakang',TRUE);
      $total_harga  = $this->input->post('total_harga',TRUE);
      // $photo  = $this->input->post('photo',TRUE);
      $deskripsi  = $this->input->post('deskripsi',TRUE);

      $data = array(
            'id_template_product' => $id_template_product,
            'nama_template'  => $nama_template,
            'jenis_tas'    => $jenis_tas,
            'type_sleting' => $type_sleting,
            'bag_depan'    => $bag_depan,
            'unit_depan' => $unit_depan,
            'bag_belakang' => $bag_belakang,
            'unit_belakang' => $unit_belakang,
            // 'photo' => $photo,
            'deskripsi' => $deskripsi,
      );
      if (!empty($_FILES['photo']['name'])) {
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		  }
      $this->M_gudang->insert('tb_product_template',$data);

      $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
      redirect(base_url('gudang/form_barangmasuk'));
    }else {
      $data['list_satuan'] = $this->M_gudang->select('tb_satuan');
      $data['list_bahan']  = $this->M_gudang->select('tb_bahan');
      $data['list_tas']     = $this->M_gudang->select('tb_tas');
      $this->load->view('gudang/form_barangmasuk/form_insert',$data);
    }
  }

  
  private function _do_upload()
	{
		$config['upload_path'] 		= './assets/images/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size'] 			= 100;
		$config['max_widht'] 			= 1000;
		$config['max_height']  		= 1000;
		$config['file_name'] 			= round(microtime(true)*1000);
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('photo')) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('',''));
			redirect('gudang/form_barangmasuk/form_insert');
		}
		return $this->upload->data('file_name');
  }
  
  public function tabel_template()
  {
    $data = array(
              'list_temp' => $this->M_gudang->select('tb_product_template'),
              'avatar'    => $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'))
            );
    $this->load->view('gudang/tabel/tabel_template',$data);
  }

  public function tabel_barangmasuk()
  {
    $data = array(
              'list_data' => $this->M_gudang->select('tb_barang_masuk'),
              'avatar'    => $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'))
            );
    $this->load->view('gudang/tabel/tabel_barangmasuk',$data);
  }

  public function update_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $data['data_barang_update'] = $this->M_gudang->get_data('tb_barang_masuk',$where);
    $data['list_satuan'] = $this->M_gudang->select('tb_satuan');
    $data['list_bahan']  = $this->M_gudang->select('tb_bahan');
    $data['list_tas']     = $this->M_gudang->select('tb_tas');
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/form_barangmasuk/form_update',$data);
  }

  public function delete_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $this->M_gudang->delete('tb_barang_masuk',$where);
    redirect(base_url('gudang/tabel_barangmasuk'));
  }

  public function proses_databarang_masuk_insert()
  {
    $this->form_validation->set_rules('kode_barang','Kode Barang','required');
    $this->form_validation->set_rules('nama_barang','Nama Barang','required');
    $this->form_validation->set_rules('jenis_tas','Jenis Tas','required');
    $this->form_validation->set_rules('type_sleting','Type Sleting','required');
    $this->form_validation->set_rules('bag_depan','Bagian Depan','required');
    $this->form_validation->set_rules('bag_belakang','Bagian Belakang','required');
    $this->form_validation->set_rules('jumlah','Jumlah','required');
    $this->form_validation->set_rules('total_harga','Total Harga','required');

    if($this->form_validation->run() == TRUE)
    {
      $id_transaksi = $this->input->post('id_transaksi',TRUE);
      $tanggal      = $this->input->post('tanggal',TRUE);
      $kode_barang  = $this->input->post('kode_barang',TRUE);
      $nama_barang  = $this->input->post('nama_barang',TRUE);
      $jenis_tas    = $this->input->post('jenis_tas',TRUE);
      $type_sleting = $this->input->post('type_sleting',TRUE);
      $bag_depan    = $this->input->post('bag_depan',TRUE);
      $bag_belakang = $this->input->post('bag_belakang',TRUE);
      $satuan       = $this->input->post('satuan',TRUE);
      $jumlah       = $this->input->post('jumlah',TRUE);
      $total_harga  = $this->input->post('total_harga',TRUE);

      $data = array(
            'id_transaksi' => $id_transaksi,
            'tanggal'      => $tanggal,
            'kode_barang'  => $kode_barang,
            'nama_barang'  => $nama_barang,
            'jenis_tas'    => $jenis_tas,
            'type_sleting' => $type_sleting,
            'bag_depan'    => $bag_depan,
            'bag_belakang' => $bag_belakang,
            'satuan'       => $satuan,
            'jumlah'       => $jumlah,
            'total_harga'  => $total_harga
      );
      $this->M_gudang->insert('tb_barang_masuk',$data);

      $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
      redirect(base_url('gudang/form_barangmasuk'));
    }else {
      $data['list_satuan'] = $this->M_gudang->select('tb_satuan');
      $data['list_bahan']  = $this->M_gudang->select('tb_bahan');
      $data['list_tas']     = $this->M_gudang->select('tb_tas');
      $this->load->view('gudang/form_barangmasuk/form_insert',$data);
    }
  }

  public function proses_databarang_masuk_update()
  {
    $this->form_validation->set_rules('kode_barang','Kode Barang','required');
    $this->form_validation->set_rules('nama_barang','Nama Barang','required');
    $this->form_validation->set_rules('jumlah','Jumlah','required');
    $this->form_validation->set_rules('jenis_tas','Jenis Tas','required');
    $this->form_validation->set_rules('type_sleting','Type Sleting','required');
    $this->form_validation->set_rules('bag_depan','Bagian Depan','required');
    $this->form_validation->set_rules('bag_belakang','Bagian Belakang','required');
    $this->form_validation->set_rules('total_harga','Total Harga','required');

    if($this->form_validation->run() == TRUE)
    {
      $id_transaksi = $this->input->post('id_transaksi',TRUE);
      $tanggal      = $this->input->post('tanggal',TRUE);
      $kode_barang  = $this->input->post('kode_barang',TRUE);
      $nama_barang  = $this->input->post('nama_barang',TRUE);
      $jenis_tas    = $this->input->post('jenis_tas',TRUE);
      $type_sleting = $this->input->post('type_sleting',TRUE);
      $bag_depan    = $this->input->post('bag_depan',TRUE);
      $bag_belakang = $this->input->post('bag_belakang',TRUE);
      $satuan       = $this->input->post('satuan',TRUE);
      $jumlah       = $this->input->post('jumlah',TRUE);
      $total_harga  = $this->input->post('total_harga',TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data = array(
            'id_transaksi' => $id_transaksi,
            'tanggal'      => $tanggal,
            'kode_barang'  => $kode_barang,
            'nama_barang'  => $nama_barang,
            'jenis_tas'    => $jenis_tas,
            'type_sleting' => $type_sleting,
            'bag_depan'    => $bag_depan,
            'bag_belakang' => $bag_belakang,
            'satuan'       => $satuan,
            'jumlah'       => $jumlah,
            'total_harga'  => $total_harga
      );
      $this->M_gudang->update('tb_barang_masuk',$data,$where);
      $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Diupdate');
      redirect(base_url('gudang/tabel_barangmasuk'));
    }else{
      $this->load->view('gudang/form_barangmasuk/form_update');
    }
  }
  ####################################
      // END DATA BARANG MASUK
  ####################################


  ####################################
              // SATUAN
  ####################################

  public function form_satuan()
  {
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/form_satuan/form_insert',$data);
  }

  public function tabel_satuan()
  {
    $data['list_data'] = $this->M_gudang->select('tb_bahan');
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/tabel/tabel_satuan',$data);
  }

  public function update_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_bahan' => $uri);
    $data['data_satuan'] = $this->M_gudang->get_data('tb_bahan',$where);
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/form_satuan/form_update',$data);
  }

  public function delete_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_bahan' => $uri);
    $this->M_gudang->delete('tb_bahan',$where);
    redirect(base_url('gudang/tabel_satuan'));
  }

  public function proses_satuan_insert()
  {
    $this->form_validation->set_rules('nama_bahan','nama_bahan','trim|required|max_length[100]');
    $this->form_validation->set_rules('stok','stok','trim|required|max_length[100]');

    if($this->form_validation->run() ==  TRUE)
    {
      $nama_bahan = $this->input->post('nama_bahan' ,TRUE);
      $stok = $this->input->post('stok' ,TRUE);

      $data = array(
            'nama_bahan' => $nama_bahan,
            'stok' => $stok
      );
      $this->M_gudang->insert('tb_bahan',$data);

      $this->session->set_flashdata('msg_berhasil','Stok Barang Berhasil Ditambahkan');
      redirect(base_url('gudang/form_satuan'));
    }else {
      $this->load->view('gudang/form_satuan/form_insert');
    }
  }

  public function proses_satuan_update()
  {
    $this->form_validation->set_rules('nama_bahan','nama_bahan','trim|required|max_length[100]');
    $this->form_validation->set_rules('stok','stok','trim|required|max_length[100]');

    if($this->form_validation->run() ==  TRUE)
    {
      $id_bahan   = $this->input->post('id_bahan' ,TRUE);
      $nama_bahan = $this->input->post('nama_bahan' ,TRUE);
      $stok = $this->input->post('stok' ,TRUE);

      $where = array(
            'id_bahan' => $id_bahan
      );

      $data = array(
            'nama_bahan' => $nama_bahan,
            'stok' => $stok
      );
      $this->M_gudang->update('tb_bahan',$data,$where);

      $this->session->set_flashdata('msg_berhasil','Data barang Berhasil Di Update');
      redirect(base_url('gudang/tabel_satuan'));
    }else {
      $this->load->view('gudang/form_satuan/form_update');
    }
  }

  ####################################
            // END SATUAN
  ####################################


  ####################################
     // DATA MASUK KE DATA KELUAR
  ####################################

  public function barang_keluar()
  {
    $uri = $this->uri->segment(3);
    $where = array( 'id_transaksi' => $uri);
    $data['list_data'] = $this->M_gudang->get_data('tb_barang_masuk',$where);
    $data['list_satuan'] = $this->M_gudang->select('tb_satuan');
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/perpindahan_barang/form_update',$data);
  }

  public function proses_data_keluar()
  {
    $this->form_validation->set_rules('tanggal_keluar','Tanggal Keluar','trim|required');
    if($this->form_validation->run() === TRUE)
    {
      $id_transaksi   = $this->input->post('id_transaksi',TRUE);
      $tanggal_masuk  = $this->input->post('tanggal',TRUE);
      $tanggal_keluar = $this->input->post('tanggal_keluar',TRUE);
      $kode_barang    = $this->input->post('kode_barang',TRUE);
      $jenis_tas      = $this->input->post('jenis_tas',TRUE);
      $type_sleting   = $this->input->post('type_sleting',TRUE);
      $bag_depan      = $this->input->post('bag_depan',TRUE);
      $bag_belakang   = $this->input->post('bag_belakang',TRUE);
      $nama_barang    = $this->input->post('nama_barang',TRUE);
      $satuan         = $this->input->post('satuan',TRUE);
      $jumlah         = $this->input->post('jumlah',TRUE);
      $total_harga    = $this->input->post('total_harga',TRUE);

      $where = array( 'id_transaksi' => $id_transaksi);
      $data = array(
              'id_transaksi' => $id_transaksi,
              'tanggal_masuk' => $tanggal_masuk,
              'tanggal_keluar' => $tanggal_keluar,
              'kode_barang' => $kode_barang,
              'nama_barang' => $nama_barang,
              'jenis_tas'    => $jenis_tas,
              'type_sleting' => $type_sleting,
              'bag_depan'    => $bag_depan,
              'bag_belakang' => $bag_belakang,
              'satuan' => $satuan,
              'jumlah' => $jumlah,
              'total_harga' => $total_harga
      );
        $this->M_gudang->insert('tb_barang_keluar',$data);
        $this->session->set_flashdata('msg_berhasil_keluar','Data Berhasil Keluar');
        redirect(base_url('gudang/tabel_barangmasuk'));
    }else {
      $this->load->view('perpindahan_barang/form_update/'.$id_transaksi);
    }

  }
  ####################################
    // END DATA MASUK KE DATA KELUAR
  ####################################


  ####################################
        // DATA BARANG KELUAR
  ####################################

  public function tabel_barangkeluar()
  {
    $data['list_data'] = $this->M_gudang->select('tb_barang_keluar');
    $data['avatar'] = $this->M_gudang->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('gudang/tabel/tabel_barangkeluar',$data);
  }


}
?>
