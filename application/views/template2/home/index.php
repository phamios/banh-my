<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: '<?php echo site_url('sub_ajax/load_content'); ?>',
            dataType: 'html',
            success: function (data1) {
                $('#content_load_ajax').html(data1);
            }
        });

        $.ajax({
            url: '<?php echo site_url('sub_ajax/content_hot'); ?>',
            dataType: 'html',
            success: function (data2) {
                $('#content').html(data2);
            }
        });
    });
</script>
 
 

<div class="box">
    <p class="deBlue"></p>
    <div class="header">
        <a href="#">Xem nhiều nhất</a>
    </div> 
    <div class="content" id="content"> 
        
    </div>
</div>	


<div  id="content_load_ajax">
<div class="box">
    <p class="deBlue"></p>
    <div class="header">
        <a href="#">Xem nhiều nhất</a>
    </div> 
    <div class="content" > 
        
    </div>
</div>	
    </div>	