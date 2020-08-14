<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_m');
    $this->load->helper('file');
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
      'content' => 'backend/admin/profile',
      'title'   => 'Profile',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function profile()
  {
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/editProfile',
      'title'   => 'Edit Profile',
      'profile' => $this->admin_m->profile($id)
    ], FALSE);
  }

  public function editProfile()
  {
    $id = $this->session->userdata('id_user');
    //config tanggal
    $getTgl = explode('-', $this->input->post('tanggal_lahir'));
    $tgl = $getTgl[2] . '-' . $getTgl[1] . '-' . $getTgl[0];
    // echo $tgl;
    // die();
    //upload
    $config['upload_path']   = './assets/uploads/profile/';
    $config['allowed_types'] = 'jpg|png|jpeg|gif';
    $config['file_name']  = round(microtime(true) * 1000);
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $upload = $this->upload->do_upload('profileImage');
    if (!$upload) {
      // echo $this->upload->display_errors();
      $input = $this->input->post();
      $profileData = [
        'nama' => $input['nama'],
        'email' => $input['email'],
        'tempat_lahir' => $input['tempat_lahir'],
        'tanggal_lahir' => $tgl,
        'alamat'  => $input['alamat'],
        'no_hp' => $input['no_hp']
      ];
      $this->admin_m->updateProfile($profileData, ['id_user' => $id]);
      echo json_encode(array('status' => true));
    } else {
      $input = $this->input->post();
      $uploadData = array('uploads' => $this->upload->data());
      $profileData = [
        'nama' => $input['nama'],
        'email' => $input['email'],
        'tempat_lahir' => $input['tempat_lahir'],
        'tanggal_lahir' => $input['tanggal_lahir'],
        'alamat'  => $input['alamat'],
        'no_hp' => $input['no_hp'],
        'foto' => base_url('assets/uploads/profile/' . $uploadData['uploads']['file_name'])
      ];
      $this->admin_m->updateProfile($profileData, ['id_user' => $id]);
      echo json_encode(array('status' => true));
    }
  }
}

/* End of file Profile.php */
