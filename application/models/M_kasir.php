<?php

class M_kasir extends CI_Model
{

  public function insert($tabel,$data)
  {
    $this->db->insert($tabel,$data);
  }

  public function select($tabel)
  {
    $query = $this->db->get($tabel);
    return $query->result();
  }

  public function cek_jumlah($tabel,$id_transaksi)
  {
    return  $this->db->select('*')
               ->from($tabel)
               ->where('id_transaksi',$id_transaksi)
               ->get();

  }

  public function get_data_array($tabel,$id_transaksi)
  {
    $query = $this->db->select()
                      ->from($tabel)
                      ->where($id_transaksi)
                      ->get();
    return $query->result_array();
  }

  public function get_data($tabel,$id_transaksi)
  {
    $query = $this->db->select()
                      ->from($tabel)
                      ->where($id_transaksi)
                      ->get();
    return $query->result();
  }

  public function update($tabel,$data,$where)
  {
    $this->db->where($where);
    $this->db->update($tabel,$data);
  }

  public function delete($tabel,$where)
  {
    $this->db->where($where);
    $this->db->delete($tabel);
  }

  public function mengurangi($tabel,$id_transaksi,$jumlah)
  {
    $this->db->set("jumlah","jumlah - $jumlah");
    $this->db->where('id_transaksi',$id_transaksi);
    $this->db->update($tabel);
  }

  public function update_password($tabel,$where,$data)
  {
    $this->db->where($where);
    $this->db->update($tabel,$data);
  }

  public function get_data_gambar($tabel,$username)
  {
    $query = $this->db->select()
                      ->from($tabel)
                      ->where('username_user',$username)
                      ->get();
    return $query->result();
  }

  public function sum($tabel,$field)
  {
    $query = $this->db->select_sum($field)
                      ->from($tabel)
                      ->get();
    return $query->result();
  }

  public function numrows($tabel)
  {
    $query = $this->db->select()
                      ->from($tabel)
                      ->get();
    return $query->num_rows();
  }

  public function kecuali($tabel,$username)
  {
    $query = $this->db->select()
                      ->from($tabel)
                      ->where_not_in('username',$username)
                      ->get();

    return $query->result();
  }
  
  public function view_by_date($date){
        $this->db->where('DATE(tanggal_keluar)', $date); // Tambahkan where tanggal nya
        
    return $this->db->get('tb_barang_keluar')->result();// Tampilkan data tb_barang_keluar sesuai tanggal yang diinput oleh user pada filter
  }
    
  public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal_keluar)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_keluar)', $year); // Tambahkan where tahun
        
    return $this->db->get('tb_barang_keluar')->result(); // Tampilkan data tb_barang_keluar sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
        $this->db->where('YEAR(tanggal_keluar)', $year); // Tambahkan where tahun
        
    return $this->db->get('tb_barang_keluar')->result(); // Tampilkan data tb_barang_keluar sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    return $this->db->get('tb_barang_keluar')->result(); // Tampilkan semua data tb_barang_keluar
  }
    
  public function option_tahun(){
      $this->db->select('YEAR(tanggal_keluar) AS tahun'); // Ambil Tahun dari field tgl
      $this->db->from('tb_barang_keluar'); // select ke tabel tb_barang_keluar
      $this->db->order_by('YEAR(tanggal_keluar)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
      $this->db->group_by('YEAR(tanggal_keluar)'); // Group berdasarkan tahun pada field tgl
        
      return $this->db->get()->result(); // Ambil data pada tabel tb_barang_keluar sesuai kondisi diatas
    }
public function total(){
    // $this->db->query("SELECT SUM(total_harga) from transaksi");
    $this->db->select_sum('jumlah');
    $query = $this->db->get('tb_barang_keluar');
   if($query->num_rows()>0)
   {
     return $query->row()->jumlah;
   }
   else
   {
     return 0;
   }
  }

  public function hitungJumlahAsset()
  {   
    $query = $this->db->get('tb_barang_keluar');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

}



 ?>
