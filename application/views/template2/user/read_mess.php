<?php $this->load->view('frontend/user/widget/menu'); ?>
<div class="profile_right width795">
    <div class="width50 reg_right" style="padding:20px;"> 
        <div><h3>Hòm thư</h3></div>
        <?php if ($messagies): ?> 
            <?php foreach ($messagies as $mess): ?>
                <h3><?php echo $mess->mess_title ?></h3><br/>
                <?php echo $mess->mess_content ?>
            <?php endforeach; ?> 
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>