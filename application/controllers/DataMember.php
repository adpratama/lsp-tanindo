<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . "libraries/phpqrcode/qrlib.php";

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
    // $penyimpanan = "assets/img/kartu";
    // $query = "SELECT email FROM users WHERE uid=$uid";
    // $a = $this->db->query($query)->row_array();

    // if (!file_exists($penyimpanan))
    //   mkdir($penyimpanan);
    // $param = base_url('datamember/kartuktna/') . $uid;
    // $qr = QRcode::png($param, $penyimpanan . 'qrcodeku.png', QR_ECLEVEL_H);
    // $data = [
    //   // 'sertifikate' => $this->db->where('uid', $uid)->get('users')->row_array(),
    //   'nama' => $this->db->where('full_name', $a['full_name'])->get('users')->row(),
    //   'qr_code' => $qr
    // ];

    // if (empty($data['sertifikate'])) {
    //   echo "<script>alert('Data tidak ditemukan!');window.location.replace('" . base_url('/user/sertifikate') . "'); </script>";
    // } else if (count($data['nilai']) < 1) {
    //   echo "<script>alert('Belum ada nilai!');window.location.replace('" . base_url('/user/sertifikate') . "'); </script>";
    // } else {
    //   $this->load->view('user/sertifikate_pdf', $data);
    // }

    $this->load->library('pdfgenerator');
    $data['title'] = "KTNA Card";
    $file_pdf = $data['title'];
    $paper = 'A5'; //15x25mm.
    $orientation = "landscape";
    $html = $this->load->view('datamember/kartuktna', $data, true);
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }
}
