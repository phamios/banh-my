 
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
            <a href="<?php echo site_url('user/logout'); ?>">Thoát ra</a><br/><br/>
        </div>

        <div class="f12" style="font-size:14px; width:850px;padding-left: 200px;"> 
            <div class="profile_right width795">
                <div class="reg_right" style="padding:20px;"> 
                    <div><h3>Nạp thêm tiền </h3></div>
                    <?php if ($list_payment): ?>
                        <ul>
                            <?php foreach ($list_payment as $payment): ?>
                                <li>
                                    <?php echo form_open_multipart('user/deposit/' . $payment->id, array("name" => "u-login", 'id' => 'u-login')); ?>
                                    Nhập lượng tiền cần nạp vào <?php echo $payment->payment_name; ?> : 
                                    <input type="text" value="" name="amount_deposit"/>
                                    <input type="hidden" value="<?php echo $payment->payment_email ?>" name="reciever"/> 
                                    <input type="submit" value="Nạp tiền" name="btt_submit" />
                                    <?php echo form_close(); ?>
                                </li>
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

