<div class="box">
    <p class="deBlue"></p>
    <div class="header">Địa điểm trong khu vực </div> 
    <div id="noidungthongbao" class="content" style="padding:20px;font-size:15px; font-weight: bold; "> 
 
        <div class="lowerHeader_title">
            <?php if ($sub_location): ?>
                <?php foreach ($sub_location as $sub): ?>
            <a style="color:red;" href="<?php echo site_url('home/location/' . $sub->id)?>">
                <?php echo $sub->location_name; ?>
            </a> | 
                <?php endforeach; ?>
            <?php endif; ?>
        </div>


    </div>
</div>
<div class="clear"></div>