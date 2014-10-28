<article class="module width_full">
    <div class="module_content">
<form method="post" action="<?php echo base_url('admin/content/gallery/'); ?>"
      enctype="multipart/form-data">
    Lựa chọn sản phẩm: 
    <select name="itemid">
         <option value="0">---------------</option>
        <?php foreach ($allcontents as $row): ?>
            <option value="<?php echo $row->id ?>">
                <?php echo $row->title ?>
            </option>
        <?php endforeach; ?>
    </select>  
    <input type="file" name="upload[]" id="upload" multiple="multiple" /> 
    <input type="submit" name="fsubmit" id="fsubmit" value="Upload" />
</form>

<div class="progress">
    <div class="bar"></div>
    <div class="percent">0%</div>
</div>
<div id="status"></div>

<div class="span10">
    <h3 class="row-fluid header smaller lighter blue">
        <span class="span7"> <i class="icon-th-large"></i> Danh sách ảnh đã
            tạo </span>
        <!--/span-->
    </h3>
    <div class="row-fluid">
        <script type="text/javascript">
            function changeitem(selectObj) {
                var id = selectObj.value;
                var dataString = id;
                $.ajax({
                    url: "<?php echo base_url() . 'index.php/admin/content/ajaximagegallery/'; ?>" + dataString,
                    type: 'POST',
                    data: dataString,
                    success: function (output_string) {
                        $(".resultajax").html(output_string);
                    },
                    error: function () {
                        alert('null');
                    }
                });

            }
        </script>
        <select name="typeid" id="typeid" onchange="changeitem(this);">
            <option value="0" selected="selected">------------</option>
            <?php foreach ($allcontents as $row): ?>
                <option value="<?php echo $row->id ?>">
                    <?php echo $row->title ?>
                </option>
            <?php endforeach; ?>
        </select>  

        <div class="resultajax">
        </div>



    </div>
    <!--/row-->
</div>
<br />
<br />
<br />
</div>
</article>

