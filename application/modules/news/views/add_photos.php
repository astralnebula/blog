<?php
echo "adding photos to News Article# ".$this->session->userdata('news_id');

 echo form_open_multipart('news/upload'); 

?>
            <input class="form-control" name="userfile" type="file"/>
            <input type="submit" name="btn_upload" value="Upload &uarr;" class="btn btn-success"/>
           <?php if (isset ($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
            <?php } ?>
           <?php if (isset ($photolist)) { ?>
            <div class="error"><?php echo $photolist; ?></div>
            <?php } ?>
        </form>
        
        <?php
//        var_dump($this->session->all_userdata());
        
          echo " added to database. add another photo?";
             echo anchor('news/alldone','OR ALL DONE?');
