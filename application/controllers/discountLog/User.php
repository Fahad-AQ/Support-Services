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
		$data["categorys"] = $this->DiscountLog_User_m->getCategory();
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
	
	
 

	public function logout(){
		 $this->session->sess_destroy();
		 redirect(base_url());
	}


	public function discountLog_dashboard(){
		check_user_login();
		$orders = $this->DiscountLog_User_m->discountLog_getOrders();
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
		$data["orders"] = $this->DiscountLog_User_m->discountLog_getOrders();
		$this->load->view('user/discountLog/header');
		$this->load->view('user/discountLog/dashboard',$data);
		$this->load->view('user/discountLog/footer');

	}
	public function discountLog_addOrder(){
		check_user_login();
		$data["stores"] = $this->DiscountLog_User_m->getStores();
		$this->load->view('user/discountLog/header');
		$this->load->view('user/discountLog/addOrder',$data);
		$this->load->view('user/discountLog/footer');
	}
	public function discountLog_orderList(){
		check_user_login();
		$data["orders"] = $this->DiscountLog_User_m->discountLog_getOrders();
		$this->load->view('user/discountLog/header');
		$this->load->view('user/discountLog/orderList',$data);
		$this->load->view('user/discountLog/footer');
	}

	public function discountLog_specialDicountList(){
		check_user_login();
		$data["specialOrders"] = $this->DiscountLog_User_m->discountLog_getSpecialOrders();
		$this->load->view('user/discountLog/header');
		$this->load->view('user/discountLog/specialDiscountList',$data);
		$this->load->view('user/discountLog/footer');
	}
	public function discountLog_specialDicountEditOrder(){
		check_user_login();
		$data = array();
		date_default_timezone_set('America/New_York');
			$date = date('Y-m-d H:i:s');
				foreach($_POST['discountLog_id'] as $key => $value) { 
							    $orderDiscount_id = $_POST['orderDiscount_id'][$key];
								$discountLog_id = $_POST['discountLog_id'][$key];
								$appDiscount = $_POST['appDiscount'][$key];
								$remarks = $_POST['remarks'][$key];
								 $this->db->update('orderDiscounts',array('orderDiscount_endDate'=> $date ,'status_id'=>3),array('orderDiscount_id'=>$orderDiscount_id));
								$this->db->update('discountLog',
									array(
										'discountLog_approverDiscount'=>$appDiscount,
								        'discountLog_remarks'=>$remarks,
										'financestatus_id'=>1,
										'orderDiscount_id'=>$orderDiscount_id,
										)
										,array('discountLog_id'=>$discountLog_id)
									);
								
						}

		$data = array('status'=>'Order Edited'); 
		echo json_encode($data); 
	}




	public function discountLog_add_order()
	{
		check_user_login();
		$data = array();

		$store_id= $this->session->userdata('storeId');
				$date = date('Y-m-d H:i:s');
				$emp_id= $this->session->userdata('id');
				$checkCTNNotExist = true;
				foreach($_POST['ctns'] as $key => $value) { 
                       $results1 = $this->db->get_where('discountLog',array( 'discountLog_ctn' => $_POST['ctns'][$key]));
                        if($results1->num_rows() > 0){
							 $arr = $results1->result_array();
							 $checkCTNNotExist = false;
							 $data = array('status'=>'CTN number already exist' , 'obj'=> $arr);
						}
				}
				if($checkCTNNotExist){

				$this->db->insert('orderDiscounts',
					array('orderDiscount_startDate'=>$date,'emp_id'=>$emp_id,'store_id'=>$store_id,'status_id'=>1)
					);
				$lastOrderId = $this->db->insert_id();

                // echo '<pre>';
                // print_r($_POST);
				$invs = $_POST['invs'];
			    $ctns = $_POST['ctns'];
				$actFee = $_POST['actFee'];
				$upgFee = $_POST['upgFee'];
				$actDiscount = $_POST['actDiscount'];
				$simDiscount = $_POST['simDiscount'];

                
                for($i=0;$i<count($ctns);$i++){
                	
					
					
                	$data = array(
                			'discountLog_invoice'=>$invs[$i],
							'discountLog_ctn'=>$ctns[$i],
							'discountLog_activationFee'=>$actFee[$i],
							'discountLog_upgradeFee'=>$upgFee[$i],
							'discountLog_activationDiscount'=>$actDiscount[$i],
							'discountLog_simDiscount'=>$simDiscount[$i],
							'discountLog_typeId'=>1,
							'financestatus_id'=>3,
							'orderDiscount_id'=>$lastOrderId
                		);
                	$this->DiscountLog_User_m->add_invoice($data);
                	
                }
                    $userEmailData = $this->DiscountLog_User_m->orderUserInformationForDiscountLog($lastOrderId);
			        $invoiceDetails = $this->DiscountLog_User_m->selectedOrdersForEmailForDiscountLog($lastOrderId);
                    $userName = $userEmailData[0]["emp_name"];
					$userEmail = $userEmailData[0]["emp_email"];
					//$userSD = $userEmailData[0]["sd_email"];
					//$userTM = $userEmailData[0]["tm_email"];
					//$userCM = $userEmailData[0]["cm_email"];
					$userRole = $userEmailData[0]["role_name"];
					$userStore = $userEmailData[0]["store_name"];
					$userStoreUid = $userEmailData[0]["store_uId"];
					$userMarket = $userEmailData[0]["market_name"];

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
			        $reportingUser1 = 'mohammad_shoaib@mobilelinkusa.com';
					$email_list = $userEmail;  //$userSD.','.$userTM.','.$userCM.','.$userEmail;
					$this->email->to($reportingUser1);
					
					$this->email->cc($email_list);
					$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
					$this->email->set_mailtype("html");
					$this->email->subject('Discount log Request');
						 
					$body = $this->load->view('email/request_discountLog.php',array(
						'request_date'=> $date,
						'user_name'=> $userName,
						'user_role'=> $userRole,
						'market_name'=> $userMarket,
						'store_name'=> $userStore,
						'store_uid'=> $userStoreUid,
						'invoice_details'=> $invoiceDetails,
						),TRUE);

					$this->email->message($body);   
			        $this->email->send();

                

				$data = array('status'=>'Order Added'); 
			}
				echo json_encode($data); 
	}
	public function discountLog_viewOrderModel(){
		check_user_login();
		$data['selected_orders'] = $this->DiscountLog_User_m->discountLog_selectedOrders($_POST);
		$output = array('html'=>$this->load->view("user/discountLog/models/viewOrder",$data, true)); 
		echo json_encode($output);
	}
	public function discountLog_editOrderModel(){
		check_user_login();
		$data['selected_orders'] = $this->DiscountLog_User_m->discountLog_selectedOrders($_POST);
		$output = array('html'=>$this->load->view("user/discountLog/models/editOrder",$data, true)); 
		echo json_encode($output);
	}
	public function discountLog_editOrder(){
		check_user_login();
		$data = array();
			$date = date('Y-m-d H:i:s');
			$emp_id= $this->session->userdata('id');
			$checkCTNNotExistONEdited = true;
				foreach($_POST['ctns'] as $key => $value) { 
			    $discountLog_id = $_POST['discountLog_id'][$key];
			     $ctns = $_POST['ctns'][$key];
                  $results = $this->db->query("SELECT * FROM discountLog WHERE discountLog_id !='$discountLog_id'  AND  discountLog_ctn = '$ctns' ");
                  if($results->num_rows() > 0){
					     $arr = $results->result_array();
						 $checkCTNNotExist = false;
						 $data = array('status'=>'CTN number already exist' , 'obj'=> $arr);
					}
				}
				if($checkCTNNotExistONEdited){
						foreach($_POST['discountLog_id'] as $key => $value) { 
							    $orderDiscount_id = $_POST['orderDiscount_id'][$key];
								$discountLog_id = $_POST['discountLog_id'][$key];
								$invs = $_POST['invs'][$key];
							    $ctns = $_POST['ctns'][$key];
								$actFee = $_POST['actFee'][$key];
								$upgFee = $_POST['upgFee'][$key];
								$actDiscount = $_POST['actDiscount'][$key];
								$simDiscount = $_POST['simDiscount'][$key];
								$this->db->update('orderDiscounts',
										 array('orderDiscount_startDate'=>$date,'status_id'=>1)
										,array('orderDiscount_id'=>$orderDiscount_id)
										);
								$this->db->update('discountLog',
									array(
										'discountLog_invoice'=>$invs,
										'discountLog_ctn'=>$ctns,
										'discountLog_activationFee'=>$actFee,
										'discountLog_upgradeFee'=>$upgFee,
										'discountLog_activationDiscount'=>$actDiscount,
										'discountLog_simDiscount'=>$simDiscount,
										'financestatus_id'=>3,
										'orderDiscount_id'=>$orderDiscount_id
										)
										,array('discountLog_id'=>$discountLog_id)
									);
						}
						$data = array('status'=>'Order Edited'); 
					}
		echo json_encode($data); 
	}


	


}
?>