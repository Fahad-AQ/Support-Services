<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	  	if($this->session->userdata('roleId') == '2' && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '1'){
			redirect(base_url("storeSupplies/admin/storeSupplies_dashboard"));
		}
		else if($this->session->userdata('roleId') == '2'  && $this->session->userdata('empStatus') == '1' && $this->session->userdata('categoryId') == '2'){
			redirect(base_url("inventoryAccessories/admin/inventoryAccessories_dashboard"));
		}
		else if($this->session->userdata('roleId') == '2'  && $this->session->userdata('empStatus') == '1'  && $this->session->userdata('categoryId') == '3'){
			redirect(base_url("maintenance/admin/maintenance_dashboard"));
		}
		else if($this->session->userdata('roleId') == '2'  && $this->session->userdata('empStatus') == '1'  && $this->session->userdata('categoryId') == '4'){
			redirect(base_url("travel/admin/travel_dashboard"));
		}
		else if($this->session->userdata('roleId') == '2'  && $this->session->userdata('empStatus') == '1'  && $this->session->userdata('categoryId') == '5'){
			redirect(base_url("discountLog/admin/discountLog_dashboard"));
		}
		else{
			if($this->session->userdata('roleId') == '2'  && $this->session->userdata('empStatus') == '1'  && !$this->session->userdata('categoryId')){
			  redirect(base_url("admin/mainDashboard"));
			}
			else{
				$this->load->view('admin/login');
			}
		}
	}
	public function mainDashboard(){
		check_admin_login();
		$data["categorys"] = $this->StoreSupplies_Admin_m->getCategory();
		$this->load->view('admin/mainDashboard',$data);
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
   
	public function login(){
	   if($_POST){
			$user = $this->StoreSupplies_Admin_m->login($_POST);
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


	public function storeSupplies_dashboard(){
		check_admin_login();
		$orders = $this->StoreSupplies_Admin_m->getOrders();
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
		$data["orders"] = $this->StoreSupplies_Admin_m->getOrders();
		$this->load->view('admin/storeSupplies/header');
		$this->load->view('admin/storeSupplies/dashboard',$data);
		$this->load->view('admin/storeSupplies/footer');

	}
	public function storeSupplies_addProduct(){
		check_admin_login();
		$data["categorys"] = $this->StoreSupplies_Admin_m->getCategory();
		$this->load->view('admin/storeSupplies/header');
		$this->load->view('admin/storeSupplies/addProduct',$data);
		$this->load->view('admin/storeSupplies/footer');
	}

	public function storeSupplies_add_productForm()
	{
		check_admin_login();
		$data = array();
		$emp_id = $this->session->userdata('id');
		$check_product_exist = $this->StoreSupplies_Admin_m->check_product_exist($_POST);
		if($check_product_exist){
			$data = array('status' => 'Product Already Exist');
		}
		else{
			$product_name = $_POST['product_name'];
			$product_unit = $_POST['product_unit'];
			$product_code = $_POST['product_code'];
			$category_id = $_POST['category_id'];
			$this->db->insert('product',
						array(
							'product_name'=>$product_name,
							'product_unit'=>$product_unit,
							'product_code'=>$product_code,
							'category_id'=>$category_id,
							'product_isActive'=>1,
							'APP_EMP_ID'=>$emp_id
							)
						);
			$data = array('status'=>'Order Added'); 
		}
		echo json_encode($data); 
	}
	public function storeSupplies_editProduct()
	{
		check_admin_login();
		$data = array();
		$emp_id = $this->session->userdata('id');
		$check_editedproduct_exist = $this->StoreSupplies_Admin_m->check_editedproduct_exist($_POST);
		if($check_editedproduct_exist){
			$data = array('status' => 'Product Already Exist');
		}
		else{
			$product_id = $_POST['product_id'];
			$product_name = $_POST['product_name'];
			$product_unit = $_POST['product_unit'];
			$product_code = $_POST['product_code'];
			$category_id = $_POST['category_id'];
			$product_isActive = $_POST['product_isActive'];
			$this->db->update('product',
						array(
							'product_name'=>$product_name,
							'product_unit'=>$product_unit,
							'product_code'=>$product_code,
							'category_id'=>$category_id,
							'product_isActive'=>$product_isActive,
							'APP_EMP_ID'=>$emp_id
							),
							array(
							'product_id'=>$product_id
							)
						);
			$data = array('status'=>'Product Edited'); 
		}
		echo json_encode($data); 
	}

	public function storeSupplies_editProductModel(){
		check_admin_login();
		$data['selected_products'] = $this->StoreSupplies_Admin_m->selected_product($_POST);
		$data["categorys"] = $this->StoreSupplies_Admin_m->getCategory();
		$output = array('html'=>$this->load->view("admin/storeSupplies/models/editProduct",$data, true)); 
		echo json_encode($output);
	}
	public function storeSupplies_productList(){
		check_admin_login();
		$data["products"] = $this->StoreSupplies_Admin_m->getProducts();
		$this->load->view('admin/storeSupplies/header');
		$this->load->view('admin/storeSupplies/productList',$data);
		$this->load->view('admin/storeSupplies/footer');
	}
	

    public function storeSupplies_orderList(){
		check_admin_login();
		$data["orders"] = $this->StoreSupplies_Admin_m->getOrders();
		$data["financeOrders"] = $this->StoreSupplies_Admin_m->getFinancedOrders();
		$this->load->view('admin/storeSupplies/header');
		$this->load->view('admin/storeSupplies/orderList',$data);
		$this->load->view('admin/storeSupplies/footer');
	}
	public function storeSupplies_orderCompletedList(){
		check_admin_login();
		$data["orders"] = $this->StoreSupplies_Admin_m->getOrders();
		$this->load->view('admin/storeSupplies/header');
		$this->load->view('admin/storeSupplies/orderCompletedList',$data);
		$this->load->view('admin/storeSupplies/footer');
	}
	public function storeSupplies_orderDeclinedList(){
		check_admin_login();
		$data["orders"] = $this->StoreSupplies_Admin_m->getOrders();
		$this->load->view('admin/storeSupplies/header');
		$this->load->view('admin/storeSupplies/orderDeclinedList',$data);
		$this->load->view('admin/storeSupplies/footer');
	}
	public function storeSupplies_viewOrderModel(){
		check_admin_login();
		$data['selected_orders'] = $this->StoreSupplies_Admin_m->selectedOrders($_POST);
		$output = array('html'=>$this->load->view("admin/storeSupplies/models/viewOrder",$data, true)); 
		echo json_encode($output);
	}
	public function storeSupplies_editOrderModel(){
		check_admin_login();
		$data['status_array'] = $this->StoreSupplies_Admin_m->getStatus($_POST);
		$data['selected_orders'] = $this->StoreSupplies_Admin_m->selectedOrders($_POST);
		$output = array('html'=>$this->load->view("admin/storeSupplies/models/editOrder",$data, true)); 
		echo json_encode($output);
	}

	public function storeSupplies_editOrder(){
		check_admin_login();
		$data = array();
		$adminName = $this->session->userdata('name');
		$adminEmail = $this->session->userdata('email');
		$date = date('Y-m-d');
		$requestCompleted = false;
		$requestDeclined = false;
			$emp_id= $this->session->userdata('id');
			$store_id= $this->session->userdata('storeId');
			foreach($_POST['orderdetails_id'] as $key => $value) { 
                      if($_POST['order_status'] == 1 || $_POST['order_status'] == 2){
					    $order_id = $_POST['order_id'][$key];
							$orderdetails_id = $_POST['orderdetails_id'][$key];
							$order_status = $_POST['order_status'];
							$order_finalStatusComment = $_POST['order_finalStatusComment'];
						    $product_id = $_POST['product_id'][$key];
							$availableProduct = $_POST['avl'][$key];
							$requireProduct = $_POST['rmt'][$key];
							$commentProduct = $_POST['cmt'][$key];
							$fStatus = $_POST['fStatus'][$key];
							$this->db->update('orders',
									 array('status_id'=>$order_status,'order_finalStatusComment'=>$order_finalStatusComment,
									 	'APP_EMP_ID'=>$emp_id)
									,array('order_id'=>$order_id)
									);
							$this->db->update('orderdetails',
								array(
									'product_id'=>$product_id,
									'orderdetails_availableStock'=>$availableProduct,
									'orderdetails_requiredItems'=>$requireProduct,
									'financeStatus_Id'=>$fStatus,
									'orderdetails_comment'=>$commentProduct,
									'order_id'=>$order_id
									)
									,array('orderdetails_id'=>$orderdetails_id)
								);
							}

				    if($_POST['order_status'] == 3){
				    	$requestCompleted = true;
				    	$userEmailData = $this->StoreSupplies_Admin_m->orderUserInformation($_POST['order_id'][$key]);
				    	$productDetails = $this->StoreSupplies_Admin_m->selectedOrdersForEmail($_POST['order_id'][$key]);
						$userName = $userEmailData[0]["emp_name"];
						$userEmail = $userEmailData[0]["emp_email"];
						$userRole = $userEmailData[0]["role_name"];
						$userStore = $userEmailData[0]["store_name"];
						$userStoreUid = $userEmailData[0]["store_uId"];
						$userMarket = $userEmailData[0]["market_name"];
						$order_id = $_POST['order_id'][$key];
							$orderdetails_id = $_POST['orderdetails_id'][$key];
							$order_status = $_POST['order_status'];
							$order_finalStatusComment = $_POST['order_finalStatusComment'];
						    $product_id = $_POST['product_id'][$key];
							$availableProduct = $_POST['avl'][$key];
							$requireProduct = $_POST['rmt'][$key];
							$commentProduct = $_POST['cmt'][$key];
							$fStatus = $_POST['fStatus'][$key];
							if($_POST['fStatus'][$key] == 3){
                                $fStatus = 1;
							}
							$this->db->update('orders',
									  array('status_id'=>$order_status,'order_finalStatusComment'=>$order_finalStatusComment,
									 	'APP_EMP_ID'=>$emp_id)
									,array('order_id'=>$order_id)
									);
							$this->db->update('orderdetails',
								array(
									'product_id'=>$product_id,
									'orderdetails_availableStock'=>$availableProduct,
									'orderdetails_requiredItems'=>$requireProduct,
									'financeStatus_Id'=>$fStatus,
									'orderdetails_comment'=>$commentProduct,
									'order_id'=>$order_id
									)
									,array('orderdetails_id'=>$orderdetails_id)
								);
						}
						if($_POST['order_status'] == 4){
				    	$requestDeclined = true;
				    	$userEmailData = $this->StoreSupplies_Admin_m->orderUserInformation($_POST['order_id'][$key]);
				    	$productDetails = $this->StoreSupplies_Admin_m->selectedOrdersForEmail($_POST['order_id'][$key]);
						$userName = $userEmailData[0]["emp_name"];
						$userEmail = $userEmailData[0]["emp_email"];
						$userRole = $userEmailData[0]["role_name"];
						$userStore = $userEmailData[0]["store_name"];
						$userStoreUid = $userEmailData[0]["store_uId"];
						$userMarket = $userEmailData[0]["market_name"];
						$order_id = $_POST['order_id'][$key];
							$orderdetails_id = $_POST['orderdetails_id'][$key];
							$order_status = $_POST['order_status'];
							$order_finalStatusComment = $_POST['order_finalStatusComment'];
						    $product_id = $_POST['product_id'][$key];
							$availableProduct = $_POST['avl'][$key];
							$requireProduct = $_POST['rmt'][$key];
							$commentProduct = $_POST['cmt'][$key];
							$this->db->update('orders',
									  array('status_id'=>$order_status,'order_finalStatusComment'=>$order_finalStatusComment,
									 	'APP_EMP_ID'=>$emp_id)
									,array('order_id'=>$order_id)
									);
							$this->db->update('orderdetails',
								array(
									'product_id'=>$product_id,
									'orderdetails_availableStock'=>$availableProduct,
									'orderdetails_requiredItems'=>$requireProduct,
									'financeStatus_Id'=>2,
									'orderdetails_comment'=>$commentProduct,
									'order_id'=>$order_id
									)
									,array('orderdetails_id'=>$orderdetails_id)
								);
						}
					
			}
			if($requestCompleted) {
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
		        $this->email->from($adminEmail,$adminName);
				$storeSuppliesUsers = 'supplies@mobilelinkusa.com';
				$email_list = $userEmail;
				$this->email->to($email_list);
				$this->email->cc($storeSuppliesUsers);
				$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
				$this->email->set_mailtype("html");
				$this->email->subject('storeSupplies Request Completed ');
					 
				$body = $this->load->view('email/request_complete.php',array(
					'request_date'=> $date,
					'user_name'=> $userName,
					'user_role'=> $userRole,
					'market_name'=> $userMarket,
					'store_name'=> $userStore,
					'store_uid'=> $userStoreUid,
					'order_details'=> $productDetails,
					),TRUE);
				$this->email->message($body);   
		        $this->email->send();

			}
			if($requestDeclined) {
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
		        $this->email->from($adminEmail,$adminName);
				$storeSuppliesUsers = 'supplies@mobilelinkusa.com';
				$email_list = $userEmail;
				$this->email->to($email_list);
				$this->email->cc($storeSuppliesUsers);
				$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
				$this->email->set_mailtype("html");
				$this->email->subject('storeSupplies Request Declined ');
					 
				$body = $this->load->view('email/decline_email.php',array(
					'request_date'=> $date,
					'user_name'=> $userName,
					'user_role'=> $userRole,
					'market_name'=> $userMarket,
					'store_name'=> $userStore,
					'store_uid'=> $userStoreUid,
					'order_details'=> $productDetails,
					),TRUE);
				$this->email->message($body);   
		        $this->email->send();

			}
		$data = array('status'=>'Order Edited'); 
		echo json_encode($data); 
	}
	public function storeSupplies_fnanceEditOrder(){
		check_admin_login();
		$data = array();
        $emp_id= $this->session->userdata('id');
			foreach($_POST['orderdetails_id'] as $key => $value) { 

					$order_id = $_POST['order_id'][$key];
					$orderdetails_id = $_POST['orderdetails_id'][$key];
				    $product_id = $_POST['product_id'][$key];
					$availableProduct = $_POST['avl'][$key];
					$requireProduct = $_POST['rmt'][$key];
					$commentProduct = $_POST['cmt'][$key];
					$fStatus = $_POST['fStatus'][$key];
					$this->db->update('orders',
							 array('status_id'=>2,'APP_EMP_ID'=>$emp_id)
							,array('order_id'=>$order_id)
							);
					$this->db->update('orderdetails',
						array(
							'product_id'=>$product_id,
							'orderdetails_availableStock'=>$availableProduct,
							'orderdetails_requiredItems'=>$requireProduct,
							'financeStatus_Id'=>$fStatus,
							'orderdetails_comment'=>$commentProduct,
							'order_id'=>$order_id
							)
							,array('orderdetails_id'=>$orderdetails_id)
						);
			}
			
		$data = array('status'=>'Order Edited'); 
		echo json_encode($data); 
	}
	public function storeSupplies_ordersExportExcel(){
		check_admin_login();
       if(isset($_POST["Export"])){
			header('Content-Type: text/csv; charset=utf-8');  
			header('Content-Disposition: attachment; filename=storeSupplies_orderList.csv');  
			$output = fopen("php://output", "w");  
			fputcsv($output, array('Order S.No', 'Order Date', 'Order Ticket No','Store Name', 'Store UID', 'Prdouct Name','Prdouct Unit','Prdouct Code', 'Available Quantity', 'Requirement Quantity', 'User Product Comment', 'Finace Status', 'Supplies Status', 'Supplies Status Comment')); 
			$obj =$this->StoreSupplies_Admin_m->exportOrders();
			if($obj){
				foreach ($obj as $value) {
				fputcsv($output, $value); 
				}
				fclose($output);
			
			}
			else{
				fputcsv($output, array('Not Found', 'Not Found','Not Found','Not Found', 'Not Found', 'Not Found', 'Not Found','Not Found', 'Not Found', 'Not Found', 'Not Found','Not Found','Not Found','Not Found'));  
				fclose($output);  
				
			} 
	   }
	

	}
	public function storeSupplies_completedOrdersExportExcel(){
		check_admin_login();
       if(isset($_POST["Export"])){
			header('Content-Type: text/csv; charset=utf-8');  
			header('Content-Disposition: attachment; filename=storeSupplies_orderList.csv');  
			$output = fopen("php://output", "w");  
			fputcsv($output, array('Order S.No', 'Order Date', 'Order Ticket No','Store Name', 'Store UID', 'Prdouct Name','Prdouct Unit','Prdouct Code', 'Available Quantity', 'Requirement Quantity', 'User Product Comment', 'Finace Status', 'Supplies Status', 'Supplies Status Comment')); 
			$obj =$this->StoreSupplies_Admin_m->exportCompleteOrders();
			if($obj){
				foreach ($obj as $value) {
				fputcsv($output, $value); 
				}
				fclose($output);
			
			}
			else{
				fputcsv($output, array('Not Found', 'Not Found','Not Found','Not Found', 'Not Found', 'Not Found','Not Found', 'Not Found', 'Not Found', 'Not Found','Not Found','Not Found','Not Found','Not Found'));  
				fclose($output);  
				
			} 
	   }
	

	}
	public function storeSupplies_declinedOrdersExportExcel(){
		check_admin_login();
       if(isset($_POST["Export"])){
			header('Content-Type: text/csv; charset=utf-8');  
			header('Content-Disposition: attachment; filename=storeSupplies_orderList.csv');  
			$output = fopen("php://output", "w");  
			fputcsv($output, array('Order S.No', 'Order Date', 'Order Ticket No','Store Name', 'Store UID', 'Prdouct Name','Prdouct Unit','Prdouct Code', 'Available Quantity', 'Requirement Quantity', 'User Product Comment', 'Finace Status', 'Supplies Status', 'Supplies Status Comment')); 
			$obj =$this->StoreSupplies_Admin_m->exportDeclinedOrders();
			if($obj){
				foreach ($obj as $value) {
				fputcsv($output, $value); 
				}
				fclose($output);
			
			}
			else{
				fputcsv($output, array('Not Found', 'Not Found','Not Found','Not Found', 'Not Found', 'Not Found','Not Found', 'Not Found', 'Not Found', 'Not Found','Not Found','Not Found','Not Found','Not Found'));  
				fclose($output);  
				
			} 
	   }
	

	}
	 public function suppliesChart(){
		    $year=array(1,2,3,4,5,6,7,8,9,10,11,12);
			$reviewcount=array(0,0,0,0,0,0,0,0,0,0,0,0);
			foreach ($year as $key => $month){
				$mcount = $this->StoreSupplies_Admin_m->suppliesMonthlyOrders($month);
				
				for($i = 0; $i < count($mcount); $i++) {
						if($month == $mcount[$i]["selectMONTH"]){
							$reviewcount[$key] = (int)$mcount[$i]["totalOrders"];
						}
					}
			}
			
			
	   $data = array('status'=> 'success' ,'chartArray'=>$reviewcount);
       echo json_encode($data);
	}
	public function logout(){
	 $this->session->sess_destroy();
	 redirect(base_url());
	}
// --   inventory Dashbaord 

	



// 	public function getUserDetails(){
// 		$user = $this->StoreSupplies_Admin_m->getUserDetails($_POST);
// 		$data = array();
// 		if($user){
// 			$data = array('status'=> 'get' ,'object'=> $user);
// 		}
// 		else{
// 			$data = array('status'=> 'error' ,'object'=>$user);
// 		}
// 		 echo json_encode($data);
// 	}


//    public function users(){
// 	   check_admin_login();
// 	       $data["allUsers"]=$this->StoreSupplies_Admin_m->alluser();
// 	       $data["allDepartments"]=$this->StoreSupplies_Admin_m->allDepartment();
// 		   $data["allDesignations"]=$this->StoreSupplies_Admin_m->allDesignation();
// 		   $data["allRoles"]=$this->StoreSupplies_Admin_m->allRole(); 
// 		   $this->load->view('admin/header');
// 		   $this->load->view('admin/users',$data);
// 		   $this->load->view('admin/footer');
// 	}
	

//    public function requests(){
// 	   check_admin_login();
// 	       $data["allDepartments"]=$this->StoreSupplies_Admin_m->allDepartment();
// 		   $data["allDesignations"]=$this->StoreSupplies_Admin_m->allDesignation();
// 		   $data["allRoles"]=$this->StoreSupplies_Admin_m->allRole(); 
// 	       $data["allRequests"] = $this->StoreSupplies_Admin_m->allRequests();
// 		   $data["allLeaveStatus"] = $this->StoreSupplies_Admin_m->allLeaveStatus();
// 		   $this->load->view('admin/header');
// 		   $this->load->view('admin/requests',$data);
// 		   $this->load->view('admin/footer');
// 	}

//    public function addDepart(){
// 	    $add = $this->StoreSupplies_Admin_m->addDepartment($_POST);
// 		   $data = array();
// 		   if($add == "exist"){
//               $data = array('status'=> 'exist' ,'object'=>$add);
// 		   }
// 		   else if($add){
//               $data = array('status'=> 'added' ,'object'=>$add);
// 		   }
// 		   else{
//               $data = array('status'=> 'error' ,'object'=>$add);
// 		   }
// 		   echo json_encode($data);
// 	}

//    public function addDesg(){
// 		   $add =$this->StoreSupplies_Admin_m->addDesignation($_POST);
// 		   $data = array();
// 		   if($add == "exist"){
//               $data = array('status'=> 'exist' ,'object'=>$add);
// 		   }
// 		   else if($add){
//               $data = array('status'=> 'added' ,'object'=>$add);
// 		   }
// 		   else{
//               $data = array('status'=> 'error' ,'object'=>$add);
// 		   }
// 		   echo json_encode($data);
// 	}

//    public function addUser(){	
// 		   $add =$this->StoreSupplies_Admin_m->addUser($_POST);
// 		   $data = array();
// 		   if($add == "exist"){
//               $data = array('status'=> 'exist' ,'object'=>$add);
// 		   }
// 		   else if($add){
//               $data = array('status'=> 'added' ,'object'=>$add);
// 		   }
// 		   else{
//               $data = array('status'=> 'error' ,'object'=>$add);
// 		   }
// 		   echo json_encode($data);
// 	}
// 	public function editUser(){	
// 		   $obj =$this->StoreSupplies_Admin_m->editUser($_POST);
// 		   $data = array();
// 		   if($obj == "exist"){
//               $data = array('status'=> 'exist' ,'object'=>$obj);
// 		   }
// 		   else if($obj){
//               $data = array('status'=> 'edited' ,'object'=>$obj);
// 		   }
// 		   else{
//               $data = array('status'=> 'error' ,'object'=>$obj);
// 		   }
// 		   echo json_encode($data);

// 	}
// 	public function getUserRequest(){	
// 		   $obj =$this->StoreSupplies_Admin_m->getUserRequest($_POST);
// 		   $data = array();
// 		   if($obj){
//               $data = array('status'=> 'get' ,'object'=>$obj);
// 		   }
// 		   else{
//               $data = array('status'=> 'error' ,'object'=>$obj);
// 		   }
// 		   echo json_encode($data);

// 	}

// 	public function editRequest(){	
// 		   $data = array();  
// 		   $obj =$this->StoreSupplies_Admin_m->editRequest($_POST);
// 		   if($obj == 'exist'){
//               $data = array('status'=> 'exist' ,'object'=>$obj);
// 		   }
// 		   else if($obj){
// 			  $req_obj =$this->StoreSupplies_Admin_m->getRequest($obj);
// 			  if($req_obj[0]["LREQ_STATUS_ID"] == 4){
// 				  $config = Array(        
// 						'protocol' => 'smtp',
// 						'smtp_host' => 'ssl://secure.emailsrvr.com',
// 						'smtp_port' => 465,
// 						'smtp_user' => 'fahad_ahmed@mobilelinkusa.com',
// 						'smtp_pass' => 'zarams12',
// 						'smtp_timeout' => '4',
// 						'mailtype'  => 'html', 
// 						'charset'   => 'iso-8859-1'
// 					);
// 					$this->load->library('email', $config);
// 					$this->email->set_newline("\r\n");
// 					$this->email->set_mailtype("html");
// 					$this->email->from($this->session->userdata('email'),$this->session->userdata('name'));
// 					$manager_data = $this->manager_m->userDetails($req_obj[0]["LREQ_APP_ID"]); ;
// 					$requester_email = $req_obj[0]["EMP_EMAIL"];
// 					$manager_email = $manager_data[0]["EMP_EMAIL"];
// 					$email_list = $manager_email.",".$requester_email;
// 					$this->email->to($email_list);
					
// 					//$this->email->cc('arif_khan@mobilelinkusa.com');
// 					$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
// 					$this->email->set_mailtype("html");
// 					$this->email->subject('Employee Leave System Request');
// 					$data = array(
// 						'employee_name'=>$req_obj[0]["EMP_NAME"],
// 						'employee_department'=>$req_obj[0]["DEPT_NAME"],
// 						'manager_name'=> $manager_data[0]["EMP_NAME"],
// 						'hr_manager_name'=> $this->session->userdata('name'),
// 						'hr_manager_department'=> $this->session->userdata('department')
// 						);  
						
// 					$body = $this->load->view('email/done_hr.php',$data,TRUE);
// 					$this->email->message($body);   
// 					$this->email->send();
//                     $data = array('status'=> 'edited' ,'object'=>$req_obj[0]);
// 			  }
// 			  else{
// 				  $data = array('status'=> 'edited' ,'object'=>$req_obj[0]);
// 			  }

// 		   }
// 		   else if($obj == 'edited') {
//               $data = array('status'=> 'edited' ,'object'=>$obj);
// 		   }
// 		   else{
//               $data = array('status'=> 'error' ,'object'=>$obj);
// 		   }
// 		   echo json_encode($data);

// 	}
	// public function email($request_date){
	// 		$config = Array(        
	// 			'protocol' => 'smtp',
	// 			'smtp_host' => 'ssl://secure.emailsrvr.com',
	// 			'smtp_port' => 465,
	// 			'smtp_user' => 'fahad_ahmed@mobilelinkusa.com',
	// 			'smtp_pass' => 'zarams12',
	// 			'smtp_timeout' => '4',
	// 			'mailtype'  => 'html', 
	// 			'charset'   => 'iso-8859-1'
	// 		);
	// 		$this->load->library('email', $config);
	// 		$this->email->set_newline("\r\n");
	// 		$this->email->set_mailtype("html");
	// 		$this->email->from($this->session->userdata('email'),$this->session->userdata('name'));
	// 		$manager_email = $this->StoreSupplies_Admin_m->selectMatchUserAllInfo($this->session->userdata('v_email'));
	// 		$sd = $manager_email[0]['sd_email'];
	// 		$tm = $manager_email[0]['tm_email'];
	// 		$cm = $manager_email[0]['cm_email'];
	// 		$email_list = $sd.",".$tm.",".$cm;
	// 		$this->email->to($email_list);
			
	// 		//$this->email->cc('arif_khan@mobilelinkusa.com');
	// 		$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
	// 		$this->email->set_mailtype("html");
	// 		$this->email->subject('Time Correction Request');
	// 		$data = array(
	// 			'request_startDate'=> $request_startDate,
	// 			'request_startDate'=> $request_endDate,
	// 			'user_name'=> $manager_email[0]['u_name'],
	// 			'user_role'=> $manager_email[0]['r_name'],
	// 			'store_name'=> $manager_email[0]['s_name'],
	// 			);  
				
	// 		$body = $this->load->view('email/email_request.php',$data,TRUE);
	// 		$this->email->message($body);   
	// 		$this->email->send();
	// 	}

// 	public function userFileProcess(){
// 	   if(isset($_FILES['file']['name'])){
// 		  $array = explode('.', $_FILES['file']['name']);
//            $extension = end($array);
// 			if($extension == 'csv'){
// 				if($_FILES["file"]["size"] < 8388608){
// 					$filename=$_FILES["file"]["tmp_name"];		
// 					if($_FILES["file"]["size"] > 0)
// 					{
// 						$file = fopen($filename, "r");
// 						while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
// 						{
// 						$obj =$this->StoreSupplies_Admin_m->importUserSheet($getData);
// 							if($obj == 'exist')
// 							{
// 								echo "<script type=\"text/javascript\">
// 								alert('Data Already Exist')
// 								window.location= 'users';
// 								</script>";	
// 							}
// 							if($obj == 'true')
// 							{
// 								echo "<script type=\"text/javascript\">
// 								alert('Data has been Inserted')
// 								window.location= 'users';
// 								</script>";	
// 							}
// 							else {
// 								echo "<script type=\"text/javascript\">
// 								alert('Kindly Select Correct CSV FILE')
// 								window.location= 'users';
// 								</script>";	
								
// 							}
// 						}
// 						fclose($file);
						
// 					}
// 				}
// 				else{
// 					echo "<script type=\"text/javascript\">
// 								alert('Kindly Select Small Size File')
// 								window.location= 'users';
// 								</script>";
// 				}
// 			}
// 			else{
// 				echo "<script type=\"text/javascript\">
// 							alert('Kindly Select CSV FILE')
// 							window.location= 'users';
// 							</script>";
// 			}
// 		}

//   }	
// 	public function exportUsers(){
//        if(isset($_POST["Export"])){
// 			header('Content-Type: text/csv; charset=utf-8');  
// 			header('Content-Disposition: attachment; filename=employees.csv');  
// 			$output = fopen("php://output", "w");  
// 			fputcsv($output, array('Batch ID', 'Name', 'Father Name', 'CNIC', 'Contact', 'EMAIL', 'Date of Birth', 'Joining Date', 'Address', 'Department',  'Designation','Role','Taken Annuals','Taken Sicks')); 
// 			$obj =$this->StoreSupplies_Admin_m->exportUsers($_POST);
// 			if($obj){
// 				foreach ($obj as $value) {
// 				fputcsv($output, $value); 
// 				}
// 				fclose($output);
			
// 			}
// 			else{
// 				fputcsv($output, array('0', '0', '0', '0','0', '0', '0', '0','0', '0', '0', '0','0','0'));  
// 				fclose($output);  
				
// 			} 
// 	   }
	
//   }	


//   public function requestFileProcess(){
// 	 if(isset($_FILES['requestFile']['name'])){
// 		  $array = explode('.', $_FILES['requestFile']['name']);
//            $extension = end($array);
// 			if($extension == 'csv'){
// 				if($_FILES["requestFile"]["size"] < 8388608){
// 					$filename=$_FILES["requestFile"]["tmp_name"];		
// 					if($_FILES["requestFile"]["size"] > 0)
// 					{
// 						$file = fopen($filename, "r");
// 						while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
// 						{
// 						$obj =$this->StoreSupplies_Admin_m->importRequestsSheet($getData);
// 							if($obj == 'exist')
// 							{
// 								echo "<script type=\"text/javascript\">
// 								alert('Data Already Exist')
// 								window.location= 'requests';
// 								</script>";	
// 							}
// 							if($obj == 'true')
// 							{
// 								echo "<script type=\"text/javascript\">
// 								alert('Data has been Inserted')
// 								window.location= 'requests';
// 								</script>";	
// 							}
// 							else {
// 								echo "<script type=\"text/javascript\">
// 								alert('Kindly Select Correct CSV FILE')
// 								window.location= 'requests';
// 								</script>";	
								
// 							}
// 						}
// 						fclose($file);
						
// 					}
// 				}
// 				else{
// 					echo "<script type=\"text/javascript\">
// 								alert('Kindly Select Small Size File')
// 								window.location= 'requests';
// 								</script>";
// 				}
// 			}
// 			else{
// 				echo "<script type=\"text/javascript\">
// 							alert('Kindly Select CSV FILE')
// 							window.location= 'requests';
// 							</script>";
// 			}
// 		}

//   }	
// 	public function exportRequests(){
//        if(isset($_POST["Export"])){
// 			header('Content-Type: text/csv; charset=utf-8');  
// 			header('Content-Disposition: attachment; filename=requests.csv');  
// 			$output = fopen("php://output", "w");  
// 			fputcsv($output, array('Batch ID', 'Name', 'Start Date', 'End Date','Leave Type', 'Requestor Comment', 'Leave Status')); 
// 			$obj =$this->StoreSupplies_Admin_m->exportRequests($_POST);
// 			if($obj){
// 				foreach ($obj as $value) {
// 				fputcsv($output, $value); 
// 				}
// 				fclose($output);
			
// 			}
// 			else{
// 				fputcsv($output, array('0', '0', '0', '0','0', '0', '0', '0','0'));  
// 				fclose($output);  
				
// 			} 
// 	   }
	
//   }	
//   	public function adminChart(){
// 	   $data = array('status'=> 'success' ,'departmentArray'=>$allDepartmentNames,'employeeArray'=>$allEmployeesNames,'leaveDays'=>$allEmployeesLeaveDays);
//        echo json_encode($data);
	
//   }	
	

}
?>