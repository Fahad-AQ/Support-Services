<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SAdmin extends CI_Controller {

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
	  	if($this->session->userdata('roleId') == '1'  && $this->session->userdata('empStatus') == '1' ){
			  redirect(base_url("SAdmin/dashboard"));
			}
		else{
			$this->load->view('SAdmin/login');
		}
	}


	public function dashboard(){
		check_superAdmin_login();
		$data["employees"] = $this->SAdmin_m->getEmployees();

		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/dashboard',$data);
		$this->load->view('SAdmin/footer');

	}

	public function addProduct(){
		check_superAdmin_login();
		$data["categorys"] = $this->SAdmin_m->getCategory();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addProduct',$data);
		$this->load->view('SAdmin/footer');
	}

	public function add_productForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_product_exist = $this->SAdmin_m->check_product_exist($_POST);
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
							'product_isActive'=>1
							)
						);
			$data = array('status'=>'Order Added'); 
		}
		echo json_encode($data); 
	}
	public function editProduct()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedproduct_exist = $this->SAdmin_m->check_editedproduct_exist($_POST);
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
							'product_isActive'=>$product_isActive
							),
							array(
							'product_id'=>$product_id
							)
						);
			$data = array('status'=>'Product Edited'); 
		}
		echo json_encode($data); 
	}

	public function editProductModel(){
		check_superAdmin_login();
		$data['selected_products'] = $this->SAdmin_m->selected_product($_POST);
		$data["categorys"] = $this->SAdmin_m->getCategory();
		$output = array('html'=>$this->load->view("SAdmin/models/editProduct",$data, true)); 
		echo json_encode($output);
	}
	public function productList(){
		check_superAdmin_login();
		$data["products"] = $this->SAdmin_m->getProducts();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/productList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function marketList(){
		check_superAdmin_login();
		$data["markets"] = $this->SAdmin_m->getMarkets();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/marketList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function addMarket(){
		check_superAdmin_login();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addMarket');
		$this->load->view('SAdmin/footer');
	}
	public function add_MarketForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_market_exist = $this->SAdmin_m->check_market_exist($_POST);
		if($check_market_exist){
			$data = array('status' => 'Market Already Exist');
		}
		else{
			$market_name = $_POST['market_name'];
			$this->db->insert('markets',
						array(
							'market_name'=>$market_name,
							'market_status'=>1
							)
						);
			$data = array('status'=>'Market Added'); 
		}
		echo json_encode($data); 
	}
	public function editMarket()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedmarket_exist = $this->SAdmin_m->check_editedmarket_exist($_POST);
		if($check_editedmarket_exist){
			$data = array('status' => 'Market Already Exist');
		}
		else{
			$market_id = $_POST['market_id'];
			$market_name = $_POST['market_name'];
			$market_status = $_POST['market_status'];
			$this->db->update('markets',
						array(
							'market_name'=>$market_name,
							'market_status'=>$market_status,
							),
							array(
							'market_id'=>$market_id
							)
						);
			$data = array('status'=>'Market Edited'); 
		}
		echo json_encode($data); 
	}

	public function editMarketModel(){
		check_superAdmin_login();
		$data['selected_markets'] = $this->SAdmin_m->selected_market($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editMarket",$data, true)); 
		echo json_encode($output);
	}
	public function storeList(){
		check_superAdmin_login();
		$data["stores"] = $this->SAdmin_m->getStores();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/storeList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function addStore(){
		check_superAdmin_login();
		$data["markets"] = $this->SAdmin_m->getMarkets();
		$data["sds"] = $this->SAdmin_m->getSds();
		$data["tms"] = $this->SAdmin_m->getTms();
		$data["cms"] = $this->SAdmin_m->getCms();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addStore',$data);
		$this->load->view('SAdmin/footer');
	}
	public function add_StoreForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_store_exist = $this->SAdmin_m->check_store_exist($_POST);
		if($check_store_exist){
			$data = array('status' => 'Store Already Exist');
		}
		else{
			$store_name = $_POST['store_name'];
			$store_uId = $_POST['store_uId'];
			$market_id = $_POST['market_id'];
			$sd_id = $_POST['sd_id'];
			$tm_id = $_POST['tm_id'];
			$cm_id = $_POST['cm_id'];
			$this->db->insert('stores',
						array(
							'store_name'=>$store_name,
							'store_uId'=>$store_uId,
							'market_id'=>$market_id,
							'sd_id'=>$sd_id,
							'tm_id'=>$tm_id,
							'cm_id'=>$cm_id,
							'store_status'=>1
							)
						);
			$data = array('status'=>'Store Added'); 
		}
		echo json_encode($data); 
	}
	public function editStore()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedstore_exist = $this->SAdmin_m->check_editedstore_exist($_POST);
		if($check_editedstore_exist){
			$data = array('status' => 'Store Already Exist');
		}
		else{
			$store_id = $_POST['store_id'];
			$store_name = $_POST['store_name'];
			$store_uId = $_POST['store_uId'];
			$market_id = $_POST['market_id'];
			$sd_id = $_POST['sd_id'];
			$tm_id = $_POST['tm_id'];
			$cm_id = $_POST['cm_id'];
			$store_status = $_POST['store_status'];
			$this->db->update('stores',
						array(
							'store_name'=>$store_name,
							'store_uId'=>$store_uId,
							'market_id'=>$market_id,
							'sd_id'=>$sd_id,
							'tm_id'=>$tm_id,
							'cm_id'=>$cm_id,
							'store_status'=>$store_status 
							),
							array(
							'store_id'=>$store_id
							)
						);
			$data = array('status'=>'Store Edited'); 
		}
		echo json_encode($data); 
	}

	public function editStoreModel(){
		check_superAdmin_login();
		$data["markets"] = $this->SAdmin_m->getMarkets();
		$data["sds"] = $this->SAdmin_m->getSds();
		$data["tms"] = $this->SAdmin_m->getTms();
		$data["cms"] = $this->SAdmin_m->getCms();
		$data['selected_stores'] = $this->SAdmin_m->selected_store($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editStore",$data, true)); 
		echo json_encode($output);
	}
	public function SDList(){
		check_superAdmin_login();
		$data["sds"] = $this->SAdmin_m->getSds();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/SDList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function addSD(){
		check_superAdmin_login();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addStoreSD');
		$this->load->view('SAdmin/footer');
	}
	public function add_SDForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_SD_exist = $this->SAdmin_m->check_SD_exist($_POST);
		if($check_SD_exist){
			$data = array('status' => 'SD Already Exist');
		}
		else{
			$sd_name = $_POST['sd_name'];
			$sd_email = $_POST['sd_email'];

			$this->db->insert('sd',
						array(
							'sd_name'=>$sd_name,
							'sd_email'=>$sd_email,
							)
						);
			$data = array('status'=>'SD Added'); 
		}
		echo json_encode($data); 
	}
	public function editSD()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedsd_exist = $this->SAdmin_m->check_editedsd_exist($_POST);
		if($check_editedsd_exist){
			$data = array('status' => 'SD Already Exist');
		}
		else{
			$sd_id = $_POST['sd_id'];
			$sd_name = $_POST['sd_name'];
			$sd_email = $_POST['sd_email'];
			$this->db->update('sd',
						array(
							'sd_name'=>$sd_name,
							'sd_email'=>$sd_email,
							),
							array(
							'sd_id'=>$sd_id
							)
						);
			$data = array('status'=>'SD Edited'); 
		}
		echo json_encode($data); 
	}

	public function editSDModel(){
		check_superAdmin_login();
		$data['selected_sd'] = $this->SAdmin_m->selected_sd($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editSD",$data, true)); 
		echo json_encode($output);
	}
	public function TMList(){
		check_superAdmin_login();
		$data["tms"] = $this->SAdmin_m->getTms();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/TMList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function addTM(){
		check_superAdmin_login();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addStoreTM');
		$this->load->view('SAdmin/footer');
	}
	public function add_TMForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_TM_exist = $this->SAdmin_m->check_TM_exist($_POST);
		if($check_TM_exist){
			$data = array('status' => 'TM Already Exist');
		}
		else{
			$tm_name = $_POST['tm_name'];
			$tm_email = $_POST['tm_email'];

			$this->db->insert('tm',
						array(
							'tm_name'=>$tm_name,
							'tm_email'=>$tm_email,
							)
						);
			$data = array('status'=>'TM Added'); 
		}
		echo json_encode($data); 
	}
	public function editTM()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedtm_exist = $this->SAdmin_m->check_editedtm_exist($_POST);
		if($check_editedtm_exist){
			$data = array('status' => 'TM Already Exist');
		}
		else{
			$tm_id = $_POST['tm_id'];
			$tm_name = $_POST['tm_name'];
			$tm_email = $_POST['tm_email'];
			$this->db->update('tm',
						array(
							'tm_name'=>$tm_name,
							'tm_email'=>$tm_email,
							),
							array(
							'tm_id'=>$tm_id
							)
						);
			$data = array('status'=>'TM Edited'); 
		}
		echo json_encode($data); 
	}

	public function editTMModel(){
		check_superAdmin_login();
		$data['selected_tm'] = $this->SAdmin_m->selected_tm($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editTM",$data, true)); 
		echo json_encode($output);
	}
	public function CMList(){
		check_superAdmin_login();
		$data["cms"] = $this->SAdmin_m->getCms();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/CMList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function addCM(){
		check_superAdmin_login();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addStoreCM');
		$this->load->view('SAdmin/footer');
	}
	public function add_CMForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_cm_exist = $this->SAdmin_m->check_CM_exist($_POST);
		if($check_cm_exist){
			$data = array('status' => 'CM Already Exist');
		}
		else{
			$cm_name = $_POST['cm_name'];
			$cm_email = $_POST['cm_email'];

			$this->db->insert('cm',
						array(
							'cm_name'=>$cm_name,
							'cm_email'=>$cm_email,
							)
						);
			$data = array('status'=>'CM Added'); 
		}
		echo json_encode($data); 
	}
	public function editCM()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedcm_exist = $this->SAdmin_m->check_editedcm_exist($_POST);
		if($check_editedcm_exist){
			$data = array('status' => 'CM Already Exist');
		}
		else{
			$cm_id = $_POST['cm_id'];
			$cm_name = $_POST['cm_name'];
			$cm_email = $_POST['cm_email'];
			$this->db->update('cm',
						array(
							'cm_name'=>$cm_name,
							'cm_email'=>$cm_email,
							),
							array(
							'cm_id'=>$cm_id
							)
						);
			$data = array('status'=>'CM Edited'); 
		}
		echo json_encode($data); 
	}

	public function editCMModel(){
		check_superAdmin_login();
		$data['selected_cm'] = $this->SAdmin_m->selected_cm($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editCM",$data, true)); 
		echo json_encode($output);
	}
	public function employeeList(){
		check_superAdmin_login();
		$data["employees"] = $this->SAdmin_m->getEmployees();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/employeeList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function addEmployee(){
		check_superAdmin_login();
		$data["employees"] = $this->SAdmin_m->getEmployees();
		$data["stores"] = $this->SAdmin_m->getStores();
		$data["roles"] = $this->SAdmin_m->getRoles();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/addEmployee',$data);
		$this->load->view('SAdmin/footer');
	}
	public function add_EmployeeForm()
	{
		check_superAdmin_login();
		$data = array();
		$check_employee_exist = $this->SAdmin_m->check_employee_exist($_POST);
		if($check_employee_exist){
			$data = array('status' => 'Employee Already Exist');
		}
		else{
			$emp_name = $_POST['emp_name'];
			$emp_email = $_POST['emp_email'];
			$emp_adpId = $_POST['emp_adpId'];
			$role_id = $_POST['role_id'];
			$store_id = $_POST['store_id'];
			$emp_type = $_POST['emp_type'];
			$this->db->insert('employee',
						array(
							'emp_name'=>$emp_name,
							'emp_email'=>$emp_email,
							'emp_adpId'=>$emp_adpId,
							'role_id'=>$role_id,
							'store_id'=>$store_id,
							'emp_type'=>$emp_type,
							'emp_status'=> 1
							)
						);
			$data = array('status'=>'Employee Added'); 
		}
		echo json_encode($data); 
	}
	public function editEmployee()
	{
		check_superAdmin_login();
		$data = array();
		$check_editedemployee_exist = $this->SAdmin_m->check_editedemployee_exist($_POST);
		if($check_editedemployee_exist){
			$data = array('status' => 'Employee Already Exist');
		}
		else{
			$emp_id = $_POST['emp_id'];
			$emp_name = $_POST['emp_name'];
			$emp_email = $_POST['emp_email'];
			$emp_adpId = $_POST['emp_adpId'];
			$role_id = $_POST['role_id'];
			$store_id = $_POST['store_id'];
			$emp_type = $_POST['emp_type'];
			$emp_status = $_POST['emp_status'];
			$this->db->update('employee',
						array(
							'emp_name'=>$emp_name,
							'emp_email'=>$emp_email,
							'emp_adpId'=>$emp_adpId,
							'role_id'=>$role_id,
							'store_id'=>$store_id,
                            'emp_type'=>$emp_type,
							'emp_status'=> $emp_status 
							),
							array(
							'emp_id'=>$emp_id
							)
						);
			$data = array('status'=>'Employee Information Edited'); 
		}
		echo json_encode($data); 
	}

	public function editEmployeeModel(){
		check_superAdmin_login();
		$data["stores"] = $this->SAdmin_m->getStores();
		$data["roles"] = $this->SAdmin_m->getRoles();
		$data['selected_employees'] = $this->SAdmin_m->selected_employee($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editEmployee",$data, true)); 
		echo json_encode($output);
	}
    

    public function orderList(){
		check_superAdmin_login();
		$data["orders"] = $this->SAdmin_m->getOrders();
		$this->load->view('SAdmin/header');
		$this->load->view('SAdmin/orderList',$data);
		$this->load->view('SAdmin/footer');
	}
	public function viewOrderModel(){
		check_superAdmin_login();
		$data['selected_orders'] = $this->SAdmin_m->selectedOrders($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/viewOrder",$data, true)); 
		echo json_encode($output);
	}
	public function editOrderModel(){
		check_superAdmin_login();
		$data['status_array'] = $this->SAdmin_m->getStatus($_POST);
		$data['selected_orders'] = $this->SAdmin_m->selectedOrders($_POST);
		$output = array('html'=>$this->load->view("SAdmin/models/editOrder",$data, true)); 
		echo json_encode($output);
	}

	public function editOrder(){
		check_superAdmin_login();
		$data = array();
			$emp_id= $this->session->userdata('id');
			$store_id= $this->session->userdata('storeId');
			foreach($_POST['orderdetails_id'] as $key => $value) { 
					$order_status = $_POST['order_status'];
					$order_id = $_POST['order_id'][$key];
					$orderdetails_id = $_POST['orderdetails_id'][$key];
				    $product_id = $_POST['product_id'][$key];
					$availableProduct = $_POST['avl'][$key];
					$requireProduct = $_POST['rmt'][$key];
					$commentProduct = $_POST['cmt'][$key];
					$fStatus = $_POST['fStatus'][$key];
					$this->db->update('orders',
							 array('status_id'=>$order_status)
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
	public function ordersExportExcel(){
		check_superAdmin_login();
       if(isset($_POST["Export"])){
			header('Content-Type: text/csv; charset=utf-8');  
			header('Content-Disposition: attachment; filename=storeSupplies_orderList.csv');  
			$output = fopen("php://output", "w");  
			fputcsv($output, array('Order S.No', 'Order Date', 'Store Name', 'Store UID', 'Prdouct Name','Prdouct Unit','Prdouct Code', 'Available Quantity', 'Requirement Quantity', 'Finace Status', 'Supplies Status')); 
			$obj =$this->SAdmin_m->exportOrders();
			if($obj){
				foreach ($obj as $value) {
				fputcsv($output, $value); 
				}
				fclose($output);
			
			}
			else{
				fputcsv($output, array('0', '0','0', '0', '0','0', '0', '0', '0','0','0'));  
				fclose($output);  
				
			} 
	   }
	}

	public function logout(){
	 $this->session->sess_destroy();
	 redirect(base_url());
	}
// --   inventory Dashbaord 

// 	public function inventory_dashboard(){
// 		check_superAdmin_login();
// 		$orders = $this->user_m->getOrders();
//         if($orders){
// 				$pendingArray=array();
// 				$inprogressArray=array();
// 				$completedArray=array();
// 				$declinedarray=array();
// 				foreach ($orders as $order){
// 					if($order["status_id"] == 1){
// 				      array_push($pendingArray, $order);
// 					}
// 					else if($order["status_id"] == 2){
// 						 array_push($inprogressArray, $order);
// 					}
// 					else if($order["status_id"] == 3){
// 						array_push($completedArray, $order);
// 					}
// 					else{
// 						array_push($declinedarray, $order);
// 					}
// 				}
// 				$data["pendingCount"]=count($pendingArray);
// 				$data["inprogressCount"]=count($inprogressArray);
// 				$data["completedCount"]=count($completedArray);
// 				$data["declinedCount"]=count($declinedarray);
//         }
//         if(!$orders){
//         	$data["pendingCount"]=0;
// 			$data["inprogressCount"]=0;
// 			$data["completedCount"]=0;
// 			$data["declinedCount"]=0;
//         }
// 		$data["orders"] = $this->user_m->getOrders();
// 		$this->load->view('admin/inventory/header');
// 		$this->load->view('admin/inventory/dashboard',$data);
// 		$this->load->view('admin/inventory/footer');

// 	}
 
// // --   maintenance Dashbaord 
// public function maintenance_dashboard(){
// 		check_superAdmin_login();
// 		$orders = $this->user_m->getOrders();
//         if($orders){
// 				$pendingArray=array();
// 				$inprogressArray=array();
// 				$completedArray=array();
// 				$declinedarray=array();
// 				foreach ($orders as $order){
// 					if($order["status_id"] == 1){
// 				      array_push($pendingArray, $order);
// 					}
// 					else if($order["status_id"] == 2){
// 						 array_push($inprogressArray, $order);
// 					}
// 					else if($order["status_id"] == 3){
// 						array_push($completedArray, $order);
// 					}
// 					else{
// 						array_push($declinedarray, $order);
// 					}
// 				}
// 				$data["pendingCount"]=count($pendingArray);
// 				$data["inprogressCount"]=count($inprogressArray);
// 				$data["completedCount"]=count($completedArray);
// 				$data["declinedCount"]=count($declinedarray);
//         }
//         if(!$orders){
//         	$data["pendingCount"]=0;
// 			$data["inprogressCount"]=0;
// 			$data["completedCount"]=0;
// 			$data["declinedCount"]=0;
//         }
// 		$data["orders"] = $this->user_m->getOrders();
// 		$this->load->view('admin/travel/header');
// 		$this->load->view('admin/travel/dashboard',$data);
// 		$this->load->view('admin/travel/footer');

// 	}

// // --   Travel Dashbaord 

// public function travel_dashboard(){
// 		check_superAdmin_login();
// 		$orders = $this->user_m->getOrders();
//         if($orders){
// 				$pendingArray=array();
// 				$inprogressArray=array();
// 				$completedArray=array();
// 				$declinedarray=array();
// 				foreach ($orders as $order){
// 					if($order["status_id"] == 1){
// 				      array_push($pendingArray, $order);
// 					}
// 					else if($order["status_id"] == 2){
// 						 array_push($inprogressArray, $order);
// 					}
// 					else if($order["status_id"] == 3){
// 						array_push($completedArray, $order);
// 					}
// 					else{
// 						array_push($declinedarray, $order);
// 					}
// 				}
// 				$data["pendingCount"]=count($pendingArray);
// 				$data["inprogressCount"]=count($inprogressArray);
// 				$data["completedCount"]=count($completedArray);
// 				$data["declinedCount"]=count($declinedarray);
//         }
//         if(!$orders){
//         	$data["pendingCount"]=0;
// 			$data["inprogressCount"]=0;
// 			$data["completedCount"]=0;
// 			$data["declinedCount"]=0;
//         }
// 		$data["orders"] = $this->user_m->getOrders();
// 		$this->load->view('admin/travel/header');
// 		$this->load->view('admin/travel/dashboard',$data);
// 		$this->load->view('admin/travel/footer');

// 	}






// 	public function getUserDetails(){
// 		$user = $this->SAdmin_m->getUserDetails($_POST);
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
// 	   check_superAdmin_login();
// 	       $data["allUsers"]=$this->SAdmin_m->alluser();
// 	       $data["allDepartments"]=$this->SAdmin_m->allDepartment();
// 		   $data["allDesignations"]=$this->SAdmin_m->allDesignation();
// 		   $data["allRoles"]=$this->SAdmin_m->allRole(); 
// 		   $this->load->view('admin/header');
// 		   $this->load->view('admin/users',$data);
// 		   $this->load->view('admin/footer');
// 	}
	

//    public function requests(){
// 	   check_superAdmin_login();
// 	       $data["allDepartments"]=$this->SAdmin_m->allDepartment();
// 		   $data["allDesignations"]=$this->SAdmin_m->allDesignation();
// 		   $data["allRoles"]=$this->SAdmin_m->allRole(); 
// 	       $data["allRequests"] = $this->SAdmin_m->allRequests();
// 		   $data["allLeaveStatus"] = $this->SAdmin_m->allLeaveStatus();
// 		   $this->load->view('admin/header');
// 		   $this->load->view('admin/requests',$data);
// 		   $this->load->view('admin/footer');
// 	}

//    public function addDepart(){
// 	    $add = $this->SAdmin_m->addDepartment($_POST);
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
// 		   $add =$this->SAdmin_m->addDesignation($_POST);
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
// 		   $add =$this->SAdmin_m->addUser($_POST);
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
// 		   $obj =$this->SAdmin_m->editUser($_POST);
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
// 		   $obj =$this->SAdmin_m->getUserRequest($_POST);
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
// 		   $obj =$this->SAdmin_m->editRequest($_POST);
// 		   if($obj == 'exist'){
//               $data = array('status'=> 'exist' ,'object'=>$obj);
// 		   }
// 		   else if($obj){
// 			  $req_obj =$this->SAdmin_m->getRequest($obj);
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
	// 		$manager_email = $this->User_m->selectMatchUserAllInfo($this->session->userdata('v_email'));
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
// 						$obj =$this->SAdmin_m->importUserSheet($getData);
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
// 			$obj =$this->SAdmin_m->exportUsers($_POST);
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
// 						$obj =$this->SAdmin_m->importRequestsSheet($getData);
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
// 			$obj =$this->SAdmin_m->exportRequests($_POST);
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