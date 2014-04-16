
    <h1>Dashboard View</h1>
    <h2>Welcome, user #<?php echo $id; ?> <?php echo $username."-".$email; ?>!</h2>
    <a href="<?php echo site_url('secure/logout'); ?>"><div class="btn btn-default">logout</div></a>
    <a href="<?php echo site_url('news/create'); ?>"><div class="btn btn-success">new post</div></a>
    <a href="<?php echo site_url('gallery/upload'); ?>"><div class="btn btn-success">new photo</div></a>
    <br><br>
    <?php
     $format = 'DATE_RFC822';
     if (!empty($inbox)){
    foreach($inbox as $value){
    echo "<br><strong>".standard_date($format,$value->time)."</strong><br>".$this->encrypt->decode($value->msg);
    $plaintext_string = $this->encrypt->decode($value->msg);
	echo "<br>".$plaintext_string."<a href=\"".site_url('contact/delete/'.$value->id)."\"><div class=\"btn btn-warning\">delete</div></a><br><br>";}
}else
echo "No Messages.";

