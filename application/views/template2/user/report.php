<?php $this->load->view('frontend/user/widget/menu'); ?>
<div class="profile_right width795">
    <div class="reg_right" style="padding:20px;"> 
        <div><h3>Danh mục hàng đã mua</h3></div>
        <?php if ($list_order): ?>
        <ul>
            <?php foreach($list_order as $order): ?>
            <li style="padding:5px;"><?php echo $order->datecreate;?> :
            <?php foreach($list_content as $content):?>
                <?php if($content->id == $order->contentid):?>
                <a href='<?php echo site_url("details/".create_slug($content->title)."-".$content->id.".html") ?>'>
                    <?php echo $content->title;?> - Giá : <?php echo number_format($content->cost);?> đ
                </a>
                <?php endif;?>
            <?php endforeach;?>
 
            
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>