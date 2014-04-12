<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct()
    {
  //      parent::MY_Controller();
    }

	public function index($start = 0)
	{
        $this->load->library('template');
        $this->load->helper('form');
        $this->template->set_title('Contact');
        $this->template->load_view('index');
	}
	
	public function send()
	{
        $this->load->library('template');
            $this->load->helper('form');
        $this->template->set_title('Contact');
        $this->load->database();

       $time = time();
$this->db->set('id', 'NULL');
$this->db->set('msg', $this->input->post('msg'));
$this->db->set('time', $time);


if($this->db->insert('contact') == 'TRUE'){ 


        redirect('/','refresh');
    }else
    
   redirect('contact','refresh');
	}
	


}

/* End of file image.php */
/* Location: ./system/application/controllers/image.php */