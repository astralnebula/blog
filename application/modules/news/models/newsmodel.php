<?php
Class Newsmodel extends CI_Model

{
    
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map($this->wrapmodel->objectToArray, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
 
 
 
    function latest($limit='20')
    {
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('wrap', $limit);
        return $query->result();
    }
    
    function random($limit='20')
    {
        $this->db->order_by("id", "random"); 
        $query = $this->db->get('wrap', $limit);
        return $query->result();
    }

    function insert_wrap($artist,$photo,$metal,$crystal,$description,$name)
    {
        $this->artist   = $artist; 
        $this->photo   = $photo; 
        $this->metal   = $metal; 
        $this->crystal   = $crystal; 
        $this->description   = $description; 
        $this->name   = $name; 
        if($results = $this->db->insert('wrap', $this)){ 
        return $results;
        }else 
        return 'false';
    }

    function update_entry($news_id,$title,$slug,$text,$photolist,$author)
    {
       $data = array(
             //   'id' => $news_id,
               'title' => $title,
               'slug' => $slug,
               'text' => $text,              
               'photolist' => $photolist,
               'author' => $author
               
                );
                $dataa = var_dump($data);
   //    $result = $this->db->update_batch('news', $data, 'id'); 
       $result = $this->db->update('news', $data, array('id' => $news_id));
return $result.$dataa.$news_id;        
    }

    

}
?>
