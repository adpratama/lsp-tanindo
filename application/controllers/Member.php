<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . "libraries/qrcode/qrlib.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    $data['title'] = 'Data Member Tanindo';

    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->database();
    $data['users'] = $this->M_member->get_datamember();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('member/index', $data);
    $this->load->view('templates/footer');
  }

  public function kartumember($nik) // untuk LSP Tanindo
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
    $data['title'] = "Kartu Anggota KTNA";
    $file_pdf = $data['title'];
    $paper = 'A5'; //15x25mm.
    $orientation = "landscape";
    // $html = $this->load->view('member/kartutanindo', $data, true);
    $html = $this->load->view('member/kartutanindo', $data, true);
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }

  public function dataktna()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->database();
    $data['profil'] = $this->M_member->get_data_ktna();

    $data['title'] = 'Data Member KTNA';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('member/dataktna', $data);
    $this->load->view('templates/footer');
  }

  public function kartuktna($nik) // untuk KArtu KTNA
  {
    // $this->load->library('ciqrcode');
    $nik = $this->uri->segment(3);
    // nama folder tempat penyimpanan file qrcode
    $penyimpanan = "assets/img/kartu/";

    // membuat folder dengan nama "temp"
    if (!file_exists($penyimpanan))
      mkdir($penyimpanan);

    // isi qrcode yang ingin dibuat. akan muncul saat di scan
    $isi = base_url('home/biodataktna/') . $nik;

    $file_name = date("Ymd") . "_" . $nik . ".png";
    $file_path = $penyimpanan . $file_name;

    // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
    // $qr = QRcode::png($isi, $penyimpanan . "qrcodeku.png", QR_ECLEVEL_H);
    $qr = QRcode::png($isi, $file_path, 'L');
    $gambar_logo = 'ktna.png';

    $data = [
      'profil' => $this->db->where('nik', $nik)->get('profil')->row_array(),
      'nik_user' => $isi,
      'qr_code' => $qr,
      'gambar_name' => $file_name,
      'gambar_logo' => $gambar_logo
    ];

    // $this->load->view('member/test', $data, true);

    $this->load->library('pdfgenerator');
    $data['title'] = "Kartu Anggota KTNA";
    $file_pdf = $data['title'];
    $paper = 'A5'; //15x25mm.
    $orientation = "landscape";
    // $html = $this->load->view('member/kartutanindo', $data, true);
    $html = $this->load->view('member/test', $data, true);
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }

  public function report_excel()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    foreach (range('A', 'F') as $coulumID) {
      $spreadsheet->getActiveSheet()->getColumnDimension($coulumID)->setAutoSize(true);
    }
    $sheet->setCellValue('A1', 'NIP');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Jabatan');
    $sheet->setCellValue('E1', 'Alamat');
    $sheet->setCellValue('F1', 'Nomor Hp');

    $profil = $this->db->order_by('uid', 'DESC')->get('profil')->result_array();

    $x = 2; //stert from 2
    foreach ($profil as $row) {
      if ($row['jabatan'] == 1) {
        $jabatan_user = 'Ketua Umum';
      } elseif ($row['jabatan'] == 2) {
        $jabatan_user = 'Sekertariat Jendral';
      } elseif ($row['jabatan'] == 3) {
        $jabatan_user = 'Bendahara Umum';
      } elseif ($row['jabatan'] == 4) {
        $jabatan_user = 'Ketua Provinsi';
      } elseif ($row['jabatan'] == 5) {
        $jabatan_user = 'Dep. Kelautan dan Perikanan';
      } elseif ($row['jabatan'] == 6) {
        $jabatan_user = 'Dep. Kemitraan Strategis dan Advokasi';
      } elseif ($row['jabatan'] == 7) {
        $jabatan_user = 'Dep.LITBANG';
      } elseif ($row['jabatan'] == 8) {
        $jabatan_user = 'Dep. Media Informasi dan Komunikasi';
      } elseif ($row['jabatan'] == 9) {
        $jabatan_user = 'Dep. Hukum & HAM';
      } else {
        $jabatan_user = 'Anggota';
      }
      $sheet->setCellValue('A' . $x, $row['nomor_urut']);
      $sheet->setCellValue('B' . $x, $row['full_name']);
      $sheet->setCellValue('C' . $x, $row['email']);
      $sheet->setCellValue('D' . $x, $jabatan_user);
      $sheet->setCellValue('E' . $x, $row['alamat']);
      $sheet->setCellValue('F' . $x, $row['phone_number']);
      $x++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'user_detail_report.xlsx';
    // $writer->save($fileName); //this is for save in folder

    // for force download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    $writer->save('php://output');
    // for force download end
  }
}
