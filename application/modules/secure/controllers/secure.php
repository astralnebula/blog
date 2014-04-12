<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Secure extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template');
  }

  public function index()
  {
    $this->load->helper('form');
    $this->template->load_view('login_view');
  }

}

?>