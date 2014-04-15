
    <h1>Dashboard View</h1>
    <h2>Welcome, #<?php echo $id; ?> <?php echo $username; ?>!</h2>
    <a href="<?php echo site_url('logout'); ?>">Logout</a>
    <a href="<?php echo site_url('news/create'); ?>">New Blog Entry</a>
    <a href="<?php echo site_url('gallery/upload'); ?>">Upload Photos</a>
    <br><br>
    <?php
     $format = 'DATE_RFC822';
     if (!empty($inbox)){
    foreach($inbox as $value)
    echo "<br><strong>".standard_date($format,$value->time)."</strong><br>".$this->encrypt->decode($value->msg);
    $plaintext_string = $this->encrypt->decode($value->msg);
	echo "<br>".$plaintext_string."<br>";
}else
echo "No Messages.";
