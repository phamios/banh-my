 
<div class="content_main" style="overflow:hidden; margin-bottom:10px;">

    <div class="prpt">
        <div class="cover" style="font-size: 14px; width:200px;">
            <a href="<?php echo site_url(); ?>">Tổng quan</a><br/><br/>
            <a href="<?php echo site_url('user/report'); ?>">Lịch sử giao dịch</a> <br/><br/>
            <a href="<?php echo site_url('user/history'); ?>">Hàng đã xem</a><br/><br/> 
            <a href="<?php echo site_url('user/favor'); ?>">Hàng yêu thích</a><br/><br/>
            <a href="<?php echo site_url('user/upgrade'); ?>">Nâng cấp tài khoản</a><br/><br/>
            <a href="<?php echo site_url('user/deposit'); ?>">Nạp thêm tiền</a><br/><br/>
            <a href="<?php echo site_url('user/message'); ?>">Hòm Thư</a><br/><br/>
            <a href="<?php echo site_url('user/changepass'); ?>">Đổi mật khẩu</a><br/><br/>
            <?php if ($this->session->userdata('usertype')): ?>
                <a href="<?php echo site_url('admincp/index'); ?>">Post bài</a><br/><br/>
            <?php endif; ?>
            <a href="<?php echo site_url('user/logout'); ?>">Thoát ra</a><br/><br/>
        </div>

        <div class="f12" style="font-size:14px; width:850px;padding-left: 200px;"> 
            <div class="profile_right width795">
                <div class="reg_right" style="padding:20px;">  
                    
                    <script type="text/javascript">
                        function submit_ok() {
                            var $type = $("#chonmang").val();
                            var $pin = $("#txtpin").val();
                            var $seri = $("#txtseri").val();
                            var $userid = "<?php echo $this->session->userdata('userid')?>";
                            $.ajax({
                                url: '<?php echo site_url("sub_ajax/deposit/"); ?>/' + $userid + '/' + $seri + '/' + $pin + '/' + $type,
                                type: 'POST',
                                dataType: 'html',
                                success: function (output_string) {
                                    $('#deposit_result').html(output_string);
                                } // End of success function of ajax form
                            }); // End of ajax call	 

                        }
                    </script>
                    <h2 class="form-control-heading">NẠP THẺ CÀO</h2>
                    <div class="deposit_result" id="deposit_result">
                    </div>
                    <div >
                        <label for="txtpin" class="col-lg-2 control-label">Loại thẻ</label>

                        <select class="form-control" name="chonmang" id="chonmang">
                            <option value="VIETEL">Viettel</option>
                            <option value="MOBI">Mobifone</option>
                            <option value="VINA">Vinaphone</option>
                            <option value="GATE">Gate</option>
                            <option value="VTC">VTC</option>
                        </select>

                    </div>
                    <div >
                        <label for="txtpin" class="col-lg-2 control-label">Tài khoản</label>

                        <input type="text" class="form-control" id="txtuser" name="txtuser" />

                    </div>
                    <div >
                        <label for="txtpin" class="col-lg-2 control-label">Mã thẻ</label>

                        <input type="text" name="txtpin" id="txtpin" class="form-control" id="txtpin" name="txtpin" />

                    </div>
                    <div >
                        <label for="txtseri" class="col-lg-2 control-label">Số seri</label>

                        <input type="text" name="txtseri" id="txtseri"  class="form-control" id="txtseri" name="txtseri" >

                    </div>

                    <div >

                        <input type="submit" class="btn" onclick="submit_ok();" name="napthe" id="napthe" class="napthe" value="Nạp thẻ"/> 

                    </div>  
                </div>

            </div>
        </div>

    </div> 
</div>

