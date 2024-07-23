<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{
  public function get_nomor()
  {
    return $this->db->select('max(nomor_urut) as max')->get('profil')->row_array();
  }
}
