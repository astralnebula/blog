<header class="navbar navbar-default navbar-static-top">

        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo site_url(); ?>" class="navbar-brand"><?php echo $this->config->item('app_name'); ?></a>
        </div>
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url('news'); ?>">Blog</a></li>
                <li><a href="<?php echo site_url('gallery'); ?>">Photos</a></li>
                <li><a href="<?php echo site_url('contact'); ?>">Contact Me</a></li>
     <?php           if($this->session->userdata('logged_in'))
    {
		echo " <li><a href=\"".site_url('secure/logout')."\">Logout</a></li>
		  <li><a href=\"".site_url('secure/dashboard')."\">Dashboard</a></li>";
	
		  }  else
		  
		  echo " <li><a href=\"".site_url('secure')."\">Login</a></li>";
              ?>  
            </ul>
            
            
            
            <ul class="nav navbar-nav navbar-right">
                <li><a target="_blank" href="https://github.com/astralnebula/blog">Now on <b>GitHub!</b></a></li>
            </ul>
        </nav>
   
</header>
