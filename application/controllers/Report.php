<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
    $this->load->library('form_validation');
    $this->load->model('M_kasir');
  }

  public function barangKeluarManual()
  {

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // document informasi
    $pdf->SetCreator('');
    $pdf->SetTitle('Laporan Data Barang Keluar');
    $pdf->SetSubject('Barang Keluar');

    //header Data
    $pdf->SetHeaderData('',30,'Laporan Data','Barang Keluar',array(203, 58, 44),array(0, 0, 0));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica','',14,'',true);

    $pdf->AddPage('L');

    $html=
      '<div>
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1>
        <p>No Id Transaksi  :</p>
        <p>Ditunjukan Untuk :</p>
        <p>Tanggal          :</p>
        <p>Po.Customer      :</p>


        <table border="1">
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">ID Transaksi</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:80px" align="center">Satuan</th>
            <th style="width:80px" align="center">Jumlah</th>
            <th style="width:180px" align="center">Total Harga</th>
          </tr>';

        $html .= '<tr>
                    <td style="height:180px"></td>
                    <td  style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                 </tr>
                 <tr>
                  <td align="center" colspan="8">Jumlah</td>
                  <td></td>
                 </tr>';



        $html .='
            </table>
            <h6>Mengetahui</h6><br>
            <h6>...............</h6>
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
    ob_start();
    $pdf->Output('contoh_report.pdf','I');
  }

  public function barangKeluar()
  {
    $id   = $this->uri->segment(3);
    $tgl3 = $this->uri->segment(4);
    $tgl2 = $this->uri->segment(5);
    $tgl1 = $this->uri->segment(6);
    $ls   = array('id_transaksi' => $id);
    $data = $this->M_kasir->get_data('tb_barang_keluar',$ls);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // document informasi
    $pdf->SetCreator('Gudang');
    $pdf->SetTitle('Laporan Data Barang Keluar');
    $pdf->SetSubject('Barang Keluar');

    //header Data
    $pdf->SetHeaderData('',30,'Laporan Data','Barang Keluar',array(203, 58, 44),array(0, 0, 0));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica','',14,'',true);

    $pdf->AddPage('L');

    $html=
      '<div>
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1><br>
        <p>No Id Transaksi  : '.$id.'</p>
        <p>Ditunjukan Untuk :</p>
        <p>Tanggal          : '.$tgl1.'-'.$tgl2.'-'.$tgl3.'</p>
        <p>Po.Customer      :</p>


        <table border="1">
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">ID Transaksi</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:80px" align="center">Satuan</th>
            <th style="width:80px" align="center">Jumlah</th>
            <th style="width:180px" align="center">Total Harga</th>
          </tr>';


          $no = 1;
          //  $list_barang = $this->M_kasir;
          //  $data["list_barang"] = $list_barang->getById($id);
          foreach($data as $row){
            $html .= '<tr>';
            $html .= '<td align="center">'.$no.'</td>';
            $html .= '<td align="center">'.$row->id_transaksi.'</td>';
            $html .= '<td align="center">'.$row->tanggal_masuk.'</td>';
            $html .= '<td align="center">'.$row->tanggal_keluar.'</td>';
            $html .= '<td align="center">'.$row->kode_barang.'</td>';
            $html .= '<td align="center">'.$row->nama_barang.'</td>';
            $html .= '<td align="center">'.$row->satuan.'</td>';
            $html .= '<td align="center">'.$row->jumlah.'</td>';
            $html .= '<td align="center">Rp. ' . number_format($row->total_harga, 0, ',', '.') . '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td align="center" colspan="8"><b>Total Harga</b></td>';
            $html .= '<td align="center">Rp. ' . number_format($row->total_harga, 0, ',', '.') . '</td>';
            $html .= '</tr>';
            $no++;
          }


        $html .='
            </table><br>
            <h6>Mengetahui</h6><br><br><br>
            <h6>..........</h6>
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
    ob_start();
    $pdf->Output('invoice_barang_keluar.pdf','I');

  }
}
?>
