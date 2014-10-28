<article class="module width_full">
    <header><h3 class="tabs_involved"> Quản lý Thành viên</h3>
        <ul class="tabs">
            <li><a href="#tab1">Danh sách</a></li> 
        </ul>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Tên user </th> 
                        <th>Loại user</th> 
                        <th>Ngân sách</th> 
                        <th>Ngày gia nhập</th>
                        <th>Tình trạng</th>
                        <th>Tuỳ chỉnh </th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_user): ?>
                        <?php foreach ($list_user as $root => $user): ?>
                            <tr> 
                                <td><input type="checkbox" name="cate[]" value="<?php echo $user->id ?>"></td> 
                                <td><?php echo $user->username?></td>
                                <td><?php echo $user->usertype?></td>
                                <td><?php echo $user->createdate?></td>
                                <td><?php echo $user->balancing?></td>
                                <td>
                                    <?php if($user->active == 1):?>
                                    <a href="<?php echo site_url("admin/user/status/".$user->id.'/0');?>">Đang hoạt động</a>
                                    <?php else:?>
                                    <a href="<?php echo site_url("admin/user/status/".$user->id.'/1');?>">Đã tạm dừng</a>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/user/del/'.$user->id);?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_trash.png'); ?>" alt="delete"/>
                                    </a> 
                                </td> 
                            </tr> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

        
    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

