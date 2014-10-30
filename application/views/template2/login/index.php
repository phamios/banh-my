 
<div class="content_main" style="overflow:hidden; margin-bottom:10px;">
    <h1 class="title font-1"> Đăng nhập vào hệ thống </h1>
    <div class="prpt">
        <div class="cover">
            <div class="width45" style="width:300px;">
                <div style="padding: 15px;width:300px;" > 
                    <div class="O1">
                        <a href="http://www.youtube.com/watch?v=HWwNcGQgYrU" class="active">Hướng dẫn đăng ký thành viên</a>
                    </div>
                    <div class="O2">
                        <a href="http://www.youtube.com/watch?v=Q5KX6t2p8Es" class="">Hướng dẫn nạp tiền vào tài khoản</a>
                    </div>
                    <div class="O3">
                        <a href="http://www.youtube.com/watch?v=ALQlw0S5NU0" class="">Hướng dẫn lấy số hàng</a>
                    </div>
                    <div class="O4">
                        <a href="http://www.youtube.com/watch?v=pGc-MdhWM8M" class="">Hướng dẫn chia sẻ đánh giá</a>
                    </div>
                    <div class="O5">
                        <a href="http://www.youtube.com/watch?v=GknOVj5OY6Q" class="">Chính sách hoàn tiền</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dt f12 input_class"  style="font-size:18px;"> 
            <?php echo form_open_multipart('user/login', array("name" => "u-login", 'id' => 'u-login')); ?>
            
            <div> 
                Email đăng nhập <span class="red">*</span><br/>
                <input class=".input_class" value=""  name="email" id="email" type="text">
            </div>
            <div style="margin-top: 19px;">
                Mật khẩu <span class="red">*</span><br/>
                <input class=".input_class" name="password" id="password" type="password">
            </div>

            <div class="reg_right_bg clear" style="clear:both; padding:10px;">
                <input class=".input_class" name="btt_submit" id="sub_register" value="Đăng nhập" type="submit">
            </div>
            <?php echo form_close(); ?>
        </div>

        <div class="entry mb20">
            <div align="justify">
                <font size="4" color="#ffffff">
                <span style="background-color: rgb(0, 0, 0);"> 

                </span>
                </font>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
