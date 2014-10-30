<div class="register_title">
                    <h3>ĐĂNG KÝ HOÀN TOÀN MIỄN PHÍ</h3>
                </div>
                <div class="register_content">
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
                    <div class="width50 reg_right">
                         <?php echo form_open_multipart('user/login', array("name" => "u-login",'id'=>'u-login')); ?>
                            <div><h3>ĐĂNG NHẬP NHANH</h3></div>
                            <div>
                                
                                <input value="" class="form-control width90" name="email" id="email" type="text">
                            </div>
                            <div style="margin-top: 19px;">
                                <p>Mật khẩu <span class="red">*</span></p>
                                <input class="form-control width90" name="password" id="password" type="password">
                            </div>
                             
                            <div class="reg_right_bg clear">
                                <input name="btt_submit" id="sub_register" value="Đăng nhập" type="submit">
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="clear"></div>
                </div>