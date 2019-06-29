<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lp_model extends CI_Model {

  //START MEREK_MODEL
  public function getBarcode()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(barcode,6)) AS kd_max FROM list_produk");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
  }

  public function getLp()
  {
    $this->db->select('*');
    $this->db->from('List_produk a');
    $this->db->join('Kategori_produk b', 'b.kategori_id=a.kategori_id', 'left');
    $query = $this->db->get();
    return $query->result_array();

  }

    public function getLpId($lp_id)
  {
    $query = $this->db->get_where('list_produk', ['lp_id' => $lp_id])->row_array();
    return $query;
  }

    public function getProduk($barcode){
		$hsl = $this->db->query("SELECT * FROM list_produk where barcode='$barcode'");
		return $hsl;
	}

  public function addLp()
  {
    $data = [
        "barcode" => $this->input->post('barcode', true),
        "kategori_id" => $this->input->post('kategori_id', true),
        "nama_pr" => $this->input->post('nama_pr', true),
        "stok" => $this->input->post('stok', true),
        "satuan" => $this->input->post('satuan', true),
        "harga_ec" => $this->input->post('harga_ec', true),
        "harga_gr" => $this->input->post('harga_gr', true)
    ];
    $this->db->insert('list_produk', $data);
  }

    public function delLp($lp_id)
  {
    $this->db->delete('list_produk', ['lp_id' => $lp_id]);
  }

    public function updateLp()
  {
    $data = [
        "barcode" => $this->input->post('barcode', true),
        "kategori_id" => $this->input->post('kategori_id', true),
        "nama_pr" => $this->input->post('nama_pr', true),
        "stok" => $this->input->post('stok', true),
        "satuan" => $this->input->post('satuan', true),
        "harga_ec" => $this->input->post('harga_ec', true),
        "harga_gr" => $this->input->post('harga_gr', true)
    ];

    $this->db->where('lp_id', $this->input->post('id'));
    $this->db->update('list_produk', $data);
  }
  //END MEREK_MODEL
}
