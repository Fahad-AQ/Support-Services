<?php
class InventoryAccessories_Admin_m extends CI_Model {

	 public function getCategory(){

	    $this->db->select('*');
		$this->db->from('category');  
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}

	public function getAccesoriesCategory(){

	    $this->db->select('*');
		$this->db->from('accessories_category acc_cat'); 
		$this->db->order_by('acc_cat.accessories_category_id','asc');  
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}
	public function selected_category($params){
	
	$this->db->select('*');
	$this->db->from('accessories_category category'); 
	$this->db->where('category.accessories_category_id',$params["accessories_category_id"]);         
	$results = $this->db->get();
	if($results->num_rows() > 0){
	     return $results->result_array();
		}else{
		return false;
		}
	}

	public function check_category_exist($params){
	
	$this->db->select('*');
	$this->db->from('accessories_category category'); 
	$this->db->where('category.accessories_category_name',$params["accessories_category_name"]); 
	$results = $this->db->get();
	if($results->num_rows() > 0){
	     return true;
		}else{
		return false;
		}
	}

	public function check_editedcategory_exist($params){
    $accessories_category_id = $params['accessories_category_id'];
	$accessories_category_name = $params['accessories_category_name'];
    $result = $this->db->query("SELECT * FROM accessories_category WHERE accessories_category_id != '$accessories_category_id' AND accessories_category_name = '$accessories_category_name'  ");
	if($result->num_rows() > 0){		
	   return true;
	 }
	 else {
		return false;
	 }

	}
	
	
	public function getAccesoriesSubCategory(){

	    $this->db->select('*');
		$this->db->from('accessories_subcategory acc_subCat');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_subCat.accessories_category_id', 'INNER');
		$this->db->order_by('acc_subCat.accessories_subcategory_id','asc');  
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}

	public function selected_subCategory($params){
	
	$this->db->select('*');
	$this->db->from('accessories_subcategory acc_subCat'); 
	$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_subCat.accessories_category_id', 'INNER');
	$this->db->where('acc_subCat.accessories_subcategory_id',$params["accessories_subcategory_id"]);         
	$results = $this->db->get();
	if($results->num_rows() > 0){
	     return $results->result_array();
		}else{
		return false;
		}
	}

	public function check_subCategory_exist($params){
	
	$this->db->select('*');
	$this->db->from('accessories_subcategory acc_subCat'); 
	$this->db->where('acc_subCat.accessories_subcategory_name',$params["accessories_subcategory_name"]); 
	$results = $this->db->get();
	if($results->num_rows() > 0){
	     return true;
		}else{
		return false;
		}
	}

	public function check_editedsubCatergory_exist($params){
    $accessories_subcategory_id = $params['accessories_subcategory_id'];
	$accessories_subcategory_name = $params['accessories_subcategory_name'];
    $result = $this->db->query("SELECT * FROM accessories_subcategory WHERE accessories_subcategory_id != '$accessories_subcategory_id' AND accessories_subcategory_name = '$accessories_subcategory_name'  ");
	if($result->num_rows() > 0){		
	   return true;
	 }
	 else {
		return false;
	 }

	}

	public function getAccesoriesByCatProducts($param){
             $this->db->select('*');
			$this->db->from('accessories_product acc_prod');
			$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
			$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_subCat.accessories_category_id', 'INNER');
			$this->db->where('acc_prod.accessories_category_id',$param["categoryId"]);
			$this->db->order_by('acc_prod.accessories_product_id','asc');  
			$results = $this->db->get();
			if($results->num_rows() > 0){
				return $results->result_array();
			}
			else{
				return false;
			}
	   
	}
	public function getAccesoriesBySubCatProducts($param){
             $this->db->select('*');
			$this->db->from('accessories_product acc_prod');
			$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
			$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_subCat.accessories_category_id', 'INNER');
			$this->db->where('acc_prod.accessories_subcategory_id',$param["subCategoryId"]);
			$this->db->order_by('acc_prod.accessories_product_id','asc');  
			$results = $this->db->get();
			if($results->num_rows() > 0){
				return $results->result_array();
			}
			else{
				return false;
			}
	   
	}
	public function getAccesoriesByProducts($param){
             $this->db->select('*');
			$this->db->from('accessories_product acc_prod');
			$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
			$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_subCat.accessories_category_id', 'INNER');
			$this->db->where('acc_prod.accessories_product_id',$param["productId"]);
			$this->db->order_by('acc_prod.accessories_product_id','asc');  
			$results = $this->db->get();
			if($results->num_rows() > 0){
				return $results->result_array();
			}
			else{
				return false;
			}
	   
	}

