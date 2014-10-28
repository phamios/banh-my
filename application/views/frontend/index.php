<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('frontend/widget/header'); ?>

        <?php $this->load->view('frontend/widget/js'); ?>


    </head>
    <body>
        <div class="top-menu width100">
            <?php $this->load->view('frontend/widget/topmenu'); ?>
        </div>
        <div class="clear"></div>
        <div id="mainContainer">
            <div class="container">
                <?php $this->load->view('frontend/widget/search'); ?> 

                <?php if ($this->router->class == 'home'): ?>
                    <?php if ($this->router->fetch_method() == 'index'): ?>
                        <?php $this->load->view('frontend/home/index'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'search'): ?>
                        <?php $this->load->view('frontend/search/index'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'location'): ?>
                        <?php $this->load->view('frontend/location/index'); ?>
                    <?php endif; ?>
                <?php endif; ?> 

                <?php if ($this->router->class == 'details'): ?> 
                    <?php $this->load->view('frontend/details/index'); ?> 
                <?php endif; ?>
                <?php if ($this->router->class == 'user'): ?> 
                    <?php if ($this->router->fetch_method() == 'index'): ?>
                        <?php $this->load->view('frontend/user/index'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'changepass'): ?>
                        <?php $this->load->view('frontend/user/changepass'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'message'): ?>
                        <?php $this->load->view('frontend/user/message'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'deposit'): ?>
                        <?php $this->load->view('frontend/user/deposit'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'login'): ?>
                        <?php $this->load->view('frontend/login/index'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'register'): ?>
                        <?php $this->load->view('frontend/register/index'); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <footer class="clear">
            <div class="container">

                <div class="width80 clear">
                    <div style="padding-top: 1px;">
                        <h3>XU HƯỚNG TÌM KIẾM</h3>
                    </div>
                    <div>
                        <ul class="width20">
                            <li><a href="tim-kiem-text/lam-tinh-page-1.html">lam tinh</a></li>
                            <li><a href="tim-kiem-text/gai-xinh-page-1.html">gai xinh</a></li>
                            <li><a href="tim-kiem-text/gai-lau-xanh-page-1.html">gai lau xanh</a></li>
                            <li><a href="tim-kiem-text/gai-goi-page-1.html">gai goi</a></li>
                            <li><a href="tim-kiem-text/gai-bao-page-1.html">gai bao</a></li>
                            <li><a href="tim-kiem-text/anh-gai-xinh-page-1.html">anh gai xinh</a></li>
                            <li><a href="tim-kiem-text/cave-page-1.html">cave</a></li>
                            <li><a href="">gai goi</a></li>
                            <li><a href="tim-kiem-text/tim-gai-dep-page-1.html">tim gai dep</a></li>
                        </ul>

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="width80 clear">
                    <div>
                        <h3>Được tìm kiếm nhiều</h3>
                    </div>
                    <div>

                        <ul class="width20">
                            <li><a href="tim-kiem-text/anh-lon-con-trinh-page-1.html">anh lon con trinh</a></li>
                            <li><a href="tim-kiem-text/lon-chay-nuoc-page-1.html">lon chay nuoc</a></li>
                            <li><a href="tim-kiem-text/anh-lon-gai-page-1.html">anh lon gai</a></li>
                            <li><a href="tim-kiem-text/vu-dep-buom-xinh-page-1.html">vu dep buom xinh</a></li>
                            <li><a href="tim-kiem-text/num-vu-page-1.html">num vu</a></li>
                            <li><a href="tim-kiem-text/anh-vu-to-page-1.html">anh vu to</a></li>
                            <li><a href="tim-kiem-text/lon-gai-trinh-page-1.html">lon gai trinh</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="margin-top: 8px;" class="clear">
                    <img src="<?php echo base_url('src/frontend'); ?>/logo.png" height="78" width="256">
                </div>
            </div>
        </footer>

    </body>
</html>