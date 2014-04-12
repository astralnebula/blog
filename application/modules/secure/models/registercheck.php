<?php
Class Registercheck extends CI_Model

{
 function check_name($username)
 {
   $this -> db -> select('id, email, username, password');
   $this -> db -> from('members');
   $this -> db -> where('username', $username);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return false;
     $this->form_validation->set_message('username', 'Taken username');
     
   }
   else
   {
     return true;
   }
}
 function check_email($email)
 {
   $this -> db -> select('id, email, username, password');
   $this -> db -> from('members');
   $this -> db -> where('email', $email);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return false;
     $this->form_validation->set_message('email', 'Already used email');
     
   }
   else
   {
     return true;
   
   }
}



//debug

 function debug($username, $password)
 {
   $this -> db -> select('id, email, username, password');
   $this -> db -> from('members');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', hash('sha256',$password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

  
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
       $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
