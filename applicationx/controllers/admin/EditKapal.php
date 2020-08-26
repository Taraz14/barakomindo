<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditKapal extends CI_Controller
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
    $id_kapal = $this->uri->segment(2);
    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/editKapal',
      'title'   => 'Edit Kapal',
      'profile' => $this->admin_m->profile($id),
      'kapal'   => $this->admin_m->kapal($id_kapal)
    ], FALSE);
  }

  public function kapal()
  {
    $input = $this->input->post();
    $id = $input['id'];
    $data = [
      'nama_kapal' => $input['nama_kapal'],
      'nama_pemilik' => $input['nama_pemilik'],
      'kebangsaan' => $input['kebangsaan'],
      'gt' => $input['gt'],
      'call_sign' => $input['call_sign'],
      'submit_at' => time()
    ];

    $this->admin_m->UpdateKapal($data, $id);
    echo json_encode(["status" => TRUE]);
  }
}

/* End of file EditKapal.php */
