<?php $this->load->view('frontend/user/widget/menu'); ?>
<div class="profile_right width795">
    <div class="width50 reg_right" style="padding:20px;"> 
        <div><h3>Hòm thư</h3></div>
        <?php if ($messagies): ?>
        <ul>
            <?php foreach($messagies as $mess): ?>
            <li><a href="<?php echo site_url('user/read_mess/'.$mess->id);?>"><?php echo $mess->mess_title;?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>