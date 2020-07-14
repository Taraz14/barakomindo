<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKapal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
    // $this->load->helper('file');
    if ($this->session->userdata('logged_in') !== TRUE || $this->session->userdata('role') != 99) {
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
      'content' => 'backend/admin/dataKapal',
      'title'   => 'Data Kapal',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function addKapal()
  {
    $id = $this->session->userdata('id_user');
    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/addKapal',
      'title'   => 'Tambah Kapal',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function kapal()
  {
    $id = $this->session->userdata('id_user');
    $input = $this->input->post();
    $data = [
      'nama_kapal' => $input['nama_kapal'],
      'nama_pemilik' => $input['nama_pemilik'],
      'kebangsaan' => $input['kebangsaan'],
      'gt' => $input['gt'],
      'call_sign' => $input['call_sign'],
      'submit_at' => time()
    ];

    $this->admin_m->saveKapal($data);
    echo json_encode(["status" => TRUE]);
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
      $temp[] = htmlspecialchars($kapVal->submit_at, ENT_QUOTES, 'UTF-8');
      $temp[] = '
      <a href="javascript:void(0)" onclick="detailKapal(' . "'" . $kapVal->id_kapal . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Detail" target="">
          <i class="glyphicon glyphicon-eye-open" style="color:#0a668e"></i>
      </a> 
      <a href="javascript:void(0)" onclick="editKapal(' . "'" . $kapVal->id_kapal . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit Pegawai" target="">
          <i class="glyphicon glyphicon-pencil" style="color:#ed9532"></i>
      </a>
      <a href="javascript:void(0)" onclick="hapusKapal(' . "'" . $kapVal->id_kapal . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Hapus" target="">
          <i class="glyphicon glyphicon-trash" style="color:#ff0000"></i>
      </a>';
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
