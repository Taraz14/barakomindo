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
}

/* End of file Lap_m.php */
