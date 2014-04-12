<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function __construct()
    {

    }

	public function index($start = 0){


    $this->load->library('session');
session_start();
  $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('secure', 'refresh');
	}


}

/* End of file image.php */
/* Location: ./system/application/controllers/image.php */