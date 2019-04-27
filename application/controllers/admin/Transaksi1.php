<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi1 extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('M_gudang');
  }
  
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal_keluar = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tanggal_keluar));
                $url_cetak = 'transaksi1/cetak?filter=1&tahun='.$tanggal_keluar;
                $tb_barang_keluar = $this->M_gudang->view_by_date($tanggal_keluar); // Panggil fungsi view_by_date yang ada di M_gudang
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'transaksi1/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $tb_barang_keluar = $this->M_gudang->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di M_gudang
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'transaksi1/cetak?filter=3&tahun='.$tahun;
                $tb_barang_keluar = $this->M_gudang->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di M_gudang
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'admin/transaksi1/cetak';
            $tb_barang_keluar = $this->M_gudang->view_all(); // Panggil fungsi view_all yang ada di M_gudang
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $tb_barang_keluar;
    $data['option_tahun'] = $this->M_gudang->option_tahun();
    $data['total_untung'] = $this->M_gudang->total();
    $this->load->view('admin/product/laporan1', $data);
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal_keluar = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tanggal_keluar));
                $tb_barang_keluar = $this->M_gudang->view_by_date($tanggal_keluar); // Panggil fungsi view_by_date yang ada di M_gudang
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $tb_barang_keluar = $this->M_gudang->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di M_gudang
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $tb_barang_keluar = $this->M_gudang->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di M_gudang
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $tb_barang_keluar = $this->M_gudang->view_all(); // Panggil fungsi view_all yang ada di M_gudang
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $tb_barang_keluar;
        $data['total_untung'] = $this->M_gudang->total();
        
    ob_start();
    $this->load->view('admin/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Transaksi.pdf', 'D');
  }

}





