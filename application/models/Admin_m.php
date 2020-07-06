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
  public function savePegawai($data)
  {
    $this->db->insert('pegawai', $data);
    return $this->db->insert_id();
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

  public function hapusPegawai($id)
  {
    $this->db->where('id_pegawai', $id);
    $this->db->delete('pegawai');
  }

  /**
   * Sertifikat
   * @return array
   */
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
    $this->db->from('sertifikat_kapal');

    if ($this->input->get('search')['value']) {
      $this->db->like('nama_kapal', $this->input->get('search')['value']);
      $this->db->or_like('nama_sertifikat', $this->input->get('search')['value']);
      $this->db->or_like('upload_at', $this->input->get('search')['value']);
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
    return $this->db->get('foto_kapal')->result();
  }
}

/* End of file Admin_m.php */
