<header>
    <div class="upperHeader">
        <div class="width30 logo pull-left">
            <a href="<?php echo site_url();?>"><img src="<?php echo base_url('src/frontend'); ?>/logo.png" height="78" width="256"></a>
        </div>
        <div class="width70 pull-righ">
            <div class="width100">
                <div class="width40 pull-left" style="padding-top: 30px;">
                    <div style="width: 60px;float: left;">&nbsp;</div>
                    <iframe src="<?php echo base_url('src/frontend'); ?>/like.html" scrolling="no" style="border:none; overflow:hidden; width:100px; height:22px;" allowtransparency="true" frameborder="0"></iframe>
                    <div id="___plusone_0" style="position: absolute; width: 450px; left: -10000px;"><iframe src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;origin=http%3A%2F%2Fbanhmy.us&amp;url=http%3A%2F%2Fbanhmy.us%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.YCD9kJfkPqE.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCOBYQ9-hXMw8hB7CS8ORf4u_z9tzw#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1413981948283&amp;parent=http%3A%2F%2Fbanhmy.us&amp;pfname=&amp;rpctoken=59820208" name="I0_1413981948283" id="I0_1413981948283" vspace="0" tabindex="0" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" scrolling="no" marginwidth="0" marginheight="0" hspace="0" frameborder="0" width="100%"></iframe></div><div data-gapistub="true" data-onload="true" data-gapiscan="true" class="g-plusone" data-href="http://banhmy.us"></div>
                </div>
                <div class="width60 pull-righ region">
                    <?php $i= 1;?>
                    <?php foreach($location as $loca):?>
                        <?php if($i == 1):?>
                                <div class="width30" style="margin-left: 20px;">
                                    <a class="" href=""><?php echo $loca->location_name?></a>
                                </div>
                        <?php else : ?>
                                 <div class="width25">
                                    <a class="" href=""><?php echo $loca->location_name?></a>
                                </div>
                        <?php endif; $i = $i+1;?>
                    <?php endforeach;?> 
                </div>
            </div>
            <div class="width100 clear search">
                 <?php echo form_open_multipart('home/search'); ?>
                    <input name="a" value="search" type="hidden">
                    <input name="key" value="text" type="hidden">
                    <input name="q" class="form-control keywork" placeholder="Nhập từ khóa" type="text">
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