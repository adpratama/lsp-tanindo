<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('form_validation', 'mailer'));
    // 
  }

  public function index()
  {

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    // var_dump($user);
    // die;

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'email' => $user['email'],
          'status_member' => $user['status_member']
        ];
        $this->session->set_userdata($data);

        // redirect('admin');
        if ($user['status_member'] == 1) {
          redirect('datamember');
        } else {
          redirect('user');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Wrong Password!
        </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Email is not registered !
      </div>');
      redirect('auth');
    }
  }

  public function registeration()
  {
    $data['title'] = 'Registration';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/registeration');
    $this->load->view('templates/auth_footer');
  }

  public function insert_data()
  {

    // print_r($_POST);
    // print_r($_FILES);
    // exit;

    $this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[8]|is_unique[users.nik]', [
      'min_length' => 'NIK to short!',
      'is_unique' => 'NIK is already registered'
    ]);
    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
      'is_unique' => 'This email has already registered'
    ]); //
    $this->form_validation->set_rules('no_telp', 'No_Telp', 'required|trim');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
      'matches' => 'password dont match!',
      'min_length' => 'password to short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    // harus di samakan dengan inputan yang terbaru
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('jenkel', 'Jenkel', 'required|trim');
    $this->form_validation->set_rules('kebangsaan', 'Kebangsaan', 'required|trim');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_Lahir', 'required|trim');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
    $this->form_validation->set_rules('nama_perusahaan', 'Nama_Perusahaan', 'required|trim');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
    $this->form_validation->set_rules('alamat_kantor', 'Alamat_Kantor', 'required|trim');
    $this->form_validation->set_rules('no_telp_kantor', 'No_telp_kantor', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registeration');
      $this->load->view('templates/auth_footer');
    } else {
      $nik = $this->input->post('nik');
      $username = $this->input->post('name');
      $fullname = $this->input->post('fullname');
      $phone = $this->input->post('no_telp');
      $email = $this->input->post('email');
      $password = password_hash('password1', PASSWORD_DEFAULT);
      $alamat = $this->input->post('alamat');
      $jenkel = $this->input->post('jenkel');
      $kebangsaan = $this->input->post('kebangsaan');
      $tempat_lahir = $this->input->post('tempat_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $pendidikan = $this->input->post('pendidikan');
      $nama_perusahaan = $this->input->post('nama_perusahaan');
      $jabatan = $this->input->post('jabatan');
      $alamat_kantor = $this->input->post('alamat_kantor');
      $no_telp_kantor = $this->input->post('no_telp_kantor');
      $status_member = 2;

      // cek jika ada foto
      $upload_img = $_FILES['foto']['name'];

      if ($upload_img) {
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size']     = '2048';
        $config['remove_spaces'] = TRUE;
        $config['upload_path'] = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $new_img = $this->upload->data('file_name');
          $data1 = $new_img;

          echo 'true';
        } else {
          echo $this->upload->display_errors();

          echo 'false';
        }
      }

      // cek jika ada sertif
      $upload_img = $_FILES['sertif']['name'];

      if ($upload_img) {
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size']     = '2048';
        $config['remove_spaces'] = TRUE;
        $config['upload_path'] = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sertif')) {
          $sertif_img = $this->upload->data('file_name');
          $data2 = $sertif_img;

          echo 'true';
        } else {
          echo $this->upload->display_errors();

          echo 'false';
        }
      }

      // cek jika ada kartuk
      $upload_img = $_FILES['kartuk']['name'];

      if ($upload_img) {
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size']     = '2048';
        $config['remove_spaces'] = TRUE;
        $config['upload_path'] = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('kartuk')) {
          $kartuk_img = $this->upload->data('file_name');
          $data3 = $kartuk_img;

          echo 'true';
        } else {
          echo $this->upload->display_errors();

          echo 'false';
        }
      }

      // cek jika ada suratk
      $upload_img = $_FILES['suratk']['name'];

      if ($upload_img) {
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size']     = '2048';
        $config['remove_spaces'] = TRUE;
        $config['upload_path'] = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('suratk')) {
          $suratk_img = $this->upload->data('file_name');
          $data4 = $suratk_img;

          echo 'true';
        } else {
          echo $this->upload->display_errors();

          echo 'false';
        }
      }

      $mydata = array(
        'nik' => $nik,
        'username' => $username,
        'full_name' => $fullname,
        'phone_number' => $phone,
        'email' => $email,
        'password' => $password,
        'alamat' => $alamat,
        'jenkel' => $jenkel,
        'kebangsaan' => $kebangsaan,
        'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'pendidikan_terakhir' => $pendidikan,
        'nama_perusahaan' => $nama_perusahaan,
        'jabatan' => $jabatan,
        'alamat_kantor' => $alamat_kantor,
        'no_telp_kantor' => $no_telp_kantor,
        'foto' => $data1,
        'kartu_keluarga' => $data2,
        'sertif' => $data3,
        'surat_keterangan' => $data4,
        'status_member' => $status_member
      );

      $this->db->insert('users', $mydata);

      // kirim email
      $this->send_email($mydata);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil Tersimpan!! silahkan login
      </div>');
      redirect('home');
    }
  }

  // private function _sendEmail()
  // {
  //   $config = [
  //     'protocol'  => 'smtp',
  //     'smtp_host' => 'ssl://smtp.googlemail.com',
  //     'smtp_user' => 'viona.noa@bdlwarehouse.com',
  //     'smtp_pass' => 'bdl123!@#',
  //     'smtp_port' => 465,
  //     'mailtype'  => 'html',
  //     'charset'   => 'utf-8',
  //     'newline'   => "\r\n"

  //   ];

  //   $this->load->library('email', $config);

  //   // $this->email->from('viona.noa@bdlwarehouse.com', 'Bandes Training Center');
  //   $this->email->from('viona.noa@bdlwarehouse.com', 'Bandes Training Center');
  //   $this->email->to('mukhbit97@gmail.com');
  //   // $this->email->cc('adm.bec@harints.com');
  //   // $this->email->cc('mukhbit97@gmail.com');
  //   // $this->email->bcc('them@their-example.com');

  //   $this->email->subject('Email Test');
  //   $this->email->message('Testing the email class.');

  //   if ($this->email->send()) {
  //     return true;
  //   } else {
  //     echo $this->email->print_debugger();
  //     die;
  //   }
  // }

  public function send_email($mydata)
  {
    // var_dump($mydata);
    // exit;

    $bodyContent = '';
    foreach ($mydata as $key => $value) {
      $bodyContent .= ucfirst(str_replace('_', ' ', $key)) . ': ' . $value . '<br>';
    }

    $email = "mukhbit97@gmail.com";

    $mail = $this->mailer->load();
    $mail->isSMTP();
    $mail->Host = 'srv42.niagahoster.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'viona.noa@bdlwarehouse.com';
    $mail->Password = 'bdl123!@#';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom("viona.noa@bdlwarehouse.com", "Mlejit");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Testing";
    // $mail->Body    = "Dear, " . $value['username'] . ".<br> Thank you for registering with us!<br><br>" . $bodyContent;
    $mail->Body = "Dear, testing saya mau makan nasi goreng plus telor segunung";

    if ($mail->send()) {
      echo "<br>Berhasil Terkirim";
    } else {
      echo "<br>Gagal Terkirim";
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('status_member');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      You have been loged out!
    </div>');
    redirect('auth');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }
}
