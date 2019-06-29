<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
      $this->load->model('merek_model', 'merek');
      $this->load->model('kategori_model', 'kategori');
    }
    //START KONTROLLER_KATEGORI
    public function index()
    {
      $data['title'] = 'Merek Produk';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $data['merek'] = $this->merek->getMerek();
      $data['kategori'] = $this->kategori->getKategori();

      $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
      $this->form_validation->set_rules('merek', 'Merek', 'required');

      if ($this->form_validation->run() == false) {
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('produk/merek', $data);
          $this->load->view('templates/footer');
      } else {
          $this->merek->addMerek();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Merek baru ditambahkan!</div>');
          redirect('produk/merek');
      }
    }
    public function delete($m_id)
    {
      $this->merek->delMerek($m_id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Merek berhasil dihapus!</div>');
      redirect('produk/merek');
    }

    public function edit($m_id)
    {
      $data['merek'] = $this->merek->getMerekId($m_id);
      $data['kategori'] = $this->kategori->getKategori();
      $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
      $this->form_validation->set_rules('merek', 'Merek', 'required');

        if ($this->form_validation->run() == false) {
              $this->load->view('templates/header', $data);
              $this->load->view('templates/sidebar', $data);
              $this->load->view('templates/topbar', $data);
              $this->load->view('produk/merek', $data);
              $this->load->view('templates/footer');
        } else {
          $this->merek->updateMerek();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Merek telah diubah!</div>');
          redirect('produk/merek');
      }
    }
    //END KONTROLLER_KATEGORI

  }
