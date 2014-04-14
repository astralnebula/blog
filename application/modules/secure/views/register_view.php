<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Register New Account</title>
  </head>
  <body>
  
    <h1>New Account</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('secure/register'); ?>
      <label for="username">Username:</label>
      <input type="text" size="20" id="username" name="username"/>
      <br/>
      <label for="password">Password:</label>
      <input type="password" size="20" id="password" name="password"/>
      <br/>
      
            <label for="email">Email:</label>
      <input type="text" size="20" id="email" name="email"/>
      <br/>
      <input type="submit" value="Login"/>
    </form>
    <?php 
//    $this->load->library('session');
    
//var_dump($this->session->all_userdata())    
echo "<br>";
      echo anchor(site_url('secure/login'),'Already have an account?');
     ?>
  </body>
</html>

