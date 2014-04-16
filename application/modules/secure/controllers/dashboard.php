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
     $this->load->model('inbox');
          $this->load->helper('form');
          $this->load->helper('date');
          date_default_timezone_set('America/Los_Angeles');
          if($this->session->userdata('logged_in')){$session_data = $this->session->userdata('logged_in');$data['username'] = $session_data['username'];$data['id'] = $session_data['id'];}
  }

  public function index()
  {
	  $format = 'DATE_RFC822';
	  $data['time'] = standard_date($format,time());
      //var_dump( $this->session->all_userdata());
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
    // $data = $this->session->alluserdata();
      $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];
              $data['email'] = $session_data['useremail'];
$data['inbox'] = $this->inbox->get_inbox();

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
