<h2>Create a news item</h2>
<?php 
//echo box('gold');
echo validation_errors();
echo form_open('news/create');
?>
<?php
    
echo form_input('title','title','title');
echo form_input('text','text','text');
//echo form_input('author','author','author');
//
// if you want to use the author field, uncomment 11.
// uncomment 115 and change 152 in news controller.
//
////////////

echo form_submit('submit','Next','submit','btn btn-warning');
echo form_close();
//echo unbox();
