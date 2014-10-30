<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: '<?php echo site_url('sub_ajax/content_favor'); ?>',
            dataType: 'html',
            success: function (data1) {
                $('#lstBaner').html(data1);
            }
        }); 
    });
</script>
<link href="<?php echo base_url('src/template2'); ?>/hand.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url('src/template2'); ?>/jquery_002_002.js" type="text/javascript"></script>
<script src="<?php echo base_url('src/template2'); ?>/slide.js" type="text/javascript"></script> 
<div class="lWrap">
    <div class="lstBaner rel">
        <div style="text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; width: 980px; height: 317px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
            <div style="text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; width: 980px; height: 317px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
                <div style="text-align: left; float: none; position: absolute; top: 0px; left: 0px; margin: 0px; width: 12740px; height: 317px;" id="lstBaner">
                    <!--------Item Slide-->
                    <div  style="margin-right: 1px;" class="item">
                        <div class="img rel">
                            <a href="http://kenhhd.tv/movie-4978/Castle-Season-7-Nha-Van-Pha-An-Phan-7-2014-0423-Tap.html">
                                <img src="<?php echo base_url('src/template2'); ?>/0e371012ef4922d420d16eb5c6f443b5_thumb.jpg" class="imgnone">
                            </a>
                            <div class="divWatchLate"></div>
                            <div class="hidden-tip" fid="9909">
                                <div id="popupTit" class="tit ">
                                    <span id="lblTitleEng" class="bold cB block">Castle: Season 7 - Nhà Văn Phá Án: Phần 7 - 2014 (04/23 Tập)</span>
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
                                <a href="#">Castle: Season 7 - Nhà Văn Phá Án: Phần 7 - 2014 (04/23 Tập)</a>
                            </p>
                            <a href="#"><span class="iconPlayS"></span></a>
                        </div>
                    </div> 
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