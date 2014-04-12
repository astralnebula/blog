<?php
Class UserLogin extends CI_Model
{
	public function login($username, $password)
	{
        
        
        
        $limit = '1';
        $query = $this->db->get_where('secure_members', array('username' => $username, 'password' => hash(sha256,$password)), $limit, $offset);


		//$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}
}
?>