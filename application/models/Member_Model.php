<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_Model extends CI_Model
{
  public function get_datamember()
  {
    $query = "SELECT * FROM `users` WHERE `uid` >= 10 ORDER BY uid DESC";
    return $this->db->query($query)->result_array();
    // $this->db->select('*');
    // $this->db->get('users');
    // $this->db->where('uid >=', 10);
  }

  public function data($number, $offset)
  {
    return $query = $this->db->get('users', $number, $offset)->result_array();
  }

  //ambil data
  public function lihat($sampai, $dari, $like = '')
  {
    if ($like) {
      $this->db->where($like);
    }

    $query = $this->db->get('users', $sampai, $dari);
    return $query->result_array();
  }
}
