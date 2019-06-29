<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek_model extends CI_Model {

  //START MEREK_MODEL
  public function getMerek()
  {
    $query = "SELECT `merek_produk`.*, `kategori_produk`.`kategori`
              FROM `merek_produk` JOIN `kategori_produk`
              ON `merek_produk`.`kategori_id` = `kategori_produk`.`kategori_id`
            ";
    return $this->db->query($query)->result_array();
  }

  public function addMerek()
  {
    $data = [
        "kategori_id" => $this->input->post('kategori_id', true),
        "merek" => $this->input->post('merek', true)
    ];
    $this->db->insert('merek_produk', $data);
  }

    public function delMerek($m_id)
  {
    $this->db->delete('merek_produk', ['merek_id' => $m_id]);
  }

    public function getMerekId($m_id)
  {
    $merek = $this->db->get_where('merek_produk', ['merek_id' => $m_id])->row_array();
    return $merek;
  }

    public function updateMerek()
  {
    $data = [
        "kategori_id" => $this->input->post('kategori_id', true),
        "merek" => $this->input->post('merek', true)
    ];

    $this->db->where('merek_id', $this->input->post('id'));
    $this->db->update('merek_produk', $data);
  }
  //END MEREK_MODEL
}
