<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Secure_sess
{

   protected $CI;

   public function __construct()
   {
      $this->CI = &get_instance();
   }

   public function is_logout()
   {
      $this->CI->session->unset_userdata('id_user');
      $this->CI->session->unset_userdata('nama');
      $this->CI->session->unset_userdata('username');
      $this->CI->session->unset_userdata('email');
      $this->CI->session->unset_userdata('tempat_lahir');
      $this->CI->session->unset_userdata('tanggal_lahir');
      $this->CI->session->unset_userdata('alamat');
      $this->CI->session->unset_userdata('no_hp');
      $this->CI->session->unset_userdata('foto');
      $this->CI->session->unset_userdata('role');
      // $this->CI->session->unset_userdata('last_login');
      // $this->CI->session->unset_userdata('logged_in');
      $this->CI->session->sess_destroy();
      redirect();
   }
}
