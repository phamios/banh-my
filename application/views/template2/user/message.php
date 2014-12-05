 
<div class="content_main" style="overflow:hidden; margin-bottom:10px;">

    <div class="prpt">
        <div class="cover" style="font-size: 14px; width:200px;">
            <a href="<?php echo site_url(); ?>">Tổng quan</a><br/><br/>
            <a href="<?php echo site_url('user/report'); ?>">Lịch sử giao dịch</a> <br/><br/>
            <a href="<?php echo site_url('user/history'); ?>">Hàng đã xem</a><br/><br/> 
            <a href="<?php echo site_url('user/favor'); ?>">Hàng yêu thích</a><br/><br/>
            <a href="<?php echo site_url('user/upgrade'); ?>">Nâng cấp tài khoản</a><br/><br/>
            <a href="<?php echo site_url('user/deposit'); ?>">Nạp thêm tiền</a><br/><br/>
            <a href="<?php echo site_url('user/message'); ?>">Hòm Thư</a><br/><br/>
            <a href="<?php echo site_url('user/changepass'); ?>">Đổi mật khẩu</a><br/><br/>
            <?php if ($this->session->userdata('usertype')): ?>
            <a href="<?php echo site_url('admincp/index'); ?>">Post bài</a><br/><br/>
            <?php endif;?>
            <a href="<?php echo site_url('user/logout'); ?>">Thoát ra</a><br/><br/>
        </div>

        <div class="f12" style="font-size:14px; width:850px;padding-left: 200px;"> 
            <div class="profile_right width795">
                <div class="reg_right" style="padding:20px;"> 
                    <?php if ($messagies): ?>
                        <ul>
                            <?php foreach ($messagies as $mess): ?>
                                <li><a href="<?php echo site_url('user/read_mess/' . $mess->id); ?>"><?php echo $mess->mess_title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</div>

