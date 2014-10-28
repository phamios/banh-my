
<title>
    <?php echo $this->session->userdata('site_name') ?> 
    <?php if ($this->router->class == 'details'): ?> 
        |  <?php echo $this->session->userdata('title_content'); ?>
    <?php endif; ?>
    | 
    <?php echo $this->session->userdata('locationname'); ?>

</title>
<meta name="keywords" content="<?php echo $this->session->userdata('site_meta') ?>">
<meta name="description" content="<?php echo $this->session->userdata('site_description') ?>">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="author" content="<?php echo site_url(); ?>"> 


<script src="<?php echo base_url('src'); ?>/jquery-1.11.1.min.js"></script>

<style type="text/css">.cf-hidden { display: none; } .cf-invisible { visibility: hidden; }</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('src/frontend'); ?>/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('src/frontend'); ?>/reponsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('src/frontend'); ?>/style_002.css"> 


<?php $this->load->view('frontend/widget/js'); ?>

<script  type="text/javascript" language="javascript">
    $(document).ready(function () {
        $.ajax({
            url: '<?php echo site_url("ajax/load_default"); ?>',
            type: 'GET',
            dataType: 'html',
            success: function (output_string) {
                // $('#info-girl').html(output_string); 
            } // End of success function of ajax form
        }); // End of ajax call	 
    });
</script>