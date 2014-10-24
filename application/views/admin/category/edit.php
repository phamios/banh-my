<article class="module width_full"> 
    <div class="tab_container">
        <?php if($category):?>
        <?php foreach($category as $catedetails):?>
        <?php echo form_open_multipart('admin/category/edit/'.$catedetails->id); ?>
            <div class="module_content">
                <fieldset>
                    <label>Danh mục cha</label>
                    <select style="width:92%;" name="cate_root">
                        <option value="0">----------------------</option>
                       <?php if ($list_category): ?>
                            <?php foreach($list_category as $cate):?> 
                                 <option <?php if($catedetails->cate_root == $cate->id):?>selected="selected"<?php endif;?> value="<?php echo $cate->id?>"><?php echo $cate->cate_name;?></option> 
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Tên danh mục </label>
                    <input type="text" name="cate_name" value="<?php echo $catedetails->cate_name?>" />
                </fieldset>
                <fieldset>
                    <label>Ảnh dại diện</label>
                    <input type="file" name="cate_images" value="<?php echo base_url('upload/content/'.$catedetails->cate_image);?>"/>
                </fieldset>
                 
                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <select name="cate_active">
                        <option value="0" <?php if($catedetails->active==0):?>selected="selected"  <?php endif;?> >Draft</option>
                        <option value="1" <?php if($catedetails->active==1):?>selected="selected"  <?php endif;?>>Published</option>
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

