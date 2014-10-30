<div class="wrap">
    <div class="links" style="padding:8px 0;">
        <div class="l">
            <ul>
                <?php foreach ($location as $loca): ?> 
                    <li> 
                        <a href="<?php echo site_url('ajax/change_location/' . $loca->id); ?>"><span><?php echo $loca->location_name ?></span></a> 

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="r">
            <ul>
                <li><a href="<?php echo site_url('user/login');?>">Đăng nhập</a></li>
                <li><a href="<?php echo site_url('user/register');?>">Đăng ký</a></li>
                <li><a href="<?php echo site_url('help');?>">Giới thiệu & Hướng Dẫn</a></li>
                <li><a href="<?php echo site_url('policy');?>">Chính sách</a></li>
            </ul>
        </div>


    </div>
    <div class="clear"></div>

    <div class="content" style="line-height:16px; padding:0px; color:#999">
        <div class="left">
            Bản quyền thuộc về &copy <?php echo $this->session->userdata('site_name') ?>  <br>
        </div>
        <div class="right textR">
            <strong>
                <h1 style="font-size:12px;&quot;">
                    <?php $metas =  explode(",",$this->session->userdata('site_meta')); 
                    foreach($metas as $meta):
                    ?>
                    <a href="<?php echo site_url();?>" title=""><?php echo $meta?></a>
                    | 
                   <?php endforeach; ?>
                </h1>
            </strong>
        </div>
        <div class="clear"></div>
    </div>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $this->session->userdata('analytic') ?>', 'auto');
  ga('send', 'pageview');

    </script>


</div>