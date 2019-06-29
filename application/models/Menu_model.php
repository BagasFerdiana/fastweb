<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

      public function addMenu()
    {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    }

      public function delMenu($id)
    {
      $this->db->delete('user_menu', ['id' => $id]);
    }

      public function getMenuId($m_id)
    {
      return $this->db->get_where('user_menu', ['id' => $m_id])->row_array();
    }

      public function updateMenu()
    {
      $data = [
          "menu" => $this->input->post('menu', true)
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('user_menu', $data);
    }

      public function getSubMenuId($sm_id)
    {
      return $this->db->get_where('user_menu', ['id' => $sm_id])->row_array();
    }

      public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

      public function addSubMenu()
    {
      $data = [
          'title' => $this->input->post('title'),
          'menu_id' => $this->input->post('menu_id'),
          'url' => $this->input->post('url'),
          'icon' => $this->input->post('icon'),
          'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
    }

      public function delSubMenu($id)
    {
      $this->db->delete('user_sub_menu', ['id' => $id]);
    }

      public function updateSubMenu()
    {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->where('id', $this->input->post('id'));
      $this->db->update('user_sub_menu', $data);
    }
}
