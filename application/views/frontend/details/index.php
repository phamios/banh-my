 
<?php if ($content_details): ?>
    <?php foreach ($content_details as $content): ?>
        <div class="bercum" id="content">
            <span> &nbsp;&nbsp;&nbsp;Bạn đang ở: 
                <a href="<?php echo site_url(); ?>" title="" class="brc">Trang chủ</a> » 
                <a href="<?php echo site_url('home/location/' . $content->location_id); ?> " class="brc"><?php echo $content->location_name; ?></a> » 
                <a href="#" title="" class="brc"><?php echo $content->title; ?></a>
            </span>
            <div style="display: none;" id="getphonenow">Lấy số &amp; chén NGAY BÂY GIỜ</div>

        </div>
        <div class="box_home" style="min-height: 600px;">
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
                    <?php endif; ?>
                </div>
            </div>
            <div class="width55">
                <div>
                    <strong><?php echo $content->title; ?></strong>
                </div>
                <div>
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
                </div>

                <div>
                    <div class="width50">

                        <p>Giá: <span class="chang"><?php echo number_format($content->cost); ?> đ</span></p>
                        <p >
                            Bạn chưa biết lấy số <br>
                            <strong>Bấm</strong> 
                            <a href="#" title="" style="color: blue;">vào để xem hướng dẫn</a>
                        </p>
                    </div>
                    <div class="width50">

                        <div class="r-details" id="result">
                            <?php if ($this->session->userdata('userid') == null) : ?>
                                <a class="buttona" href="<?php echo site_url('user/login'); ?>" title="">Bạn phải là thành viên mới xem được</a>
                            <?php else: ?>
                                <a class="buttona" id="getdata" title="">Lấy số &amp; chén NGAY BÂY GIỜ</a>
                            <?php endif; ?>

                        </div>

                        <script  type="text/javascript" language="javascript">
                            $('#getdata').click(function () {

                                $.ajax({
                                    url: '<?php echo site_url('ajax/request/' . $content->id); ?>',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (output_string) {
                                        $('#result').html(output_string);
                                    } // End of success function of ajax form
                                }); // End of ajax call	

                            });

                        </script>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--                <div class="dacheck">
                                    <p>
                                        Đã check em này ? Bạn có muốn chia sẽ với các đồng dâm khác cảm giác của mình ?
                                    </p>
                                    <a href="#rating" title="" class="red">Bấm vào đây để chia sẻ </a> hoặc đưa vào mục 
                                    <a class="red" href="#" title="">Yêu Thích</a>
                                </div>-->
                <div class="info-girl"> 
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
                    <p><b style="color: red;">Giới thiệu : </b> <?php echo $content->content; ?></p>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <?php redirect('home'); ?>
<?php endif; ?> 