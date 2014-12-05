
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