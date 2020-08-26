<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LapOnGoing extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('lap_m', 'operasional_m'));
    if ($this->session->userdata('logged_in') !== TRUE || $this->session->userdata('role') != 88) {
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
      'content' => 'backend/operasional/laporan/onGoing',
      'title'   => 'Sertifikat Aktif',
      'profile' => $this->operasional_m->profile($id),
      'countCert' => $this->lap_m->countCert(),
      'countFkapal' => $this->lap_m->countFkapal(),
      'countPegawai' => $this->lap_m->countPegawai(),
      'getCert' => $this->lap_m->getCert()
    ], FALSE);
  }

  public function getCert()
  {
    $data = $this->lap_m->dataOtg();
    $cert = [];
    $no = 1;
    foreach ($data as $certVal) {
      if ($certVal->role == 99) {
        $role = 'Admin';
      } else if ($certVal->role == 88) {
        $role = 'Operasional';
      } else if ($certVal->role == 77) {
        $role = 'Kepala Cabang';
      }

      $temp = [];
      $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_kapal, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_sertifikat, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama . ' (' . $role . ')', ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars(date("d-m-Y", strtotime($certVal->startDate)), ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars(date("d-m-Y", strtotime($certVal->endDate)), ENT_QUOTES, 'UTF-8');
      $cert[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->lap_m->countAllOtg();
    $output['recordsFiltered'] = $this->lap_m->filterOtg();
    $output['data'] = $cert;

    echo json_encode($output);
  }
}

/* End of file LapOnGoing.php */
