<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
      $this->load->model('lp_model', 'lp');
      $this->load->model('merek_model', 'merek');
      $this->load->model('kategori_model', 'kategori');
    }
    //START KONTROLLER_KATEGORI
    public function index()
    {
      $data['title'] = 'Data Produk';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $data['barcode'] = $this->lp->getBarcode();
      $data['produk'] = $this->lp->getLp();
      $data['merek'] = $this->merek->getMerek();
      $data['kategori'] = $this->kategori->getKategori();

      $this->form_validation->set_rules('barcode', 'Barcode', 'required');
      $this->form_validation->set_rules('nama_pr', 'Nama_pr', 'required');
      $this->form_validation->set_rules('stok', 'Stok', 'required');
      $this->form_validation->set_rules('satuan', 'Satuan', 'required');
      $this->form_validation->set_rules('harga_ec', 'Harga_ec', 'required');
      $this->form_validation->set_rules('harga_gr', 'Harga_gr', 'required');

      if ($this->form_validation->run() == false) {
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('produk/list', $data);
          $this->load->view('templates/footer');
      } else {
          $this->lp->addLp();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk baru ditambahkan!</div>');
          redirect('produk/data');
      }
    }
    public function delete($lp_id)
    {
      $this->lp->delLp($lp_id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil dihapus!</div>');
      redirect('produk/data');
    }

    public function edit($lp_id)
    {
      $data['merek'] = $this->merek->getMerek();
      $data['kategori'] = $this->kategori->getKategori();
      $data['prodak'] = $this->lp->getLpId($lp_id);

      $this->form_validation->set_rules('barcode', 'Barcode', 'required');
      $this->form_validation->set_rules('nama_pr', 'Nama_pr', 'required');
      $this->form_validation->set_rules('stok', 'Stok', 'required');
      $this->form_validation->set_rules('satuan', 'Satuan', 'required');
      $this->form_validation->set_rules('harga_ec', 'Harga_ec', 'required');
      $this->form_validation->set_rules('harga_gr', 'Harga_gr', 'required');

      if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/list', $data);
            $this->load->view('templates/footer');
        } else {
          $this->lp->updateLp();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk telah diubah!</div>');
          redirect('produk/data');
      }
    }
    //END KONTROLLER_KATEGORI

  }
