<article class="module width_full">
    <header><h3 class="tabs_involved"> Quản lý Thể loại</h3>
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
                        <th>Tên thể loại</th>  
                        <th>Tuỳ chỉnh </th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_type): ?>
                        <?php foreach ($list_type as $root => $type): ?>
                            <tr> 
                                <td><input type="checkbox" name="cate[]" value="<?php echo $type->id ?>"></td> 
                                <td><?php echo $type->type_name; ?></td> 
                                
                                <td>
                                    <a href="<?php echo site_url('admin/type/edit/'.$type->id);?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_edit.png'); ?>" alt="edit"/>
                                    </a>
                                    <a href="<?php echo site_url('admin/type/del/'.$type->id);?>">
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
            <?php echo form_open_multipart('admin/type/add'); ?>
            <div class="module_content">
                
                <fieldset>
                    <label>Tên thể loại</label>
                    <input type="text" name="type_name" />
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
        </div><!-- end of #tab2 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

