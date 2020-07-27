<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LapBulanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('kecab_m', 'lap_m'));
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
      'content' => 'backend/kecab/lapBulanan',
      'title'   => 'Laporan Bulanan',
      'profile' => $this->kecab_m->profile($id),
      'countCert' => $this->lap_m->countCert(),
      'countFkapal' => $this->lap_m->countFkapal(),
      'countPegawai' => $this->lap_m->countPegawai(),
      'getCert' => $this->lap_m->getCert()
    ], FALSE);
  }

  public function getCert()
  {
    $data = $this->lap_m->dataCert();
    $cert = [];
    $no = 1;
    foreach ($data as $certVal) {
      if ($certVal->role == 99) {
        $role = 'Admin';
      } else if ($certVal->role == 88) {
        $role = 'kecab';
      } else if ($certVal->role == 77) {
        $role = 'Kepala Cabang';
      }
      $temp = [];
      $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_kapal, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_sertifikat, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama . ' (' . $role . ')', ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars(date("d/m/Y", strtotime($certVal->upload_at)), ENT_QUOTES, 'UTF-8');
      // $temp[] = htmlspecialchars($certVal->upload_at, ENT_QUOTES, 'UTF-8');

      // $temp[] = '<a href="' . $certVal->file . '" target="_blank"><i class="fa fa-file-pdf-o" style="color:#ff0000; font-size:30px;"></i>

      //           </a>';
      // $temp[] = '
      // <a href="javascript:void(0)" onclick="viewCert(' . "'" . $certVal->id_sertifikat . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit Pegawai" target="">
      //     <i class="glyphicon glyphicon-eye-open" style="color:#3f0000"></i>
      // </a>';
      $cert[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->lap_m->countAllCert();
    $output['recordsFiltered'] = $this->lap_m->filterCert();
    $output['data'] = $cert;

    echo json_encode($output);
  }
}

/* End of file LapBulanan.php */
