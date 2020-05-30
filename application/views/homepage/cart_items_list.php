<?php

//var_dump( $result);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta content="origin" name="referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Foodshala | cart </title>
	<link rel="shortcut icon" type="text/css" href="<?php echo base_url('assests/favicon/favicon.png');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assests/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assests/css/style.css');?>">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Cookie|Black+Ops+One|Titillium+Web&display=swap' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="<?php echo base_url('assests/js/popper.min.js');?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background: #e4e4e4;" >
<header class="header-fixed">

	<div class="header-limiter">

		<h1><a href="#">Food<span>Shala</span></a></h1>

		<nav>
			<a href="<?php echo site_url('main/index')?>"><i class="fa fa-home"></i> Home</a>
			
			
            <?php 
            $session_valid=0;
            $role = 0;
            if($this->session->userdata('contact_no')!='') {
                 $session_valid=$this->session->userdata('contact_no');
                 $role = $this->session->userdata('role');
                 /*echo $role;*/
                ?>
                    
                     <a href="<?php echo site_url('main/dashboard')?>"  ><i class="fa fa-dashboard"></i> Dashboard</a>
                     <label>Welcome: <?php echo $this->session->userdata('name');?></label>
                     <a href="<?php echo site_url('main/logout')?>" class="btn btn-md btn-warning waves-effect waves-light" >Logout</a>
                <?php
            }else{
                ?>
                <a href="javascript:void(0)" class="btn btn-md btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal1">Log in</a>
            
                <a href="javascript:void(0)" class="btn btn-md btn-danger"  data-toggle="modal" data-target="#myModal">Create an account</a>
                <?php 
            }

            ?>
			
		</nav>

	</div>

</header>
<div class="header-fixed-placeholder"></div>
<div class="container-fluid" style="background: indianred;color: #ffff;">
	<div class="col-md-12 col-sm-12">
	<div class="bordered pull-right">
		<label><a href="<?php echo base_url('main/cart_items_list')?>" style="color: orange;"><i class="fa fa-shopping-cart"></i> Your Orders</a></label>
	</div>
</div>
</div>
<section class="mb-10">
    

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <h2 >Check Out</h2>
             <hr>
        </div>
        
       
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="panel">
              <div class="panel-body">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sno.</th>
                          <th>Item Image</th>
                          <th>Item Name</th>
                          <th>Item Price</th>
                          <th>Quantity</th>
                          <th>Restaurant Name</th>
                          <th>Edit</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                        // var_dump('<pre>',$result);
                          $subtotal=0;
                          if ($result['status']=='empty') {
                             ?>
                                <tr>
                                    <td colspan="5">No items in your cart...</td>
                                </tr>
                             <?php
                          }elseif ($result['status']=='success') 
                          {
                            $j=0;
                             for($i=0;$i<count($result['cart_items']);$i++)
                              {
                                $registration_no= $result['cart_items'][$i]['registration_no'];
                                $item_id=$result['cart_items'][$i]['item_id'];
                                $contact_no=$result['cart_items'][$i]['contact_no'];
                                $newprice= $result['items_list'][$i][0]['item_price'];
                                $subtotal_qnt= $result['cart_items'][$i]['subtotal'];
                                   ?>
                                    <tr>
                                        <td><?php echo ($i+1);?></td>
                                        <td>
                                            <?php
                                            for($j=0;$j<count($result['image'][$i]);$j++)
                                            {
                                                $filename = $result['image'][$i][$j]['item_images'];
                                                    ?>
                                                         <img  src="<?php echo base_url('uploads/').$filename;?>" class="img-thumbnail" style="width: 75px;height: 75px;" >
                                                    <?php
                                            }

                                            ?>

                                        </td>
                                        <td><?php echo $result['items_list'][$i][0]['item_name'];?></td>
                                        <td id="price<?php echo $i;?>">₹<?php echo $subtotal_qnt;?>/-</td>
                                        <td><input type="number" min="1" name="update_quantity" class="form-control" style="width: 60px" value="<?php echo $result['cart_items'][$i]['qauntity'];?>" onchange="change_quantity(this.value,'<?php echo $registration_no; ?>','<?php echo $item_id;?>','<?php echo $contact_no;?>','#price<?php echo $i;?>','<?php echo $newprice;?>')"></td>
                                        <td><?php echo $result['restaurant_name'][$i][0]['restaurant_name'];?></td>
                                        <td><button class="btn btn-danger btn-sm remove_item" data-contact_no="<?php echo $contact_no;?>" data-item_id="<?php echo  $item_id;?>">Remove</button></td>
                                    </tr>

                                   <?php
                                   $subtotal+=$subtotal_qnt;
                              }
                          }
                         

                          ?>
                      </tbody>
                  </table>
              </div>
              <div class="panel-footer">
                  <button class="btn btn-warning btn-sm waves-effect waves-light">
                      Proceed to Payment <i class="fa fa-long-arrow-right"></i>
                  </button>
                  <div class="meta pull-right" id="stq">SubTotal= ₹<?php echo $subtotal; ?>/-</div>
              </div>
          </div>
          
                
        </div>
       
    </div>
