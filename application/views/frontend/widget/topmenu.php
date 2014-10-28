<div class="container">
    <span class="pull-left toplink">
         
    </span>
    <span class="pull-righ">
        <ul class="qltk"> 
            <?php if ($this->session->userdata('userid')): ?>
            <li><a href="<?php echo site_url('user');?>">
                    <span style="color:#f99f1c"><?php echo $this->session->userdata('username'); ?> </span>
                </a> | 
            </li>
                <li><a href="<?php echo site_url('user/logout'); ?>" rel="nofollow">Thoát</a></li>

            <?php else: ?>
                <li><a href="<?php echo site_url('user/login'); ?>" rel="nofollow">Đăng nhập</a> |</li>
                <li><a href="<?php echo site_url('user/register'); ?>" rel="nofollow">Đăng ký</a> |</li>
            <?php endif; ?>

            <li>
                <a href="#" class="huong-dan-su-dung"> Hướng dẫn sử dụng</a>
            </li>
        </ul>
    </span>
</div>
<!--                    <a href="en/" class="last"><img src="<?php echo base_url('src/frontend'); ?>/lang-us.png" height="17" width="22">English</a> </span>-->