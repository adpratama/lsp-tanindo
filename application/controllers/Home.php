<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('form_validation', 'mailer'));
    // if (!$this->session->userdata('email')) {
    //   redirect('home');
    // }
    $this->load->model('Home_Model', 'H_member');
  }

  public function index()
  {
    $data['title'] = 'Pertanian';
    $this->load->view('templates/v_header', $data);
    $this->load->view('home/index');
    $this->load->view('templates/v_footer');
  }

  public function biodata($nik)
  {
    $nik = $this->uri->segment(3);

    $query = "SELECT * FROM `users` WHERE `nik` = $nik";
    $data['user'] = $this->db->query($query)->row_array();
    // var_dump($data, $nik);
    // exit;

    $data['title'] = 'Biodata Member LSP Tanindo';
    $this->load->view('templates/v_header', $data);
    $this->load->view('home/biodata', $data);
    $this->load->view('templates/v_footer');
  }

  public function regisktna()
  {
    $data['title'] = 'Register KTNA';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('home/regisktna');
    $this->load->view('templates/auth_footer');
  }

  public function insertktna()
  {
    $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[profil.nik]');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[profil.email]');
    $this->form_validation->set_rules('tem_lahir', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Tempat_lahir', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
    $this->form_validation->set_rules('nomor_hp', 'Nomor Hp', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Register KTNA';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('home/regisktna');
      $this->load->view('templates/auth_footer');
    } else {
      $nik = $this->input->post('nik');
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $tem_lahir = $this->input->post('tem_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jabatan = $this->input->post('jabatan');
      $alamat = $this->input->post('alamat');
      $provinsi = $this->input->post('provinsi');
      $nomor_hp = $this->input->post('nomor_hp');

      // cek jika ada foto
      $upload_img = $_FILES['foto_profil']['name'];
      // var_dump($upload_img);

      if ($upload_img) {
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size']     = '2048';
        $config['remove_spaces'] = TRUE;
        $config['upload_path'] = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_profil')) {
          $new_img = $this->upload->data('file_name');
          // $data1 = $new_img;

          echo 'true';
        } else {
          echo $this->upload->display_errors();

          echo 'false';
        }
      }

      // query mengambil urutan terbesar 
      $nomor = $this->H_member->get_nomor();

      // $ambil_depan = substr($nomor['max'], 5, 6);
      $ambil_depan = substr($nomor['max'], 6, 6);
      $nomor = $ambil_depan + 1;
      $no_urut = sprintf("%06d", $nomor);
      // print_r($nomor['max']);
      // var_dump($ambil_depan, $nomor);

      // membuat nomor urut baru
      // $post_date = date('Y');
      $nomor_user = "$provinsi-00-$no_urut";

      $data_insert = array(
        'nik' => $nik,
        'full_name' => $username,
        'email' => $email,
        'nomor_urut' => $nomor_user,
        'jabatan' => $jabatan,
        'tempat_lahir' => $tem_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'alamat' => $alamat,
        'provinsi' => $provinsi,
        'phone_number' => $nomor_hp,
        'image' => $new_img
      );

      // var_dump($data_insert);
      // exit;

      $this->db->insert('profil', $data_insert);

      // kirim email
      $this->notifemail($data_insert);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil Tersimpan!! silahkan login
      </div>');
      redirect('home');
    }
  }

  public function notifemail($data_insert)
  {
    include APPPATH . 'libraries/smtpmail/librarysmtp/autoload.php';

    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
      $mail->isSMTP();   //Send using SMTP
      $mail->Host       = 'mail.lsptanindo.com'; //hostname/domain yang dipergunakan untuk setting smtp
      $mail->SMTPAuth   = true;  //Enable SMTP authentication
      // $mail->Username   = 'mukhbit97@gmail.com'; //SMTP username
      // $mail->Password   = 'eoqa xxwn sufg nijt';   //SMTP password
      $mail->Username   = 'admin@lsptanindo.com'; //SMTP username
      $mail->Password   = 'lsp123!@#';   //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
      $mail->Port       = 465;   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('admin@lsptanindo.com', 'Website KTNA');
      $mail->addAddress($data_insert['email'], $data_insert['full_name']);     //email tujuan
      // $mail->addReplyTo('admin@lsptanindo.com', 'Information'); //email tujuan add reply (bila tidak dibutuhkan bisa diberi pagar)
      $mail->addCC('admin@lsptanindo.com'); // email cc (bila tidak dibutuhkan bisa diberi pagar)
      // $mail->addBCC('mukhbit97@gmail.com'); // email bcc (bila tidak dibutuhkan bisa diberi pagar)

      //Content
      $mail->isHTML(true);   //Set email format to HTML
      $mail->Subject = 'Notifikasi Registrasi Akun Baru';
      $mail->Body    = 'Selamat Kepada ' . $data_insert['full_name'] . ' Telah berhasil membuat akun di Web site KTNA silahkan Coba Login Ke web site Kami Untuk Melengkapi data yang belum ada';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }


  public function biodataktna($nik)
  {
    $nik = $this->uri->segment(3);

    $query = "SELECT * FROM `profil` WHERE `nik` = $nik";
    $data['profil'] = $this->db->query($query)->row_array();
    // var_dump($data, $nik);
    // exit;

    $data['title'] = 'Biodata Member KTNA';
    $this->load->view('templates/header_ktna', $data);
    $this->load->view('home/biodata_ktna', $data);
    $this->load->view('templates/footer_ktna');
  }
}
