<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPegawai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
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
      'content' => 'backend/admin/dataPegawai',
      'title' => 'Data Pegawai',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function addPegawai()
  {
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/addPegawai',
      'title' => 'Data Pegawai',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function savePegawai()
  {
    $id = $this->session->userdata('id_user');
    $input = $this->input->post();
    $getTanggal = explode('-', $input['tanggal_lahir']);
    $tglLahir = $getTanggal[2] . '-' . $getTanggal[1] . '-' . $getTanggal[0];
    $data = [
      'id_pendidikan' => $input['pendidikan'],
      'id_agama'      => $input['agama'],
      'nama_lengkap'  => $input['nama_p'],
      'tempat_lahir'  => $input['tempat_lahir'],
      'tanggal_lahir' => $tglLahir,
      'alamat'        => $input['alamat'],
      'gender'        => $input['gender'],
      'status'        => $input['status'],
      'nik'           => $input['nik'],
      'npwp'          => $input['npwp'],
      'email'         => $input['email'],
      'no_hp'         => $input['no_hp'],
      'submit_at'     => time()
    ];

    $this->admin_m->savePegawai($data);
    echo json_encode(['status' => TRUE]);
  }

  public function getPegawai()
  {
    $data = $this->admin_m->dataPegawai();
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

      // $temp[] = htmlspecialchars(date('d-m-Y / H:i', $pegVal->submit_at), ENT_QUOTES, 'UTF-8');
      $temp[] = '
      <a href="javascript:void(0)" onclick="detailPegawai(' . "'" . $pegVal->id_pegawai . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Detail" target="">
          <i class="glyphicon glyphicon-eye-open" style="color:#0a668e"></i>
      </a> 
      <a href="javascript:void(0)" onclick="editPegawai(' . "'" . $pegVal->id_pegawai . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit Pegawai" target="">
          <i class="glyphicon glyphicon-pencil" style="color:#ed9532"></i>
      </a>
      <a href="javascript:void(0)" onclick="hapusPegawai(' . "'" . $pegVal->id_pegawai . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Hapus" target="">
          <i class="glyphicon glyphicon-trash" style="color:#ff0000"></i>
      </a>';
      $peg[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->admin_m->countAll();
    $output['recordsFiltered'] = $this->admin_m->filtered();
    $output['data'] = $peg;

    echo json_encode($output);
  }

  public function hapusPegawai($id)
  {
    $this->admin_m->hapusPegawai($id);
    echo json_encode(array("status" => TRUE));
  }
}

/* End of file DataPegawai.php */
