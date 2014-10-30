<!-- include CSS & JS files -->
<!-- CSS file -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('src/jrate'); ?>/jRating.jquery.css" media="screen" />
<!-- jQuery files --> 
<script type="text/javascript" src="<?php echo base_url('src/jrate'); ?>/jRating.jquery.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url('src/jcarousel-master'); ?>/jcarousel.responsive.css">
<script type="text/javascript" src="<?php echo base_url('src/jcarousel-master'); ?>/dist/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('src/jcarousel-master'); ?>/jcarousel.responsive.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        


        // simple jRating call
        $(".rating_box").jRating();

        // more complex jRating call
        $(".rating_box").jRating({
            step: true,
            length: 20, // nb of stars
            onSuccess: function () {
                alert('Cám ơn bạn đã đánh giá cho em này !');
            }
        });

        // you can rate 3 times ! After, jRating will be disabled
        $(".rating_box").jRating({
            canRateAgain: true,
            nbRates: 3
        });

        // get the clicked rate !
        $(".rating_box").jRating({
            onClick: function (element, rate) {
                //alert(rate);
            }
        });
    });
</script>
 
<!-- bxSlider Javascript file -->
<script src="<?php echo base_url('src/jquery.bxslider/jquery.bxslider.min.js'); ?>"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo base_url('src/jquery.bxslider/jquery.bxslider.css'); ?>" rel="stylesheet" />


<script type="text/javascript">
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            pagerCustom: '#bx-pager',
            default: 10,
        });
    });

</script>