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
}
