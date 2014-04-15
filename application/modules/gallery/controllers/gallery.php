<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

    private $data = array(
        'dir' => array(
            'original' => './assets/news/original/',
            'thumb' => './assets/news/thumbs/'
        ),
        'total' => 0,
        'images' => array(),
        'error' => ''
    );

	public function __construct()
    {
  //      parent::MY_Controller();
    }

	public function index($start = 0)
	{
        $this->load->library('template');

        $this->template->set_title('Welcome');
        $this->template->add_js('modules/earthbot.js');
        $this->template->add_css('modules/earthbot.css');
       
        if ($this->input->post('btn_upload')) {
            $this->upload();
        }

        $this->load->library('pagination');

        $c_paginate['base_url'] = site_url('./gallery/index');
        $c_paginate['per_page'] = '9';
        $finish = $start + $c_paginate['per_page'];
        
        if (is_dir($this->data['dir']['thumb']))
        {
            $i = 0;
            if ($dh = opendir($this->data['dir']['thumb'])) {
                while (($file = readdir($dh)) !== false) {
                    // get file extension
                    $ext = strrev(strstr(strrev($file), ".", TRUE));
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                        if ($start <= $this->data['total'] && $this->data['total'] < $finish) {
                            $this->data['images'][$i]['thumb'] = $file;
                            $this->data['images'][$i]['original'] = str_replace('thumb_', '', $file);
                            $i++;
                        }
                        $this->data['total']++;
                    }
                }
                closedir($dh);
            }
        }

        $c_paginate['total_rows'] = $this->data['total'];

        $this->pagination->initialize($c_paginate);

		//$this->load->view('index', $this->data);
        if(isset($_GET['loggedin'])){

        $this->template->load_view('index', $this->data);
}else{
        $this->template->load_view('index', $this->data);
	}}




    public function upload()
    {
        	$this->load->database();
    $this->load->library('template');
    $this->load->library('session');
  if($this->session->userdata('logged_in'))
		{
		  $session_data = $this->session->userdata('logged_in');
	   
		  $data['username'] = $session_data['username'];
			   $data['id'] = $session_data['id'];

		$this->load->helper('form');
			$c_upload['upload_path']    = $this->data['dir']['original'];
			$c_upload['allowed_types']  = 'gif|jpg|png|jpeg|x-png';
			$c_upload['max_size']       = '500';
			$c_upload['max_width']      = '1600';
			$c_upload['max_height']     = '1200';
			$c_upload['remove_spaces']  = TRUE;

			$this->load->library('upload', $c_upload);

			if ($this->upload->do_upload()) {
				
				$img = $this->upload->data();
			   // var_dump($img);
	  $uploadpath =  $this->config->item('uploadpath');
			   $target_path = $uploadpath.'thumbs/thumb_'.$img['file_name'];
			 //echo $_SERVER['DOCUMENT_ROOT'];
					
		// var_dump($target_path);
				$config_manip = array(
					'image_library' => 'gd2',
					'source_image' => $img['full_path'],
					'new_image' => $target_path,
					'maintain_ratio' => TRUE,
					'create_thumb' => TRUE,
					'thumb_marker' => '',
					'width' => 150,
					'height' => 150
					);
				
				$this->load->library('image_lib', $config_manip);
					
				if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
				if($this->session->userdata('photolist') == ''){
					$newnews = array(
					'adding_photos' => 'TRUE',
					'new_photo' => $img['file_name'],
					'photolist' => $img['file_name'],
					'num_photos' => '1'
					); }else{
					$newnews = array(
					'adding_photos' => 'TRUE',
					'new_photo' => $img['file_name'],
					'photolist' => $this->session->userdata('photolist').",".$img['file_name'],
					'num_photos' => '1'
					);}
			
				$this->session->set_userdata($newnews);
				$data['news_id'] = $this->session->userdata('news_id');
				$data['photolist'] = $this->session->userdata('photolist');
				$this->template->load_view('upload_form', $this->data);
			} else {
				$this->data['error'] = $this->upload->display_errors();
			   $this->template->load_view('upload_form', $this->data);
			}}
else redirect('secure','refresh');
}
}

/* End of file image.php */
/* Location: ./system/application/controllers/image.php */
