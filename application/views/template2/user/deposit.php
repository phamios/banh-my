<?php $this->load->view('frontend/user/widget/menu'); ?>
<div class="profile_right width795">
    <div class="width50 reg_right" style="padding:20px;"> 
        <div><h3>Nạp tiền</h3></div>
        <div>
            <?php if ($list_payment): ?>
                <ul>
                    <?php foreach ($list_payment as $payment): ?>
                    <li>
                         <?php echo form_open_multipart('user/deposit/'.$payment->id, array("name" => "u-login",'id'=>'u-login')); ?>
                        Nhập lượng tiền cần nạp vào <?php echo $payment->payment_name;?> : 
                        <input type="text" value="" name="amount_deposit"/>
                        <input type="hidden" value="<?php echo $payment->payment_email?>" name="reciever"/> 
                        <input type="submit" value="Nạp tiền" name="btt_submit" />
                        <?php echo form_close(); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>