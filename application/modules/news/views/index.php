<?php foreach ($news as $news_item): ?>
<? $photolist = $news_item['photolist']; 
  $newsphotos    =   explode(',',$photolist);

?>
    <h2><?php echo $news_item['title'] ?></h2>
    <div class="media"><?php if($photolist != '0'){
        foreach($newsphotos as $value)
        echo '<img src="'.base_url().'/assets/news/thumbs/thumb_'.$value.'">';
        
        }

?>
    
    </div>
   
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="news/view/<?php echo $news_item['slug'] ?>">View article</a><a href="news/viewid/<?php echo $news_item['id'] ?>"># <?php echo $news_item['id'] ?></a></p>

<?php endforeach ?>
