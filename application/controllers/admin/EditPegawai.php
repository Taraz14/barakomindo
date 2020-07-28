<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditPegawai extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
    $this->load->library('form_validation');
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
    $id_peg = $this->uri->segment(2);
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/editPegawai',
      'title' => 'Edit Pegawai',
      'profile' => $this->admin_m->profile($id),
      'peg' => $this->admin_m->pegawai($id_peg)

    ], FALSE);
  }

  public function updatePegawai()
  {
    $input = $this->input->post();

    $id = $input['id'];
    $explode = explode("-", $input['tanggal_lahir']);
    $tgl = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
    $data = [
      'id_pegawai' => $id,
      'id_pendidikan' => $input['pendidikan'],
      'id_agama'      => $input['agama'],
      'nama_lengkap'  => $input['nama_p'],
      'tempat_lahir'  => $input['tempat_lahir'],
      'tanggal_lahir' => $tgl,
      'alamat'        => $input['alamat'],
      'gender'        => $input['gender'],
      'status'        => $input['status'],
      'nik'           => $input['nik'],
      'npwp'          => $input['npwp'],
      'email'         => $input['email'],
      'no_hp'         => $input['no_hp'],
      'update_at'     => time()
    ];

    // var_dump($data);
    $this->admin_m->updatePegawai($data, $id);
    echo json_encode(['status' => TRUE]);
    // redirect('data-pegawai');
  }
}

/* End of file EditPegawai.php */