</div>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title title-font" id="myModalLabel">
                    We Want Some Information About You. You Should Register here!
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab"><i class="fa fa-cutlery"></i> Restaurant</a></li>
                            <li><a href="#Registration" data-toggle="tab"><i class="fa fa-user"></i> Customer</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <div class="alert alert-warning hide reswarn">
                                    <i class="fa fa-warning"></i>Already Exits!
                                </div>
                                <div class="alert alert-success hide ressuccess">
                                    <i class="fa fa-check"></i>Restaurant Registration Successfully Completed!
                                </div>
                                <div class="alert alert-danger hide resdanger">
                                    <i class="fa fa-danger"></i> Something Went Wrong Registration Not Done!
                                </div>
                                <form role="form" method="post" action="<?php echo site_url('main/restaurant_register')?>"  class="form-horizontal" enctype="multipart/form-data" onsubmit="return form_validation()">
                                    <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">
                                        Owner Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="owenername" id="owenername" placeholder="Enter Your Name" />
                                        <div id="owenername_error" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Restaurant name" class="col-sm-2 control-label">
                                        Enter Restaurant Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="restaurantname" id="restaurantname" placeholder="Enter Restaurant Name" />
                                        <div id="restaurantname_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Registration no" class="col-sm-2 control-label">
                                        Restaurant Registration No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="restaurantno" id="restaurantno" placeholder="Enter Registration No" />
                                        <div id="restaurantno_error" style="color: red;"></div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="rest_email" id="rest_email" placeholder="Enter Email" /><div id="rest_email_error" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact" class="col-sm-2 control-label">
                                        Contact No</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" maxlength="10" name="contantno" id="contantno" placeholder="Enter Contact No" /><div id="contantno_error" style="color: red;"></div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="city" class="col-sm-2 control-label">
                                        city</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" /><div id="city_error" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Alternate" class="col-sm-2 control-label">
                                        Alternate No(<small style="color: red;">optional</small>)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" maxlength="10" name="Alternatecontantno" id="Alternatecontantno" placeholder="Enter Alternate Contact No" />
                                        <div id="Alternatecontantno_error" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="restaurant images" class="col-sm-2 control-label">
                                        Restaurant Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="res_file" accept="image/*" id="res_file" />
                                        <div id="res_file_error" style="color: red;"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Alternate" class="col-sm-2 control-label">
                                        Restaurant Type</label>
                                    <div class="col-sm-10">
                                        <input type="radio" class="custom-control-input" name="Rest_type"  value="veg" /> veg
                                        <input type="radio" class="custom-control-input" name="Rest_type"  value="nonveg" />non-veg
                                        <input type="radio" class="custom-control-input" name="Rest_type" value="both" />both
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                        <div id="password_error" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirm password" class="col-sm-2 control-label">
                                       Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" />
                                         <div id="confirmpassword_error" style="color: red;"></div>
                                         <div id="sameconfirmpassword_error" style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <!-- <button type="button" class="btn btn-primary btn-sm register">
                                            Submit</button> -->
                                            <input type="submit"  class="btn btn-primary btn-sm register" name="submit" value="SUBMIT">
                                       
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <div class="alert alert-warning hide reswarn1">
                                    <i class="fa fa-warning"></i>Already Exits!
                                </div>
                                <div class="alert alert-success hide ressuccess1">
                                    <i class="fa fa-check"></i>Account Created!
                                </div>
                                <div class="alert alert-danger hide resdanger1">
                                    <i class="fa fa-danger"></i> Something Wrong Try Again!
                                </div>
                                <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('main/customer_account');?>"  class="form-horizontal" onsubmit="return frm_validation()" >
                                <div class="form-group">
                                    <label for="full Name" class="col-sm-2 control-label">
                                        Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="cutomer_name" id="cutomer_name" placeholder="Full Name" />
                                        <div id="cutomer_name_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="cutomer_email" id="cutomer_email" placeholder="Email" />
                                        <div id="cutomer_email_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="cutomer_mobile" id="cutomer_mobile" placeholder="Mobile" />
                                        <div id="cutomer_mobile_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-2 control-label">
                                        Detailed Address.</label>
                                    <div class="col-sm-10">
                                       <textarea class="form-control" name="customer_address" id="customer_address" style="max-width: 100%;" placeholder="enter your detailed address"></textarea>
                                        <div id="customer_address_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">
                                        Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="cus_image" id="cus_image" placeholder="Mobile" />
                                        <div id="image_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="cutomer_password" id="cutomer_password" placeholder="Password" />
                                        <div id="cutomer_password_error"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="cutomer_conf_password" id="cutomer_conf_password" placeholder="Confirm Password" />
                                        <div id="cutomer_conf_password_error"  style="color: red;"></div>
                                        <div id="cutomer_conf_password_error1"  style="color: red;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="submit" name="submit1" class="btn btn-primary btn-sm" value="Save">
                                        
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">
                                        Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title back-show">Log in To Food<span style="color: #5383d3;">shala</span></h4>
          
        </div>
         <form method="post" action="<?php echo site_url('main/login')?>" onsubmit="return validation_fnc()" >
        <div class="modal-body">
           
             <div class="form-group">
                  <input type="text" name="username" class="form-control" id="username" placeholder="Mobile/Registration no/Email">
                  <div id="username_error"  style="color: red;"></div>
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" name="log_password" id="log_password" placeholder="password">
                  <div id="log_password_error"  style="color: red;"></div>
              </div>
              
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-info btn-md waves-effect waves-light login" name="submit" value="submit" />
          <button type="button" class="btn btn-md    btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
    
