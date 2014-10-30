<article class="module width_full"> 
    <div class="tab_container">
        <?php if($list_config):?>
        <?php foreach($list_config as $config):?>
        <?php echo form_open_multipart('admin/config/edit/'.$config->id); ?>
            <div class="module_content"> 
                
                <fieldset>
                    <label>Tên site</label>
                    <input type="text" name="site_name" value="<?php echo $config->site_name?>" />
                </fieldset>
                <fieldset>
                    <label>Thẻ Meta Keyword</label>
                    <input type="text" name="site_meta" value="<?php echo $config->site_meta?>" />
                </fieldset>
                <fieldset>
                    <label>Thẻ Meta Description </label>
                    <input type="text" name="site_description" value="<?php echo $config->site_description?>" />
                </fieldset>
                <fieldset>
                    <label>Footer</label>
                    <input type="text" name="site_footer" value="<?php echo $config->site_footer?>" />
                </fieldset>
                <fieldset>
                    <label>URL của site</label>
                    <input type="text" name="site_url" value="<?php echo $config->site_url?>" />
                </fieldset>
                <fieldset>
                    <label>Logo site</label>
                    <input type="file" name="site_logo" />
                    <img src="<?php echo base_url('upload/content/'.$config->site_logo);?>"  alt="logo"/>
                </fieldset>
                 <fieldset>
                    <label>Chế độ site </label>
                     <select name="site_mode">
                        <option value="0" <?php if($config->site_mode==0):?>selected="selected"  <?php endif;?> >Bảo trì </option>
                        <option value="1" <?php if($config->site_mode==1):?>selected="selected"  <?php endif;?>>Hoạt động </option>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Google Analytic</label>
                    <input type="text" name="analytic" value="<?php echo $config->analytic?>" />
                </fieldset>
                <fieldset>
                    <label>Giao diện</label>
                     <select name="template">
                        <option value="0" <?php if($config->template==0):?>selected="selected"  <?php endif;?> >Template Bánh mỹ</option>
                        <option value="1" <?php if($config->template==1):?>selected="selected"  <?php endif;?>>Template Chính</option>
                    </select>
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

