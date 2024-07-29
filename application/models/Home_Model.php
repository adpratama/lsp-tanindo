<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{
  public function get_nomor()
  {
    return $this->db->select('max(nomor) as max')->get('profil')->row_array();
  }
  public function get_nomor_urut()
  {
    return $this->db->select('max(nomor_urut) as nomor_max')->get('profil')->row_array();
  }
}
