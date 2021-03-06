<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {
   private $data = array(
        'dir' => array(
            'original' => './assets/news/original/',
            'thumb' => './assets/news/thumbs/'
        ),
        'total' => 0,
        'images' => array(),
        'error' => ''
    );
 //this above may not work too correctly, based on our location on the server sometimes.
	public function __construct()
    {

	$this->load->database();
    $this->load->library('template');
    $this->load->library('session');
    $this->load->helper('form');
            $this->template->add_css('modules/blog.css');
    }

	public function index($start = 0)
	{
       
	$data['news'] = $this->get_news();
	$data['title'] = 'News archive';
$data['news'] = array_reverse($data['news']); //This keeps newest on top.
if(!empty($data['news'])){
$this->template->set_title('Welcome');
        $this->template->add_js('modules/earthbot.js');
        $this->template->add_css('modules/blog.css');
        $this->template->load_view('index',$data);
	}else
	redirect('secure');
	}

public function get_news($slug = FALSE)
{
	if ($slug === FALSE)
	{
		$query = $this->db->get('news');
		return $query->result_array();
	}

	$query = $this->db->get_where('news', array('slug' => $slug));
	return $query->row_array();
}

public function get_newsid($id = FALSE)
{
	if ($id === FALSE)
	{
		$query = $this->db->get('news');
		return $query->result_array();
	}

	$query = $this->db->get_where('news', array('id' => $id));
	return $query->row_array();
}


public function viewid($id)
{
	$data['news_item'] = $this->get_newsid($id);

	if (empty($data['news_item']))
	{
		show_404();
	}

	$data['title'] = $data['news_item']['title'];

        $this->load->library('template');
	//$this->load->view('templates/header', $data);
	$this->template->load_view('news/view', $data);
	//$this->load->view('templates/footer');
}

public function view($slug)
{
	$data['news_item'] = $this->get_news($slug);

	if (empty($data['news_item']))
	{
		show_404();
	}

	$data['title'] = $data['news_item']['title'];

        $this->load->library('template');
	//$this->load->view('templates/header', $data);
	$this->template->load_view('news/view', $data);
	//$this->load->view('templates/footer');
}
public function create()
{
	$this->load->library('session');
 if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
   
      $data['username'] = $session_data['username'];
           $data['id'] = $session_data['id'];

 $this->load->helper('form');
	$this->load->library('form_validation');
    
	   $this->load->library('template');
	$data['title'] = 'Create a news item';

	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');
	//$this->form_validation->set_rules('author', 'author', 'required');
	if ($this->form_validation->run() === FALSE)
	{
	//$this->load->view('templates/header', $data);
	$this->template->load_view('news/create', $data);
	}
	else
	{
        $this->set_news();
        $news_id =  $this->db->insert_id();
        $this->session->set_userdata('news_id', $news_id);
        	$data['news_id'] = $news_id;
	redirect('news/add_photos','refresh');
    }
}
    else
    {
   
     redirect('secure', 'refresh');
	} 
	
	
}
     
   
      
public function set_news()
{
	$this->load->helper('url');

	$slug = url_title($this->input->post('title'), 'dash', TRUE);
 $session_data = $this->session->userdata('logged_in');
	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text'),
		'photolist' => $this->session->userdata('photolist'),
		'author' => $session_data['username']
	); 
	$newnews = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text'),
		'photolist' => $this->session->userdata('photolist'),
		'author' => $this->input->post('author')
	);
    $this->session->set_userdata($newnews);
	return $this->db->insert('news', $data);
}


    public function upload()
    {
        	$this->load->database();
    $this->load->library('template');
    $this->load->library('session');
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
            $this->template->load_view('add_photos', $this->data);
        } else {
            $this->data['error'] = $this->upload->display_errors();
           $this->template->load_view('add_photos', $this->data);
        }
        
    }

    public function add_photos(){
        
     //echo "wrap# ".$this->session->userdata('wrap_id');
        //var_dump($this->wrapmodel->random());
        	   $this->load->library('template');
               	   $this->load->library('session');
$data = $this->session->userdata('news_id');
        $this->load->helper('form');
     $this->template->load_view('add_photos', $data);
  
    }
  public function alldone(){
       $this->load->model('newsmodel');
          	$news_id = $this->session->userdata('news_id');
            $photolist = $this->session->userdata('photolist');
            $title = $this->session->userdata('title');
            $slug = $this->session->userdata('slug');
            $author = $this->session->userdata('author');
           $text = $this->session->userdata('text');
                     
            
         if($photolist != ''){
           $this->newsmodel->update_entry($news_id,$title,$slug,$text,$photolist,$author);
             }
            
        
                      $newnews = array(
                'adding_photos' => '',
                'new_photo' => '',
                'photolist' => '',
                'num_photos' => ''
                );
        
        $this->session->set_userdata($newnews);
         $this->session->sess_destroy();
    
        
        redirect('news','refresh');
    }
public function test(){
    
           $this->load->model('newsmodel');
    $news_id = '14';
    $photolist = 'halle-berry20.jpg,halle-berry21.jpg';
    $title = 'title1';
    $slug = 'tits';
    $text = 'TEXTHERE';
    $author = 'fuckyeah';
    
    echo $this->newsmodel->update_entry($news_id,$title,$slug,$text,$photolist,$author);
     
    
    
    }
 

}

/* End of file image.php */
/* Location: ./system/application/controllers/image.php */
