<?php
Class Userlogin extends CI_Model
{
 function login($username, $password)
 {
 
   $this -> db -> select('id, email, username, password');
   $this -> db -> from('members');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
}



//debug

 function debug($username, $password)
 {
   $password2 = hash('sha256',$password);
   $this -> db -> select('id, email, username, password');
   $this -> db -> from('members');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password2);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

  
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return $query->result();
   }
 }
}
?>
