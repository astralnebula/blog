
    <h1>Login</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('secure/verifylogin'); ?>
      <label for="username">Username:</label>
      <input type="text" size="20" id="username" name="username"/>
      <br/>
      <label for="password">Password:</label>
      <input type="password" size="20" id="passowrd" name="password"/>
      <br/>
      <input type="submit" value="Login"/>
    </form>
    <? 
   // $this->load->library('session');
echo "<br>";
      echo anchor(site_url('secure/register'),'Need a new account?');
   ?>