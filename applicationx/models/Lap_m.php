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

  public function saveLap($lap)
  {
    if ($this->db->insert('laporan_dump', $lap)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  /**
   * On going
   */
  private function queryOtg()
  {
    $this->db->select('*');
    $this->db->from('laporan_dump sk');
    $this->db->join('kapal k', 'sk.id_kapal = k.id_kapal', 'left');
    $this->db->join('user u', 'sk.id_user = u.id_user', 'left');
    $this->db->where('endDate >', date("Y-m-d"));
    $this->db->where('is_deleted', 0);



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

  public function dataOtg()
  {
    self::queryOtg();
    if ($this->input->get('length') !== -1) {
      $this->db->limit($this->input->get('length'), $this->input->get('start'));
    }
    return $this->db->get()->result();
  }

  public function filterOtg()
  {
    self::queryOtg();
    return $this->db->get()->num_rows();
  }

  public function countAllOtg()
  {
    $this->db->from('sertifikat_kapal');
    return $this->db->count_all_results();
  }

  /**
   * Expired
   */
  private function queryExp()
  {
    $this->db->select('*');
    $this->db->from('laporan_dump sk');
    $this->db->join('kapal k', 'sk.id_kapal = k.id_kapal', 'left');
    $this->db->join('user u', 'sk.id_user = u.id_user', 'left');

    $this->db->where('endDate < ', date("Y-m-d"));
    $this->db->where('is_deleted', 0);

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

  public function dataExp()
  {
    self::queryExp();
    if ($this->input->get('length') !== -1) {
      $this->db->limit($this->input->get('length'), $this->input->get('start'));
    }
    return $this->db->get()->result();
  }

  public function filterExp()
  {
    self::queryExp();
    return $this->db->get()->num_rows();
  }

  public function countAllExp()
  {
    $this->db->from('sertifikat_kapal');
    return $this->db->count_all_results();
  }

  /**
   * Deleted
   */
  private function queryDeleted()
  {
    $this->db->select('*');
    $this->db->from('laporan_dump sk');
    $this->db->join('kapal k', 'sk.id_kapal = k.id_kapal', 'left');
    $this->db->join('user u', 'sk.id_user = u.id_user', 'left');
    $this->db->where('is_deleted', 1);

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

  public function dataDeleted()
  {
    self::queryDeleted();
    if ($this->input->get('length') !== -1) {
      $this->db->limit($this->input->get('length'), $this->input->get('start'));
    }
    return $this->db->get()->result();
  }

  public function filterDeleted()
  {
    self::queryDeleted();
    return $this->db->get()->num_rows();
  }

  public function countAllDeleted()
  {
    $this->db->from('sertifikat_kapal');
    return $this->db->count_all_results();
  }

  public function is_deleted($id, $isDeleted)
  {
    return $this->db->update('laporan_dump', $isDeleted, ['id_lap' => $id]);
  }
}

/* End of file Lap_m.php */
