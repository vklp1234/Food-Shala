<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_data_model extends CI_Model {

    function __construct() {
        parent::__construct();
        

    }

    /*
     * 
     */
    public function restaurant_register($detailed_address,$ownername,$restaurantname, $restaurantno, $contantno ,$Alternatecontantno,$Rest_type,$password,$filename,$rest_email,$city){

        
      
        $sql = "SELECT * from tbl_register_info where (registration_no='$restaurantno' or contact_no='$contantno' or alternate_no='$Alternatecontantno' or email='$rest_email')";
        $query = $this->db->query($sql);
       if ($query->num_rows()>0) {
          $data='already';
       }else{
            $sql = "INSERT into tbl_register_info(detailed_address,registration_no_id,name,contact_no,alternate_no,restaurant_name,restaurant_type,image,password,email,role,status,restaurant_location) values('$detailed_address','$restaurantno','$ownername','$contantno','$Alternatecontantno','$restaurantname','$Rest_type','$filename','$password','$rest_email','restaurant','active','$city')";
            $query = $this->db->query($sql);
            if ($query==true) {
                $data='success';
            }else{
                $data='fail';
            }
       }

       return $data;
    }
    public function retriver_all_restaurant()
    {
      $sql = "SELECT restaurant_name,detailed_address,restaurant_type,image,restaurant_location,registration_no,contact_no from tbl_register_info where role='restaurant' and status='active'";
      $query = $this->db->query($sql);
      $data['result'] = $query->result();
      return $data;
    }
    public function login($username,$log_password){
      
      $sql = "SELECT registration_no,restaurant_name,name,contact_no,user_id,email,role from tbl_register_info where (registration_no_id='$username' or registration_no='$username' or contact_no='$username' or email='$username') and password='$log_password' and status='active'" ;
      
      $query = $this->db->query($sql);
      if ($query->num_rows()>0) {
        return $query->result_array();
      }
     else{
      return false;
     }

     
    }   
    public function customer_account($name,$email,$cutomer_mobile,$cutomer_password,$filename,$customer_address)

    {
      $user_id = uniqid();
        $sql = "SELECT * from tbl_register_info where (contact_no='$cutomer_mobile' or alternate_no='$cutomer_mobile' or email='$email')";
        $query = $this->db->query($sql);
       if ($query->num_rows()>0) {
          $data='already';
       }else{
            $sql = "INSERT into tbl_register_info(name,contact_no,image,password,email,detailed_address,role,status,user_id) values('$name','$cutomer_mobile','$filename','$cutomer_password','$email','$customer_address','customer','active','$user_id')";
            $query = $this->db->query($sql);
            if ($query==true) {
                $data='success';
            }else{
                $data='fail';
            }
       }

       return $data;
    }
    public function add_food_item($item_name,$item_known_id,$item_price,$item_quantity,$item_description,$registration_no,$file2,$item_type)
    {
//var_dump($item_name,$item_price,$item_quantity,$item_description,$registration_no,$file);
      $count_files = count($file2['image']['name']);
      $validate  = "SELECT * from tbl_items where item_known_id='$item_known_id'";
      $query = $this->db->query($validate);
      if ($query->num_rows()>0) {
        $data['result']='already';
      }else{
            $item_id = uniqid();
          $sql = "INSERT into tbl_items(item_id,item_known_id,item_name,item_type,item_description,item_price,item_quantity,registration_no) values('$item_id','$item_known_id','$item_name','$item_type','$item_description','$item_price','$item_quantity','$registration_no')";
          $query = $this->db->query($sql);
          if ($query == true) {
            for ($i=0; $i <$count_files ; $i++) { 
              $filename = $file2['image']['name'][$i];
                $sql1 = "INSERT into  tbl_items_images(item_id,registration_no,item_images) values('$item_id','$registration_no','$filename')";
                $query1 = $this->db->query($sql1); 
            }
            $data['result'] = 'success';
          }else{
            $data['result'] = 'fail';
          }
      }
      
      return $data;
    }
    public function get_all_items_list($registration_no)
    {
      
      $sql = "SELECT item_id,item_known_id,item_name,item_quantity,item_price,registration_no from tbl_items where registration_no = '$registration_no'";
      $query = $this->db->query($sql);
      $data['items'] = $query->result_array();
      return $data;
    }
    public function item_update()
    {
        $item_id = $this->input->post('item_id');
        $registration_no = $this->input->post('registration_no');
        $data_price_cnt = $this->input->post('data_price_cnt');
        $data_quantity_cnt = $this->input->post('data_quantity_cnt');
        $counter = count($data_price_cnt);
        for ($i=0; $i < $counter ; $i++) { 
          $data_price = $data_price_cnt[$i];
          $data_quantity = $data_quantity_cnt[$i];
          $sql = "UPDATE tbl_items set item_price='$data_price' , item_quantity='$data_quantity' where item_id='$item_id' and registration_no='$registration_no'";
          $query = $this->db->query($sql);
          if ($query == true) {
            $data['status']='success';
          }else{
            $data['status']='fail';
          }

        }
        return $data;
    }
    public function deleteitems()
    {
      $item_id1 = $this->input->post('item_id1');
      $registration_no1 = $this->input->post('registration_no1');
      $sql = "DELETE from tbl_items_images where item_id='$item_id1' and registration_no='$registration_no1' ";
    
      $query = $this->db->query($sql);
       //$affected = $this->db->affected_rows();
      if ($query==true) {
        $sql = "DELETE from tbl_items where item_id='$item_id1' and registration_no='$registration_no1'";
       
        $query=$this->db->query($sql);
       //var_dump($query);
        //$affected1 = $this->db->affected_rows();
        if ( $query==true) {
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
      
    }
    public function show_all_items($registration_no)
    {
      $sql ="SELECT item_id,item_known_id,item_name,item_description,item_price,item_quantity from tbl_items where registration_no='$registration_no'";
      $query = $this->db->query($sql);
      $data['items'] = $query->result_array();
     // var_dump("<pre>",$data['items']);
      if (empty($data['items'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        /*var_dump($data);
        exit();*/
             for ($i=0; $i <count($data['items']) ; $i++) { 
              $item_id = $data['items'][$i]['item_id'];
              $sql = "SELECT item_images from tbl_items_images where registration_no='$registration_no' and item_id='$item_id'";
              $query = $this->db->query($sql);
              $data['image'][$i] = $query->result_array(); 
          }
      }

      
      
     // var_dump("<pre>",$data);
      
      return $data;
    }
    public function dashboard_sec($registration_no)
    {
      $sql = "SELECT count(item_id) as no_of_items from tbl_items where registration_no='$registration_no'";
      $query = $this->db->query($sql);
      $data['no_of_items'] = $query->result_array();
       $sql = "SELECT count(item_id) as no_of_orders from tbl_add_to_cart where registration_no='$registration_no'";
      $query = $this->db->query($sql);
      $data['no_of_orders'] = $query->result_array();
      /*var_dump($data[0]['no_of_items']);
      exit();*/
      return $data;
    }
    public function restaurant_food_order($restaurant_id)
    {
      $sql = "SELECT restaurant_name,restaurant_location,contact_no,name,detailed_address,image from tbl_register_info where registration_no='$restaurant_id'";
      $query = $this->db->query($sql);
      $data['restaurant_info'] = $query->result_array();
       $sql ="SELECT item_id,item_known_id,item_name,item_description,item_price,item_quantity from tbl_items where registration_no='$restaurant_id'";
      $query = $this->db->query($sql);
      $data['items'] = $query->result_array();
     // var_dump("<pre>",$data['items']);
      if (empty($data['items'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        /*var_dump($data);
        exit();*/
             for ($i=0; $i <count($data['items']) ; $i++) { 
              $item_id = $data['items'][$i]['item_id'];
              $sql = "SELECT item_images from tbl_items_images where registration_no='$restaurant_id' and item_id='$item_id'";
              $query = $this->db->query($sql);
              $data['image'][$i] = $query->result_array(); 
          }
      }
      $data['registration_no']=$restaurant_id;
      return $data;

    }
    public function add_to_cart_food($contact_no,$item_id,$registration_id,$price)
    {
      $sql="SELECT * from tbl_add_to_cart where item_id='$item_id' and registration_no='$registration_id' and contact_no='$contact_no' and status='1'";
      $query = $this->db->query($sql);

      //var_dump($query->num_rows());
      
      if (0>=$query->num_rows()) {
        $sql="INSERT into tbl_add_to_cart(item_id,registration_no,contact_no,qauntity,subtotal) values('$item_id','$registration_id','$contact_no','1','$price')";
        $query = $this->db->query($sql);
        if ($query==true) {
          $data['status']='success';
        }else{
          $data['status']='fail';
        }
      }else{
        $data['status']='already';
      }
        
        return $data;
    }
    public function get_all_cart_items($contact_no)
    {
      $sql = "SELECT * from tbl_add_to_cart where contact_no='$contact_no' and status='1'";
      $query = $this->db->query($sql);
      $data['cart_items']=$query->result_array();
      if (empty($data['cart_items'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
           for ($i=0; $i <count($data['cart_items']) ; $i++) { 
          $id = $data['cart_items'][$i]['item_id'];
           $sql = "SELECT item_name,item_price from tbl_items where item_id='$id'";
                $query = $this->db->query($sql);
                $data['items_list'][$i] = $query->result_array(); 
        }
      }
     
     return $data;
    }
    public function cart_items_list($contact_no)
    {
       $sql = "SELECT * from tbl_add_to_cart where contact_no='$contact_no' and status ='1'";
      $query = $this->db->query($sql);
      $data['cart_items']=$query->result_array();
      if (empty($data['cart_items'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['cart_items']); $i++) { 
           $id = $data['cart_items'][$i]['item_id'];
           $sql = "SELECT item_name,item_price,registration_no from tbl_items where item_id='$id'";
                $query = $this->db->query($sql);
                $data['items_list'][$i] = $query->result_array(); 
                $regi_no = $data['items_list'][$i][0]['registration_no'];
               // echo $regi_no."hello";
                 $sql = "SELECT item_images from tbl_items_images where  item_id='$id'";
              $query = $this->db->query($sql);
              $data['image'][$i] = $query->result_array(); 
              $sql = "SELECT restaurant_name from tbl_register_info where registration_no='$regi_no'";
              $query = $this->db->query($sql);
              $data['restaurant_name'][$i] = $query->result_array();

        }

      }
      return $data;
    }
    public function update_quntity()
    {
      $new_quantity = $this->input->post('qnt');
      $regis = $this->input->post('regis');
      $item_id = $this->input->post('item_id');
      $contact = $this->input->post('contact');
      $new_price = $this->input->post('new_price');
      $upt_pr = ($new_quantity*$new_price);
      $sql = "UPDATE tbl_add_to_cart set qauntity = '$new_quantity',subtotal='$upt_pr' where   item_id='$item_id' and registration_no='$regis' and contact_no ='$contact' and status='1'";
      $query = $this->db->query($sql);
      $affected = $this->db->affected_rows();
      if ($affected ==1) {
        $data['new_price']=$upt_pr;
        $sql = "SELECT sum(subtotal) as subtotal from tbl_add_to_cart where contact_no='$contact' and status='1'";
        $query = $this->db->query($sql);
        $data['subtotal']=$query->result_array();
      }else{
        $data['status']='fail';
      }
      return $data;

    }
    public function restaurant_orders($registration_no)
    {
      $sql= "SELECT item_id,contact_no,qauntity,subtotal,order_date_time from tbl_add_to_cart where registration_no='$registration_no' and status='1'";
      $query = $this->db->query($sql);
      $data['orders_list']=$query->result_array();
      if (empty($data['orders_list'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['orders_list']); $i++) { 
          $id = $data['orders_list'][$i]['item_id'];
          $cnt_no = $data['orders_list'][$i]['contact_no'];
           $sql = "SELECT item_name,item_price,registration_no from tbl_items where item_id='$id'";
                $query = $this->db->query($sql);
                $data['items_list'][$i] = $query->result_array(); 
                 $sql = "SELECT name from tbl_register_info where contact_no='$cnt_no'";
              $query = $this->db->query($sql);
              $data['name'][$i] = $query->result_array();
        }
        
       
      }
       $sql = "SELECT sum(subtotal) as subtotal from tbl_add_to_cart where registration_no='$registration_no' and status='1'";
        $query = $this->db->query($sql);
        $data['subtotal']=$query->result_array();
      return $data;
    }
    public function list_of_customers($registration_no)
    {
      $sql= "SELECT contact_no from tbl_add_to_cart where registration_no='$registration_no' GROUP BY contact_no ";
      $query = $this->db->query($sql);
      $data['orders_list']=$query->result_array();
      if (empty($data['orders_list'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['orders_list']); $i++) { 
          
          $cnt_no = $data['orders_list'][$i]['contact_no'];
           
                 $sql = "SELECT name,detailed_address,image,email,contact_no from tbl_register_info where contact_no='$cnt_no' and role='customer'";
              $query = $this->db->query($sql);
              $data['cutomer_info'][$i] = $query->result_array();
        }
       
       
      }
      return $data;
    }
    public function customer_orders($contact_no)
    {
      $sql = "SELECT * from tbl_add_to_cart where contact_no='$contact_no' and status='1'";
      $query = $this->db->query($sql);
      $data['orders_list']=$query->result_array();
      if (empty($data['orders_list'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['orders_list']); $i++) { 
           $id = $data['orders_list'][$i]['item_id'];
           $sql = "SELECT item_name,item_price,registration_no from tbl_items where item_id='$id'";
                $query = $this->db->query($sql);
                $data['items_list'][$i] = $query->result_array(); 
                $regi_no = $data['items_list'][$i][0]['registration_no'];
               // echo $regi_no."hello";
                 
              $sql = "SELECT restaurant_name from tbl_register_info where registration_no='$regi_no'";
              $query = $this->db->query($sql);
              $data['restaurant_info'][$i] = $query->result_array();

        }
        

      }
       $sql = "SELECT sum(subtotal) as subtotal from tbl_add_to_cart where contact_no='$contact_no' and status='1'";
        $query = $this->db->query($sql);
        $data['subtotal']=$query->result_array();
      return $data;
    }
    public function customer_restaurant_list($contact_no){
       $sql = "SELECT registration_no from tbl_add_to_cart where contact_no='$contact_no' GROUP BY registration_no";
        $query = $this->db->query($sql);
        $data['resturant_list']=$query->result_array();
        if (empty($data['resturant_list'])) {
          $data['status']='empty';
        }else{
          $data['status']='success';
          for ($i=0; $i < count($data['resturant_list']); $i++) { 
             $id = $data['resturant_list'][$i]['registration_no'];
             $sql = "SELECT restaurant_name,restaurant_type,detailed_address,image,email from tbl_register_info where registration_no='$id' ";
                $query = $this->db->query($sql);
                $data['restaurant_info'][$i] = $query->result_array();

          }
          

        }
        return $data;
    }
    public function food_count($contact_no)
    {
      $sql = "SELECT count(*) as no_of_order from tbl_add_to_cart where  contact_no='$contact_no'";
      $query = $this->db->query($sql);
      $data['no_of_order'] = $query->result_array();
      return $data;
    }
    public function remove_item()
    {
      $item_id = $this->input->post('item_id');
      $contact_no = $this->input->post('contact_no');
      $sql = "DELETE from tbl_add_to_cart where item_id='$item_id' and contact_no='$contact_no'";
      $query = $this->db->query($sql);
      $affected = $this->db->affected_rows();
      if ($affected==1) {
       return true;
      }else{
        return false;
      }
    }
    public function search_food_items()
    {
      $searchresataurant  = $this->input->post('searchresataurant');
      $sql = "SELECT item_id,item_name,item_description,item_price,registration_no from tbl_items where item_name like '%$searchresataurant%'";
      $query = $this->db->query($sql);
      $data['items']=$query->result_array();
      //var_dump('<pre>',$data);
      if (empty($data['items'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['items']) ; $i++) { 
          $registration_no = $data['items'][$i]['registration_no'];
           $item_id = $data['items'][$i]['item_id'];
          $sql = "SELECT restaurant_name,restaurant_type from tbl_register_info where registration_no='$registration_no'";
          $query = $this->db->query($sql);
          $data['resto_info'][$i]=$query->result_array();
          $sql = "SELECT item_images from tbl_items_images where item_id='$item_id'";
          $query = $this->db->query($sql);
          $data['item_img'][$i]=$query->result_array();
        }
      }
      return $data;
    }
    public function filter_restaurant()
    {
      $type = $this->input->post('value');
       $sql = "SELECT restaurant_name,detailed_address,restaurant_type,image,restaurant_location,registration_no,contact_no from tbl_register_info where restaurant_type='$type' and status='active'";
      $query = $this->db->query($sql);
      $data['result'] = $query->result_array();
      if (empty($data['result'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
      }
      return $data;
    }
    public function order_completion()
    {
      $item_id = $this->input->post('item_id');
      $cont_no = $this->input->post('cont_no');
      $resto_id = $this->input->post('resto_id');
      $sql = "UPDATE tbl_add_to_cart set status = '2' where item_id='$item_id' and registration_no='$resto_id' and contact_no='$cont_no'";
      $query = $this->db->query($sql);
      $affected = $this->db->affected_rows();
      if ($affected==1) {
        return true;
      }else{
        return false;
      }
    }
    public function complete_orders($registration_no){
      $sql= "SELECT item_id,contact_no,qauntity,subtotal,order_date_time from tbl_add_to_cart where registration_no='$registration_no' and status='2'";
      $query = $this->db->query($sql);
      $data['orders_list']=$query->result_array();
      if (empty($data['orders_list'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['orders_list']); $i++) { 
          $id = $data['orders_list'][$i]['item_id'];
          $cnt_no = $data['orders_list'][$i]['contact_no'];
           $sql = "SELECT item_name,item_price,registration_no from tbl_items where item_id='$id'";
                $query = $this->db->query($sql);
                $data['items_list'][$i] = $query->result_array(); 
                 $sql = "SELECT name from tbl_register_info where contact_no='$cnt_no'";
              $query = $this->db->query($sql);
              $data['name'][$i] = $query->result_array();
        }
        
       
      }
       $sql = "SELECT sum(subtotal) as subtotal from tbl_add_to_cart where registration_no='$registration_no' and status='2'";
        $query = $this->db->query($sql);
        $data['subtotal']=$query->result_array();
      return $data;
    }
    public function customer_complete_orders($contact_no)
    {
      $sql = "SELECT * from tbl_add_to_cart where contact_no='$contact_no' and status='2'";
      $query = $this->db->query($sql);
      $data['orders_list']=$query->result_array();
      if (empty($data['orders_list'])) {
        $data['status']='empty';
      }else{
        $data['status']='success';
        for ($i=0; $i < count($data['orders_list']); $i++) { 
           $id = $data['orders_list'][$i]['item_id'];
           $sql = "SELECT item_name,item_price,registration_no from tbl_items where item_id='$id'";
                $query = $this->db->query($sql);
                $data['items_list'][$i] = $query->result_array(); 
                $regi_no = $data['items_list'][$i][0]['registration_no'];
               // echo $regi_no."hello";
                 
              $sql = "SELECT restaurant_name from tbl_register_info where registration_no='$regi_no'";
              $query = $this->db->query($sql);
              $data['restaurant_info'][$i] = $query->result_array();

        }
        

      }
       $sql = "SELECT sum(subtotal) as subtotal from tbl_add_to_cart where contact_no='$contact_no' and status='2'";
        $query = $this->db->query($sql);
        $data['subtotal']=$query->result_array();
      return $data;
    }
}
