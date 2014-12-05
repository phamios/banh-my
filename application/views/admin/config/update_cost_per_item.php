<article class="module width_full">
    
    <div class="tab_container">
        <div id="tab2" class="tab_content">
            
            <?php echo form_open_multipart('admin/config/update_cost_per_item'); ?>
            <div class="module_content">
                    <b><?php echo $status;?></b>
                <fieldset>
                    <label>Giá hiện tại</label>
                    <input type="text" name="cost_per" value="<?php echo $costs;?>" />
                </fieldset>
             

                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="btt_submit" value="Đồng ý" class="alt_btn">
                </div>
            </footer>
            <?php echo form_close(); ?>
            
        </div><!-- end of #tab2 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

