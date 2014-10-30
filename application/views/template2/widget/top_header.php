<div id="navi_wrap">
    <div id="navi_container">
        <nav id="left-nav">

            <ul class="left_nav_ul" style="width:auto;">
                <li class="top_nav_border_right"></li>
                <li class=" haveChild">
                    <a href="<?php echo site_url(); ?>"><span>Trang chủ</span></a> 
                </li>
                <li class="top_nav_border_right"></li> 
                 <?php foreach($location as $loca):?> 
                <li class=" haveChild"> 
                        <a href="<?php echo site_url('ajax/change_location/'.$loca->id);?>"><span><?php echo $loca->location_name?></span></a> 
                        <ul class="left_nav_child"> 
                            <?php foreach($location as $sub_location):?> 
                            <?php if($sub_location->location_root == $loca->id):?>
                            <li>
                                <a href="<?php echo site_url('ajax/change_location/'.$sub_location->id);?>" title="#">
                                   <?php echo $sub_location->location_name?>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php endforeach;?>
                        </ul>
                     
                </li>
                <?php endforeach;?>
            </ul>
        </nav>

        <nav id="right-nav">         
            <div id="account_panel" class="right mt15 mr5"> 
                <div class="left fontB f12" style="padding:10px; font-size: 15px;">
                    
                    <?php if ($this->session->userdata('userid')): ?>
            <a href="<?php echo site_url('user');?>">
                    <span style="color:#f99f1c;"> 
                            <?php echo $this->session->userdata('username'); ?> 
                    </span>
                </a> 
                    &nbsp;&nbsp;&nbsp;
               <a href="<?php echo site_url('user/logout'); ?>" rel="nofollow">
               <img   src="<?php echo base_url('src/images/exit.png');?>" alt="login"/>
               </a>

            <?php else: ?>
               <a class="ml10" href="<?php echo site_url('user/login'); ?>" rel="nofollow">
                   <img   src="<?php echo base_url('src/images/login.png');?>" alt="login"/>
               </a> 
                <a id="act_account_login" class="ml10" style="color:red;" href="<?php echo site_url('user/register'); ?>" rel="nofollow">
                    <img  src="<?php echo base_url('src/images/reg.png');?>" alt="login"/>
                </a> 
            <?php endif; ?>
                
                </div> 
            </div>
        </nav>
    </div> 
</div>
<div id="search_wrap"> 
    <div class="left mt5 ml10">
        <a href="<?php echo site_url(); ?>">
            <img src="<?php echo base_url('upload/content/' . $this->session->userdata('site_logo')); ?>" height="78" width="256">
        </a>
    </div>

    <div id="search_box">
        <?php echo form_open_multipart('home/search'); ?>
        <div id="search_wrapper">
            <input name="q" value="Tìm kiếm" id="search_t" class="ac_input" type="text">
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
        </div><!--end#search_wrapper-->
        <div id="search_button_wrapper">
            <input class="filbtn" name="sub_search" value="Tìm kiếm" type="submit">
        </div>
        <?php echo form_close(); ?>
    </div>    
</div>