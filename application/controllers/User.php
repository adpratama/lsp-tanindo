<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();

  }

  public function index()
  {
    $data['title'] = 'My Profile';

    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit_profile()
  {
    $data['title'] = 'Edit Profile';

    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/edit_profil', $data);
      $this->load->view('templates/footer');
    } else {
      $username = $this->input->post('username');
      $fullname = $this->input->post('fullname');
      $phone = $this->input->post('phone');
      $alamat = $this->input->post('alamat');
      $email = $this->input->post('email');

      // cek jika ada gambar
      $upload_img = $_FILES['image']['name'];
      // var_dump($upload_img);
      // die;

      if ($upload_img) {
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '2048';
        $config['remove_spaces'] = TRUE;
        $config['upload_path'] = './assets/img/profile';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['user']['image'];
          if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          $new_img = $this->upload->data('file_name');
          $this->db->set('foto', $new_img);

          echo 'true';
        } else {
          echo $this->upload->display_errors();

          echo 'false';
        }
      }
      // exit;

      $this->db->set('phone_number', $phone);
      $this->db->set('full_name', $fullname);
      $this->db->set('username', $username);
      $this->db->set('alamat', $alamat);
      $this->db->where('email', $email);
      $this->db->update('users');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your profile has Ben Update!
      </div>');
      redirect('user');
    }
  }

  public function change_password()
  {
    $data['title'] = 'Change Password';

    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confrim New Password', 'required|trim|min_length[8]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/change_password', $data);
      $this->load->view('templates/footer');
    } else {
      $current_passwors = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');

      if (!password_verify($current_passwors, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
          Wrong Current Password!!
        </div>');
        redirect('user/change_password');
      } else {
        if ($current_passwors == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Cannot be the same Old Password</div>');
          redirect('user/change_password');
        } else {
          // password sudah ok
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('users');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
          redirect('user/change_password');
        }
      }
    }
  }
}
