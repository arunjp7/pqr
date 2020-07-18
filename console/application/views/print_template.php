<!DOCTYPE html>
<html>
<!-- index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Feb 2016 09:23:22 GMT -->
<head>
    <!-- Title -->
    <title></title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Wholesale management system, warehouse management, inventory management, account, billing, pettycash, purchase order" />
    <meta name="keywords" content="Wholesale management system, warehouse management, inventory management, account, billing, pettycash, purchase order" />
    <meta name="author" content="ozzotechies" />
    <link rel="short icon" type="image/png" href="<?php echo base_url(); ?>images/gallery/favicon.png">
    
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
    <link href="<?php echo base_url(); ?>plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>    
    <link href="<?php echo base_url(); ?>plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>  
    <link href="<?php echo base_url(); ?>plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/> 
    <link href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>   
    <link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="<?php echo base_url(); ?>css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
     <link href="<?php echo base_url(); ?>css/overwrite.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/> 
    <link href="<?php echo base_url(); ?>plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/> 
    <link href="<?php echo base_url(); ?>plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>

    <script src="<?php echo base_url(); ?>plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/datatables/js/jquery.datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
    
    <script src="<?php echo base_url(); ?>chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>chartjs/utils.js"></script>

    <!--
    <script src="<?php echo base_url(); ?>css/summernote/dist/summernote-lite.css"></script>
    <script src="<?php echo base_url(); ?>css/summernote/dist/summernote-lite.js"></script>
    -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body class="page-header-fixed page-horizontal-bar">
    <div class="overlay"></div>
    
    <form class="search-form" action="#" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control search-input" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
            </span>
        </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <a href="<?php echo base_url(); ?>" class="logo-text"><span><img src="<?php echo base_url('images/gallery/logo-white.png');?>" width="48" title="Wholesale management system"> WMS</span></a>
                </div><!-- Logo Box -->
                <!--<div class="search-button">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                </div>-->
                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-left">
                            <li>        
                                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                            </li>                      
                        </ul>
                       <!-- Top Navigation -->
                        <?php include('header.php');?>
                    </div><!-- Top Menu -->
                </div>
            </div>
        </div><!-- Navbar -->
        <div class="horizontal-bar sidebar ">
            <div class="page-sidebar-inner slimscroll">
        </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->
            <?php echo (isset($content))?$content:''; ?>
            <!-- footer div starts -->
            <div class="page-footer">
                <p class="no-s" style="text-align: right;">
                    Powered By <a href="http://agmtechnical.com/" target="_blank">AGM Technical</a>
                </p>
            </div>
            <!-- footer div ends -->
</main><!-- Page Content -->
    <nav class="cd-nav-container" id="cd-nav">
        <header>
            <h3>Navigation</h3>
            <a href="#0" class="cd-close-nav">Close</a>
        </header>
        <ul class="cd-nav list-unstyled">
            <li class="cd-selected" data-menu="index">
                <a href="javsacript:void(0);">
                    <span>
                        <i class="glyphicon glyphicon-home"></i>
                    </span>
                    <p>Dashboard</p>
                </a>
            </li>
            <li data-menu="profile">
                <a href="javsacript:void(0);">
                    <span>
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    <p>Profile</p>
                </a>
            </li>
            <li data-menu="inbox">
                <a href="javsacript:void(0);">
                    <span>
                        <i class="glyphicon glyphicon-envelope"></i>
                    </span>
                    <p>Mailbox</p>
                </a>
            </li>
            <li data-menu="#">
                <a href="javsacript:void(0);">
                    <span>
                        <i class="glyphicon glyphicon-tasks"></i>
                    </span>
                    <p>Tasks</p>
                </a>
            </li>
            <li data-menu="#">
                <a href="javsacript:void(0);">
                    <span>
                        <i class="glyphicon glyphicon-cog"></i>
                    </span>
                    <p>Settings</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="javsacript:void(0);">
                    <span>
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                    <p>Calendar</p>
                </a>
            </li>
        </ul>
    </nav>
    <div class="cd-overlay"></div>


    <!-- Javascripts -->

    <script src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/pace-master/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/switchery/switchery.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/offcanvasmenueffects/js/classie.js"></script>
    <!--<script src="<?php echo base_url(); ?>plugins/offcanvasmenueffects/js/main.js"></script>-->
    <script src="<?php echo base_url(); ?>plugins/waves/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/3d-bold-navigation/js/main.js"></script>
    <script src="<?php echo base_url(); ?>plugins/summernote-master/summernote.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <!--
    <script src="<?php echo base_url(); ?>js/modern.min.js"></script>
    -->
    <script src="<?php echo base_url(); ?>js/pages/form-elements.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
    <script src="<?php echo base_url(); ?>plugins/moment/moment.js"></script>
    <script src="<?php echo base_url(); ?>plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>js/modern.min.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/table-data.js"></script>
    <script src="<?php echo base_url(); ?>plugins/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/form-select2.js"></script>

    <script type="text/javascript">
        function conformboxdelete(l)
        {
            if(arguments[0] != null)
            {
              if(window.confirm('Are you sure you want to delete???'))
              {
                location.href = l;
              }
              else
              {
                event.cancelBubble = true;
                event.returnValue = false;
                return false;
              }
            }
            else
            {
              return false;
            }
            return;
        }
    </script>   
</body>
<!-- index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Feb 2016 09:23:25 GMT -->
</html>
