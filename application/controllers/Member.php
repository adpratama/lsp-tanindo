<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . "libraries/qrcode/qrlib.php";

class Member extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('Member_Model', 'M_member');
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
    $this->load->view('member/index', $data);
    $this->load->view('templates/footer');
  }

  public function kartumember($nik)
  {
    // $this->load->library('ciqrcode');
    $nik = $this->uri->segment(3);
    // nama folder tempat penyimpanan file qrcode
    $penyimpanan = "assets/img/kartu/";

    // membuat folder dengan nama "temp"
    if (!file_exists($penyimpanan))
      mkdir($penyimpanan);

    // isi qrcode yang ingin dibuat. akan muncul saat di scan
    $isi = base_url('home/biodata/') . $nik;

    $file_name = date("Ymd") . "_" . $nik . ".png";
    $file_path = $penyimpanan . $file_name;

    // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
    // $qr = QRcode::png($isi, $penyimpanan . "qrcodeku.png", QR_ECLEVEL_H);
    $qr = QRcode::png($isi, $file_path, 'L');
    $gambar_logo = 'lsp_tani_logo.jpg';

    $data = [
      'users' => $this->db->where('nik', $nik)->get('users')->row_array(),
      'nik_user' => $isi,
      'qr_code' => $qr,
      'gambar_name' => $file_name,
      'gambar_logo' => $gambar_logo
    ];

    // $this->load->view('member/test', $data, true);

    $this->load->library('pdfgenerator');
    $data['title'] = "KTNA CARD";
    $file_pdf = $data['title'];
    $paper = 'A5'; //15x25mm.
    $orientation = "landscape";
    $html = $this->load->view('member/kartuktna', $data, true);
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }
}
