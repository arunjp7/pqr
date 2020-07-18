<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title><?php echo lang('common_app_name').' - '.lang('login_heading'); ?></title>
 
 <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>  
    <link href="<?php echo base_url(); ?>plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/> 
    <link href="<?php echo base_url(); ?>plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/> 
    <link href="<?php echo base_url(); ?>plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>  
    
    <!-- Theme Styles -->
    <link href="<?php echo base_url(); ?>css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
    
    <script src="<?php echo base_url(); ?>plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

</head>

<body class="page-login">
    <main class="page-content">
        <div class="page-inner login-bg">
            <div id="main-wrapper">
                <div class="login-box panel panel-white">
                  <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12 center">
                                <a href="<?php echo base_url(); ?>" class="logo-name text-lg text-center">
                                    <?php
                                    if(file_exists($CI->comp_pre->c_logo))
                                    {
                                        ?>
                                            <img src="<?php echo base_url($CI->comp_pre->c_logo);?>" title="<?php echo $CI->comp_pre->c_org_name;?>" width="120">
                                        <?php
                                    }else
                                    {
                                        ?>
                                            <img src="<?php echo base_url('images/gallery/favicon-with-square.png');?>" title="" width="120">
                                        <?php
                                    }
                                    ?>
                                </a>
                                <h3 class="text-lg text-center">PQR MANAGEMENT</h3>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <?php echo (isset($content))? $content  : ''; ?>
                                <p class="text-center m-t-xs text-sm">2020 &copy; <a href="http://agmtechnical.com/" target="_blank">AGM Technical</a></p>
                        </div>
                    </div><!-- Row -->
                  </div>
                </div>
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main><!-- Page Content -->
  
  <!-- Javascripts -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/pace-master/pace.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/jquery-blockui/jquery.blockui.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/switchery/switchery.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/offcanvasmenueffects/js/classie.js"></script>
  <script src="<?php echo base_url(); ?>plugins/waves/waves.min.js"></script>
  <script src="<?php echo base_url(); ?>js/modern.min.js"></script>
</body>

</html>