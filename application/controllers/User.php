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
			$getSelectedCategory = $this->SAdmin_m->getSelectedCategory($_POST);
			$data = array('status'=> 'selected' , 'selected'=> $getSelectedCategory[0]);
		}	
		echo json_encode($data);
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

	public function logout(){
		 $this->session->sess_destroy();
		 redirect(base_url());
	}


	
	


}
?>