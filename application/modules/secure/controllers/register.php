<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Register extends MY_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
   $this->load->library('template');
      $this->load->database();
   $this->load->model('registercheck');
       $this->load->helper('form');
       $this->load->library('form_validation');
 }

 public function index()
 {
                //This method will have the credentials validation
                
                
                $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                $email = $this->input->post('email');


                //$this->check_database($password);
                if($this->form_validation->run() == FALSE)
                {
                //Field validation failed.  User redirected to register page again.
                //redirect('secure/register', 'refresh');
                $this->template->load_view('register_view');
            }else
            
            if($this->registercheck->check_email($email) == TRUE){
                    
            
               
                $password = $this->input->post('password');
                
                $username = $this->input->post('username');  

                  
                if($this->registercheck->check_name($username) == TRUE){
                    
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $username = $this->input->post('username');   
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
                //echo "inserting: ".$email.$username.$password.$ip.$ua.$time;
                $this->db->insert('members', $data); 
                $member_id =  $this->db->insert_id();
                $data = array(
                'id' => $member_id,
                'two' => $email.",".$username.",".$password.",".$ip.",".$time.";",
                'three' => "realm:1,"
                
                );
                $this->db->insert('memberdata', $data); 
                
                redirect('secure/login', 'refresh');
}else {
    
}
//$this->template->load_view('register_view');

}elseif($this->registercheck->check_email($email) == FALSE){
    
   
$this->form_validation->set_message('register','Taken Email');
$this->template->load_view('register_view');
               
                $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                $email = $this->input->post('email');



                //Field validation failed.  User redirected to register page again.
                redirect('secure/register', 'refresh');
                //$this->template->load_view('register_view');


        
   }
   }

                

    }
?>
