<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
  private $user = 'user';

  public function login($username)
  {
    return $this->db->get_where($this->user, ['username' => $username])->row_array();
  }

  public function last_login($last_login, $id)
  {
    return $this->db->update('user', $last_login, ['id_user' => $id]);
  }
}

/* End of file Auth.php */
