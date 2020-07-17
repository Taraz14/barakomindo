<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FotoKapal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
    $this->load->helper(array('file', 'download'));
    $this->load->library('upload');
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
      'content' => 'backend/admin/fotoKapal',
      'title' => 'Foto Kapal',
      'profile' => $this->admin_m->profile($id),
      'kapal' => $this->admin_m->getKapal(),
      'data_kapal' => $this->admin_m->getNKapal()
    ], FALSE);
  }

  public function uploadFotoKapal()
  {
    $config['image_library'] = 'gd2';
    $config['upload_path']   = './assets/uploads/kapal/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size']   = '0';
    $config['max_width'] = '0';
    $config['max_height'] = '0';
    $config['master_dim'] = 'auto';
    $config['file_name']  = round(microtime(true) * 1000);
    $config['width'] = '198';
    $config['height'] = '123';
    $this->upload->initialize($config);
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
    $upload = $this->upload->do_upload('gambarKapal');
    if (!$upload) {
      echo $this->upload->display_errors();
    } else {
      $uploadData = array('uploads' => $this->upload->data());
      $fkapal = [
        'id_kapal' => $this->input->post('kapal'), //kapal
        'foto'  => base_url('assets/uploads/kapal/' . $uploadData['uploads']['file_name']),
        'post_at' => time()
      ];

      $this->admin_m->saveFotoKapal($fkapal);
      echo json_encode(array("status" => TRUE));
    }
  }

  public function downloadFoto()
  {
    $get = $this->uri->segment(3);
    var_dump($get);
    die();
    $data['file'] = $get;
  }
}

/* End of file FotoKapal.php */
