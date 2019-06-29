<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('auth_model');
  }

  public function index()
      {
        if ($this->session->userdata('username')) {
          redirect('user');
      }
          $this->form_validation->set_rules('username', 'username', 'trim|required');
          $this->form_validation->set_rules('password', 'Password', 'trim|required');

          if ($this->form_validation->run() == false) {
              $data['title'] = 'FastWEB Login';
              $this->load->view('templates/auth_header', $data);
              $this->load->view('auth/login');
              $this->load->view('templates/auth_footer');
          } else {
              // validasinya success
              $this->_login();
          }
      }

      private function _login()
      {
          //cek data dulu
          $username = $this->input->post('username');
          $password = $this->input->post('password');

          $user = $this->db->get_where('user', ['username' => $username])->row_array();
            // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'username' => $user['username'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('admin');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda belum diverifikasi!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda belum terdaftar!</div>');
                redirect('auth');
            }
        }
        public function registration()
        {
          if ($this->session->userdata('username')) {
            redirect('user');
        }
          $this->form_validation->set_rules('name', 'Name', 'required|trim');
          $this->form_validation->set_rules('username', 'Username', 'required|trim');
          $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
              'matches' => 'Password dont match!',
              'min_length' => 'Password too short!'
          ]);
          $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

          if ($this->form_validation->run() == false) {
              $data['title'] = 'FastWEB Registration';
              $this->load->view('templates/auth_header', $data);
              $this->load->view('auth/registration');
              $this->load->view('templates/auth_footer');
          } else {
              $this->auth_model->addUser();
              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda telah terdaftar! Silahkan login!</div>');
              redirect('auth');
          }
      }
      public function logout()
      {
          $this->session->unset_userdata('username');
          $this->session->unset_userdata('role_id');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu telah logout!</div>');
          redirect('auth');
      }
}
