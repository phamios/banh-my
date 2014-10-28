<?php $this->load->view('frontend/user/widget/menu');?>
<div class="profile_right width795">
    <div class="width50 reg_right" style="padding:20px;">
                         <?php echo form_open_multipart('user/changepass', array("name" => "u-login",'id'=>'u-login')); ?>
                            <div><h3>Thay đổi mật khẩu</h3></div>
                            <div> 
                                <p>Mật khẩu cũ <span class="red">*</span></p>
                                <input value="" class="form-control width90" name="old_pass" id="email" type="password">
                            </div>
                            <div style="margin-top: 19px;">
                                <p>Mật khẩu mới <span class="red">*</span></p>
                                <input class="form-control width90" name="new_pass" id="password" type="password">
                            </div>
                             
                            <div class="reg_right_bg clear">
                                <input name="btt_submit" id="sub_register" value="Đồng ý " type="submit">
                            </div>
                        <?php echo form_close(); ?>
                    </div>
    <div class="clear"></div>
</div>