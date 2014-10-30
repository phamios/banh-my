<div id="navi_wrap">
    <div id="navi_container">
        <nav id="left-nav">

            <ul class="left_nav_ul" style="width:auto;">
                <li class="top_nav_border_right"></li>
                <li class=" haveChild">
                    <a href="#"><span>Trang chủ</span></a> 
                </li>
                <li class="top_nav_border_right"></li> 
            </ul>
        </nav>

        <nav id="right-nav">         
            <div id="account_panel" class="right mt15 mr5"> 
                <div class="left fontB f12">
                    <a href="#" class="ml10">
                        Đăng ký		
                    </a>

                    <a href="#login" id="act_account_login" class="ml10" style="color:red;">
                        Đăng nhập		
                    </a>
                </div> 
            </div>
        </nav>
    </div> 
</div>
<div id="search_wrap"> 
    <div class="left mt5 ml10">
        <a href="#">
            <img src="<?php echo base_url('src/template2'); ?>/logo.png">
        </a>
    </div>

    <div id="search_box">
        <?php echo form_open_multipart('home/search'); ?>
        <div id="search_wrapper">
            <input name="a" value="search" type="hidden">
            <input name="key" value="text" type="hidden">
            <input id="search_t" class="ac_input" name="q" class="form-control keywork" placeholder="Nhập từ khóa" type="text">
            <select name="price" class="form-control">
                <option selected="selected" value="0">Giá Cả</option>
                <option value="300000">Từ 300.000</option>
                <option value="500000">Từ 500.000</option>
                <option value="800000">Từ 800.000</option>
                <option value="1000000">Trên 1 củ</option>
            </select>
            <select name="service" class="form-control">
                <option selected="selected" value="0">Dich Vụ</option>
                <?php foreach ($services as $serv): ?>
                    <option value="<?php echo $serv->id ?>"><?php echo $serv->cate_name; ?></option>
                <?php endforeach; ?>
            </select>
            <div id="search_button_wrapper">
                <input class="filbtn" value="Tìm kiếm" name="sub_search" id="sub_search"  type="submit">
            </div>

        </div>
        <?php echo form_close(); ?>

    </div>    
</div>