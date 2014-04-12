<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Register extends MY_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
   $this->load->library('template');
   $this->load->model('register','',TRUE);
       $this->load->helper('form');
 }

 public function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
   $password = $this->input->post('password');
   $email = $this->input->post('email');
    $username = $this->input->post('username');
    

//$this->check_database($password);
    if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to register page again.
    //redirect('secure/register', 'refresh');
    $this->template->load_view('register_view');
   }
   else
   {
     //Woohoo! Let's insert into database.
     $result = $this->register->check_name($username);
    var_dump($result);
     
     //translate
     $ip = $this->input->ip_address();
     $ua = $this->input->user_agent();
     $time = time();
     $password = hash('sha256',$password);
     
     
      $data = array(
   'email' => $email,
   'username' => $username,
   'password' =>  $password,
   'ip' => $this->input->ip_address(),
   'time' => time(),
   'ua' => $this->input->user_agent()
);
echo $email.$username.$password.$ip.$ua.$time;
$this->db->insert('members', $data); 
    redirect('secure', 'refresh');
    
   }

 }

}
?>
