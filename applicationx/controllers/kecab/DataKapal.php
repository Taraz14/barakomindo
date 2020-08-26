<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKapal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
    // $this->load->helper('file');
    if ($this->session->userdata('logged_in') !== TRUE || $this->session->userdata('role') != 77) {
      $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">
                                     Maaf, Anda harus login!
                                     </div>');

      redirect('login');
    }
  }
  public function index()
  {
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/kecab/dataKapal',
      'title'   => 'Data Kapal',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function getKapal()
  {
    $data = $this->admin_m->dataKapal();
    $kapal = [];
    $no = 1;
    foreach ($data as $kapVal) {
      $temp = [];
      $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($kapVal->nama_kapal, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($kapVal->nama_pemilik, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($kapVal->kebangsaan, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($kapVal->gt, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($kapVal->call_sign, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars(date("d-m-Y", $kapVal->submit_at), ENT_QUOTES, 'UTF-8');
      $kapal[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->admin_m->countKapal();
    $output['recordsFiltered'] = $this->admin_m->filterKapal();
    $output['data'] = $kapal;

    echo json_encode($output);
  }
}

/* End of file DataKapal.php */
