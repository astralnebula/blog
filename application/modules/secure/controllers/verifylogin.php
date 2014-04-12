<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class VerifyLogin extends MY_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
   $this->load->model('userlogin','',TRUE);
 }

 public function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   $password = $this->input->post('password');
   
      $username = $this->input->post('username');

   //query the database
 
   if($this->form_validation->run() == FALSE){
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }else
   {
     //Go to private area
       //if ($this->userlogin->debug($username, $password) = 'true'){
    
            if($this->check_database($password)){
                           
                

           redirect('secure/dashboard', 'refresh');
       }else 
       echo "wrong pw";
            $this->load->view('login_view');
     
   }

 }

 public function check_database($password)
 {
    //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->userlogin->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
