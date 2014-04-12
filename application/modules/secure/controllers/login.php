<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Login extends MY_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('template');
  }

  function index()
  {
    $this->load->helper('form');
    $this->template->load_view('login_view');
  }

}

?>