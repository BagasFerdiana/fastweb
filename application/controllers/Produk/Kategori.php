<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
      $this->load->model('kategori_model', 'kategori');
    }
    //START KONTROLLER_KATEGORI
    public function index()
    {
      $data['title'] = 'Kategori Produk';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $data['kategori'] = $this->kategori->getKategori();

      $this->form_validation->set_rules('kategori', 'Kategori', 'required');

      if ($this->form_validation->run() == false) {
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('produk/kategori', $data);
          $this->load->view('templates/footer');
      } else {
          $this->kategori->addKategori();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori baru ditambahkan!</div>');
          redirect('produk/kategori');
      }
    }
    public function delete($k_id)
    {
      $this->kategori->delKategori($k_id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil dihapus!</div>');
      redirect('produk/kategori');
    }

    public function edit($k_id)
    {
      $data['kategori'] = $this->kategori->getKategoriId($k_id);
      $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
              $this->load->view('templates/header', $data);
              $this->load->view('templates/sidebar', $data);
              $this->load->view('templates/topbar', $data);
              $this->load->view('produk/kategori', $data);
              $this->load->view('templates/footer');
        } else {
          $this->kategori->updateKategori();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori telah diubah!</div>');
          redirect('produk/kategori');
      }
    }
    //END KONTROLLER_KATEGORI

  }
