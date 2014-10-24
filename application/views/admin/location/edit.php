<article class="module width_full"> 
    <div class="tab_container">
        <?php if($location):?>
        <?php foreach($location as $local_detail):?>
        <?php echo form_open_multipart('admin/location/edit/'.$local_detail->id); ?>
            <div class="module_content">
                <fieldset>
                    <label>Danh mục cha</label>
                    <select style="width:92%;" name="location_root">
                        <option value="0">----------------------</option>
                       <?php if ($list_location): ?>
                            <?php foreach($list_location as $location):?> 
                                 <option <?php if($local_detail->location_root == $location->id):?>selected="selected"<?php endif;?> value="<?php echo $location->id?>"><?php echo $location->location_name;?></option> 
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Tên danh mục </label>
                    <input type="text" name="location_name" value="<?php echo $local_detail->location_name?>" />
                </fieldset>
              
                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <select name="cate_active">
                        <option value="0" <?php if($local_detail->active==0):?>selected="selected"  <?php endif;?> >Draft</option>
                        <option value="1" <?php if($local_detail->active==1):?>selected="selected"  <?php endif;?>>Published</option>
                    </select>
                    <input type="submit" name="btt_submit" value="Đồng ý" class="alt_btn">
                    <input type="submit" name="btt_reset" value="Reset">
                </div>
            </footer>
            <?php echo form_close(); ?>
        <?php endforeach;?>
        <?php endif;?>
    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

