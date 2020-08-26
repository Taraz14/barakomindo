<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPegawai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kecab_m');
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
      'profile' => $this->kecab_m->profile($id)
    ], FALSE);
  }

  public function getPegawai()
  {
    $data = $this->kecab_m->dataPegawai();
    $peg = [];
    $no = 1;
    foreach ($data as $pegVal) {
      $explode = explode('-', $pegVal->tanggal_lahir);
      $tgl = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
      $temp = [];
      $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->nama_lengkap, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->tempat_lahir . ', ' . $tgl, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->alamat, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->agama, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->gender, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->jenjang, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->status, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->nik, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->npwp, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->email, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($pegVal->no_hp, ENT_QUOTES, 'UTF-8');
      $peg[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->kecab_m->countAll();
    $output['recordsFiltered'] = $this->kecab_m->filtered();
    $output['data'] = $peg;

    echo json_encode($output);
  }
}

/* End of file DataPegawai.php */
