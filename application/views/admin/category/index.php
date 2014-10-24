<article class="module width_full">
    <header><h3 class="tabs_involved"> Quản lý danh mục </h3>
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
                        <th>Tên danh mục</th> 
                        <th>Danh mục gốc</th> 
                        <th>Ảnh danh mục </th> 
                        <th>Tình trạng</th>
                        <th>Tuỳ chỉnh </th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_category): ?>
                        <?php foreach ($list_category as $root => $category): ?>
                            <tr> 
                                <td><input type="checkbox" name="cate[]" value="<?php echo $category->id ?>"></td> 
                                <td><?php echo $category->cate_name; ?></td> 
                                <td>
                                    <?php foreach ($list_category as $rot): ?>
                                        <?php if ($rot->id == $category->cate_root): ?>
                                            <?php echo $rot->cate_name; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td> 
                                <td>
                                    <?php if ($category->cate_image): ?>
                                        <img width="20%" src="<?php echo base_url('upload/content/thumbs_' . $category->cate_image); ?>" alt="<?php echo $category->cate_name; ?>"/>
                                    <?php endif; ?>
                                </td> 
                                <td>
                                    <?php if($category->active == 1):?>
                                    <a href="<?php echo site_url("admin/category/status/".$category->id.'/0');?>">Đang hoạt động</a>
                                    <?php else:?>
                                    <a href="<?php echo site_url("admin/category/status/".$category->id.'/1');?>">Đã tạm dừng</a>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/category/edit/'.$category->id);?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_edit.png'); ?>" alt="edit"/>
                                    </a>
                                    <a href="<?php echo site_url('admin/category/del/'.$category->id);?>">
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
            <?php echo form_open_multipart('admin/category/add'); ?>
            <div class="module_content">
                <fieldset>
                    <label>Danh mục cha</label>
                    <select style="width:92%;" name="cate_root">
                        <option value="0">----------------------</option>
                       <?php if ($list_category): ?>
                            <?php foreach($list_category as $cate):?>
                                 <option value="<?php echo $cate->id?>"><?php echo $cate->cate_name;?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Tên danh mục </label>
                    <input type="text" name="cate_name" />
                </fieldset>
                <fieldset>
                    <label>Ảnh dại diện</label>
                    <input type="file" name="cate_images" />
                </fieldset>
                 
                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <select name="cate_active">
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

