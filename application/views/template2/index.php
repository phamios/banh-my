<?php $this->load->view('template2/widget/header'); ?>    
<body>

    <div id="Fancy-Free">
        <header>
            <?php $this->load->view('template2/widget/top_header'); ?>    
        </header>

        <div id="body" class="detail">
            <div class="container">  
                 <?php if ($this->router->class == 'home'): ?>
                <div id="area_f"> 
                    <?php $this->load->view('template2/widget/slide'); ?>
                </div>
                <?php else:?>
                <div style="padding:50px;"> </div>
                 <?php endif; ?> 

                <div class="wrap">
                    <div class="main"> 
                        <!-- Thong bao -->
                        <?php $this->load->view('template2/notification'); ?>	
                        <!-- Phim le moi -->

                        <?php if ($this->router->class == 'home'): ?>
                            <?php if ($this->router->fetch_method() == 'index'): ?>
                                <?php $this->load->view('template2/home/index'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'search'): ?>
                                <?php $this->load->view('template2/search/index'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'location'): ?>
                                <?php $this->load->view('template2/location/index'); ?>
                            <?php endif; ?>
                        <?php endif; ?> 

                        <?php if ($this->router->class == 'details'): ?> 
                            <?php $this->load->view('template2/details/index'); ?> 
                        <?php endif; ?>
                        <?php if ($this->router->class == 'type'): ?> 
                            <?php $this->load->view('template2/type/index'); ?> 
                        <?php endif; ?>
                        <?php if ($this->router->class == 'help'): ?> 
                            <?php $this->load->view('template2/help/index'); ?> 
                        <?php endif; ?>
                        
                        <?php if ($this->router->class == 'user'): ?> 
                            <?php if ($this->router->fetch_method() == 'index'): ?>
                                <?php $this->load->view('template2/user/index'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'changepass'): ?>
                                <?php $this->load->view('template2/user/changepass'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'message'): ?>
                                <?php $this->load->view('template2/user/message'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'deposit'): ?>
                                <?php $this->load->view('template2/user/deposit'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'report'): ?>
                                <?php $this->load->view('template2/user/report'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'favor'): ?>
                                <?php $this->load->view('template2/user/favor'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'login'): ?>
                                <?php $this->load->view('template2/login/index'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'register'): ?>
                                <?php $this->load->view('template2/register/index'); ?>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="clear"></div>
                </div>

                <div id="footer">
                    ﻿<?php $this->load->view('template2/widget/footer'); ?>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>