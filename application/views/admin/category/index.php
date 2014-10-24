<article class="module width_3_quarter">
    <header><h3 class="tabs_involved">Quản lý danh mục/h3>
        <ul class="tabs">
            <li><a href="#tab1">Thêm mới</a></li>
            <li><a href="#tab2">Danh sách danh mục</a></li>
        </ul>
    </header>
    
    
    <div class="tab_container">
        <div id="tab1" class="tab_content">
             
        </div><!-- end of #tab1 -->

        <div id="tab2" class="tab_content">
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
                    <?php if($list_category):?>
                    <?php foreach($list_category  = $root as $category):?>
                    <tr> 
                        <td><input type="checkbox" name="cate[]" value="<?php echo $category->id?>"></td> 
                        <td><?php echo $category->cate_name;?></td> 
                        <td>
                            <?php foreach($root as $rot):?>
                                <?php if($rot->id == $category->cate_root):?>
                                    <?php echo $rot->cate_name;?>
                                <?php endif;?>
                            <?php endforeach;?>
                        </td> 
                        <td>
                            <?php if($category->cate_image):?>
                            <img src="<?php echo base_url('upload/content/'.$category->cate_images); ?>" alt="<?php echo $category->cate_name;?>"/>
                            <?php endif;?>
                        </td> 
                        <td>
                            <a href="#"><img src="<?php echo base_url('src/admin_main/images/icn_edit.png');?>" alt="edit"/></a>
                            <a href="#"><img src="<?php echo base_url('src/admin_main/images/icn_trash.png');?>" alt="delete"/></a> 
                        </td> 
                    </tr> 
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody> 
            </table>

        </div><!-- end of #tab2 -->

    </div>
</article>