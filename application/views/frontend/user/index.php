<?php $this->load->view('frontend/user/widget/menu');?>
<div class="profile_right width795">
    <div class="clear profile_O1">
        <div class="show-xu">
            <h4>Số tiền đang có</h4>
            <p class="info-xu"><?php echo $current_balance?></p>
        </div>
        <div class="napxunow">
            <h4 style="margin-top: 0;">Kiếm tiền với chương trình Aff</h4>
            <form name="napxunow" id="napxu" method="post" action="">
                <input name="amount" id="amount" value="http://banhmy.us/?ses=217216" type="text">
            </form>
            <h4 class="red">Làm thế nào để thành công ?</h4>
            <p class="info-pro">
                Thật đơn giản, chỉ cần gửi link cho bạn bè để họ đăng ký, sau đó mỗi lần nạp tiền bạn sẽ được hưởng 10% trong tổng số tiền nạp<br>
                <strong>Lưu ý:</strong> Số tiền này để check hàng chứ <span class="red">không </span> có giá trị quy đổi thành tiền mặt.
            </p>
        </div>
    </div>
    <div class="clear"></div>
</div>