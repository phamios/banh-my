
<div class="box">
    <p class="deBlue"></p>
    <div class="header">
        Địa điểm: <a href="<?php echo site_url('home/location/' . $location_id); ?>"><?php echo strtoupper($location_name_current); ?></a>
    </div> 
    <div class="content" id="content"> 
        <ul class="list_m"> 
            <?php if ($list_content_location): ?>
                <?php foreach ($list_content_location as $search): ?>
                    <li>
                        <h2>
                            <a href="<?php echo site_url("details/".create_slug($search->title)."-".$search->contentid.".html")?>">
                                <span class="poster">
                                    <img src="<?php echo base_url('upload/content/thumbs_' . $search->images)?>" alt=""/>
                                </span>
                                <br>
                                <span class="title left" style="width:100%; height:28px; overflow: hidden;">
                                    <?php echo $search->title?>
                                </span>
                                <div class="clear"></div>
                                <div class="fontN" style="color:red;height:50px;"> 
                                    <img src="<?php echo base_url('src/images/rating.png')?>" alt="rate"><?php echo $search->review?> <br/>
                                    <span style="font-size:20px;color:black"> <?php echo number_format($search->cost)?> đ </span>
                                </div>
                                <span class="hot"></span>
                            </a>
                        </h2>
                    </li> 
                <?php endforeach; ?>
            <?php endif; ?>
        </ul> 
    </div>
</div>	


