<!-- bxSlider Javascript file -->
<script src="<?php echo base_url('src/bxslider'); ?>/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo base_url('src/bxslider'); ?>/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            pagerCustom: '#bx-pager'
        });
    });
</script>
<?php if ($content_details): ?>
    <?php foreach ($content_details as $content): ?>
        <div class="content_main" style="overflow:hidden; margin-bottom:10px; clear:both;">
        <!--            <h1 class="title font-1"><?php echo $content->title; ?></h1>-->
            <div style="float:left; width:300px; padding:10px;">
                <?php if ($list_gallery): ?>
                    <ul class="bxslider">  
                        <?php foreach ($list_gallery as $imgs): ?>
                            <li><img width="100%"src="<?php echo base_url('upload/content/' . $imgs->images_link); ?>" /></li> 
                        <?php endforeach; ?>
                    </ul>

                    <div id="bx-pager">
                        <?php foreach ($list_gallery as $imgs): ?>
                            <a data-slide-index="<?php echo $imgs->id; ?>" href="#">
                                <img width="20%" src="<?php echo base_url('upload/content/' . $imgs->images_link); ?>" />
                            </a>
                        <?php endforeach; ?> 
                    </div>

                <?php else: ?>
                    <img width="80%" src="<?php echo site_url('upload/content/' . $content->images); ?>" alt="<?php echo $content->title; ?>"/>
                <?php endif; ?>
            </div>
            <div style="float:left;width:600px;padding:10px;font-size: 14px;">
                <div style="clear:both; width:100%;padding-bottom:20px;font-size: 20px;color:white;">
                    <?php echo $content->title; ?>
                </div>

                <div style="clear:both; width:100%;">
                    <?php if ($this->session->userdata('userid')): ?>
                        <a href="<?php echo site_url('ajax/favor/' . $this->session->userdata('userid') . '/' . $content->contentid); ?>">
                            <img width="30%" src="<?php echo base_url('src/images/favor.png'); ?>" alt=""  />
                        </a>
                        <a href="<?php echo site_url('ajax/star/' . $content->contentid); ?>">
                            <img width="30%" src="<?php echo base_url('src/images/star.png'); ?>" alt="" /> 
                        </a>
                        <a href="<?php echo site_url('ajax/report/' . $this->session->userdata('userid') . '/' . $content->contentid); ?>">
                            <img width="30%" src="<?php echo base_url('src/images/err.png'); ?>" alt="" />  
                        </a>
                    <?php endif; ?>
                </div>

                <div style="clear:both; width:100%;padding-top:20px;">
                    <?php $checked = ""; ?>
                    <?php if ($cateogries): ?>
                        <?php foreach ($cateogries as $cate): ?>
                            <?php foreach ($list_choose_cate as $choose): ?>
                                <?php if ($choose->cateid == $cate->id): ?>
                                    <?php $checked = "check1" ?>
                                <?php else: ?>
                                    <?php $checked = "check0" ?>
                                <?php endif; ?>
                                <span class="<?php echo $checked; ?>"><?php echo $cate->cate_name; ?></span>
                            <?php endforeach; ?> 
                        <?php endforeach; ?>
                    <?php endif; ?> 
                </div>
                <div style="clear:both; width:100%;padding-top:20px;">
                    Giá: <?php echo number_format($content->cost); ?> đ 
                </div>
                <div style="clear:both; width:100%;padding-top:10px;">
                    <?php if ($this->session->userdata('userid') == null) : ?>
                        <a class="showinfo" href="<?php echo site_url('user/login'); ?>" title=""> 
                            Bạn phải là thành viên mới xem được 
                        </a>
                    <?php else: ?>
                        <a class="showinfo" id="getdata" title=""> 
                            Lấy số chén NGAY BÂY GIỜ 
                        </a>
                    <?php endif; ?>  
                    <?php
                    $userid = $this->session->userdata('userid');
                    $cost = $content->cost;
                    $type = 0;
                    $contentid = $content->contentid;
                    ?>
                    <script  type="text/javascript" language="javascript">
                        $('#getdata').click(function () {

                            $.ajax({
                                url: '<?php echo site_url('ajax/request/' . $userid . '/' . $cost . '/' . $type . '/' . $contentid); ?>',
                                type: 'GET',
                                dataType: 'html',
                                success: function (output_string) {
                                    $('#info-girl-contact').html(output_string);
                                } // End of success function of ajax form
                            }); // End of ajax call	 
                        });
                    </script> 

                </div>
                <div style="clear:both; width:100%;padding-top:20px;">
                    <div id="info-girl-contact" class="buttona">  
                    </div>
                </div>
                <div style="clear:both; width:100%;padding-top:20px;">
                    <div class="info-girl" id="info-girl">  
                        <b style="color: wheat;">Người đăng:</b>
                        <?php if ($list_users): ?>
                            <?php foreach ($list_users as $user): ?>
                                <?php if ($user->id == $content->userid): ?>
                                    <?php echo $user->username; ?>
                                <?php else: ?>
                                    <?php echo "Admin" ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php echo "Admin" ?>
                        <?php endif; ?> 
                    </div>
                </div>
                <div style="clear:both; width:100%;padding-top:20px;">
                    <b style="color: wheat;"> Điểm tín dụng:</b> <b style="color: white;"><?php echo $content->review; ?></b> <img src="<?php echo base_url('src/images/rating.png') ?>" alt=""/>
                </div>
                <div style="clear:both; width:100%;padding-top:20px;">
                    <b style="color: wheat;">Thời gian đăng:</b> <?php echo $content->datecreated; ?>
                </div>
                <div style="clear:both; width:100%;padding-top:20px;color:#FFF;background-color: rgb(0, 0, 0);">
                    <?php echo $content->content; ?>
                </div>


            </div> 
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <?php redirect('home'); ?>
<?php endif; ?> 