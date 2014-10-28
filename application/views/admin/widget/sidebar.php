<!--<form class="quick_search">
    <input type="text" value="Quick Search" onfocus="if (!this._haschanged) {
                this.value = ''
            }
            ;
            this._haschanged = true;">
</form>-->
<!--<hr/>-->
<h3>Nội dung</h3>
<ul class="toggle">
    <li class="icn_new_article"><a href="<?php echo site_url('admin/category/index');?>">Quản lý danh mục</a></li>
    <li class="icn_edit_article"><a href="<?php echo site_url('admin/location/index');?>">Quản lý địa điểm, khu vực</a></li>
    <li class="icn_categories"><a href="<?php echo site_url('admin/content/index');?>">Quản lý nội dung tin</a></li>
    <li class="icn_tags"><a href="<?php echo site_url('admin/type/index');?>">Quản lý thể loại</a></li>
    <li class="icn_photo"><a href="<?php echo site_url('admin/content/gallery/');?>">Thêm ảnh cho bài viết</a></li>
</ul>
<h3>Users</h3>
<ul class="toggle">
    <li class="icn_add_user"><a href="<?php echo site_url('admin/user/index');?>">Quản lý thành viên</a></li>
    <li class="icn_folder"><a href="<?php echo site_url('admin/message/index');?>">Gửi email tới các thành viên</a></li>
<!--    <li class="icn_view_users"><a href="#"></a></li>
    <li class="icn_profile"><a href="#">Your Profile</a></li>-->
</ul>
<!--<h3>Media</h3>
<ul class="toggle">
    <li class="icn_folder"><a href="#">File Manager</a></li>
    <li class="icn_photo"><a href="#">Gallery</a></li>
    <li class="icn_audio"><a href="#">Audio</a></li>
    <li class="icn_video"><a href="#">Video</a></li>
</ul>-->
<h3>Báo cáo</h3>
<ul class="toggle">
    <li class="icn_folder"><a href="<?php echo site_url('admin/report/money');?>">Thống kê sản lượng</a></li> 
    <li class="icn_folder"><a href="<?php echo site_url('admin/report/favor');?>">Báo cáo sản phẩm yêu thích</a></li> 
    <li class="icn_folder"><a href="<?php echo site_url('admin/report/bad');?>">Báo cáo sản phẩm vi phạm</a></li> 
</ul>
<h3>Admin</h3>
<ul class="toggle">
    <li class="icn_settings"><a href="<?php echo site_url('admin/config/index');?>">Tuỳ chọn cấu hình site</a></li>
    <li class="icn_security"><a href="<?php echo site_url('admin/config/payment');?>">Cấu hình thanh toán</a></li>
    <li class="icn_jump_back"><a href="<?php echo site_url('admincp/logout');?>">Logout</a></li>
</ul>

<footer>
    <hr />
    <p><strong>Copyright &copy; 2014 </strong></p>
    <p><a href="<?php echo site_url();?>"><?php echo site_url();?></a></p>
</footer>