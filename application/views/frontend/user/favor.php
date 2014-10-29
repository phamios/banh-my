<?php $this->load->view('frontend/user/widget/menu'); ?>
<div class="profile_right width795">
    <div class="width400 " style="padding:20px;"> 
        <div><h3>Hàng yêu thích</h3></div>
        <?php if ($list_favor): ?>
        <ul>
            <?php foreach($list_favor as $favor): ?>
            <li style="padding:10px;">
                <a href='<?php echo site_url("details/".create_slug($favor->title)."-".$favor->id.".html") ?>'>
                    <?php echo $favor->title;?> - Giá : <?php echo number_format($favor->cost);?> đ
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>