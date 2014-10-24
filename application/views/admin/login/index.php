<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login Admin</title>
        <link rel="stylesheet" href="<?php echo base_url('src/admin_login/css/style.css');?>">
        <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>

        <?php echo form_open_multipart('admincp/login', array("class" => "login")); ?>
        <p>
            <label for="login">Email:</label> 
             <input type="text" name="uname" id="login"/>
        </p>

        <p>
            <label for="password">Password:</label> 
             <input type="password" name="pass1" id="password" />
        </p>

        <p class="login-submit">
            <button type="submit" class="login-button" name="submit">Login</button> 
        </p>

<!--    <p class="forgot-password"><a href="#">Forgot your password?</a></p>-->
        <?php echo form_close(); ?>


    </body>
</html>
