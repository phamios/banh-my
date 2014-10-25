<article class="module width_full">
    <header><h3 class="tabs_involved"> Quản lý Khu vực </h3>
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
                        <th>Tên địa điểm </th> 
                        <th>Địa điểm gốc</th> 
                        <th>Tình trạng</th>
                        <th>Tuỳ chỉnh </th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_location): ?>
                        <?php foreach ($list_location as $root => $location): ?>
                            <tr> 
                                <td><input type="checkbox" name="cate[]" value="<?php echo $location->id ?>"></td> 
                                <td><?php echo $location->location_name; ?></td> 
                                <td>
                                    <?php foreach ($list_location as $rot): ?>
                                        <?php if ($rot->id == $location->location_root): ?>
                                            <?php echo $rot->location_name; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td> 
                                
                                <td>
                                    <?php if($location->active == 1):?>
                                    <a href="<?php echo site_url("admin/location/status/".$location->id.'/0');?>">Đang hoạt động</a>
                                    <?php else:?>
                                    <a href="<?php echo site_url("admin/location/status/".$location->id.'/1');?>">Đã tạm dừng</a>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/location/edit/'.$location->id);?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_edit.png'); ?>" alt="edit"/>
                                    </a>
                                    <a href="<?php echo site_url('admin/location/del/'.$location->id);?>">
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
            <?php echo form_open_multipart('admin/location/add'); ?>
            <div class="module_content">
                <fieldset>
                    <label>Địa điểm cha </label>
                    <select style="width:92%;" name="location_root">
                        <option value="0">----------------------</option>
                       <?php if ($list_location): ?>
                            <?php foreach($list_location as $local):?>
                                 <option value="<?php echo $local->id?>"><?php echo $local->location_name;?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Tên khu vực </label>
                    <input type="text" name="location_name" />
                </fieldset>
                
                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <select name="location_active">
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

