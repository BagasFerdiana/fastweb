<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
      $this->load->model('pembelian_m', 'beli');
      $this->load->model('lp_model', 'lp');
      $this->load->model('suplier_model', 'suplier');
    }
    //START KONTROLLER_KATEGORI
    public function index()
    {
      $data['title'] = 'Pembelian Produk';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
      $data['suplier'] = $this->suplier->getSuplier();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('produk/pembelian', $data);
      $this->load->view('templates/footer');
    }
    public function get_produk()
    {
      $barcode = $this->input->post('barcode');
      $data['produk'] = $this->lp->getProduk($barcode);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('produk/pembelian', $data);
      $this->load->view('templates/footer');
    }
    public function add_to_cart()
    {
      $nofak = $this->input->post('nofak');
      $tgl = $this->input->post('tgl');
      $suplier = $this->input->post('suplier');

      $this->session->set_userdata('nofak', $nofak);
      $this->session->set_userdata('tglfak', $tgl);
      $this->session->set_userdata('suplier', $suplier);

      $barcode = $this->input->post('barcode');
      $produk = $this->lp->getProduk($barcode);
      $i = $produk->row_array();
      $data = array(
        'id'    => $i['barcode'],
        'name'    => $i['nama_pr'],
        'satuan'    => $i['satuan'],
        'price'    => $this->input->post('harpok'),
        'harga'    => $this->input->post('harjul'),
        'qty'    => $this->input->post('jumlah')
      );

      $this->cart->insert($data);
      redirect('produk/pembelian');
    }
    public function remove()
    {
      $row_id = $this->uri->segment(4);
      $this->cart->update(array(
          'rowid'   => $row_id,
          'qty'   => 0
      ));

      redirect('produk/pembelian');
    }
    public function simpan_pembelian()
    {
      $nofak = $this->session->userdata('nofak');
      $tglfak = $this->session->userdata('tglfak');
      $suplier = $this->session->userdata('suplier');

      if (!empty($nofak) && !empty($tglfak) && !empty($suplier)) {
        $beli_kode = $this->beli->get_kobel();
        $order_proses = $this->beli->simpan_pembelian($nofak,$tglfak,$suplier,$beli_kode);
        if ($order_proses) {
          $this->cart->destroy();
          $this->session->unset_userdata('nofak');
          $this->session->unset_userdata('tglfak');
          $this->session->unset_userdata('suplier');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembelian telah berhasil disimpan ke dalam database!</div>');
          redirect('produk/pembelian');
        } else {
          redirect('produk/pembelian');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pembelian gagal disimpan, Mohon diperiksa kembali!</div>');
        redirect('produk/pembelian');
      }
    }
}
