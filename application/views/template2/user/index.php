 
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
                     
                    <div class="show-xu">
                        <h4>Số tiền đang có</h4>
                        <p class="info-xu" style="color:red; font-size: 14px;"><?php echo number_format($current_balance); ?> đ</p>
                    </div>
                    <br/> 
                    <div class="napxunow">
                        <h4 style="margin-top: 0;">Kiếm tiền với chương trình Aff</h4><br/>
                        <form name="napxunow" id="napxu" method="post" action="">
                            <input name="amount" id="amount" value="http://banhmy.us/?ses=217216" type="text">
                        </form><br/>
                        <h4 class="red">Làm thế nào để thành công ?</h4>
                        <p class="info-pro">
                            Thật đơn giản, chỉ cần gửi link cho bạn bè để họ đăng ký, sau đó mỗi lần nạp tiền bạn sẽ được hưởng 10% trong tổng số tiền nạp<br>
                            <strong>Lưu ý:</strong> Số tiền này để check hàng chứ <span class="red">không </span> có giá trị quy đổi thành tiền mặt.
                        </p><br/>
                    </div>
<br/>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</div>

