<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
    <?php echo $this->session->userdata('site_name') ?> 
    <?php if ($this->router->class == 'details'): ?> 
        |  <?php echo $this->session->userdata('title_content'); ?>
    <?php endif; ?>
    | 
    <?php echo $this->session->userdata('locationname'); ?>

</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<link type="text/css" rel="stylesheet" href="<?php echo base_url('src/template2');?>/style.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('src/template2');?>/css.css"></link>
<link rel="shortcut icon" href="http://kenhhd.tv/public/img/ico/icon.png" type="image/x-icon"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('src/template2');?>/basic.css"></link>

<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery.js"></script>
<!--<script src="<?php echo base_url('src'); ?>/jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery_006.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery_002.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/fancyfree.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/global.js"></script>

<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery_005.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('src/template2');?>/colorbox.css" media="screen"></link>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery_004.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/jquery_003.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/template2');?>/custom.js"></script>
 
<script  type="text/javascript" language="javascript">
    $(document).ready(function () {
        $.ajax({
            url: '<?php echo site_url("sub_ajax/load_default"); ?>',
            type: 'GET',
            dataType: 'html',
            success: function (output_string) {
                // $('#info-girl').html(output_string); 
            }  
        });  
    });
</script>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'></link>

</head>