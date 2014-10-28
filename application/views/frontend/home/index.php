<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: '<?php echo site_url('ajax/load_content'); ?>',
            dataType: 'html',
            success: function (html) {
                $('#content_load_ajax').html(html); 
            }
        });
        $.ajax({
            url: '<?php echo site_url('ajax/content_hot'); ?>',
            dataType: 'html',
            success: function (html) {
                $('#content_hot').html(html); 
            }
        });
    });

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


<div class="box_home">
    <div class="box_home_title box_home_title_01">
        <h3><a href="#">XEM NHIỀU NHẤT</a><a href="#" class="pull-righ view-all">Xem toàn bộ</a></h3>
    </div>
    <div  class=" box_home_content list_work jcarousel">
        <div class="jcarousel-wrapper">
            <div class="jcarousel2" id="content_hot">


            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>


<div id="content_load_ajax">
</div>

<!--
<div class="box_home">
    <div class="box_home_title box_home_title_01">
        <h3><a href="#">XEM NHIỀU NHẤT</a><a href="#" class="pull-righ view-all">Xem toàn bộ</a></h3>
    </div>
    <div  class=" box_home_content list_work jcarousel">
        <div class="jcarousel-wrapper">
            <div class="jcarousel2" id="content_hot">


            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

 
<div class="box_home clear">
    <div class="box_home_title box_home_title_02">
        <h3><a href="#">HÀNG MỚI NHẤT</a><a href="#" class="pull-righ view-all">Xem toàn bộ</a></h3>
    </div>
    <div class="box_home_content "> 
        <div class="jcarousel-wrapper">
            <div class="jcarousel">
                <ul>
                    <li> <img src="http://placehold.it/350x150&text=FooBar1" alt="Image 1">  </li>
                    <li><img src="http://placehold.it/350x150&text=FooBar1" alt="Image 2"> </li>
                    <li><img src="http://placehold.it/350x150&text=FooBar1" alt="Image 3">  </li>
                    <li><img src="http://placehold.it/350x150&text=FooBar1" alt="Image 4"> </li>
                    <li><img src="http://placehold.it/350x150&text=FooBar1" alt="Image 5"> </li>
                    <li><img src="http://placehold.it/350x150&text=FooBar1" alt="Image 6"> </li>
                </ul>
            </div> 
        </div>
    </div>
    <div class="clear"></div>
</div>

 
<div class="box_home">
    <div class="box_home_title box_home_title_03">
        <h3><a href="#">HÀNG ƯU ĐÃI</a><a href="#" class="pull-righ view-all">Xem toàn bộ</a></h3>
    </div>
    <div  class=" box_home_content list_work jcarousel">
        <div class="jcarousel-wrapper">
            <div class="jcarousel3" id="content_luxury">


            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<div class="box_home">
    <div class="box_home_title box_home_title_04">
        <h3><a href="#">HÀNG CAO CẤP</a><a href="#" class="pull-righ view-all">Xem toàn bộ</a></h3>
    </div>
    <div  class=" box_home_content list_work jcarousel">
        <div class="jcarousel-wrapper">
            <div class="jcarousel4" id="content_special">
               
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>-->