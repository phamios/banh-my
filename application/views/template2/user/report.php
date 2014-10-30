 
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
                    <div><h3>Danh mục hàng đã mua</h3></div>
                    <?php if ($list_order): ?>
                        <ul>
                            <?php foreach ($list_order as $order): ?>
                                <li style="padding:5px;"><?php echo $order->datecreate; ?> :
                                    <?php foreach ($list_content as $content): ?>
                                        <?php if ($content->id == $order->contentid): ?>
                                            <a href='<?php echo site_url("details/" . create_slug($content->title) . "-" . $content->id . ".html") ?>'>
                                                <?php echo $content->title; ?> - Giá : <?php echo number_format($content->cost); ?> đ
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?> 
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
