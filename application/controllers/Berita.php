<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->library(array('form_validation', 'mailer'));
    // 
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $data['title'] = 'Berita';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('berita/index', $data);
    $this->load->view('templates/footer');
  }
}
