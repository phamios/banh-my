<header>
    <div class="upperHeader">
        <div class="width30 logo pull-left"> 
            <a href="<?php echo site_url();?>"><img src="<?php echo base_url('upload/content/'. $this->session->userdata('site_logo')); ?>" height="78" width="256"></a>
        </div>
        <div class="width70 pull-righ">
            <div class="width100">
                <div class="width40 pull-left" style="padding-top: 30px;">
                    
                </div>
                <div class="width60 pull-righ region"> 
                    <?php foreach($location as $loca):?> 
                        <div class="width30" style="margin-left: 20px;">
                            <a class="" href="<?php echo site_url('ajax/change_location/'.$loca->id);?>"><?php echo $loca->location_name?></a>
                        </div>
                    <?php endforeach;?> 
                </div>
            </div>
            <div class="width100 clear search">
                 <?php echo form_open_multipart('home/search'); ?>
                    <input name="keyword" class="form-control keywork"  type="text">
                    <select name="price" class="form-control">
                        <option selected="selected" value="0">Giá Cả</option>
                        <option value="300000">Từ 300.000</option>
                        <option value="500000">Từ 500.000</option>
                        <option value="800000">Từ 800.000</option>
                        <option value="1000000">Trên 1 củ</option>
                    </select>
                    <select name="service" class="form-control">
                        <option selected="selected" value="0">Dich Vụ</option>
                        <?php foreach($services as $serv):?>
                            <option value="<?php echo $serv->id?>"><?php echo $serv->cate_name;?></option>
                        <?php endforeach;?>
                    </select>
                    <input name="sub_search" id="sub_search" value="Tìm" type="submit">
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    
    <div class="middleHeader clear">
        <?php $this->load->view('frontend/widget/banner'); ?>
    </div>
    
    <div class="lowerHeader clear">
        <?php $this->load->view('frontend/widget/ajax_location'); ?>
    </div>
    <div class="width100 shadow clear"></div>
    
</header>