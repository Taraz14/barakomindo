<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  /**
   * Simple Authenticator using own helper and MIT License
   * =====================================================
   * @author Hesty Ningsih Huwae
   * @package Barakomindo
   * supported by : Taraz14
   * @see github.com/taraz14
   */
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->library(array('form_validation', 'secure_sess'));
    $this->load->model('auth_m');
  }

  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('backend/auth/login', [
        'title' => 'Barakomindo'
      ], FALSE);
    } else {
      $this->login();
      redirect('login');
    }
  }

  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $valid    = $this->auth_m->login($username);

    if ($valid) {
      if (password_verify($password, $valid['password'])) {
        $this->_set_session_login($valid);
      } else {
        $this->session->set_flashdata('failed', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
               Maaf, Username atau Password tidak sesuai!
            </div>');
      }
    } else {
      $this->session->set_flashdata('failed', '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
         Maaf, Username atau Password tidak sesuai!
      </div>');
    }
  }

  private function _set_session_login($valid)
  {
    if (!is_array($valid) || empty($valid)) {
      return false;
    }
    $data = [
      'id_user' => $valid['id_user'],
      'nama' => $valid['nama'],
      'username' => $valid['username'],
      'email' => $valid['email'],
      'role' => $valid['role'],
      'logged_in' => TRUE
    ];
    $this->session->set_userdata($data);
    $userdata = $this->session->userdata();
    if ($userdata['role'] == 99) {
      redirect('admin');
    } else if ($userdata['role'] == 88) {
      redirect('operasional');
    } else if ($userdata['role'] == 77) {
      redirect('kecab');
    }
  }

  public function logout()
  {
    $id = $this->session->userdata('id_user');
    $last_login = [
      'last_login' => time()
    ];
    $this->auth_m->last_login($last_login, $id);
    $this->secure_sess->is_logout();
  }
}

/* End of file Auth.php */
