
<div class="box">
    <p class="deBlue"></p>
    <div class="header">
        <a href="#">Kết quả tìm kiếm</a>
    </div> 
    <div class="content" id="content"> 
        <?php
        echo ' <ul class="list_m">';
            foreach ($result_search as $value) {
                echo '<li>
                    <h2>
                    <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '" title="' . $value->title . '">
                        <span class="poster">
                        <img src="' . base_url('upload/content/thumbs_' . $value->images) . '" alt="' . $value->title . '">
                        </span>
                        <br>
                        <span class="title left" style="width:100%; height:28px; overflow: hidden;">
                         ' . $value->title . '
                         </span>
                         <div class="clear"></div>
                          <div class="fontN" style="color:red;height:50px;"> Yêu thích: 
                          ' . $value->review . ' 
                              <img src="' . base_url('src/images/rating.png') . '" alt="rate"> <br/>
                              <span style="font-size:20px;color:black">    ' . number_format($value->cost) . 'đ </span>
                          </div>
                          <span class="hot"></span>
                     </a>
                    </h2>
                     </li>';
            }
            echo '</ul>';
        ?>
    </div>
</div>	


