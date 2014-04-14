<h2>Create a news item</h2>
<?php 
//echo box('gold');
echo validation_errors();
echo form_open('news/create');
?>
<?php
    
echo form_input('title','title','title');
echo form_input('text','text','text');
echo form_input('author','author','author');
echo form_submit('submit','Next','submit','btn btn-warning');
echo form_close();
//echo unbox();
