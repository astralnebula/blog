<?php
//echo box('red');
echo '<h2><strong>'.$news_item['title'].'</strong></h2>';
//echo $news_item['photolist'];
$photolist = $news_item['photolist'];
if($photolist != '0'){

echo "<br>";

  $newsphotos    =   explode(',',$photolist);
                // echo count( $newsphotos);
                       foreach($newsphotos as $value)
        //            echo "<img src=\"".site_url('assets')."/news/".$row->id."/thumb/thumb_".$newsphotos['0']."\"><br>";
echo anchor(site_url('assets')."/news/original/".$value,'<img class="media pull-left" src="'.site_url('assets').'/news/thumbs/thumb_'.$value.'">');
        foreach($newsphotos as $value)
        echo '<img src="'.base_url().'./assets/news/thumbs/thumb_'.$value.'">';}


echo "<br>";
echo $news_item['text'];
echo "<br>";echo "<br>";echo "<br>";
echo '<p align="right">by <strong> '.$news_item['author'].'.</strong></p>';
//echo unbox();
