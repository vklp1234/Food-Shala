<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assests/plugins/images/favicon.png')?>">
    <title>Foodshala | Orders</title>
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
                            $restaurant_id = $this->session->userdata('registration_no');
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
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Complete Orders List</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Completed Orders</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12">
                        
                            <div class="white-box">
                            <h3 class="box-title">Complete Orders List</h3>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            
                                            <th>Item Name</th>
                                            <th>Item Qut.</th>
                                            <th>Item price</th>
                                            <th>Customer Name</th>
                                            <th>Customer Co.</th>
                                            <th>Order Date</th>
                                            <th>Total Amt.</th>
                                            <th>Status</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="list_of_items">
                                        <?php 
                                       //var_dump($result);
                                        if ($result['status']=='empty') {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No orders ....</td>
                                                </tr>
                                            <?php
                                        }elseif ($result['status']=='success') {
                                            //var_dump('<pre>',$result);
                                           for ($i=0; $i < count($result['orders_list']) ; $i++) { 
                                            ?>
                                            <tr>
                                                <td><?php echo ($i+1);?></td>
                                                <td><?php echo $result['items_list'][$i][0]['item_name'];?></td>
                                                <td><?php echo $result['orders_list'][$i]['qauntity'];?></td>
                                                <td>₹<?php echo $result['items_list'][$i][0]['item_price'];?>/-</td>
                                                 <td><?php echo $result['name'][$i][0]['name'];?></td>
                                                  <td><?php echo $result['orders_list'][$i]['contact_no'];?></td>
                                                   <td><?php echo $result['orders_list'][$i]['order_date_time'];?></td>
                                                  <td><?php echo $result['orders_list'][$i]['subtotal'];?></td>
                                                 <td><a href="JavaScript:void(0)" class="btn btn-sm btn-danger">Completed</a></td>
                                               
                                            </tr>


                                            <?php
                                        }
                                        }
                                        
                                        ?>
                                        
                                    </tbody>
                                </table>
                                <pre class="pull-right">Total ammount:₹<?php echo $result['subtotal'][0]['subtotal'];?>/-</pre>
                            </div>
                            
                        </div>
             
                    </div>
                    
                    
                
                </div>
            </div>
            <!-- /.container-fluid -->
           <footer class="footer text-center"> 2020 &copy; foodshala </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
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
  
    <script src="<?php echo base_url('assests/plugins/bower_components/toast-master/js/jquery.toast.js')?>"></script>
    <script type="text/javascript">
       
    </script>
    <script type="text/javascript">
        $(document).on('click','.completion',function(){
            var item_id = $(this).attr("data-item_id");
            var cont_no = $(this).attr("data-cont_no");
            var resto_id = $(this).attr("data-resto_id");
            $.ajax({
                url:'<?php echo base_url('main/order_completion');?>',
                type:'POST',
                dataType:'JSON',
                data:{item_id:item_id,cont_no:cont_no,resto_id:resto_id},
                success:function(response){
                    console.log(response);
                }
            });
        });
    </script>
</body>

</html>