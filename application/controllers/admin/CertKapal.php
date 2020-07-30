<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CertKapal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('admin_m', 'lap_m'));
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
    // unlink('assets/uploads/sertifikat/1595985420585.pdf');
    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/admin/certKapal',
      'title' => 'Sertifikat Kapal',
      'profile' => $this->admin_m->profile($id),
      'data_kapal' => $this->admin_m->getNKapal(),
      // 'cert' => $this->admin_m->getCertVal($id)

    ], FALSE);
  }

  public function uploadCert()
  {
    $id = $this->session->userdata('id_user');
    $config['upload_path']   = './assets/uploads/sertifikat/';
    $config['allowed_types'] = 'pdf';
    $config['file_name']  = round(microtime(true) * 1000);
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $upload = $this->upload->do_upload('certFile');
    if (!$upload) {
      // echo $this->upload->display_errors();
      echo json_encode(["status" => FALSE]);
    } else {
      $uploadData = array('uploads' => $this->upload->data());

      $date = explode(' - ', $this->input->post('exp'));
      $startReplace = str_replace('/', '-', $date[0]);
      $endReplace = str_replace('/', '-', $date[1]);
      $startDate = date("Y-m-d", strtotime($startReplace));
      $endDate = date("Y-m-d", strtotime($endReplace));

      $cert = [
        'id_user' => $id,
        'id_kapal' => $this->input->post('kapal'), //uploadCert
        'nama_sertifikat' => $this->input->post('namaCert'),
        'file'  => $uploadData['uploads']['file_name'],
        'startDate' => $startDate,
        'endDate' => $endDate,
        'upload_at' => time()
      ];

      $lapCert = [
        'id_user' => $id,
        'id_kapal' => $this->input->post('kapal'), //uploadCert
        'nama_sertifikat' => $this->input->post('namaCert'),
        // 'file'  => $uploadData['uploads']['file_name'],
        'startDate' => $startDate,
        'endDate' => $endDate,
        'upload_at' => time()
      ];

      $this->admin_m->saveCert($cert);
      $this->lap_m->saveLap($lapCert);
      echo json_encode(array("status" => TRUE));
    }
  }

  public function dumpData()
  {
    $id = $this->session->userdata('id_user');
    $tes = $this->input->post();
    $date = explode(' - ', $tes['exp']);
    $startReplace = str_replace('/', '-', $date[0]);
    $endReplace = str_replace('/', '-', $date[1]);
    $startDate = date("Y-m-d", strtotime($startReplace));
    $endDate = date("Y-m-d", strtotime($endReplace));
    echo $startDate . ' - ' . $endDate;
    die();
    $data = [
      'id_kapal' => $tes['kapal'],
      'id_user' => $id,
      'nama_sertifikat' => $tes['namaCert'],
      'file' => NULL,
      'startDate'
    ];
  }

  public function getCert()
  {
    $data = $this->admin_m->dataCert();
    $cert = [];
    $no = 1;
    foreach ($data as $certVal) {
      $temp = [];
      $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_kapal, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars($certVal->nama_sertifikat, ENT_QUOTES, 'UTF-8');
      $temp[] = htmlspecialchars(date("d-m-Y", $certVal->upload_at), ENT_QUOTES, 'UTF-8');
      $temp[] = '<a href="' . base_url('assets/uploads/sertifikat/') . $certVal->file . '" target="_blank"><i class="fa fa-file-pdf-o" style="color:#ff0000; font-size:30px;"></i>

                </a>';

      // $temp[] = htmlspecialchars(date('d-m-Y / H:i', $pegVal->submit_at), ENT_QUOTES, 'UTF-8');
      $temp[] = '
      <a href="javascript:void(0)" onclick="hapusCert(' . "'" . $certVal->id_sertifikat . "'" . ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Hapus" target="">
          <i class="glyphicon glyphicon-trash" style="color:#ff0000"></i>
      </a>';
      $cert[] = $temp;
    }

    $output['draw'] = intval($this->input->get('draw'));
    $output['recordsTotal'] = $this->admin_m->countCert();
    $output['recordsFiltered'] = $this->admin_m->filterCert();
    $output['data'] = $cert;

    echo json_encode($output);
  }

  public function hapusCert($id)
  {
    $cert = $this->admin_m->getCertVal($id);
    foreach ($cert as $v) {
      unlink('assets/uploads/sertifikat/' . $v->file);
    }
    $isDeleted = [
      'is_deleted' => 1
    ];
    $this->lap_m->is_deleted($id, $isDeleted);
    $this->admin_m->hapusCert($id);
    echo json_encode(array("status" => TRUE));
  }
}

/* End of file CertKapal.php */
