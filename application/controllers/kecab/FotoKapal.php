<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FotoKapal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kecab_m');
    $this->load->helper(array('file', 'download'));
    $this->load->library('upload');
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
      'content' => 'backend/kecab/fotoKapal',
      'title' => 'Foto Kapal',
      'profile' => $this->kecab_m->profile($id),
      'kapal' => $this->kecab_m->getKapal(),
      'data_kapal' => $this->kecab_m->getNKapal()
    ], FALSE);
  }

  public function downloadFoto()
  {
    $get = $this->uri->segment(3);
    var_dump($get);
    die();
    $data['file'] = $get;
  }
}
