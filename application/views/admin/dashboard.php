<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Admin Panel</title>

        <link rel="stylesheet" href="<?php echo base_url('src/admin_main/css'); ?>/layout.css" type="text/css" media="screen" />
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php echo base_url('src/admin_main/css'); ?>/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php $this->load->view('admin/widget/js'); ?>

    </head>

    <body>

        <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="#">Admin Panel</a></h1> 
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <?php $this->load->view('admin/widget/breadcrumb'); ?>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <?php $this->load->view('admin/widget/sidebar'); ?>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            
            <?php if ($this->router->class == 'admincp'): ?>
                <?php if ($this->router->fetch_method() == 'index'): ?>
                    <?php $this->load->view('admin/home/index'); ?>
                <?php endif; ?>
            <?php endif; ?>


        </section>


    </body>

</html>