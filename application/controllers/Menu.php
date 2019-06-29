<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      is_logged_in();
      $this->load->model('menu_model');
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu_model->addMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
      $this->menu_model->delMenu($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus!</div>');
      redirect('menu');
    }

    public function edit($m_id)
    {
      $data['title'] = 'Menu Management';
      $data['menu'] = $this->menu_model->getMenuId($m_id);
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
              $this->load->view('templates/header', $data);
              $this->load->view('templates/sidebar', $data);
              $this->load->view('templates/topbar', $data);
              $this->load->view('menu/index', $data);
              $this->load->view('templates/footer');
        } else {
          $this->menu_model->updateMenu();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu telah diubah!</div>');
          redirect('menu');
      }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['subMenu'] = $this->menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu_model->addSubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete_s($id)
    {
      $this->menu_model->delSubMenu($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu berhasil dihapus!</div>');
      redirect('menu/submenu');
    }

    public function edit_s($sm_id)
    {
      $data['title'] = 'Submenu Management';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $data['submenu'] = $this->menu_model->getSubMenuId($sm_id);
      $data['menu'] = $this->db->get('user_menu')->result_array();

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('menu_id', 'Menu', 'required');
      $this->form_validation->set_rules('url', 'URL', 'required');
      $this->form_validation->set_rules('icon', 'icon', 'required');

      if ($this->form_validation->run() ==  false) {
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('menu/submenu', $data);
          $this->load->view('templates/footer');
      } else {
          $this->menu_model->updateSubMenu();
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu telah diupdated!</div>');
          redirect('menu/submenu');
      }
    }
}
