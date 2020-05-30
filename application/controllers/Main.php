    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Main extends CI_Controller {
        
            function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('upload');
            $this->load->helper('directory');
            $this->load->model('main_data_model');
            $this->load->library('session');
            $this->load->helper('url','form','file');

           
        }
        public function index()
        {   
           
            $data['title']="index";
            $data['error']='';
            $data['result']='';
            $data['login_error']='';

            $this->load->view('homepage/index',$data);
         
        }
        
        public function account_create()
        {   
            $this->load->view('homepage/index',$data);
         
        }
        public function restaurant_register(){
            //var_dump($_POST);
            //var_dump($_FILES);
            
            
            if ($this->input->post('submit')) 
            {
                $data['error']='';
               
                $ownername = $this->input->post('owenername');
                $restaurantname = $this->input->post('restaurantname');
                $restaurantno = $this->input->post('restaurantno');
                $contantno =$this->input->post('contantno');
                $Alternatecontantno = $this->input->post('Alternatecontantno');
                $Rest_type = $this->input->post('Rest_type');
                $rest_email = $this->input->post('rest_email');
                 $detailed_address = $this->input->post('detailed_address');
                  $city = $this->input->post('city');
                $password = $this->input->post('password');
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['quality']        = '50%';
                 //$this->load->library('upload', $config);
                 $this->upload->initialize($config);

		//var_dump(base_url('uploads/'));
		//var_dump($_POST,'<pre>',$_FILES,$config,);
                   if (! $this->upload->do_upload('res_file')) {
                     $data = array('error' => $this->upload->display_errors());
				//var_dump($data);
                        $this->load->view('homepage/index', $data);
			
                 }
                 else{
			$data = array('image_metadata' => $this->upload->data());
		        $filename = $_FILES['res_file']['name'];
                 }
                $data['result'] =  $this->main_data_model->restaurant_register($detailed_address,$ownername,$restaurantname, $restaurantno, $contantno ,$Alternatecontantno,$Rest_type,$password,$filename,$rest_email,$city);
                 $data['login_error']='';
                $this->load->view('homepage/index',$data);


                 
            }
            
        
            /*echo json_encode($this->main_data_model->restaurant_register());*/
        }
        public function customer_account(){
            if ($this->input->post('submit1')) 
            {   $data['login_error']='';
                $name = $this->input->post('cutomer_name');
                $email = $this->input->post('cutomer_email');
                $cutomer_mobile = $this->input->post('cutomer_mobile');
                $cutomer_password = $this->input->post('cutomer_password');
                $customer_address = $this->input->post('customer_address');
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                 $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                 if (! $this->upload->do_upload('cus_image')) {
                     $data = array('error' => $this->upload->display_errors());

                        $this->load->view('homepage/index', $data);
                 }
                 else{
                    $filename = $_FILES['cus_image']['name'];
                 }
                 $data['result']=$this->main_data_model->customer_account($name,$email,$cutomer_mobile,$cutomer_password,$filename,$customer_address);
                 $this->load->view('homepage/index',$data);
            }
            
        }
        public function dashboard(){
             if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' )
             {
                 $registration_no = $this->session->userdata('registration_no');
                $data['result'] = $this->main_data_model->dashboard_sec($registration_no);
                $this->load->view('dashboard/dashboard',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' ) {
                $contact_no = $this->session->userdata('contact_no');
                $data['result'] = $this->main_data_model->food_count($contact_no);
               $this->load->view('dashboard/customer_dashboard',$data);
            }else{
                 redirect(base_url().'main/index');
            }
            
        }
        public function add_items(){
             $data['error']='';
            $data['result']='';
            if($this->session->userdata('contact_no')!='')
             {
                 $this->load->view('dashboard/add_items',$data);
            }else{
                 redirect(base_url().'main/index');
            }
           
        }
        public function retriver_all_restaurant(){
            if ($this->input->post('validator')) {
                echo json_encode($this->main_data_model->retriver_all_restaurant());
            }
            
        }
        public function restaurant_food_order($restaurant_id=""){
            $data['result'] = $this->main_data_model->restaurant_food_order($restaurant_id);
            $this->load->view('homepage/order_restaurant',$data);
        }
        public function login(){
            if ($this->input->post('submit')) {
                $username=$this->input->post('username');
                $log_password=$this->input->post('log_password');
                $result = $this->main_data_model->login($username,$log_password);
                //var_dump($result[0]['registration_no']);
                if ($result[0]['contact_no']!='') {
                    $registration_no = $result[0]['registration_no'];
                    $restaurant_name = $result[0]['restaurant_name'];
                    $name = $result[0]['name'];
                    $contact_no = $result[0]['contact_no'];
                    $user_id = $result[0]['user_id'];
                    $email = $result[0]['email'];
                    $role = $result[0]['role'];
                    $session = array(
                        'registration_no' =>$registration_no ,
                        'restaurant_name'=>$restaurant_name,
                        'name'=>$name,
                        'contact_no'=>$contact_no,
                        'user_id'=>$user_id,
                        'email'=>$email,
                        'role'=>$role
                    );
                    $this->session->set_userdata($session);
                   redirect(base_url().'main/index');
                }else{
                     $this->session->set_flashdata('error','Invalid username and password');
                    redirect(base_url().'main/index');
                        
                }
            }
        }
        public function add_food_item()
        {
            
            if($this->session->userdata('contact_no')!='')
             {
                if ($this->input->post('submit')) {

                    $item_name = $this->input->post('item_name');
                    $item_price = $this->input->post('item_price');
                    $item_known_id = $this->input->post('item_known_id');
                    $item_quantity = $this->input->post('item_quantity');
                    $item_type = $this->input->post('item_type');
                    $item_description = $this->input->post('item_description');
                    $registration_no = $this->input->post('registration_no');
                   if (count($_FILES['image']['name'])>0) {
                       $number_of_files = count($_FILES['image']['name']);
                       $file = $_FILES;
                       for ($i=0; $i < $number_of_files; $i++) { 

                            $fnew=$file['image']['name'][$i];
                          $path=time().$file['image']['name'][$i];
                          $full_path = preg_replace('/[^a-zA-Z0-9_.]/', '_', $path);


                            $_FILES['image']['name']=$full_path;
                            $_FILES['image']['tmp_name']=$file['image']['tmp_name'][$i];
                           $_FILES['image']['type']=$file['image']['type'][$i];
                           $_FILES['image']['error']=$file['image']['error'][$i]; 
                            $_FILES['image']['size']=$file['image']['size'][$i];  
                            /*temp array creation to store file name and more data*/
                             $file2['image']['name'][$i]=$full_path;
                            $file2['image']['tmp_name'][$i]=$file['image']['tmp_name'][$i];
                           $file2['image']['type'][$i]=$file['image']['type'][$i];
                           $file2['image']['error'][$i]=$file['image']['error'][$i]; 
                            $file2['image']['size'][$i]=$file['image']['size'][$i];  
                           $config['upload_path']='./uploads/';
                           $config['allowed_types']='gif|jpg|png|jpeg';
                            $file_name = str_replace(' ',' ',$fnew);
                            $file_nam=str_replace("'","\'", $file_name);
                           $this->load->library('upload', $config);
                           $this->upload->initialize($config);
                           //echo $fnew,$file_nam;
                         if(!$this->upload->do_upload('image'))
                          {
                            $error=array('error'=>$this->upload->display_errors());
                            var_dump($error);
                          }else{
                            $data=array('upload_data'=>$this->upload->data());
                          }
                          
                         
                       }
                     
                      //var_dump($file2);
                        $data['result'] = $this->main_data_model->add_food_item($item_name,$item_known_id,$item_price,$item_quantity,$item_description,$registration_no,$file2,$item_type);
                       
                        $this->load->view('dashboard/add_items',$data);
                   }
                }
            }else{
                 redirect(base_url().'main/index');
            }
        }
        public function get_all_items_list()
        {
            if($this->session->userdata('contact_no')!='')
             {
                $registration_no = $this->session->userdata('registration_no');
                if ($this->input->post('get_all_items')) {
                    echo json_encode($this->main_data_model->get_all_items_list($registration_no));
                }
                 
            }else{
                 redirect(base_url().'main/index');
            }
            
        }
        public function item_update()
        {
            if($this->session->userdata('contact_no')!='')
             {
                if ($this->input->post('item_id')) {
                    echo json_encode($this->main_data_model->item_update());
                }
                 
            }else{
                 redirect(base_url().'main/index');
            }
        }
        public function deleteitems()
        {
            if($this->session->userdata('contact_no')!='')
             {
                if ($this->input->post('item_id1')) {
                    echo json_encode($this->main_data_model->deleteitems());
                }
                 
            }else{
                 redirect(base_url().'main/index');
            }
        }

        public function show_all_items()
        {
            if($this->session->userdata('contact_no')!='')

             {
                $registration_no = $this->session->userdata('registration_no');
                $data['result'] = $this->main_data_model->show_all_items($registration_no);
                //var_dump($data);
                $this->load->view('dashboard/show_all_items',$data);
                 
            }else{
                 redirect(base_url().'main/index');
            }
        }

        public function add_to_cart_food()
        {
            
            if($this->session->userdata('contact_no')!='')
            {
                $contact_no = $this->session->userdata('contact_no');
                $item_id = $this->input->post('item_id');
                $registration_id = $this->input->post('registration_id');
                $price = $this->input->post('price');

               echo json_encode($this->main_data_model->add_to_cart_food($contact_no,$item_id,$registration_id,$price)) ;
               // var_dump($data);
                 
            }else{

                 //$data['login_error']='login_now';
                 /*$this->load->view('homepage/index',$data);*/
                 redirect(base_url().'main/index');
            }
           
        }

        public function get_all_cart_items()
        {
            
            if($this->session->userdata('contact_no')!='')
            {   $contact_no = $this->session->userdata('contact_no');
               if ($this->input->post('tmp_cart_valid')) {
                   echo json_encode($this->main_data_model->get_all_cart_items($contact_no));
               }
                 
            }else{

                 //$data['login_error']='login_now';
                 /*$this->load->view('homepage/index',$data);*/
                 redirect(base_url().'main/index');
            }
        }
        public function cart_items_list()
        {
            if($this->session->userdata('contact_no')!='')
            {  
                $contact_no = $this->session->userdata('contact_no');
               $data['result']=$this->main_data_model->cart_items_list($contact_no); 
               $this->load->view('homepage/cart_items_list',$data);

            }else{

                 //$data['login_error']='login_now';
                 /*$this->load->view('homepage/index',$data);*/
                 redirect(base_url().'main/index');
            }
        }

        public function logout(){
            //$this->session->unset_userdata('registration_no','restaurant_name','name','contact_no','user_id','email','role');
            $this->session->sess_destroy();
            /*var_dump($this->session->userdata());*/
            redirect(base_url().'main/index');
        }
        public function update_quntity()
        {
            if($this->session->userdata('contact_no')!='')
            {  
               echo json_encode($this->main_data_model->update_quntity());

            }else{

                 //$data['login_error']='login_now';
                 /*$this->load->view('homepage/index',$data);*/
                 redirect(base_url().'main/index');
            }
        }
        public function restaurant_orders()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' )
             {
                $registration_no = $this->session->userdata('registration_no');
                $data['result']= $this->main_data_model->restaurant_orders($registration_no);
                $this->load->view('dashboard/restaurant_orders',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' ) {
               $this->load->view('dashboard/customer_dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }
        public function list_of_customers()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' )
             {
                $registration_no = $this->session->userdata('registration_no');
                $data['result']= $this->main_data_model->list_of_customers($registration_no);
                $this->load->view('dashboard/list_of_customers',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' ) {
               $this->load->view('dashboard/customer_dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }

        public function customer_orders()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' )
             {
                $contact_no = $this->session->userdata('contact_no');
                $data['result']= $this->main_data_model->customer_orders($contact_no);
                $this->load->view('dashboard/customer_orders',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' ) {
               $this->load->view('dashboard/dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }

        public function customer_restaurant_list()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' )
             {
                $contact_no = $this->session->userdata('contact_no');
                $data['result']= $this->main_data_model->customer_restaurant_list($contact_no);
                $this->load->view('dashboard/customer_restaurant_list',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' ) {
               $this->load->view('dashboard/dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }
        public function remove_item()
        {
             if($this->session->userdata('contact_no')!='')
            {   
                echo json_encode($this->main_data_model->remove_item()); 
            }else{

                 //$data['login_error']='login_now';
                 /*$this->load->view('homepage/index',$data);*/
                 redirect(base_url().'main/index');
            }
        }
        public function search_food_items()
        {
            echo json_encode($this->main_data_model->search_food_items());
        }
        public function filter_restaurant()
        {
            echo json_encode($this->main_data_model->filter_restaurant());
        }
        public function order_completion()
        {
            echo json_encode($this->main_data_model->order_completion());
        }
        /*public function complete_orders()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' )
            {
                $this->load->view('dashboard/complete_orders');
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' ) {
               $this->load->view('dashboard/customer_dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }*/
        public function complete_orders()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' )
             {
                $registration_no = $this->session->userdata('registration_no');
                $data['result']= $this->main_data_model->complete_orders($registration_no);
                $this->load->view('dashboard/complete_orders',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' ) {
               $this->load->view('dashboard/customer_dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }
        public function customer_complete_orders()
        {
            if($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='customer' )
             {
                $contact_no = $this->session->userdata('contact_no');
                $data['result']= $this->main_data_model->customer_complete_orders($contact_no);
                $this->load->view('dashboard/customer_complete_orders',$data);
            }
            elseif ($this->session->userdata('contact_no')!='' && $this->session->userdata('role')=='restaurant' ) {
               $this->load->view('dashboard/dashboard');
            }else{
                 redirect(base_url().'main/index');
            }
        }
        
        
    }