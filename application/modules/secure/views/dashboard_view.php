
    <h1>Dashboard View</h1>
    <h2>Welcome, #<?php echo $id; ?> <?php echo $username; ?>!</h2>
    <a href="<?php echo site_url('logout'); ?>">Logout</a>
    <br><br>
    <? echo anchor('news/create','Create News');