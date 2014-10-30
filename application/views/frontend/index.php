<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
if ($this->session->userdata('site_mode') == 0) {
    echo " Hệ thống tạm dừng hoạt động để bảo trì, xin bạn vui lòng quay lại sau ít phút nữa !";
    die;
}
?>
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
                <?php if ($this->router->class == 'type'): ?> 
                    <?php $this->load->view('frontend/type/index'); ?> 
                <?php endif; ?>
                <?php if ($this->router->class == 'help'): ?> 
                    <?php $this->load->view('frontend/help/index'); ?> 
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
                    <?php if ($this->router->fetch_method() == 'report'): ?>
                        <?php $this->load->view('frontend/user/report'); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'favor'): ?>
                        <?php $this->load->view('frontend/user/favor'); ?>
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

                <!--                <div class="width80 clear">
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
                                </div>-->
                <div class="clear"></div>
                <div class="width80 clear">
                    <div>
                        <h3>Được tìm kiếm nhiều</h3>
                    </div>
                    <div>

                        <ul class="width20">
                            <?php $total_search = $this->session->userdata('top_serch'); ?>
                            <?php foreach ($total_search as $search): ?>
                                <li><a href="<?php echo site_url() ?>"><?php echo $search->keyword ?></a></li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="margin-top: 8px; padding-top:40px; color:white;" class="clear">
                    &copy <?php echo $this->session->userdata('site_footer') ?>
                    <br/><br/><br/>
                    <img src="<?php echo base_url('upload/content/' . $this->session->userdata('site_logo')); ?>" height="78" width="256">
                </div>
            </div>
        </footer>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '<?php echo $this->session->userdata('analytic') ?>', 'auto');
            ga('send', 'pageview');

        </script>
    </body>
</html>