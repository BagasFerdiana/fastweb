<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
      $this->load->model('suplier_model', 'suplier');
    }
    //START KONTROLLER_KATEGORI
    public function index()
    {
      $data['title'] = 'Suplier';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $data['suplier'] = $this->suplier->getSuplier();

      $this->form_validation->set_rules('nama_suplier', 'Suplier', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('notelp', 'Notelp', 'required');

      if ($this->form_validation->run() == false) {
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('produk/suplier', $data);
          $this->load->view('templates/footer');
      } else {
          $this->suplier->addSuplier();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Suplier baru ditambahkan!</div>');
          redirect('produk/suplier');
      }
    }
    public function delete($s_id)
    {
      $this->suplier->delSuplier($s_id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Suplier berhasil dihapus!</div>');
      redirect('produk/suplier');
    }

    public function edit($s_id)
    {
      $data['suplier'] = $this->suplier->getSuplierId($s_id);
      $this->form_validation->set_rules('nama_suplier', 'Suplier', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('notelp', 'Notelp', 'required');

        if ($this->form_validation->run() == false) {
              $this->load->view('templates/header', $data);
              $this->load->view('templates/sidebar', $data);
              $this->load->view('templates/topbar', $data);
              $this->load->view('produk/suplier', $data);
              $this->load->view('templates/footer');
        } else {
          $this->suplier->updateSuplier();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Suplier telah diubah!</div>');
          redirect('produk/suplier');
      }
    }
    //END KONTROLLER_KATEGORI

  }
