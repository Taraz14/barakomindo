<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LapBulanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('lap_m', 'admin_m'));
    if ($this->session->userdata('logged_in') !== TRUE || $this->session->userdata('role') != 99) {
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
      'content' => 'backend/admin/lapBulanan',
      'title'   => 'Laporan Bulanan',
      'profile' => $this->admin_m->profile($id),
      'countCert' => $this->lap_m->countCert(),
      'countFkapal' => $this->lap_m->countFkapal()
    ], FALSE);
  }
}

/* End of file LapBulanan.php */
