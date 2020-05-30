<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assests/plugins/images/favicon.png')?>">
    <title>Foodhshala | Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assests/dashbord_folder/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url('assests/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')?>" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url('assests/plugins/bower_components/toast-master/css/jquery.toast.css')?>" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url('assests/plugins/bower_components/morrisjs/morris.css')?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url('assests/plugins/bower_components/chartist-js/dist/chartist.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assests/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('assests/dashbord_folder/css/animate.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assests/dashbord_folder/css/style.css')?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url('assests/dashbord_folder/css/colors/default.css')?>" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon--><img src="<?php echo base_url('assests/plugins/images/admin-logo.png')?>" alt="home"
                                class="dark-logo" />
                            <!--This is light logo icon--><img src="<?php echo base_url('assests/plugins/images/admin-logo-dark.png')?>" alt="home"
                                class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="<?php echo base_url('assests/plugins/images/admin-text.png')?>" alt="home"
                                class="dark-logo" />
                            <!--This is light logo text--><img src="<?php echo base_url('assests/plugins/images/admin-text-dark.png')?>" alt="home"
                                class="light-logo" />
                        </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                     <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                        href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                        </li>
                       
                        <?php 
                        if ($this->session->userdata('contact_no')) {
                           ?>
                           <li>
                            <a class="profile-pic" href="javascript:void(0)"> <b class="hidden-xs"><?php echo $this->session->userdata('name');?></b></a>
                        </li>
                        <li>
                            <a class="profile-pic" href="<?php echo site_url('main/logout')?>"> <b class="hidden-xs btn btn-sm btn-danger waves-effect">Logout</b></a>
                        </li>

                           <?php
                        }
                        ?>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Main Menu</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo site_url('main/dashboard')?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('main/add_items')?>" class="waves-effect"><i class="fa fa-cutlery fa-fw" aria-hidden="true"></i>Add Food items</a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('main/show_all_items')?>" class="waves-effect"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>Show All Items</a>
                    </li>
                    <li>
                       <a href="<?php echo site_url('main/restaurant_orders')?>" class="waves-effect"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>View Orders</a>
                    </li>
                    <li>
                       <a href="<?php echo site_url('main/complete_orders')?>" class="waves-effect"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Complete Orders</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('main/list_of_customers')?>" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i> View Cutomers</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('main/index')?>" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
                    </li>
                    
                </ul>
                <div class="center p-20">
                     <a href="<?php echo site_url('main/logout')?>"  class="btn btn-danger btn-block waves-effect waves-light hide1">Logout</a>
                 </div>
                
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <?php

       // var_dump($result);
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Added Items</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $result['no_of_items'][0]['no_of_items'];?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Orders</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $result['no_of_orders'][0]['no_of_orders'];?></span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">911</span></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <!--/.row -->
                <!--row -->
                
                <!-- /.row -->
               
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; foodshala </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assests/plugins/bower_components/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assests/dashbord_folder/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assests/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('assests/dashbord_folder/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assests/dashbord_folder/js/waves.js')?>"></script>
    <!--Counter js -->
    <script src="<?php echo base_url('assests/plugins/bower_components/waypoints/lib/jquery.waypoints.js')?>"></script>
    <script src="<?php echo base_url('assests/plugins/bower_components/counterup/jquery.counterup.min.js')?>"></script>
    <!-- chartist chart -->
    <script src="<?php echo base_url('assests/plugins/bower_components/chartist-js/dist/chartist.min.js')?>"></script>
    <script src="<?php echo base_url('assests/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')?>"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url('assests/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assests/dashbord_folder/js/custom.min.js')?>"></script>
    <script src="<?php echo base_url('assests/dashbord_folder/js/dashboard1.js')?>"></script>
    <script src="<?php echo base_url('assests/plugins/bower_components/toast-master/js/jquery.toast.js')?>"></script>
</body>

</html>
