<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
    if ($this->session->userdata('logged_in') !== TRUE || $this->session->userdata('id_user') !== 99) {
      $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">
                                       Maaf, Anda harus login!
                                       </div>');

      redirect('login');
    }
    //Do your magic here
  }

  public function index()
  {
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/home',
      'title'   => 'Home',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function lapBulanan()
  {
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/lapBulanan',
      'title' => 'Laporan Bulanan',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }
}

/* End of file Home.php */
