<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller{

  public function __construct(){
		parent::__construct();
    $this->load->model('M_kasir');
    $this->load->library('upload');
	}

  public function index(){
    
     
      $data['stokBarangMasuk'] = $this->M_kasir->sum('tb_barang_masuk','jumlah');
      $data['stokBarangKeluar'] = $this->M_kasir->sum('tb_barang_keluar','jumlah');  
      $data['list_data'] = $this->M_kasir->hitungJumlahAsset();    
      $this->load->view('kasir/index',$data);

  }

  ####################################
        // DATA BARANG MASUK
  ####################################

  public function form_barangmasuk()
  {
    $data['list_satuan'] = $this->M_kasir->select('tb_satuan');
    $data['list_bahan']  = $this->M_kasir->select('tb_bahan');
    $data['list_tas']     = $this->M_kasir->select('tb_tas');
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/form_barangmasuk/form_insert',$data);
  }

  public function tabel_barangmasuk()
  {
    $data = array(
              'list_data' => $this->M_kasir->select('tb_barang_masuk'),
              'avatar'    => $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'))
            );
    $this->load->view('kasir/tabel/tabel_barangmasuk',$data);
  }

    public function tabel_template()
  {
    $data = array(
              'list_temp' => $this->M_kasir->select('tb_product_template'),
              'avatar'    => $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'))
            );
    $this->load->view('kasir/tabel/tabel_template',$data);
  }

  public function update_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $data['data_barang_update'] = $this->M_kasir->get_data('tb_barang_masuk',$where);
    $data['list_satuan'] = $this->M_kasir->select('tb_satuan');
    $data['list_bahan']  = $this->M_kasir->select('tb_bahan');
    $data['list_tas']     = $this->M_kasir->select('tb_tas');
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/form_barangmasuk/form_update',$data);
  }

  public function delete_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $this->M_kasir->delete('tb_barang_masuk',$where);
    redirect(base_url('kasir/tabel_barangmasuk'));
  }



  public function proses_databarang_masuk_insert()
  {
    $this->form_validation->set_rules('kode_barang','Kode Barang','required');
    $this->form_validation->set_rules('nama_barang','Nama Barang','required');
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
      $unit_depan   = $this->input->post('unit_depan',TRUE);
      $unit_belakang= $this->input->post('unit_belakang',TRUE);
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
            'unit_depan'    => $unit_depan,
            'unit_belakang' => $unit_belakang,
            'satuan'       => $satuan,
            'jumlah'       => $jumlah,
            'total_harga'  => $total_harga
      );
      $this->M_kasir->insert('tb_barang_masuk',$data);

      $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Ditambahkan');
      redirect(base_url('kasir/form_barangmasuk'));
    }else {
      $data['list_satuan'] = $this->M_kasir->select('tb_satuan');
      $data['list_bahan']  = $this->M_kasir->select('tb_bahan');
      $data['list_tas']     = $this->M_kasir->select('tb_tas');
      $data['bahan'] = $this->M_kasir->get();
      $this->load->view('kasir/form_barangmasuk/form_insert',$data);
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
      $this->M_kasir->update('tb_barang_masuk',$data,$where);
      $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil Diupdate');
      redirect(base_url('kasir/tabel_barangmasuk'));
    }else{
      $this->load->view('kasir/form_barangmasuk/form_update');
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
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/form_satuan/form_insert',$data);
  }

  public function tabel_satuan()
  {
    $data['list_data'] = $this->M_kasir->select('tb_bahan');
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/tabel/tabel_satuan',$data);
  }

  public function update_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_bahan' => $uri);
    $data['data_satuan'] = $this->M_kasir->get_data('tb_bahan',$where);
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/form_satuan/form_update',$data);
  }

  public function delete_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_bahan' => $uri);
    $this->M_kasir->delete('tb_bahan',$where);
    redirect(base_url('kasir/tabel_satuan'));
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
      $this->M_kasir->insert('tb_bahan',$data);

      $this->session->set_flashdata('msg_berhasil','Stok Barang Berhasil Ditambahkan');
      redirect(base_url('kasir/form_satuan'));
    }else {
      $this->load->view('kasir/form_satuan/form_insert');
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
      $this->M_kasir->update('tb_bahan',$data,$where);

      $this->session->set_flashdata('msg_berhasil','Data barang Berhasil Di Update');
      redirect(base_url('kasir/tabel_satuan'));
    }else {
      $this->load->view('kasir/form_satuan/form_update');
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
    $data['list_data'] = $this->M_kasir->get_data('tb_barang_masuk',$where);
    $data['list_satuan'] = $this->M_kasir->select('tb_satuan');
    $data['list_bahan']  = $this->M_kasir->select('tb_bahan');
    $data['list_tas']     = $this->M_kasir->select('tb_tas');
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/perpindahan_barang/form_update',$data);
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
      $nama_barang    = $this->input->post('nama_barang',TRUE);
      $satuan         = $this->input->post('satuan',TRUE);
      $jumlah         = $this->input->post('jumlah',TRUE);

      $where = array( 'id_transaksi' => $id_transaksi);
      $data = array(
              'id_transaksi' => $id_transaksi,
              'tanggal_masuk' => $tanggal_masuk,
              'tanggal_keluar' => $tanggal_keluar,
              'kode_barang' => $kode_barang,
              'nama_barang' => $nama_barang,
              'satuan' => $satuan,
              'jumlah' => $jumlah
      );
        $this->M_kasir->insert('tb_barang_keluar',$data);
        $this->session->set_flashdata('msg_berhasil_keluar','Data Berhasil Keluar');
        redirect(base_url('kasir/tabel_barangmasuk'));
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
    $data['list_data'] = $this->M_kasir->select('tb_barang_keluar');
    $data['avatar'] = $this->M_kasir->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('kasir/tabel/tabel_barangkeluar',$data);
  }

  public function getbarang($id)
	{

		$this->load->model('M_kasir');

		$barang = $this->M_kasir->get_by_id($id);

		if ($barang) {

			if ($barang->jumlah == '0') {
				$disabled = 'disabled';
				$info_stok = '<span class="help-block badge" id="reset" 
					          style="background-color: #d9534f;">
					          stok habis</span>';
			}else{
				$disabled = '';
				$info_stok = '<span class="help-block badge" id="reset" 
					          style="background-color: #5cb85c;">stok : '
					          .$barang->jumlah.'</span>';
			}

			echo '<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_bahan" id="nama_barang" 
				        	value="'.$barang->nama_bahan.'"
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" id="harga_bahan" name="harga_barang" 
				        	value="'.number_format( $barang->harga_bahan, 0 ,
				        	 '' , '.' ).'" readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	name="qty" placeholder="Isi qty..." autocomplete="off" 
				        	id="qty" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" min="0"  
				        	max="'.$barang->jumlah.'" '.$disabled.'>
				      </div>'.$info_stok.'
				    </div>';
	    }else{

	    	echo '<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_barang" id="nama_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="harga_barang" id="harga_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="0"  
				        	name="qty" placeholder="Isi qty...">
				      </div>
				    </div>';
	    }

  }
  
  public function ajax_list_transaksi()
	{

		$data = array();

		$no = 1; 
        
        foreach ($this->cart->contents() as $items){
        	
			$row = array();
			$row[] = $no;
			$row[] = $items["id"];
			$row[] = $items["name"];
			$row[] = 'Rp. ' . number_format( $items['price'], 
                    0 , '' , '.' ) . ',-';
			$row[] = $items["jumlah"];
			$row[] = 'Rp. ' . number_format( $items['subtotal'], 
					0 , '' , '.' ) . ',-';

			//add html for action
			$row[] = '<a 
				href="javascript:void()" style="color:rgb(255,128,128);
				text-decoration:none" onclick="deletebarang('
					."'".$items["rowid"]."'".','."'".$items['subtotal'].
					"'".')"> <i class="fa fa-close"></i> Delete</a>';
		
			$data[] = $row;
			$no++;
        }

		$output = array(
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function addbarang()
	{

		$data = array(
				'id' => $this->input->post('id_bahan'),
				'name' => $this->input->post('nama_bahan'),
				'price' => str_replace('.', '', $this->input->post(
					'harga_bahan')),
				'qty' => $this->input->post('qty')
			);
		$insert = $this->cart->insert($data);
		echo json_encode(array("status" => TRUE));
	}

	public function deletebarang($rowid) 
	{

		$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>0,));
		echo json_encode(array("status" => TRUE));
	}

}
?>
