<?php $this->load->view('template2/widget/header'); ?>    
<body>

    <div id="Fancy-Free">
        <header>
            <?php $this->load->view('template2/widget/top_header'); ?>    
        </header>

        <div id="body" class="detail">
            <div class="container">  
                <div id="area_f"> 
                    <?php $this->load->view('template2/widget/slide');?>
                </div>

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
                                <?php $this->load->view('frontend/search/index'); ?>
                            <?php endif; ?>
                            <?php if ($this->router->fetch_method() == 'location'): ?>
                                <?php $this->load->view('frontend/location/index'); ?>
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