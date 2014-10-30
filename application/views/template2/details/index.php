<?php if ($content_details): ?>
    <?php foreach ($content_details as $content): ?>
        <div class="content_main" style="overflow:hidden; margin-bottom:10px;">
            <h1 class="title font-1"><?php echo $content->title; ?></h1>
            <div class="prpt">
                <div class="cover">
                    <div class="width45" style="">
                        <div style="padding: 15px;"> 
                            <?php if ($list_gallery): ?>
                                <ul class="bxslider"> 

                                    <?php foreach ($list_gallery as $imgs): ?>
                                        <li><img width="90%"src="<?php echo base_url('upload/content/' . $imgs->images_link); ?>" /></li> 
                                    <?php endforeach; ?>
                                </ul>
                                <div id="bx-pager">
                                    <?php foreach ($list_gallery as $imgs): ?>
                                        <a data-slide-index="<?php echo $imgs->id; ?>" href=""><img width="20%" src="<?php echo base_url('upload/content/' . $imgs->images_link); ?>" /></a>
                                    <?php endforeach; ?> 
                                </div>
                            <?php else: ?>
                                <img width="90%" src="<?php echo site_url('upload/content/' . $content->images); ?>" alt="<?php echo $content->title; ?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="dt f12">
                    <p>
                        <?php if ($this->session->userdata('userid')): ?>
                            <a href="<?php echo site_url('ajax/favor/' . $this->session->userdata('userid') . '/' . $content->contentid); ?>"><img width="30%" src="<?php echo base_url('src/images/favor.png'); ?>" alt=""  /></a>
                            <a href="<?php echo site_url('ajax/star/' . $content->contentid); ?>"><img width="30%" src="<?php echo base_url('src/images/star.png'); ?>" alt="" /> </a>
                            <a href="<?php echo site_url('ajax/report/' . $this->session->userdata('userid') . '/' . $content->contentid); ?>"><img width="30%" src="<?php echo base_url('src/images/err.png'); ?>" alt="" />  </a>
                        <?php endif; ?>
                    </p>

                    <p><?php $checked = ""; ?>
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
        <!--                <span class="check0">Blowjob</span>
        <span class="check1">wc</span> -->
                    </p>

                    <p>
                    <div>
                        <div class="width50">

                            <p>Giá: <span class="chang"><?php echo number_format($content->cost); ?> đ</span></p>
        <!--                        <p >
                                Bạn chưa biết lấy số <br>
                                <strong>Bấm</strong> 
                                <a href="#" title="" style="color: blue;">vào để xem hướng dẫn</a>
                            </p>-->

                        </div>
                        <div class="width50">

                            <div class="r-details" id="result" class="result">
                                <?php if ($this->session->userdata('userid') == null) : ?>
                                    <a class="buttona" href="<?php echo site_url('user/login'); ?>" title="">Bạn phải là thành viên mới xem được</a>
                                <?php else: ?>
                                    <a class="buttona" id="getdata" title="">Lấy số &amp; chén NGAY BÂY GIỜ</a>
                                <?php endif; ?>

                            </div>

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
                                            $('#info-girl').html(output_string);
                                        } // End of success function of ajax form
                                    }); // End of ajax call	 
                                });
                            </script>

                        </div>
                        <div class="clear"></div>
                    </div>
                    </p>
                    <p>
                        <?php echo $content->title; ?></span>
                    </p>

                    <p>
                    <div class="info-girl" id="info-girl"> 

                        <p><b style="color: red;">Người đăng:</b>
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
                        </p>
                        <p><b style="color: red;"> Điểm tín dụng:</b> <?php echo $content->review; ?>
                        </p>
                        <p><b style="color: red;">Thời gian đăng:</b> <?php echo $content->datecreated; ?> </p>

                        <div class="clear"></div>
                    </div>
                    </p>



                </div>
                <div class="clear"></div>

                <div class="entry mb20">
                    <div align="justify">
                        <font size="4" color="#ffffff">
                        <span style="background-color: rgb(0, 0, 0);">P
                            <?php echo $content->content; ?>
                        </span>
                        </font>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <?php redirect('home'); ?>
<?php endif; ?> 