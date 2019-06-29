<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier_model extends CI_Model {

  //START SUPLIER_MODEL
  public function getSuplier()
  {
    $suplier = $this->db->get('suplier')->result_array();
    return $suplier;
  }

  public function addSuplier()
  {
    $data = [
        "nama_suplier" => $this->input->post('nama_suplier', true),
        "alamat" => $this->input->post('alamat', true),
        "notelp" => $this->input->post('notelp', true)
    ];
    $this->db->insert('suplier', $data);
  }

    public function delSuplier($s_id)
  {
    $this->db->delete('suplier', ['suplier_id' => $s_id]);
  }

    public function getSuplierId($s_id)
  {
    $suplier = $this->db->get_where('suplier', ['suplier_id' => $s_id])->row_array();
    return $suplier;
  }

    public function updateSuplier()
  {
    $data = [
      "nama_suplier" => $this->input->post('nama_suplier', true),
      "alamat" => $this->input->post('alamat', true),
      "notelp" => $this->input->post('notelp', true)
    ];

    $this->db->where('suplier_id', $this->input->post('id'));
    $this->db->update('suplier', $data);
  }
  //END SUPLIER_MODEL
}
