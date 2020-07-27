<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
  private $user = 'user';

  public function profile($id)
  {
    return $this->db->get_where($this->user, ['id_user' => $id])->row();
  }

  public function updateProfile($profileData, $id)
  {
    return $this->db->update('user', $profileData, $id);
  }

  /**
   * Pegawai
   * ========
   */
  public function exists($npwp, $nik)
  {
    $this->db->select('*')
      ->from('pegawai')
      ->group_start()
      ->where('npwp', $npwp)
      ->or_where('nik', $nik)
      ->group_end();
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function hapusPegawai($id)
  {
    $this->db->where('id_pegawai', $id);
    $this->db->delete('pegawai');
  }

  public function pegawai($id_peg)
  {
    return $this->db->get_where('pegawai', ['id_pegawai' => $id_peg])->row();
  }

  public function savePegawai($data)
  {
    $this->db->insert('pegawai', $data);
    return $this->db->insert_id();
  }

  public function updatePegawai($data, $where)
  {
    $this->db->update('pegawai', $data, $where);
    return $this->db->affected_rows();
  }

  private function queryPegawai()
  {
    $this->db->select('*');
    $this->db->from('pegawai p');
    $this->db->join('pendidikan_terakhir pt', 'p.id_pendidikan = pt.id_pendidikan');
    $this->db->join('agama a', 'p.id_agama = a.id_agama');

    if ($this->input->get('search')['value']) {
      $this->db->like('nama_lengkap', $this->input->get('search')['value']);
      $this->db->or_like('tanggal_lahir', $this->input->get('search')['value']);
      $this->db->or_like('gender', $this->input->get('search')['value']);
      $this->db->or_like('nik', $this->input->get('search')['value']);
      $this->db->or_like('npwp', $this->input->get('search')['value']);
      // $this->db->or_like('jenjang', $this->input->get('search')['value']);
    }

    if ($this->input->get('order')) {
      $this->db->order_by(
        $this->input->get('order')['0']['column'],
        $this->input->get('order')['0']['dir']
      );
    } else {
      $this->db->order_by('submit_at', 'desc');
    }
  }

  public function dataPegawai()
  {
    self::queryPegawai();
    if ($this->input->get('length') !== -1) {
      $this->db->limit($this->input->get('length'), $this->input->get('start'));
    }
    return $this->db->get()->result();
  }

  public function filtered()
  {
    self::queryPegawai();
    return $this->db->get()->num_rows();
  }

  public function countAll()
  {
    $this->db->from('pegawai');
    return $this->db->count_all_results();
  }

  /**
   * Sertifikat
   * @return array
   */
  public function getNKapal()
  {
    return $this->db->get('kapal')->result();
  }

  public function saveCert($cert)
  {
    if ($this->db->insert('sertifikat_kapal', $cert)) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  private function queryCert()
  {
    $this->db->select('*');
    $this->db->from('sertifikat_kapal sk');
    $this->db->join('kapal k', 'sk.id_kapal = k.id_kapal', 'left');


    if ($this->input->get('search')['value']) {
      $this->db->like('k.nama_kapal', $this->input->get('search')['value']);
      $this->db->or_like('sk.nama_sertifikat', $this->input->get('search')['value']);
      // $this->db->or_like('sk.upload_at', $this->input->get('search')['value']);
    }

    if ($this->input->get('order')) {
      $this->db->order_by(
        $this->input->get('order')['0']['column'],
        $this->input->get('order')['0']['dir']
      );
    } else {
      $this->db->order_by('upload_at', 'desc');
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

  public function countCert()
  {
    $this->db->from('sertifikat_kapal');
    return $this->db->count_all_results();
  }

  public function getCertVal($id)
  {
    return $this->db->get_where('sertifikat_kapal', $id)->result();
  }

  public function hapusCert($id)
  {
    $this->db->where('id_sertifikat', $id);
    $this->db->delete('sertifikat_kapal');
  }

  /**
   * Foto Kapal
   */
  public function saveFotoKapal($fkapal)
  {
    $this->db->insert('foto_kapal', $fkapal);
    return $this->db->insert_id();
  }

  public function getKapal()
  {
    $this->db->join('kapal k ', 'foto_kapal.id_kapal = k.id_kapal', 'left');
    return $this->db->get('foto_kapal')->result();
  }

  /**
   * Data Kapal
   */
  public function saveKapal($data)
  {
    $this->db->insert('kapal', $data);
    return $this->db->insert_id();
  }

  private function queryKapal()
  {
    $this->db->select('*');
    $this->db->from('kapal');

    if ($this->input->get('search')['value']) {
      $this->db->like('nama_kapal', $this->input->get('search')['value']);
      $this->db->or_like('nama_pemilik', $this->input->get('search')['value']);
      $this->db->or_like('kebangsaan', $this->input->get('search')['value']);
      $this->db->or_like('gt', $this->input->get('search')['value']);
      $this->db->or_like('call_sign', $this->input->get('search')['value']);
    }

    if ($this->input->get('order')) {
      $this->db->order_by(
        $this->input->get('order')['0']['column'],
        $this->input->get('order')['0']['dir']
      );
    } else {
      $this->db->order_by('submit_at', 'desc');
    }
  }

  public function dataKapal()
  {
    self::queryKapal();
    if ($this->input->get('length') !== -1) {
      $this->db->limit($this->input->get('length'), $this->input->get('start'));
    }
    return $this->db->get()->result();
  }

  public function filterKapal()
  {
    self::queryKapal();
    return $this->db->get()->num_rows();
  }

  public function countKapal()
  {
    $this->db->from('kapal');
    return $this->db->count_all_results();
  }
}

/* End of file Admin_m.php */
