<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="<?php echo base_url('src/js/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

<article class="module width_full">
    <header><h3 class="tabs_involved"> Quản lý nội dung</h3>
        <ul class="tabs">
            <li><a href="#tab1">Danh sách</a></li>
            <li><a href="#tab2">Thêm mới</a></li>
        </ul>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Title</th>
                        <th>User</th> 
                        <th>Location</th>  
                        <th>Type</th> 
                        
                        <th> Des</th> 
                        <th>Thumbs</th> 
                        <th>Cost</th> 
                        <th>Date</th> 
                        <th>Rate</th>
                        <th>Status</th> 
                        <th>Settings</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_content): ?>
                        <?php foreach ($list_content as $root => $content): ?>
                            <tr> 
                                <td><input type="checkbox" name="cate[]" value="<?php echo $content->id ?>"></td> 
                                <td><?php echo $content->title ?></td>
                                <td>
                                    <?php if($list_user):?>
                                    <?php foreach ($list_user as $value): ?>
                                        <?php if ($content->userid == $value->id): ?>
                                            <?php echo $value->username; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php else:?>
                                        Admin
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php foreach ($list_location as $location): ?>
                                        <?php if ($content->localid == $location->id): ?>
                                            <?php echo $location->location_name; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td> 
                                <td>
                                    <?php foreach ($list_type as $type): ?>
                                        <?php if ($content->localid == $type->id): ?>
                                            <?php echo $type->type_name; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                
                                <td><?php echo word_limiter($content->content, 80) ?></td>
                                <td><img src="<?php echo base_url('upload/content/thumbs_' . $content->images); ?>" width="30%" alt="image_thumbs"></td>
                                <td><?php echo number_format($content->cost); ?></td>
                                <td><?php echo $content->datecreated; ?></td>
                                <td><?php echo $content->review; ?></td>
                                <td>
                                    <?php if ($content->status == 1): ?>
                                        <a href="<?php echo site_url("admin/content/status/" . $content->id . '/0'); ?>">Đang hoạt động</a>
                                    <?php else: ?>
                                        <a href="<?php echo site_url("admin/content/status/" . $content->id . '/1'); ?>">Đã tạm dừng</a>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="<?php echo site_url('admin/content/edit/' . $content->id); ?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_edit.png'); ?>" alt="edit"/>
                                    </a>
                                    <a href="<?php echo site_url('admin/content/del/' . $content->id); ?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_trash.png'); ?>" alt="delete"/>
                                    </a> 
                                </td> 
                            </tr> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

        <div id="tab2" class="tab_content">
            <header><h3>Thêm mới</h3></header>
            <?php echo form_open_multipart('admin/content/add'); ?>
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
                    <?php if($list_category):?>
                    <select name="category[]" multiple size="100" style="height: 100px;"> 
                        <?php foreach($list_category as $category):?>
                            <option value="<?php echo $category->id?>"><?php echo $category->cate_name?> </option>
                        <?php endforeach;?>
                        </select>
                    <?php endif;?>
                </fieldset>
                
                 <fieldset>
                    <label>Loại</label>
                    <?php if($list_type):?>
                    <select name="content_type"> 
                        <?php foreach($list_type as $type):?>
                            <option value="<?php echo $type->id?>"><?php echo $type->type_name?> </option>
                        <?php endforeach;?>
                        </select>
                    <?php endif;?>
                </fieldset>
                 <fieldset>
                    <label> Ảnh đại diện  </label>
                    <input type="file" name="content_images" />
                </fieldset>
                 <fieldset>
                    <label> Tiêu đề</label>
                    <input type="text" name="content_title" />
                </fieldset>
                <fieldset>
                    <label>Nội dung</label>
                    <textarea id="content_content" name="content_content"> </textarea>
                </fieldset>
                
                <fieldset>
                    <label>Giá</label>
                    <input type="text" name="content_cost" />
                </fieldset>
                
                <fieldset>
                    <label>Review Tự đánh giá </label>
                   <select name="content_review">
                       <option value="1">1 *</option>
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
        </div><!-- end of #tab2 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

