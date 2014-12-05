 
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
                    <?php echo form_open_multipart('user/changepass', array("name" => "u-login", 'id' => 'u-login')); ?>
                    <div><h3>Thay đổi mật khẩu</h3></div>
                    <div> 
                        <p>Mật khẩu cũ <span class="red">*</span></p>
                        <input value="" class="form-control width90" name="old_pass" id="email" type="password">
                    </div>
                    <div style="margin-top: 19px;">
                        <p>Mật khẩu mới <span class="red">*</span></p>
                        <input class="form-control width90" name="new_pass" id="password" type="password">
                    </div> 
                    <br/>
                    <p>
                        <input name="btt_submit" id="sub_register" value="Đồng ý " type="submit">
                    </p>
                    <?php echo form_close(); ?>

                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</div>

