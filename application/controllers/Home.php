<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    // if (!$this->session->userdata('email')) {
    //   redirect('home');
    // }
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

    // $data['user'] = $this->db->get_where('users', $nik)->row_array();
    $query = "SELECT * FROM `users` WHERE `nik` = $nik";
    $data['user'] = $this->db->query($query)->row_array();
    // var_dump($data, $nik);
    // exit;

    $data['title'] = 'Biodata';
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

  public function biodataktna()
  {
    $data['title'] = 'Biodata Member';
    $this->load->view('templates/header_ktna', $data);
    $this->load->view('home/biodata_ktna');
    $this->load->view('templates/footer_ktna');
  }
}
