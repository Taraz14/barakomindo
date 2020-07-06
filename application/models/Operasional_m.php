<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operasional_m extends CI_Model
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
}

/* End of file Operasional_m.php */
