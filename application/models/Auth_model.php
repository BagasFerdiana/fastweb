<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function addUser()
  {
    $data['kategori'] = $this->db->get('kategori_produk')->result_array();
  }
}
