 
<link href="<?php echo base_url('src/template2'); ?>/hand.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url('src/template2'); ?>/jquery_002_002.js" type="text/javascript"></script>
<script src="<?php echo base_url('src/template2'); ?>/slide.js" type="text/javascript"></script> 
<div class="lWrap">
    <div class="lstBaner rel">
        <div style="text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; width: 980px; height: 317px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
            <div style="text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; width: 980px; height: 317px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
                <div style="text-align: left; float: none; position: absolute; top: 0px; left: 0px; margin: 0px; width: 12740px; height: 317px;" id="lstBaner">
                    <!--------Item Slide-->
                    <?php foreach($slider as $value):?>
                    <div  style="margin-right: 1px;" class="item">
                        <div class="img rel">
                            <a href="<?php echo site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html")?>">
                                <img src="<?php echo base_url('upload/content/thumbs_' . $value->images) ; ?>" class="imgnone">
                            </a>
                            <div class="divWatchLate"></div>
                            <div class="hidden-tip" fid="9909">
                                <div id="popupTit" class="tit ">
                                    <span id="lblTitleEng" class="bold cB block"><?php echo $value->title ;?></span>
                                    <span id="lblTitle" class="cG block" style="margin: 3px 0px;"></span>

                                </div>
                                <div id="popupContent" class="content">
                                    <div class="mb7 justify lh16">
                                        <span id="lblDes" class="mb12 justify">
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="info">
                            <span class="iconPlaySS"></span>
                            <p class="title" style="width:180px; height:38px; overflow: hidden;">
                                <a href="<?php echo site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html")?>"><?php echo $value->title ;?></a>
                            </p>
                            <a href="#"><span class="iconPlayS"></span></a>
                        </div>
                    </div> 
                    <?php endforeach;?>
                    <!--------Item Slide-->
                </div>
            </div>
        </div>
        <div style="display: none;" id="prevbannerdiv" class="bannerpage_sub">
            <span class="iconPrevS"></span>
        </div>
        <div style="display: none;" id="nextbannerdiv" class="bannerpage_sub2">
            <span class="iconNextS"></span>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>