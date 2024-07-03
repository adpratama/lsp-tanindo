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

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/change_password', $data);
    $this->load->view('templates/footer');
  }

  public function testing()
  {
    $cat_image_name = $_FILES["cat_image"]["name"];

    //file uploading params
    $config['upload_path'] = './uploaded_files/categories';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['file_name'] = $image_id . "_ipad";
    $config['remove_spaces'] = TRUE;

    //Loading Library - File Uploading
    $this->load->library('upload', $config);

    //Upload the image(Ipad)
    if (!empty($cat_image_name)) {
      $this->upload->do_upload('cat_image');
      $data = array('upload_data' => $this->upload->data());
      $category_image_ipad = $data['upload_data']['file_name'];
      $img_extension = $data['upload_data']['file_ext'];
    }
  }

  //   private function uploadPhoto($slug)
  //     {
  //         $photo = $_FILES['team_photo']['name'];
  //         $path_info = pathinfo($photo);
  //         $extension = $path_info['extension'];
  //         $new_photo_file_name = $slug . '.' . $extension;

  //         $config = [
  //             'upload_path' => 'assets/front/images/team/',
  //             'allowed_types' => 'jpeg|jpg|JPEG|JPG|PNG|png',
  //             'overwrite' => TRUE,
  //             'max_size' => '99999999999',
  //             'max_height' => '3000',
  //             'max_width' => '3000',
  //             'file_name' => $new_photo_file_name,
  //         ];

  //         $this->load->library('upload', $config);

  //         if (!$this->upload->do_upload('team_photo')) {
  //             $error = $this->upload->display_errors();
  //             $this->session->set_flashdata('message_error', 'Error message: ' . $error);
  //             redirect($_SERVER['HTTP_REFERER'], $error);
  //         }

  //         return $new_photo_file_name;
  //     }
}
