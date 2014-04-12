<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Dashboard extends MY_Controller {

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
      //var_dump( $this->session->all_userdata());
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
    // $data = $this->session->alluserdata();
      $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];
      //echo "hi";
      $this->template->load_view('dashboard_view', $data);
     // $this->load->view('add_wrap_view', $data);
//echo "hi";
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