<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="<?php echo base_url('src/js/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

<article class="module width_full">
    <header><h3 class="tabs_involved">Sửa nội dung</h3> 
    </header>

    <div class="tab_container"> 
        <div id="tab1" class="tab_content"> 
            <?php if($content_details):?>
            <?php foreach($content_details as $details):?>
            <?php echo form_open_multipart('admin/content/edit/'.$details->id); ?>
            <div class="module_content">
                <fieldset>
                    <label>Địa điểm</label>
                    <select style="width:92%;" name="location_root" id="location_root" onChange="load()">
                        <option value="0">----------------------</option>
                        <?php if ($list_location_root): ?>
                            <?php foreach ($list_location_root as $location): ?>
                                <option value="<?php echo $location->id ?>"><?php echo $location->location_name; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <script type="text/javascript">
                        function load()
                        {
                            var id = $("#location_root").val();
                            $.ajax({
                                type: "GET",
                                url: "<?php echo site_url('ajax/list_sub_location/')?>/" + id,
                             
                            }).done(function (msg) {
                                $("#ajax_content").html(msg);
                            });
                        }

                    </script>
                    <div id="ajax_content" style="padding:5px;">  
                    
                    </div>

                </fieldset>
                <fieldset>
                    <label>Danh mục khả năng :</label>
                    <?php foreach($list_catecontent as $catecontent):?>
                        <?php if($catecontent->contentid == $details->id):?>
                            selected="selected"
                        <?php endif;?>
                    <?php endforeach;?>
                    
                    <?php if($list_category):?>
                    <select name="category[]" multiple size="100" style="height: 100px;"> 
                        <?php foreach($list_category as $category):?>
                            <option  value="<?php echo $category->id?>"><?php echo $category->cate_name?> </option>
                        <?php endforeach;?>
                        </select>
                    <?php endif;?>
                </fieldset>
                
                 <fieldset>
                    <label>Loại</label>
                    <?php if($list_type):?>
                    <select name="content_type"> 
                        <?php foreach($list_type as $type):?>
                        <option <?php if($type->id == $details->typeid):?>selected="selected" <?php endif;?> value="<?php echo $type->id?>"><?php echo $type->type_name?> </option>
                        <?php endforeach;?>
                        </select>
                    <?php endif;?>
                </fieldset>
                 <fieldset>
                    <label> Ảnh đại diện  </label>
                    <img src="<?php echo base_url('upload/content/thumbs_'.$details->images);?>" alt=""/>
                    <input type="file" name="content_images" />
                </fieldset>
                 <fieldset>
                    <label> Tiêu đề</label>
                    <input type="text" name="content_title" value="<?php echo $details->title;?>"/>
                </fieldset>
                <fieldset>
                    <label>Nội dung</label>
                    <textarea id="content_content" name="content_content"><?php echo $details->content;?> </textarea>
                </fieldset>
                
                <fieldset>
                    <label>Giá</label>
                    <input type="text" name="content_cost" />
                </fieldset>
                <fieldset>
                    <label>Số điện thoại liên hệ *</label>
                    <input type="text" name="content_phone" value="<?php echo $details->content_phone;?>"/>
                </fieldset>
                
                <fieldset>
                    <label>Review Tự đánh giá </label>
                   <select name="content_review">
                       <option value="1" >1 *</option>
                       <option value="2">2 *</option>
                       <option value="3">3 *</option>
                       <option value="4">4 *</option>
                       <option value="5">5 *</option>
                       <option value="6">6 *</option>
                       <option value="7">7 *</option>
                       <option value="8">8 *</option>
                       <option value="9"selected="selected">9 *</option>
                       <option value="10" >10 *</option> 
                   </select>
                </fieldset>

                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <select name="content_active">
                        <option value="0">Draft</option>
                        <option value="1">Published</option>
                    </select>
                    <input type="submit" name="btt_submit" value="Đồng ý" class="alt_btn">
                    <input type="submit" name="btt_reset" value="Reset">
                </div>
            </footer>
            <?php echo form_close(); ?>
            <?php endforeach;?>
            <?php endif;?>
        </div><!-- end of #tab2 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

