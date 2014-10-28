<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="<?php echo base_url('src/js/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea"
    });
</script>
<article class="module width_full"> 
    <div class="tab_container"> 

        <?php echo form_open_multipart('admin/message/send/'); ?>
        <div class="module_content">
            <?php if ($status): ?>
                <span style="color:blue;">Gửi thành công ! </span>
            <?php elseif ($status == 0): ?>
<!--                <span style="color:red;">Chưa có thành viên nào ! </span>-->
            <?php else: ?>
                <span style="color:red;">Gửi thất bại  ! </span>
            <?php endif; ?>
            <fieldset>
                <label>Tiêu đề</label>
                <input type="text" name="mess_title" id="mess_title"  />
            </fieldset>
            <fieldset>
                <label>Nội dung</label>
                <textarea id="mess_content" name="mess_content"> </textarea>
            </fieldset>

            <div class="clear"></div>
        </div>
        <footer>
            <div class="submit_link">
                <input type="submit" name="btt_submit" value="Đồng ý" class="alt_btn">
                <input type="submit" name="btt_reset" value="Reset">
            </div>
        </footer>
        <?php echo form_close(); ?> 
    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->