	public function selected_product($params){
	
	$this->db->select('*');
	$this->db->from('accessories_product prd'); 
	$this->db->where('prd.accessories_product_id',$params["accessories_product_id"]);         
	$results = $this->db->get();
	if($results->num_rows() > 0){
	     return $results->result_array();
		}else{
		return false;
		}
	}
	public function check_product_exist($params){
	
	$this->db->select('*');
	$this->db->from('accessories_product prd'); 
	$this->db->where('prd.accessories_product_name',$params["accessories_product_name"]); 
	$this->db->or_where('prd.accessories_product_code',$params["accessories_product_code"]);     
	$results = $this->db->get();
	if($results->num_rows() > 0){
	     return true;
		}else{
		return false;
		}
	}
	public function check_editedproduct_exist($params){
    $accessories_product_id = $params['accessories_product_id'];
	$accessories_product_name = $params['accessories_product_name'];
	$accessories_product_code = $params['accessories_product_code'];
    $result = $this->db->query("SELECT * FROM accessories_product WHERE accessories_product_id != '$accessories_product_id' AND accessories_product_name = '$accessories_product_name' OR accessories_product_id != '$accessories_product_id' AND accessories_product_code = '$accessories_product_code' ");
	if($result->num_rows() > 0){		
	   return true;
	 }
	 else {
		return false;
	 }
	}
	public function getProducts(){

	        $this->db->select('*');
			$this->db->from('accessories_product acc_prod');
			$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
			$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
			$this->db->order_by('acc_prod.accessories_product_id','asc');  
			$results = $this->db->get();
			if($results->num_rows() > 0){
				return $results->result_array();
			}
			else{
				return false;
			}
	}

	
	public function getOrders(){

	    $this->db->select('*');
		$this->db->from('accessories_order order');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
		$this->db->order_by('order.accessories_order_id','asc'); 
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}

	}
	

	public function selectedOrders($params){
	    $this->db->select('*');
		$this->db->from('accessories_orderdetails orderdetail');
		$this->db->join('accessories_order order', 'order.accessories_order_id = orderdetail.accessories_order_id','INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
        $this->db->join('accessories_product acc_prod',
			 'acc_prod.accessories_product_id = orderdetail.accessories_product_id', 'INNER');
		$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
		$this->db->join('financestatus fstatus', 'fstatus.financestatus_id = orderdetail.financestatus_id', 'INNER');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->where('orderdetail.accessories_order_id',$params["order_id"]);
		$this->db->order_by('orderdetail.accessories_orderdetails_id','asc'); 
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}
	public function selectedOrdersForEmail($id){
		$this->db->select('*');
		$this->db->from('accessories_orderdetails orderdetail');
		$this->db->join('accessories_order order', 'order.accessories_order_id = orderdetail.accessories_order_id','INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
        $this->db->join('accessories_product acc_prod',
			 'acc_prod.accessories_product_id = orderdetail.accessories_product_id', 'INNER');
		$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
		$this->db->join('financestatus fstatus', 'fstatus.financestatus_id = orderdetail.financestatus_id', 'INNER');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->where('orderdetail.accessories_order_id',$id);
		$this->db->order_by('orderdetail.accessories_orderdetails_id','asc'); 
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}
	public function orderUserInformation($id){
	    $this->db->select('*');
		$this->db->from('accessories_orderdetails orderdetail');
		$this->db->join('accessories_order order', 'order.accessories_order_id = orderdetail.accessories_order_id','INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
        $this->db->join('accessories_product acc_prod',
			 'acc_prod.accessories_product_id = orderdetail.accessories_product_id', 'INNER');
		$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
		$this->db->join('financestatus fstatus', 'fstatus.financestatus_id = orderdetail.financestatus_id', 'INNER');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->where('orderdetail.accessories_order_id',$id);
		$this->db->order_by('orderdetail.accessories_orderdetails_id','asc'); 
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}



	public function getStatus(){

	    $this->db->select('*');
		$this->db->from('status');  
		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}

	public function exportOrders(){

	    $this->db->select('accessories_orderdetails_id , accessories_order_date ,accessories_order_refNo  , store_name , store_uId , accessories_category_name , accessories_subcategory_name , accessories_product_name , accessories_orderdetails_availableStock ,  accessories_orderdetails_requiredItems , accessories_orderdetails_comment , financestatus_name , status_name,accessories_order_finalStatusComment');
		$this->db->from('accessories_orderdetails orderdetail');
		$this->db->join('accessories_order order', 'order.accessories_order_id = orderdetail.accessories_order_id','INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
        $this->db->join('accessories_product acc_prod',
			 'acc_prod.accessories_product_id = orderdetail.accessories_product_id', 'INNER');
		$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
		$this->db->join('financestatus fstatus', 'fstatus.financestatus_id = orderdetail.financestatus_id', 'INNER');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->where('sts.status_id','1'); 
		$this->db->or_where('sts.status_id','2'); 
		$this->db->order_by('orderdetail.accessories_orderdetails_id','asc'); 

		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}
	public function exportCompleteOrders(){

		$this->db->select('accessories_orderdetails_id , accessories_order_date ,accessories_order_refNo  , store_name , store_uId , accessories_category_name , accessories_subcategory_name , accessories_product_name , accessories_orderdetails_availableStock ,  accessories_orderdetails_requiredItems , accessories_orderdetails_comment , financestatus_name , status_name,accessories_order_finalStatusComment');
		$this->db->from('accessories_orderdetails orderdetail');
		$this->db->join('accessories_order order', 'order.accessories_order_id = orderdetail.accessories_order_id','INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
        $this->db->join('accessories_product acc_prod',
			 'acc_prod.accessories_product_id = orderdetail.accessories_product_id', 'INNER');
		$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
		$this->db->join('financestatus fstatus', 'fstatus.financestatus_id = orderdetail.financestatus_id', 'INNER');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->where('sts.status_id','3'); 
		$this->db->order_by('orderdetail.accessories_orderdetails_id','asc'); 

		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}

	}
	public function exportDeclinedOrders(){

		$this->db->select('accessories_orderdetails_id , accessories_order_date ,accessories_order_refNo  , store_name , store_uId , accessories_category_name , accessories_subcategory_name , accessories_product_name , accessories_orderdetails_availableStock ,  accessories_orderdetails_requiredItems , accessories_orderdetails_comment , financestatus_name , status_name,accessories_order_finalStatusComment');
		$this->db->from('accessories_orderdetails orderdetail');
		$this->db->join('accessories_order order', 'order.accessories_order_id = orderdetail.accessories_order_id','INNER');
		$this->db->join('status sts', 'sts.status_id = order.status_id', 'INNER');
        $this->db->join('accessories_product acc_prod',
			 'acc_prod.accessories_product_id = orderdetail.accessories_product_id', 'INNER');
		$this->db->join('accessories_subcategory acc_subCat',
			 'acc_subCat.accessories_subcategory_id = acc_prod.accessories_subcategory_id', 'INNER');
		$this->db->join('accessories_category acc_cat',
			 'acc_cat.accessories_category_id = acc_prod.accessories_category_id', 'INNER');
		$this->db->join('financestatus fstatus', 'fstatus.financestatus_id = orderdetail.financestatus_id', 'INNER');
		$this->db->join('employee emp', 'emp.emp_id = order.emp_id', 'INNER');
		$this->db->join('roles role', 'role.role_id = emp.role_id', 'INNER');
		$this->db->join('stores store', 'store.store_id = order.store_id', 'INNER');	
		$this->db->join('sd sds', 'sds.sd_id = store.sd_id', 'INNER');
		$this->db->join('tm tms', 'tms.tm_id = store.tm_id', 'INNER');
		$this->db->join('cm cms', 'cms.cm_id = store.cm_id', 'INNER');
		$this->db->join('markets market', 'market.market_id = store.market_id', 'INNER');
		$this->db->where('sts.status_id','4'); 
		$this->db->order_by('orderdetail.accessories_orderdetails_id','asc'); 

		$results = $this->db->get();
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}

	}
	

	public function accessoriesMonthlyOrders($month){

	$result = $this->db->query("SELECT  MONTH(accessories_order_date) AS selectMONTH , count(accessories_order_id) AS totalOrders FROM accessories_order WHERE MONTH(accessories_order_date) = '$month' AND status_id = '3' ");
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return 0;
		}
	}
	// public function importRequestsSheet($rsheet){

	// $result = $this->db->get_where('employee', array('EMP_BADGE_ID'=> $rsheet[0],'EMP_NAME'=> $rsheet[1]));
 //    if($result->num_rows() > 0){
 //            $employeeArray = $result->result_array();
	// 	    $emp_id = $employeeArray[0]["EMP_ID"];
	// 		$convertSTD = date('y-m-d' , strtotime($rsheet[2]));
	// 		$convertED= date('y-m-d' , strtotime($rsheet[3]));
	// 		$result = $this->db->query("SELECT * FROM leave_request WHERE LREQ_EMP_ID = '$emp_id' AND LREQ_START < '$convertSTD'  OR LREQ_EMP_ID = '$emp_id' AND LREQ_END < '$convertED' OR LREQ_EMP_ID = '$emp_id' AND LREQ_START < '$convertED' OR LREQ_EMP_ID = '$emp_id' AND LREQ_END < '$convertSTD' ");
	// 		if($result->num_rows() > 0){
	// 			$arr = $result->result_array();
	// 			return 'exist';
	// 		}
	// 		else{
	// 			$results = $this->db->insert('leave_request', array('LREQ_EMP_ID'=> $emp_id, 'LREQ_LTYPE_ID'=> $rsheet[4], 'LREQ_START'=> $convertSTD,'LREQ_END'=> $convertED,'LREQ_REQ_COMMENTS'=>$rsheet[5],'LREQ_STATUS_ID'=> $rsheet[6]));
	// 			if($results){
	// 				return 'true';
	// 			}else{
	// 				return 'false';
	// 			}
	// 		}
	// }
	// else{
	// 	return 'false';
	// }

	// }

	//  public function exportRequests(){
	// 	$this->db->select('EMP_BADGE_ID,EMP_NAME,LREQ_START,LREQ_END,LTYPE_TYPE,LREQ_REQ_COMMENTS,LS_STATUS');
	// 	$this->db->from('leave_request lr'); 
	// 	$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
	// 	$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
	// 	$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
	// 	$this->db->order_by('lr.LREQ_ID','asc');      
	// 	$results = $this->db->get(); 
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }

	// public function exportUsers(){

	// 	$this->db->select('EMP_BADGE_ID,EMP_NAME,EMP_FNAME,EMP_CNIC,EMP_CONTACT,EMP_EMAIL,EMP_DOB,EMP_DOJ,EMP_ADD,DEPT_NAME,DESG_NAME,ROLE_NAME,EMP_REMAINING_ANNUAL,EMP_REMAINING_SICK');
	// 	$this->db->from('employee emp'); 
	// 	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 	$this->db->order_by('emp.EMP_ID','asc');         
	// 	$results = $this->db->get(); 
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 	    return false;
	// 	}  
      
		
	// }
	// public function importUserSheet($esheet){
	// 	$result = $this->db->get_where('employee', array('EMP_BADGE_ID'=> $esheet[0],'EMP_EMAIL'=> $esheet[5],'EMP_CNIC'=> $esheet[3],'EMP_CONTACT'=> $esheet[4]));
	// 		if($result->num_rows() > 0){
	// 			return "exist";
	// 		}
	// 		else{
	// 			$convertDOB = date('y-m-d' , strtotime($esheet[6]));
	// 			$convertDOJ= date('y-m-d' , strtotime($esheet[7]));
	// 			$result = $this->db->insert('employee', array('EMP_BADGE_ID'=> $esheet[0],'EMP_NAME'=> $esheet[1],'EMP_FNAME'=>  $esheet[2],'EMP_CNIC'=>  $esheet[3],'EMP_CONTACT'=>  $esheet[4],'EMP_EMAIL'=>  $esheet[5],'EMP_CONTACT'=> $esheet[4],'EMP_PHOTO'=> 0 ,'EMP_DOB'=> $convertDOB,'EMP_DOJ'=> $convertDOJ,'EMP_ADD'=>  $esheet[8],'EMP_DEPT_ID'=> $esheet[9],'EMP_ROLE_ID'=> $esheet[10],'EMP_DESG_ID'=>  $esheet[11],'EMP_STATUS'=> $esheet[12] ));
	// 			if($result){
	// 				return "true";
	// 			}else{
	// 				return "false";
	// 			}
	// 		}
	// 	}
	// public function allUser(){
	// 	$this->db->select('*');
	// 	$this->db->from('employee emp'); 
	// 	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 	$this->db->order_by('emp.EMP_ID','asc');         
	// 	$results = $this->db->get(); 
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
	// public function allDepartment(){
	// 	$results = $this->db->get('department');
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
	// public function allDesignation(){
	// 	$results = $this->db->get('designation');
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
	// public function allRole(){
	// 	$results = $this->db->get('role');
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
	// public function allLeaveStatus(){
	// 	$results = $this->db->get('leave_status');
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }


	// public function addDepartment($param){
	// $result = $this->db->get_where('department', array('DEPT_NAME'=> $param['department']));
	// if($result->num_rows() > 0){
	// 	return "exist";
	// }
	// else{
	// 	$result = $this->db->insert('department', array('DEPT_NAME'=>$param['department']));
	// 	if($result){
	// 	    $results = $this->db->get_where('department',array('DEPT_ID'=> $this->db->insert_id()));
	// 		if($results->num_rows() > 0){
	// 			return $results->result_array();
	// 		}
	// 		else{
	// 			return false;
	// 		}
	// 	}else{
	// 		return false;
	// 	}
	//  }
	// }
	// public function addDesignation($param){
	// $result = $this->db->get_where('designation', array('DESG_NAME'=> $param['designation']));
	// if($result->num_rows() > 0){
	// 	return "exist";
	// }
	// else{
	// 	$result = $this->db->insert('designation', array('DESG_NAME'=>$param['designation']));
	// 	if($result){
	// 		 $results = $this->db->get_where('designation',array('DESG_ID'=> $this->db->insert_id()));
	// 		if($results->num_rows() > 0){
	// 			return $results->result_array();
	// 		}
	// 		else{
	// 			return false;
	// 		}
	// 	}else{
	// 		return false;
	// 	}
	//  }
	// }

	// public function addUser($param){
	// $result = $this->db->get_where('employee', array('EMP_BADGE_ID'=> $param['employeeBatchId'],'EMP_EMAIL'=> $param['email'],'EMP_CNIC'=> $param['cnic'],'EMP_CONTACT'=> $param['contact']));
	// if($result->num_rows() > 0){
	// 	return "exist";
	// }
	// else{
	// 	$result = $this->db->insert('employee', array('EMP_BADGE_ID'=> $param['employeeBatchId'],'EMP_NAME'=> $param['employeeName'],'EMP_FNAME'=> $param['fatherName'],'EMP_CNIC'=> $param['cnic'],'EMP_CONTACT'=> $param['contact'],'EMP_EMAIL'=> $param['email'],'EMP_CONTACT'=> $param['contact'],'EMP_PHOTO'=> "",'EMP_DOB'=>$param['dob'],'EMP_DOJ'=>$param['doj'],'EMP_ADD'=> $param['address'],'EMP_DEPT_ID'=> $param['department'],'EMP_ROLE_ID'=> $param['role'],'EMP_DESG_ID'=> $param['designation'],'EMP_STATUS'=> $param['status'] ));
	// 	if($result){
	// 		 $this->db->select('*');
	// 		 $this->db->from('employee emp'); 
	// 		 $this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 		 $this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 		 $this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 		 $this->db->where('emp.EMP_ID',$this->db->insert_id());         
	// 		 $results = $this->db->get();
	// 		if($results->num_rows() > 0){
	// 			return $results->result_array();
	// 		}
	// 			else{
	// 			return false;
	// 		}
	// 	}else{
	// 		return false;
	// 	}
	//  }
	// }



 //    public function editUser($param){

	// $this->db->select('*');    
	// $this->db->from('employee');
	// $this->db->where('employee.EMP_BADGE_ID !=', $param['employeeBatchId']);
	// $this->db->or_where('employee.EMP_EMAIL !=', $param['email']);
	// $result = $this->db->get();
	// $query = $this->db->query('SELECT * FROM employee');
 //    $totalCount = $query->num_rows();
	// if($result->num_rows() == $totalCount){
	// 	return 'exist';
	// }
	// else{
	// 	$updateArray =  array('EMP_BADGE_ID'=> $param['employeeBatchId'],'EMP_NAME'=> $param['employeeName'],'EMP_FNAME'=> $param['fatherName'],'EMP_CNIC'=> $param['cnic'],'EMP_CONTACT'=> $param['contact'],'EMP_EMAIL'=> $param['email'],'EMP_PHOTO'=> "",'EMP_DOB'=>$param['dob'],'EMP_DOJ'=>$param['doj'],'EMP_ADD'=> $param['address'],'EMP_DEPT_ID'=> $param['department'],'EMP_ROLE_ID'=> $param['role'],'EMP_DESG_ID'=> $param['designation'],'EMP_STATUS'=> $param['status']);
	// 	$result = $this->db->update('employee',  $updateArray , array('EMP_ID'=> $param['employeeId'] ));
	// 	if($result){
	// 		$this->db->select('*');
	// 		$this->db->from('employee emp'); 
	// 		$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 		$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 		$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 		$this->db->where('emp.EMP_ID',$param['employeeId']);         
	// 		$results = $this->db->get();
	// 		if($results->num_rows() > 0){
	// 			return $results->result_array();
	// 		}
	// 		else{
	// 			return false;
	// 		}
	// 	}else{
	// 		return false;
	// 	}
	//  }
	// }

 //    public function allRequests(){

	// 	$this->db->select('*');
	// 	$this->db->from('leave_request lr'); 
	// 	$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
	// 	$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
	// 	$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
	// 	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 	$this->db->order_by('lr.LREQ_ID','asc');      
	// 	$results = $this->db->get(); 
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
	//  public function getRequest($id){

	// 	$this->db->select('*');
	// 	$this->db->from('leave_request lr'); 
	// 	$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
	// 	$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
	// 	$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
	// 	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 	$this->db->where('lr.LREQ_ID',$id);  
	// 	$this->db->order_by('lr.LREQ_ID','asc');      
	// 	$results = $this->db->get(); 
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }

	// public function getUserRequest($param){

	// 	$this->db->select('*');
	// 	$this->db->from('leave_request lr'); 
	// 	$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
	// 	$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
	// 	$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
	// 	$this->db->where('lr.LREQ_ID',$param["r_id"]);         
	// 	$this->db->order_by('lr.LREQ_ID','asc');      
	// 	$results = $this->db->get(); 
	// 	if($results->num_rows() > 0){
	// 		return $results->result_array();
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }

	// public function editRequest($param){
 //    $approverId = $this->session->userdata('id');
	// $requesterComment = $param['r_Comment'];
	// $approverAction = $param['leaveStatus'];
	// $approverComment = $param['approver_Comment'];
	// $emp_LREQ_LTYPE_ID = $param['employeeLType'];
	// $r_id = $param['r_id']; 
 //    $emp_id = $param['employeeId'];
	// $emp_startDate = $param['startDate'];
	// $emp_endDate = $param['endDate'];
	// $result1 = $this->db->query("SELECT * FROM leave_request WHERE LREQ_ID ='$r_id' AND  LREQ_START='$emp_startDate' AND LREQ_END = '$emp_endDate' AND  LREQ_REQ_COMMENTS='$requesterComment' AND LREQ_LTYPE_ID = '$emp_LREQ_LTYPE_ID' AND LREQ_STATUS_ID ='$approverAction' ");
	// 	if($result1->num_rows() > 0){
	// 		    $object->property = 'Here we go';
	// 	}
	// 	else{
	// 		$result2 = $this->db->query("SELECT * FROM leave_request WHERE LREQ_ID ='$r_id' AND  LREQ_START='$emp_startDate' AND LREQ_END = '$emp_endDate' AND  LREQ_REQ_COMMENTS='$requesterComment' AND  LREQ_STATUS_ID !='$approverAction' ");
	// 		if($result2->num_rows() > 0){
 //                   $updateArray = array('LREQ_LTYPE_ID'=> $param['employeeLType'], 'LREQ_START'=> $param['startDate'],'LREQ_END'=> $param['endDate'],'LREQ_REQ_COMMENTS'=> $param['r_Comment'],'LREQ_STATUS_ID'=> $param['leaveStatus'],'LREQ_APP_COMMENTS'=> $param['approver_Comment']);
	// 				$result3 = $this->db->update('leave_request',  $updateArray , array('LREQ_ID'=> $param['r_id'] ));
	// 				if($result3){
	// 					return $param['r_id'];
	// 				}else{
	// 					return false;
	// 				}
	// 		}
	// 		else{
	// 				$result4 = $this->db->query("SELECT * FROM leave_request WHERE LREQ_ID !='$r_id' AND LREQ_EMP_ID = '$emp_id' AND LREQ_START >= '$emp_startDate' OR LREQ_ID !='$r_id' AND LREQ_EMP_ID = '$emp_id' AND LREQ_END >= '$emp_endDate' OR LREQ_ID !='$r_id' AND LREQ_EMP_ID = '$emp_id' AND LREQ_START >= '$emp_endDate' OR LREQ_ID !='$r_id' AND LREQ_EMP_ID = '$emp_id' AND LREQ_END >= '$emp_startDate' ");
	// 				if($result4->num_rows() > 0){
	// 					$arr = $result4->result_array();
	// 					return 'exist';
	// 				}

	// 			else{
	// 				$updateArray = array('LREQ_LTYPE_ID'=> $param['employeeLType'], 'LREQ_START'=> $param['startDate'],'LREQ_END'=> $param['endDate'],'LREQ_REQ_COMMENTS'=> $param['r_Comment'],'LREQ_STATUS_ID'=> $param['leaveStatus'],'LREQ_APP_COMMENTS'=> $param['approver_Comment']);
	// 				$result5 = $this->db->update('leave_request',  $updateArray , array('LREQ_ID'=> $param['r_id'] ));
	// 				if($result5){
	// 					return 'edited';
	// 				}else{
	// 					return false;
	// 				}
	// 			}
	// 		}
	// 	}
	
	// }

	// public function getUserDetails($param){
	
	// $this->db->select('*');
	// $this->db->from('employee emp'); 
	// $this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// $this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// $this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// $this->db->where('emp.EMP_ID',$param["employeeId"]);         
	// $results = $this->db->get();
	// if($results->num_rows() > 0){
	// return $results->result_array();
	// }else{
	// return false;
	// }
			
	// }
 //    public function userDetails($id){
	
	// 	$this->db->select('*');
	// 	$this->db->from('employee emp'); 
	// 	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 	$this->db->where('emp.EMP_ID',$id);         
	// 	$results = $this->db->get();
	// 	if($results->num_rows() > 0){
	// 	return $results->result_array();
	// 	}else{
	// 	return false;
	// 	}
	// }
	//  public function getEmployeeDepart($id){
	
	// 	$this->db->select('*');
	// 	$this->db->from('employee emp'); 
	// 	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 	$this->db->where('emp.EMP_DEPT_ID',$id);         
	// 	$results = $this->db->get();
	// 	if($results->num_rows() > 0){
	// 	return $results->result_array();
	// 	}else{
	// 	return false;
	// 	}
	// }
	
	// public function login($param){

	// $result = $this->db->get_where('employee', array('EMP_EMAIL'=> $param['email'] , 'EMP_STATUS'=> 1 ));
	// if($result->num_rows() > 0){
	// 	 $data = array('EMP_PHOTO'=>$param['photo']);
 //         $this->db->where('EMP_EMAIL', $param['email']);	
 //         $result = $this->db->update('employee', $data);
	// 	if($result){
	// 	        $this->db->select('*');
	// 			$this->db->from('employee emp'); 
	// 			$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	// 			$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	// 			$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	// 			$this->db->where('emp.EMP_EMAIL',$param["email"]);         
	// 			$results = $this->db->get();
	// 			if($results->num_rows() > 0){
	// 				return $results->result_array();
	// 			}
	// 	}else{
	// 		return false;
	// 	}
	// }
	// else{
	// 	return "Credential Not Created";
	// 	}
	// }

	// public function getMonthlyWithStandAndEnDLeave($id){

	// $result = $this->db->query("SELECT SUM(datediff(LREQ_END, LREQ_START)+1)  AS  Days, LREQ_EMP_ID AS UserId FROM leave_request WHERE LREQ_EMP_ID = '$id' AND LREQ_STATUS_ID = '2' ");
	// if($result->num_rows() > 0){
	//    return $result->result_array();
	// }
	// else{
	// 	return 0;
	// 	}
	// }
 

	
 
	/*public function market($mkt){
		//$this->db->insert('market', array('mname'=>$mkt));
	}

	public function getMarkets() {
		$result = $this->db->get('states');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function geteachMarket($m_id) {
		$result = $this->db->get_where('states', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editMarket($param) {
		$m_id = $param['m_id'];
		$this->db->where('m_id',$m_id);
		$result = $this->db->update('states', $param);
		if($result){return true;}else{return false;}
	}

	public function getStores() {
		$result = $this->db->get('stores');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function geteachStore($s_id) {
		$result = $this->db->get_where('stores', array('s_id'=>$s_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editStore($param) {
		$s_id = $param['s_id'];
		$this->db->where('s_id',$s_id);
		$result = $this->db->update('stores', $param);
		if($result){return true;}else{return false;}
	}

	public function geteachQuestion($q_id) {
		$result = $this->db->get_where('questions', array('q_id'=>$q_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editQuestion($param) {
		$q_id = $param['q_id'];
		$this->db->where('q_id',$q_id);
		$result = $this->db->update('questions', $param);
		if($result){return true;}else{return false;}
	}

	public function getstMarkets() {
		$result = $this->db->get_where('states', array('status'=>'active'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getstrMarket($m_id) {
		$result = $this->db->get_where('stores', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getCategory() {
		$result = $this->db->get_where('checklistcategory', array('status'=>'active'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getQSteps() {
		$result = $this->db->get_where('questionssteps', array('status'=>'active'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getQuestions() {
		$result = $this->db->get('questions');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getRole() {
		$result = $this->db->get('role');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getSd() {
		$result = $this->db->get('sddetails');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getUsers() {
		$result = $this->db->get('users');
		if($result->num_rows() > 0){return $result->result();}else{return false;}
	}

	public function addMarket($param){
		$result = $this->db->insert('states', $param);
		if($result){return true;}else{return false;}
	}

	public function addStore($param){
		$result = $this->db->insert('stores', $param);
		if($result){return true;}else{return false;}
	}

	public function addQuestion($param){
		$result = $this->db->insert('questions', $param);
		if($result){return true;}else{return false;}
	}

	public function addUsersss($data){
		$result = $this->db->insert('users', $data);
		if($result){return true;}else{return false;}
	}

	public function fatchUserId() {
		$this->db->select_max('auid');
		$result = $this->db->get('users');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function addUser($data){
		$result = $this->db->insert('userstates', $data);
		if($result){return true;}else{return false;}
	}

	public function geteachUser($us_id) {
		$result = $this->db->get_where('users', array('u_id'=>$us_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getuserMarket($us_id) {
		/*$result = $this->db->get_where('userstates', array('auid'=>$us_id));
		$this->db->from('users, userstates, states');
		$this->db->where('users.u_id = userstates.u_id');
		$this->db->where('userstates.stateid = states.m_id');
		$this->db->where('users.u_id =',$us_id);
		$result = $this->db->get();
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editUser($param) {
		$auid = $param['auid'];
		$this->db->where('u_id',$auid);
		$result = $this->db->update('users', $param);
		if($result){return true;}else{return false;}
	}

	public function edituserState($param) {
		$us_id = $param['us_id'];
		$auid = $param['auid'];
		$this->db->where('us_id',$us_id);
		$this->db->where('auid',$auid);
		$result = $this->db->update('userstates', $param);
		if($result){return true;}else{return false;}
	}

	public function inserteachMarket($param) {
		$result = $this->db->insert('userstates',$param);
		if($result){return true;}else{return false;}
	}

	public function deluserState($param) {
		$this->db->where('auid', $param);
		$result = $this->db->delete('userstates');
		//$result = $this->db->delete('userstates', array('auid' => $param));
		if($result){return true;}else{return false;}
	}

	public function getAllChecklists() {
		$result = $this->db->get_where('storereview');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function totalCount() {
		$result = $this->db->get_where('storereview', array('rvstatus'=>'pending'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	/*public function sdStores(){
		if($this->session->userdata('r_id') == 6){
			$query = $this->db->get('store');
		}else{
			$this->db->select('*');
			$this->db->from('users u');
			$this->db->join('store s', 'u.auid = s.sd', 'left');
			$this->db->where('u.uname',$this->session->userdata('uname'));
			$query = $this->db->get();
		}

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function sdIDStores($id){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->join('store s', 'u.auid = s.sd', 'left');
		$this->db->where('s.sd',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function getMStores($m_id){
		$result = $this->db->get_where('store', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getSDStores($m_id,$auid){
		if($auid != '')$this->db->where('sd',$auid);
		$result = $this->db->get_where('store', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getStore($id){
		$query = $this->db->get_where('store',array('s_id'=>$id));
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function editStore($id,$param) {
		$this->db->where('s_id',$id);
		$result = $this->db->update('store',$param);
		if($result){return true;}else{return false;}
	}

	public function user($user){
		$this->db->insert('users',array('r_id'=>trim($user[0]),'uname'=>trim($user[1]), 'uphone'=>trim($user[2])));
	}

	public function login($param){
		$username = strtolower($param['username']);
		//if($username=='admin'){
			$result = $this->db->get_where('users', array('uname'=>trim($username)));
			if($result->num_rows() > 0){
				return $result->result_array();
			}else{
				return false;
			}
		//}
	}

	public function update($tablename,$updatearray,$id) {
		$this->db->where($id);
		$this->db->update($tablename,$updatearray);
	}

	public function addMarket($param){
		$result = $this->db->insert('market', $param);
		if($result){return true;}else{return false;}
	}

	public function addStore($param){
		$result = $this->db->insert('store', $param);
		if($result){return true;}else{return false;}
	}

	public function getUsers(){
		$result = $this->db->get('users');
		if($result->num_rows() > 0){return $result->result();}else{return false;}
	}

	public function storeStatus($status,$s_id) {
		$this->db->where('s_id',$s_id);
		$result = $this->db->update('store',array('status'=>$status));
		if($result){return true;}else{return false;}
	}

	public function getUser($auid){
		$result = $this->db->get_where('users',array('auid'=>$auid));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getUserID($uname){
		$result = $this->db->get_where('users',array('uname'=>$uname));
		if($result->num_rows() > 0){return $result->first_row()->auid;}else{return false;}
	}

	public function addUser($param){
		$result = $this->db->insert('users', $param);
		if($result){return true;}else{return false;}
	}

	public function editUser($id, $param){
		$this->db->where('auid',$id);
		$result = $this->db->update('users',$param);
		if($result){return 'true';}else{return 'false';}
	}

	public function getRoles(){
		$result = $this->db->get('role');
		if($result->num_rows() > 0){return $result->result();}else{return false;}
	}

	public function getMarket($m_id){
		$result = $this->db->get_where('market',array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}*/

}
