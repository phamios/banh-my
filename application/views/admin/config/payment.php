<article class="module width_full">
    <header><h3 class="tabs_involved"> Quản lý thanh toán</h3>
        <ul class="tabs">
            <li><a href="#tab1">Danh sách</a></li>
            <li><a href="#tab2">Thêm mới</a></li>
        </ul>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr> 
                        <th></th> 
                        <th>Payment Name</th>  
                        <th>Logo</th>
                        <th>Email Author</th>
                        <th>Status</th>
                        <th>Settings</th>
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if ($list_payment): ?>
                        <?php foreach ($list_payment as $payment): ?>
                            <tr> 
                                <td><input type="checkbox" name="cate[]" value="<?php echo $payment->id ?>"></td> 
                                <td><?php echo $payment->payment_name;?></td> 
                                <td><?php echo $payment->payment_logo;?></td>
                                <td><?php echo $payment->payment_email;?></td> 
                                <td>
                                    <?php if ($payment->payment_enable == 1): ?>
                                        <a href="<?php echo site_url("admin/config/payment_status/" . $payment->id . '/0'); ?>">Đang hoạt động</a>
                                    <?php else: ?>
                                        <a href="<?php echo site_url("admin/config/payment_status/" . $payment->id . '/1'); ?>">Đã tạm dừng</a>
                                    <?php endif; ?>
                                </td>
                                <td> 
                                    <a href="<?php echo site_url('admin/config/del/' . $payment->id); ?>">
                                        <img src="<?php echo base_url('src/admin_main/images/icn_trash.png'); ?>" alt="delete"/>
                                    </a> 
                                </td> 
                            </tr> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

        <div id="tab2" class="tab_content">
            <header><h3>Thêm mới</h3></header>
            <?php echo form_open_multipart('admin/config/add_payment'); ?>
            <div class="module_content">
                <fieldset>
                    <label>Tên loại thanh toán</label>
                     <input type="text" name="payment_name" />
                </fieldset>
                <fieldset>
                    <label>Email thanh toán</label>
                    <input type="text" name="payment_email" />
                </fieldset>
                <fieldset>
                    <label>Ảnh dại diện</label>
                    <input type="file" name="payment_logo" />
                </fieldset>

                <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <select name="payment_status">
                        <option value="0">Draft</option>
                        <option value="1">Published</option>
                    </select>
                    <input type="submit" name="btt_submit" value="Đồng ý" class="alt_btn">
                    <input type="submit" name="btt_reset" value="Reset">
                </div>
            </footer>
            <?php echo form_close(); ?>
        </div><!-- end of #tab2 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

