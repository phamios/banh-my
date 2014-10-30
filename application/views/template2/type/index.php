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
            <?php if ($list_content_type): ?>
                
                    <div class="jcarousel">
                        <ul>
                            <?php foreach ($list_content_type as $value): ?>
                            <li class="width19">
                                <div class="thumb">
                                    <a href="<?php echo site_url("details/".create_slug($value->title)."-".$value->contentid.".html")?>" title="#">
                                        <img src="<?php echo base_url('upload/content/thumbs_' . $value->images)?>" alt="#">
                                    </a>
                                </div>
                                <div class="name">
                                    <a href="<?php echo site_url("details/".create_slug($value->title)."-".$value->contentid.".html")?>" title="#"> <?php echo $value->title?></a>
                                </div>
                                <div class="street_girl">
                                    KV:<a href="<?php echo site_url('home/location/'.$value->localid)?>" title="#"><?php echo $value->location_name?></a>
                                </div>
                                <div class="rating_box">
                                    <div class="bacic" data-average="8" data-id="<?php echo $value->review?>"></div>
                                </div>
                                <div class="price">
                                    Giá: <span><?php echo number_format($value->cost)?> đ</span>
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

