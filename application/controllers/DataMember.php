<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include APPPATH . "libraries/phpqrcode/qrlib.php";
// include autoloader
// include APPPATH . "dompdf/autoload.php";

class DataMember extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('member_model', 'M_member');
  }
  public function index()
  {
    $data['title'] = 'Data Member';

    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->database();
    $data['users'] = $this->M_member->get_datamember();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('datamember/index', $data);
    $this->load->view('templates/footer');
  }

  public function kartumember($uid)
  {
    // $uid = $this->uri->segment(3);
    // nama folder tempat penyimpanan file qrcode
    // $penyimpanan = "assets/img/kartu";

    // membuat folder dengan nama "temp"
    // if (!file_exists($penyimpanan))
    //   mkdir($penyimpanan);

    // isi qrcode yang ingin dibuat. akan muncul saat di scan
    // $isi = base_url('home/biodata/') . $uid;

    // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
    // $qr = QRcode::png($isi, $penyimpanan . "qrcode.png", QR_ECLEVEL_H);

    // echo '<h2>Tutorial Membuat QR Code Dengan PHP</h2>';
    // echo '<h3>www.malasngoding.com</h3>';

    // if (!file_exists($penyimpanan))
    //   mkdir($penyimpanan);
    // $param = base_url('datamember/kartuktna/') . $uid;
    // $qr = QRcode::png($param, $penyimpanan . 'qrcodeku.png', QR_ECLEVEL_H);
    // $data = [
    //   'nama' => $isi,
    //   'qr_code' => $qr
    // ];

    $this->load->library('pdfgenerator');
    $data['title'] = "KTNA Card";
    $file_pdf = $data['title'];
    $paper = 'A5'; //15x25mm.
    $orientation = "landscape";
    $html = $this->load->view('datamember/kartuktna', $data, true);
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }
}
