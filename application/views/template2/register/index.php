<div class="content_main" style="overflow:hidden; margin-bottom:10px;"> 
    <div class="prpt">
        <div class="width50 reg_left">
            <div class="width100 reg_wel">
                <h4>Chào Mừng Bạn Chuẩn Bị Bước Vào</h4>
                <h3>THẾ GIỚI CỦA SỰ SUNG SƯỚNG</h3>
            </div>
            <div class="width100 reg_guide">
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

        <div class="dt f12 input_class"  style="font-size:18px;"> 
            <?php echo form_open_multipart('user/register', array("name" => "u-login", 'id' => 'u-login')); ?>

            <div> 
                Email: Lưu ý ("<span class="red">Điền Email thật để nhận mã xác thực tài khoản</span>")<br/>
                <input value="" name="email" id="email" type="text">
            </div>
            <div style="margin-top: 19px;">
                Mật khẩu <span class="red">*</span><br/>
                <input class=".input_class" name="password" id="password" type="password">
            </div>
            <div style="margin-top: 19px;">
                Mã kiểm tra <span class="red">*</span><br/>
                <input class=".input_class" name="captcha_verify" id="captcha_verify" type="text"> <br/>
                <img src="<?php echo base_url('captcha.php'); ?>"    class="table-Hcell" id="captcha" />  <br/>
                <a href="#" onclick="
                        document.getElementById('captcha').src = '<?php echo base_url('captcha.php'); ?>?' + Math.random();
                        document.getElementById('captcha-form').focus();"
                   id="change-image">Làm mới </a><br/><br/>
            </div>


            <div class="reg_right_bg clear" style="clear:both; padding:10px;">
                <input class=".input_class" name="sub_register" id="sub_register" value="Đăng ký" type="submit">
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
    <div class="clear"></div>
</div>