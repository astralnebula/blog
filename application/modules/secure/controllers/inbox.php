<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Inbox extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->database();
    $this->load->library('template');
     $this->load->library('parser');
          $this->load->helper('form');
          if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');$data['username'] = $session_data['username'];$data['id'] = $session_data['id'];}
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];
      $this->template->load_view('dashboard_view', $data);
 }
    else
    {
      //If no session, redirect to login page
     redirect('secure', 'refresh');
	} 
  }
  
  public function logout()
  {
    $this->session->unset_userdata('logged_in');
    $this->session->sess_desstroy();
    session_destroy();
    redirect('secure', 'refresh');
  }
   

}

?>
