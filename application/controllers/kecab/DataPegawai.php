<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPegawai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('operasional_m');
    if ($this->session->userdata('logged_in') !== TRUE || $this->session->userdata('role') != 77) {
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
      'content' => 'backend/kecab/dataPegawai',
      'title' => 'Data Pegawai',
      'profile' => $this->operasional_m->profile($id)
    ], FALSE);
  }
}

/* End of file DataPegawai.php */
