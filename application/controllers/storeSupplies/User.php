<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/admin_guide/general/urls.html
	 */


	public function index(){
      	if($this->session->userdata('roleId') == '3'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1' ||
      		$this->session->userdata('roleId') == '4'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1'||
      		$this->session->userdata('roleId') == '5'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1'||
      		$this->session->userdata('roleId') == '6'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1'||
      		$this->session->userdata('roleId') == '7'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1' ||
      		$this->session->userdata('roleId') == '8' && $this->session->userdata('empStatus') == '1'  && $this->session->userdata('categoryId') == '1' ||
      		$this->session->userdata('roleId') == '9'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1'){
			redirect(base_url("storeSupplies/user/storeSupplies_dashboard"));
		}
		else if($this->session->userdata('roleId') == '3'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2' ||
			$this->session->userdata('roleId') == '4'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2'||
			$this->session->userdata('roleId') == '5'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2'||
			$this->session->userdata('roleId') == '6'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2'||
			$this->session->userdata('roleId') == '7'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2' ||
			$this->session->userdata('roleId') == '8'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2'||
			$this->session->userdata('roleId') == '9'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2'){
			redirect(base_url("inventoryAccessories/user/inventoryAccessories_dashboard"));
		}
		else if($this->session->userdata('roleId') == '3'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3' ||
			$this->session->userdata('roleId') == '4'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3'||
			$this->session->userdata('roleId') == '5'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3'||
			$this->session->userdata('roleId') == '6'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3'||
			$this->session->userdata('roleId') == '7'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3' ||
			$this->session->userdata('roleId') == '8'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3'||
			$this->session->userdata('roleId') == '9'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3'){
			redirect(base_url("maintenance/user/maintenance_dashboard"));
		}
		else if($this->session->userdata('roleId') == '3'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '4' ||
			$this->session->userdata('roleId') == '4'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '4'||
			$this->session->userdata('roleId') == '5'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '4'||
			$this->session->userdata('roleId') == '6'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '4'||
			$this->session->userdata('roleId') == '7'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '4' ||
			$this->session->userdata('roleId') == '8'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '4'||
			$this->session->userdata('roleId') == '9'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '3'){
			redirect(base_url("travel/user/travel_dashboard"));
		}
		else if($this->session->userdata('roleId') == '3'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5' ||
			$this->session->userdata('roleId') == '4'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5'||
			$this->session->userdata('roleId') == '5'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5'||
			$this->session->userdata('roleId') == '6'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5'||
			$this->session->userdata('roleId') == '7'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5' ||
			$this->session->userdata('roleId') == '8'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5'||
			$this->session->userdata('roleId') == '9'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '5'){
			redirect(base_url("discountLog/user/discountLog_dashboard"));
		}
		else{
			if($this->session->userdata('roleId') == '3'  && $this->session->userdata('empStatus') == '1' && !$this->session->userdata('categoryId') ||
				$this->session->userdata('roleId') == '4'  && $this->session->userdata('empStatus') == '1' &&  !$this->session->userdata('categoryId') ||
				$this->session->userdata('roleId') == '5'  && $this->session->userdata('empStatus') == '1' && !$this->session->userdata('categoryId')||
				$this->session->userdata('roleId') == '6'  && $this->session->userdata('empStatus') == '1' && !$this->session->userdata('categoryId') ||
				$this->session->userdata('roleId') == '7'  && $this->session->userdata('empStatus') == '1' && !$this->session->userdata('categoryId')||
				$this->session->userdata('roleId') == '8'  && $this->session->userdata('empStatus') == '1' && !$this->session->userdata('categoryId')||
				$this->session->userdata('roleId') == '9'  && $this->session->userdata('empStatus') == '1' && !$this->session->userdata('categoryId')){
			redirect(base_url("user/mainDashboard"));
			}
			else{
				$this->load->view('user/login');
			}
		}
	}
	public function mainDashboard(){
		check_user_login();
		$data["categorys"] = $this->StoreSupplies_User_m->getCategory();
		$this->load->view('user/mainDashboard',$data);
	}
	public function setCategory(){
	   $data = array();
	   if($_POST){
	   	    $newUserdata = array('categoryId'=>$_POST['category_id']);
			$this->session->set_userdata($newUserdata);	
			$data = array('status'=> 'selected');
		}	
		echo json_encode($data);
	}
	public function storeSupplies_dashboard(){
		check_user_login();
		if($this->session->userdata('roleId') == 3){
			 $orders = $this->StoreSupplies_User_m->getSelectedSDOrders($this->session->userdata('email'));
				if($orders){
						$pendingArray=array();
						$inprogressArray=array();
						$completedArray=array();
						$declinedarray=array();
						foreach ($orders as $order){
							if($order["status_id"] == 1){
						      array_push($pendingArray, $order);
							}
							else if($order["status_id"] == 2){
								 array_push($inprogressArray, $order);
							}
							else if($order["status_id"] == 3){
								array_push($completedArray, $order);
							}
							else{
								array_push($declinedarray, $order);
							}
						}
						$data["pendingCount"]=count($pendingArray);
						$data["inprogressCount"]=count($inprogressArray);
						$data["completedCount"]=count($completedArray);
						$data["declinedCount"]=count($declinedarray);
				}
				if(!$orders){
					$data["pendingCount"]=0;
					$data["inprogressCount"]=0;
					$data["completedCount"]=0;
					$data["declinedCount"]=0;
				}
		}
		if($this->session->userdata('roleId') == 4){
			$orders = $this->StoreSupplies_User_m->getSelectedTMOrders($this->session->userdata('email'));
				if($orders){
						$pendingArray=array();
						$inprogressArray=array();
						$completedArray=array();
						$declinedarray=array();
						foreach ($orders as $order){
							if($order["status_id"] == 1){
						      array_push($pendingArray, $order);
							}
							else if($order["status_id"] == 2){
								 array_push($inprogressArray, $order);
							}
							else if($order["status_id"] == 3){
								array_push($completedArray, $order);
							}
							else{
								array_push($declinedarray, $order);
							}
						}
						$data["pendingCount"]=count($pendingArray);
						$data["inprogressCount"]=count($inprogressArray);
						$data["completedCount"]=count($completedArray);
						$data["declinedCount"]=count($declinedarray);
				}
				if(!$orders){
					$data["pendingCount"]=0;
					$data["inprogressCount"]=0;
					$data["completedCount"]=0;
					$data["declinedCount"]=0;
				}

		}
		if($this->session->userdata('roleId') == 5){
			$orders = $this->StoreSupplies_User_m->getSelectedCMOrders($this->session->userdata('email'));
				if($orders){
						$pendingArray=array();
						$inprogressArray=array();
						$completedArray=array();
						$declinedarray=array();
						foreach ($orders as $order){
							if($order["status_id"] == 1){
						      array_push($pendingArray, $order);
							}
							else if($order["status_id"] == 2){
								 array_push($inprogressArray, $order);
							}
							else if($order["status_id"] == 3){
								array_push($completedArray, $order);
							}
							else{
								array_push($declinedarray, $order);
							}
						}
						$data["pendingCount"]=count($pendingArray);
						$data["inprogressCount"]=count($inprogressArray);
						$data["completedCount"]=count($completedArray);
						$data["declinedCount"]=count($declinedarray);
				}
				if(!$orders){
					$data["pendingCount"]=0;
					$data["inprogressCount"]=0;
					$data["completedCount"]=0;
					$data["declinedCount"]=0;
				}

		}
		if($this->session->userdata('roleId') == 6|| $this->session->userdata('roleId') == 7 || $this->session->userdata('roleId') == 8 || $this->session->userdata('roleId') == 9){
			$orders = $this->StoreSupplies_User_m->getSelectedStoreOrders($this->session->userdata('storeId'));
				if($orders){
						$pendingArray=array();
						$inprogressArray=array();
						$completedArray=array();
						$declinedarray=array();
						foreach ($orders as $order){
							if($order["status_id"] == 1){
						      array_push($pendingArray, $order);
							}
							else if($order["status_id"] == 2){
								 array_push($inprogressArray, $order);
							}
							else if($order["status_id"] == 3){
								array_push($completedArray, $order);
							}
							else{
								array_push($declinedarray, $order);
							}
						}
						$data["pendingCount"]=count($pendingArray);
						$data["inprogressCount"]=count($inprogressArray);
						$data["completedCount"]=count($completedArray);
						$data["declinedCount"]=count($declinedarray);
				}
				if(!$orders){
					$data["pendingCount"]=0;
					$data["inprogressCount"]=0;
					$data["completedCount"]=0;
					$data["declinedCount"]=0;
				}

		}

		$data["orders"] = $this->StoreSupplies_User_m->getOrders();
		$this->load->view('user/storeSupplies/header');
		$this->load->view('user/storeSupplies/dashboard',$data);
		$this->load->view('user/storeSupplies/footer');
		
	}
	public function storeSupplies_getSelectedProduct(){
		check_user_login();
		if($_POST){
			$productObject = $this->StoreSupplies_User_m->getSelectedProduct($_POST);
			if($productObject){
				$data = array('status'=> "true" , 'objectGet' => $productObject);
			}

			else{
				$data = array('status'=> 'error' ,'object'=>$user);
			}
			echo json_encode($data);
		}	
	}
	public function storeSupplies_addOrder(){
		check_user_login();
		$data["stores"] = $this->StoreSupplies_User_m->getStores();
		$data["products"] = $this->StoreSupplies_User_m->getProducts();
		$this->load->view('user/storeSupplies/header');
		$this->load->view('user/storeSupplies/addOrder',$data);
		$this->load->view('user/storeSupplies/footer');
	}
	public function storeSupplies_orderList(){
		check_user_login();
		$data["orders"] = $this->StoreSupplies_User_m->getOrders();
		$this->load->view('user/storeSupplies/header');
		$this->load->view('user/storeSupplies/orderList',$data);
		$this->load->view('user/storeSupplies/footer');
	}
	

	public function login(){
	   if($_POST){
			$user = $this->StoreSupplies_User_m->login($_POST);
			if($user == "Credential Not Created"){
				$data = array('status'=> "Credential Not Created");
			}
			else if($user){
                    $userdata = array(
                    	'id'=>        $user[0]['emp_id'] ,
                    	'name'=>      $user[0]['emp_name'],
                    	'email'=>     $user[0]['emp_email'] ,
                    	'photo'=>     $user[0]['emp_photo'] ,
                    	'adpId'=>     $user[0]['emp_adpId'],
                    	'roleId'=>    $user[0]['role_id'],
                    	'role'=>      $user[0]['role_name'],
                    	'market'=>    $user[0]['market_name'],
                    	'storeId'=>   $user[0]['store_id'],
                    	'store'=>     $user[0]['store_name'],
                    	'storeUid'=>  $user[0]['store_uId'],
                    	'sdId'=>    $user[0]['sd_id'],
                    	'sdName'=>    $user[0]['sd_name'],
                    	'tmName'=>    $user[0]['tm_name'],
                    	'cmName'=>    $user[0]['cm_name'],
                    	'empType'=> $user[0]['emp_type'],
                    	'empStatus'=> $user[0]['emp_status']);
					$this->session->set_userdata($userdata);
					$data = array('status'=> 'added' ,'object'=>$userdata);
			}
			else{
				$data = array('status'=> 'error' ,'object'=>$user);
			}
			echo json_encode($data);
		}	
   }

   public function storeSupplies_add_order()
	{
		check_user_login();
		// if($this->session->userdata('roleId') == '3' || $this->session->userdata('roleId') == '4'|| $this->session->userdata('roleId') == '5'){
		// 		$store_id = $_POST['store_id'];
		// 	}
		// if($this->session->userdata('roleId') == '6' || $this->session->userdata('roleId') == '7'|| $this->session->userdata('roleId') == '8'|| $this->session->userdata('roleId') == '9'){
		//    $store_id= $this->session->userdata('storeId');
		// }
		$userName = $this->session->userdata('name');
		$userRole = $this->session->userdata('role');
		$userEmail = $this->session->userdata('email');
		$userMarket = $this->session->userdata('market');
	    $userStore = $this->session->userdata('store');
	    $userStoreUid = $this->session->userdata('storeUid');

		$store_id= $this->session->userdata('storeId');

		$checkOrderexist = $this->StoreSupplies_User_m->check_order_exist($store_id);
		if($checkOrderexist){
			$data = array('status' => 'Order Already Exist');
		}
		else{
				// The length we want the unique reference number to be  
				$unique_ref_length = 8;  
				  
				// A true/false variable that lets us know if we've  
				// found a unique reference number or not  
				$unique_ref_found = false;  
				  
				// Define possible characters.  
				// Notice how characters that may be confused such  
				// as the letter 'O' and the number zero don't exist  
				$possible_chars = "0123456789";  
				  
				// Until we find a unique reference, keep generating new ones  
				while (!$unique_ref_found) {  
				  
				    // Start with a blank reference number  
				    $unique_ref = "";  
				      
				    // Set up a counter to keep track of how many characters have   
				    // currently been added  
				    $i = 0;  
				      
				    // Add random characters from $possible_chars to $unique_ref   
				    // until $unique_ref_length is reached  
				    while ($i < $unique_ref_length) {  
				      
				        // Pick a random character from the $possible_chars list  
				        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);  
				          
				        $unique_ref .= $char;  
				          
				        $i++;  
				      
				    }  
				      
				    // Our new unique reference number is generated.  
				    // Lets check if it exists or not  
				    $query = $this->db->get_where('orders',array( 'order_refNo' => $unique_ref));
				    if ($query->num_rows()==0) {  
				      
				        // We've found a unique number. Lets set the $unique_ref_found  
				        // variable to true and exit the while loop  
				        $unique_ref_found = true;  
				      
				    }  
				  
				}

			  if($unique_ref_found){
			  	$date = date('Y-m-d');
						$emp_id= $this->session->userdata('id');
						$this->db->insert('orders',
		array('order_refNo'=>$unique_ref,'order_date'=>$date,'emp_id'=>$emp_id,'store_id'=>$store_id,'status_id'=>1,'APP_EMP_ID'=>$emp_id)
							);
						$lastOrderId = $this->db->insert_id();

						foreach($_POST['product_id'] as $key => $value) { 

							    $product_id = $_POST['product_id'][$key];
								$availableProduct = $_POST['avl'][$key];
								$requireProduct = $_POST['rmt'][$key];
								$commentProduct = $_POST['cmt'][$key];
								$this->db->insert('orderdetails',
									array(
										'product_id'=>$product_id,
										'orderdetails_availableStock'=>$availableProduct,
										'orderdetails_requiredItems'=>$requireProduct,
										'financeStatus_Id'=>3,
										'orderdetails_comment'=>$commentProduct,
										'order_id'=>$lastOrderId
										)
									);
						}
						 
						 $config = Array(        
						            'protocol' => 'smtp',
						            'smtp_host' => 'ssl://secure.emailsrvr.com',
						            'smtp_port' => 465,
						            'smtp_user' => 'fahad_ahmed@mobilelinkusa.com',
						            'smtp_pass' => 'zarams12',
						            'smtp_timeout' => '4',
						            'mailtype'  => 'html', 
						            'charset'   => 'iso-8859-1'
						        );
						        $this->load->library('email', $config);
								$this->email->set_newline("\r\n");
								$this->email->set_mailtype("html");
						        $this->email->from($userEmail,$userName);
								$storeSuppliesUsers = 'supplies@mobilelinkusa.com';
								$email_list = $storeSuppliesUsers;
								$this->email->to($email_list);
								
								$this->email->cc($userEmail);
								$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
								$this->email->set_mailtype("html");
								$this->email->subject('storeSupplies Request, Store UID : '.$this->session->userdata('storeUid'));

								$data = array(
									'request_date'=> $date,
									'order_number'=> $unique_ref,
									'user_name'=> $userName,
									'user_role'=> $userRole,
									'market_name'=> $userMarket,
									'store_name'=> $userStore,
									'store_uid'=> $userStoreUid,
									);  
									 
								$body = $this->load->view('email/request_supplies.php',$data,TRUE);
								$this->email->message($body);   
						        $this->email->send();

						$data = array('status'=>'Order Added'); 

			  }
			
		}
		echo json_encode($data); 
	}
	public function storeSupplies_viewOrderModel(){
		check_user_login();
		$data['selected_orders'] = $this->StoreSupplies_User_m->selectedOrders($_POST);
		$output = array('html'=>$this->load->view("user/storeSupplies/models/viewOrder",$data, true)); 
		echo json_encode($output);
	}
	public function storeSupplies_editOrderModel(){
		check_user_login();
		$data['selected_orders'] = $this->StoreSupplies_User_m->selectedOrders($_POST);
		$output = array('html'=>$this->load->view("user/storeSupplies/models/editOrder",$data, true)); 
		echo json_encode($output);
	}
	public function storeSupplies_editOrder(){
		check_user_login();
		$data = array();
			$date = date('Y-m-d');
			$emp_id= $this->session->userdata('id');
			foreach($_POST['order_id'] as $key => $value) { 
				    $order_id = $_POST['order_id'][$key];
					$orderdetails_id = $_POST['orderdetails_id'][$key];
				    $product_id = $_POST['product_id'][$key];
					$availableProduct = $_POST['avl'][$key];
					$requireProduct = $_POST['rmt'][$key];
					$commentProduct = $_POST['cmt'][$key];
					$this->db->update('orders',
							 array('order_date'=>$date,'status_id'=>1)
							,array('order_id'=>$order_id)
							);
					$this->db->update('orderdetails',
						array(
							'product_id'=>$product_id,
							'orderdetails_availableStock'=>$availableProduct,
							'orderdetails_requiredItems'=>$requireProduct,
							'financeStatus_Id'=>3,
							'orderdetails_comment'=>$commentProduct,
							'order_id'=>$order_id
							)
							,array('orderdetails_id'=>$orderdetails_id)
						);
			}
			// add Email code
			$data = array('status'=>'Order Edited'); 
		echo json_encode($data); 
	}
	
 

	public function logout(){
		 $this->session->sess_destroy();
		 redirect(base_url());
	}


	
	


}
?>