<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assests/plugins/images/favicon.png')?>">
    <title>Foodshala | Add Food Items</title>
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
                        <h4 class="page-title">Add New Item</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Item Add form</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <div class="form-group">
                                    <?php 
                                    /*var_dump($result['result']);*/
                                    if ($result=='success') {
                                        ?>
                                        <div class="alert alert-success" id="success"><i class="fa fa-check"></i> Item added Successfully!</div>
                                        <script type="text/javascript">
                                            setTimeout(function(){$("#success").addClass('hide')},1000);
                                        </script>

                                        <?php
                                    }

                                    ?>
                                    <?php 
                                    /*var_dump($result['result']);*/
                                    if ($result=='already') {
                                        ?>
                                        <div class="alert alert-warning" id="already"><i class="fa fa-warning"></i>this  Item already added!</div>
                                        <script type="text/javascript">
                                            setTimeout(function(){$("#already").addClass('hide')},1000);
                                        </script>

                                        <?php
                                    }

                                    ?>
                                    <?php 
                                    /*var_dump($result['result']);*/
                                    if ($result=='fail') {
                                        ?>
                                        <div class="alert alert-danger" id="fail"><i class="fa fa-warning"></i> Check And Try Again Something wrong!</div>
                                        <script type="text/javascript">
                                            setTimeout(function(){$("#fail").addClass('hide')},1000);
                                        </script>

                                        <?php
                                    }

                                    ?>
                                        
                                     
                                </div>
                            <form action="<?php echo site_url('main/add_food_item')?>" method="POST" enctype="multipart/form-data" onsubmit="return validation()" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Item Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Item Name "
                                            class="form-control form-control-line" name="item_name" id="item_name"/>
                                            <div style="color: red;" id="item_name_error"></div>
                                             </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Item Id</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Item Id ex. a2020 "
                                            class="form-control form-control-line" name="item_known_id" id="item_known_id"/>
                                            <div style="color: red;" id="item_known_id_error"></div>
                                             </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-md-12">Item Price</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="Item price"
                                            class="form-control form-control-line" maxlength="10" name="item_price"
                                            id="item_price"/>
                                             <div style="color: red;" id="item_price_error"></div>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="col-md-12">Item Type</label>
                                    <div class="col-md-12">
                                        <input type="radio" name="item_type" value="veg" />veg <br/>
                                        <input type="radio" name="item_type" value="nonveg" />nonveg <br/>  
                                        <input type="radio" name="item_type" value="both" />both
                                            
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label for="Quantity" class="col-md-12">Item Quantity</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="Item Quantity"
                                            class="form-control form-control-line" maxlength="10" name="item_quantity"
                                            id="item_quantity"/>
                                             <div style="color: red;" id="item_Quantity_error"></div> </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-md-12">Item Description</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control form-control-line" name="item_description" id="item_description" placeholder="Write some specified description"></textarea>
                                        <div style="color: red;" id="item_desc_error"></div>
                                        
                                </div>
                            </div>
                            <input type="hidden" name="registration_no" id="registration_no" value="<?php echo $this->session->userdata('registration_no')?>">

                                <div class="form-group">
                                    <label for="image" class="col-md-12">Item Image</label>
                                   <div id="imgdynamic">
                                       <div class="col-md-12 mb-5">
                                        
                                        <input type="file" name="image[]" accept="image/*" class="form-control form-control-line">
                                </div>
                                
                                   </div>
                                  
                                   <div class="col-md-12 mb-5">
                                       <button type="button" id="Addimages" class="btn btn-sm btn-info">
                                    +images
                                </button>
                                   </div>
                                
                            </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" name="submit" id="submit" class="btn btn-sm btn-success" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Items List Table</h3>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Item Name</th>
                                            <th>Item Price</th>
                                            <th>Item Quantity</th>
                                            <th>Edit</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="list_of_items">
                                        <!-- <tr>
                                            <td>1</td>
                                            <td>Deshmukh</td>
                                            <td>Prohaska</td>
                                            <td>@Genelia</td>
                                            
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
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
        $(document).ready(function(){
            $(".saveitem").attr("disabled", true);
            get_all_items_list();
        });
        $(document).on('click','button#Addimages',function(){
            html='';
            html+='<div class="fields"> <div class="col-md-11 col-xs-10 mb-5">'+
                                        
                                        '<input type="file" name="image[]" accept="image/*" class="form-control form-control-line">'+
                                '</div><div class="col-md-1 col-xs-2"><button type="button" class="btn btn-xs btn-warning pull-right rmv_btn"> X</button></div>'+
                               '</div>';
            $("#imgdynamic").append(html);
        });
        function validation(){
            var item_name = $("#item_name").val();
            var item_known_id = $("#item_known_id").val();
            var item_price = $("#item_price").val();
            var item_quantity = $("#item_quantity").val();
            var item_description = $("#item_description").val();
            var error_count=0;
            if (item_name == '') 
            {
                error_count++;
                $("#item_name_error").html('<i class="fa fa-warning"></i> field required');
            }
            if (item_known_id == '') 
            {
                error_count++;
                $("#item_known_id_error").html('<i class="fa fa-warning"></i> field required');
            }
            if (item_price == '') 
            {
                error_count++;
                $("#item_price_error").html('<i class="fa fa-warning"></i> field required');
            }
            if (item_quantity == '') 
            {
                error_count++;
                $("#item_Quantity_error").html('<i class="fa fa-warning"></i> field required');
            }
            if (item_description == '') 
            {
                error_count++;
                $("#item_desc_error").html('<i class="fa fa-warning"></i> field required');
            }
            if (error_count == 0) 
            {
                return true;
            }else{
                return false;
            }
        }
        $(document).on('click','.rmv_btn',function(){
            $(this).closest('.fields').remove();
        });
        function get_all_items_list()
        {
            var get_all_items='get_all_items';
            $.ajax({
                url:'<?php echo site_url('main/get_all_items_list')?>',
                type:'POST',
                dataType:'JSON',
                data:{get_all_items:get_all_items},
                success:function(response){
                   console.log(response);
                   html = '';
                   for (var i = 0; i < response.items.length; i++) {
                       html+='<tr>'+
                                            '<td>'+(i+1)+'</td>'+
                                            '<td>'+response.items[i]['item_name']+'</td>'+
                                            '<td class="edit_price"> '+response.items[i]['item_price']+'</td>'+
                                            '<td class="edit_quantity"> '+response.items[i]['item_quantity']+'</td>'+
                                            '<td> <button class="btn btn-info btn-xs edititem" data-item_id="'+response.items[i]['item_id']+'" data-registration_no="'+response.items[i]['registration_no']+'">edit</button> <button class="btn btn-primary btn-xs saveitem" data-item_id="'+response.items[i]['item_id']+'" data-registration_no="'+response.items[i]['registration_no']+'"> save</button></td>'+
                                            '<td>  <button class="btn btn-danger btn-xs deleteitem" data-item_id1="'+response.items[i]['item_id']+'" data-registration_no1="'+response.items[i]['registration_no']+'"> X</button></td>'+
                                            
                                        '</tr>';
                   }
                   $("#list_of_items").html(html);
                }
            }); 
        }
         $(document).on('click','.edititem',function() {
            $(".edititem").attr("disabled", true);
            $(".saveitem").removeAttr("disabled");
            
          $(this).parents('tr').find('td.edit_price').each(function() {
            var html = $(this).html();
            var input = $('<input class="form-control data_price" style="width:50px" type="text"   />');
            input.val(html);
            $(this).html(input);
          });
          $(this).parents('tr').find('td.edit_quantity').each(function() {
            var html = $(this).html();
            var input = $('<input class="form-control data_quantity" style="width:50px" type="text"  />');
            input.val(html);
            $(this).html(input);
          });
        });
         $(document).on('click','.saveitem',function(){


            var item_id = $(this).attr("data-item_id");
            var registration_no = $(this).attr("data-registration_no");
            var data_price_cnt = [];
            var data_quantity_cnt = [];
            $('.data_price').each(function(){
                /*var vl = $(this).html();*/
                data_price_cnt.push($(this).val());
            });
            $('.data_quantity').each(function(){
                /*var vl = $(this).html();*/
                data_quantity_cnt.push($(this).val());
            });
            $.ajax({
                url:'<?php echo site_url('main/item_update')?>',
                method:'POST',
                dataType:'JSON',
                data:{item_id:item_id,registration_no:registration_no,data_price_cnt:data_price_cnt,data_quantity_cnt:data_quantity_cnt},
                success:function(response){
                    console.log(response);
                   if (response.status=='success') {
                    setTimeout(function(){  window.location = '<?php echo site_url('main/add_items')?>'; },500);
                   }else if (response.status=='fail') {
                    alert('Having some error try again!');
                   }
                }
            });

        });
         $(document).on('click','.deleteitem',function(){
            var item_id1 = $(this).attr("data-item_id1");
            var registration_no1 = $(this).attr("data-registration_no1");
            $.ajax({
                url:'<?php echo site_url('main/deleteitems')?>',
                type:'POST',
                dataType:'JSON',
                data:{item_id1:item_id1,registration_no1:registration_no1},
                success:function(response){
                    console.log(response);
                    if (response == true) {
                    setTimeout(function(){  window.location = '<?php echo site_url('main/add_items')?>'; },500);
                   }else if (response==false) {
                    alert('Having some error try again!');
                   }
                }
            });
         });
    </script>
</body>

</html>