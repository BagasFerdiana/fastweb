<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model {

  //START KATEGORI_MODEL
  public function getKategori()
  {
    $kategori = $this->db->get('kategori_produk')->result_array();
    return $kategori;
  }

  public function addKategori()
  {
    $this->db->insert('kategori_produk', ['kategori' => $this->input->post('kategori')]);
  }

    public function delKategori($k_id)
  {
    $this->db->delete('kategori_produk', ['kategori_id' => $k_id]);
  }

    public function getKategoriId($k_id)
  {
    $kategori = $this->db->get_where('kategori_produk', ['kategori_id' => $k_id])->row_array();
    return $kategori;
  }

    public function updateKategori()
  {
    $data = [
        "kategori" => $this->input->post('kategori', true)
    ];

    $this->db->where('kategori_id', $this->input->post('id'));
    $this->db->update('kategori_produk', $data);
  }
  //END KATEGORI_MODEL
}
