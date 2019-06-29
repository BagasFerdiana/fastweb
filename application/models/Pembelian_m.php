<?php
class Pembelian_m extends CI_Model  {

	function simpan_pembelian($nofak,$tglfak,$suplier,$beli_kode)  {

		$this->db->query("INSERT INTO beli_produk
		(beli_nofak,beli_tanggal,beli_suplier_id,beli_user_id,beli_kode)
    VALUES ('$nofak','$tglfak','$suplier','$idadmin','$beli_kode')");

    foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_beli_nofak' 		=>	$nofak,
				'd_beli_barcode'	=>	$item['id'],
				'd_beli_harga'		=>	$item['price'],
				'd_beli_jumlah'		=>	$item['qty'],
				'd_beli_total'		=>	$item['subtotal'],
				'd_beli_kode'		  =>	$beli_kode
			);
			$this->db->insert('tbl_detail_beli',$data);
			$this->db->query("update list_produk
      set stok=stok+'$item[qty]',
      harga_pk='$item[price]',
      harga_ec='$item[harga]'
      where lp_id='$item[id]'
      ");
    }
    return true;
	}

  function get_kobel() {
		$q = $this->db->query("SELECT MAX(RIGHT(beli_kode,6)) AS kd_max FROM tbl_beli WHERE DATE(beli_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BL".date('dmy').$kd;
	}
}