</div>
<!-- end here login register -->
<!-- footer start -->
<footer>
    
</footer>
<!-- footer end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function change_quantity(qnt,regis,item_id,contact,id,new_price) {
        //console.log(qnt,regis,item_id,contact,id);
         
        $.ajax({
            url:'<?php echo base_url('main/update_quntity')?>',
            type:'POST',
            dataType:'JSON',
            data:{qnt:qnt,regis:regis,item_id:item_id,contact:contact,new_price:new_price},
            success:function(response)
           {
            console.log(response);
            html='';
            html1='';
            if (response.new_price!='') {
                html='₹'+response.new_price+'/-';
            }
            if (response.subtotal[0]['subtotal']!='') 
            {
                html1='SubTotal= ₹'+response.subtotal[0]['subtotal']+'/-';
            }
            $(id).html(html);
            $("#stq").html(html1);
            }
        });
    }
    function form_validation(){
    var error_count=0;
    var owenername = $("#owenername").val();
    var restaurantname = $("#restaurantname").val();
    var restaurantno = $("#restaurantno").val();
    var contantno = $("#contantno").val();
        var res_file = $("#res_file").val();
         var rest_email = $("#rest_email").val();
         var detailed_address = $("#detailed_address").val();
         var city = $("#city").val();
    
    
    var password = $("#password").val();
    var confirmpassword = $("#confirmpassword").val();
    var passconf=0;
    if (city=='') 
        {
            error_count++;
            $("#city_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (detailed_address=='') 
        {
            error_count++;
            $("#customer_address_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
    if (owenername=='') 
    {
      error_count++;
      $("#owenername_error").html("<i class='fa fa-warning'></i> Field Required!");
    }
        if (rest_email=='') 
        {
            error_count++;
            $("#rest_email_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
    if (restaurantname=='') 
    {
      error_count++;
      $("#restaurantname_error").html("<i class='fa fa-warning'></i> Field Required!");
    }
    if (restaurantno=='') 
    {
      error_count++;
      $("#restaurantno_error").html("<i class='fa fa-warning'></i> Field Required!");
    }
    if (contantno=='') 
    {
      error_count++;
      $("#contantno_error").html("<i class='fa fa-warning'></i> Field Required!");
    }
    
    if (password=='') 
    {
      error_count++;
      $("#password_error").html("<i class='fa fa-warning'></i> Field Required!");
    }
        if (res_file==null) 
        {
            error_count++;
            $("#res_file_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
    if (confirmpassword=='') 
    {
      error_count++;
      $("#confirmpassword_error").html("<i class='fa fa-warning'></i> Field Required!");
    }
    
    if (password!=confirmpassword) 
    {
      error_count++;
      $("#sameconfirmpassword_error").html("<i class='fa fa-warning'></i>Password and Confirm Password Does Not Match!");
    }
    if (error_count==0) 
    {
            return true;
    }else{
            return false;
        }
    
    
    
    
  }
    function frm_validation(){
        var cutomer_name  = $("#cutomer_name").val();
        var cutomer_email = $("#cutomer_email").val();
        var cutomer_mobile = $("#cutomer_mobile").val();
        var cutomer_password  = $("#cutomer_password").val();
        var cutomer_conf_password = $("#cutomer_conf_password").val();
         var customer_address = $("#customer_address").val();
        var cus_image = $("#cus_image").val();
        var error_counter =0 ;
        if (cutomer_name == '') 
        {
            error_counter++;
            $("#cutomer_name_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (customer_address == '') 
        {
            error_counter++;
            $("#customer_address_e").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (cutomer_email == '') 
        {
            error_counter++;
            $("#cutomer_email_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (cutomer_mobile == '') 
        {
            error_counter++;
            $("#cutomer_mobile_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (cutomer_password == '') 
        {
            error_counter++;
            $("#cutomer_password_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (cus_image == null) 
        {
            error_counter++;
            $("#image_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        
        if (cutomer_conf_password == '') 
        {
            error_counter++;
            $("#cutomer_conf_password_error").html("<i class='fa fa-warning'></i> Field Required!");
        }
        if (cutomer_conf_password != cutomer_password) 
        {
            error_counter++;
            $("#cutomer_conf_password_error1").html("<i class='fa fa-warning'></i> Both are not equal!");
        }
        if (error_counter==0) 
        {
           return true;

        }else{
            return false;
        }
    }
    $(document).on('click','.remove_item',function(){
      var r = confirm("Are You Sure You want to Remove It...");
      if (r == true) {
             var item_id = $(this).attr("data-item_id");
              var contact_no=$(this).attr("data-contact_no");
              $.ajax({
                url:'<?php echo base_url('main/remove_item')?>',
                type:'POST',
                dataType:'JSON',
                data:{item_id:item_id,contact_no:contact_no},
                success:function(response)
                {
                  //console.log(response);
                  if (response==true) 
                  {
                    alert("food item removed from cart")
                    setTimeout(function(){window.location="<?php echo base_url('main/cart_items_list')?>"},1000);
                  }
                }
              });

      } 
     
    });
</script>

</body>
</html>