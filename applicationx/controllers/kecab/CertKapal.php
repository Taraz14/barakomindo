<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CertKapal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kecab_m');
    $this->load->helper('file');
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
      'content' => 'backend/kecab/certKapal',
      'title' => 'Sertifikat Kapal',
      'profile' => $this->kecab_m->profile($id),
      'data_kapal' => $this->kecab_m->getNKapal()
    ], FALSE);
  }

  public function getCert()
  {
    $data = $this->kecab_m->dataCert();
    $cert = [];
    $no = 1;
    foreach ($data as $certVal) {
      $temp = [];
      $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_kapal, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_sertifikat, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars(date("d-m-Y", strtotime($certVal->upload_at)), ENT_QUOTES, 'UTF-8');
      $temp[] = '<center><a href="' . $certVal->file . '" target="_blank"><i class="fa fa-file-pdf-o" style="color:#ff0000; font-size:30px;"></i>

                </a></center>';

      // $temp[] = htmlspecialchars(date('d-m-Y / H:i', $pegVal->submit_at), ENT_QUOTES, 'UTF-8');

      $cert[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->kecab_m->countCert();
    $output['recordsFiltered'] = $this->kecab_m->filterCert();
    $output['data'] = $cert;

    echo json_encode($output);
  }
}
