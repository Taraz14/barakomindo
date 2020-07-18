<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
  public function my_custom_rule($str)
  {
    // parent::__construct($str);
    return (!preg_match("/^[A-Za-z- ]*$/", $str)) ? FALSE : TRUE;
  }
}
