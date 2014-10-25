<article class="module width_full"> 
    <div class="tab_container">
        <?php if($type):?>
        <?php foreach($type as $typedetail):?>
        <?php echo form_open_multipart('admin/type/edit/'.$typedetail->id); ?>
            <div class="module_content">
                 
                <fieldset>
                    <label>Tên thể loại</label>
                    <input type="text" name="type_name" value="<?php echo $typedetail->type_name?>" />
                </fieldset>
                
                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link"> 
                    <input type="submit" name="btt_submit" value="Đồng ý" class="alt_btn">
                    <input type="submit" name="btt_reset" value="Reset">
                </div>
            </footer>
            <?php echo form_close(); ?>
        <?php endforeach;?>
        <?php endif;?>
    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

