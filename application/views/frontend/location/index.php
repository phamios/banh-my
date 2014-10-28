<script type="text/javascript">
    
    $(function () {
        $('.jcarousel').jcarousel({
            // Configuration goes here
        });
        $('.jcarousel2').jcarousel({
            // Configuration goes here
        });
        $('.jcarousel3').jcarousel({
            // Configuration goes here
        });
        $('.jcarousel4').jcarousel({
            // Configuration goes here
        });
    });
</script>
 
<div class="box_home clear">
    <div class="box_home_title box_home_title_02">
        <h3><a href="<?php echo site_url('home/location/'.$location_id);?>"><?php echo strtoupper($location_name_current);?></a></h3>
    </div>
    <div class="box_home_content "> 
        <div class="jcarousel-wrapper">
            <?php if ($list_content_location): ?>
                
                    <div class="jcarousel">
                        <ul>
                            <?php foreach ($list_content_location as $search): ?>
                            <li class="width19">
                                <div class="thumb">
                                    <a href="<?php echo site_url("details/".create_slug($search->title)."-".$search->contentid.".html")?>" title="#">
                                        <img src="<?php echo base_url('upload/content/thumbs_' . $search->images)?>" alt="#">
                                    </a>
                                </div>
                                <div class="name">
                                    <a href="#" title="#"> <?php echo $search->title?></a>
                                </div>
                                <div class="street_girl">
                                    KV:<a href="<?php echo site_url('home/location/'.$search->localid)?>" title="#"><?php echo $search->location_name?></a>
                                </div>
                                <div class="rating_box">
                                    <div class="bacic" data-average="8" data-id="<?php echo $search->review?>"></div>
                                </div>
                                <div class="price">
                                    Giá: <span><?php echo number_format($search->cost)?> đ</span>
                                </div>
                            </li>
                             <?php endforeach; ?>
                        </ul>
                    </div> 
               
            <?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>

