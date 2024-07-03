<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_Model extends CI_Model
{
  public function update_data($data, $table)
  {
    $this->db->where('uid', $data['uid']);
    $this->db->update($table, $data);
  }
  public function delete($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
  public function getSubmenu()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`uid`";
    return $this->db->query($query)->result_array();
  }

  public function update_data_submenu($data, $table)
  {
    $this->db->where('uid', $data['uid']);
    $this->db->update($table, $data);
  }
  public function delete_submenu($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function update_data_role($data, $table)
  {
    $this->db->where('uid', $data['uid']);
    $this->db->update($table, $data);
  }
  public function delete_role($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
}
