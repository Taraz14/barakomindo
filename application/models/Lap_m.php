<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_m extends CI_Model
{
  public function countCert()
  {
    return $this->db->get('sertifikat_kapal')->num_rows();
  }

  public function countFkapal()
  {
    return $this->db->get('foto_kapal')->num_rows();
  }

  public function countPegawai()
  {
    return $this->db->get('pegawai')->num_rows();
  }

  public function getCert()
  {
    return $this->db->get('sertifikat_kapal')->result();
  }

  private function queryCert()
  {
    $this->db->select('*');
    $this->db->from('sertifikat_kapal sk');
    $this->db->join('kapal k', 'sk.id_kapal = k.id_kapal', 'left');
    $this->db->join('user u', 'sk.id_user = u.id_user', 'left');

    if ($this->input->get('search')['value']) {
      $this->db->like('k.nama_kapal', $this->input->get('search')['value']);
      $this->db->or_like('sk.nama_sertifikat', $this->input->get('search')['value']);
      $this->db->or_like('u.nama', $this->input->get('search')['value']);
    }

    if ($this->input->get('order')) {
      $this->db->order_by(
        $this->input->get('order')['0']['column'],
        $this->input->get('order')['0']['dir']
      );
    } else {
      $this->db->order_by('sk.upload_at', 'desc');
    }
  }

  public function dataCert()
  {
    self::queryCert();
    if ($this->input->get('length') !== -1) {
      $this->db->limit($this->input->get('length'), $this->input->get('start'));
    }
    return $this->db->get()->result();
  }

  public function filterCert()
  {
    self::queryCert();
    return $this->db->get()->num_rows();
  }

  public function countAllCert()
  {
    $this->db->from('sertifikat_kapal');
    return $this->db->count_all_results();
  }
}

/* End of file Lap_m.php */
