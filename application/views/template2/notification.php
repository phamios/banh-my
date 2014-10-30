<div class="box">
    <p class="deBlue"></p>
    <div class="header">Thông báo</div> 
    <div id="noidungthongbao" class="content" style="padding:20px;text-align: center;padding-left:100px;"> 

        <script type="text/javascript">
            $(document).ready(function () {
                $.ajax({
                    url: '<?php echo site_url('ajax/load_location'); ?>',
                    dataType: 'html',
                    success: function (html) {
                        $('#lowerHeader_content').html(html);
                    }
                });

            });
        </script>

        <div class="lowerHeader_title">
            <h3>KHU VỰC <?php echo strtoupper($this->session->userdata('locationname')); ?></h3>
        </div>
        <div class="lowerHeader_content clear" style="color:black" id="lowerHeader_content">
 
        </div>
        <div class="clear"></div> 

    </div>
</div>
<div class="clear"></div>