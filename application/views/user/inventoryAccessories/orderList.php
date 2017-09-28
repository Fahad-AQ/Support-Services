<style>
  table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}

td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr { border: 1px solid #ccc; }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
  }
  
  td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
  }
  
  /*
  Label the data
  */

}

</style>
<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Order</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_dashboard'); ?>">Home</a></li>
            <li class="active">Order</li>
          </ol>
        </div>
      </div>
      
		<!--- view order-->
         <div id="viewModal" class="modal fade" role="dialog">
        </div>
    <!--- / view order-->
    <!--- view order-->
         <div id="editModal" class="modal fade" role="dialog">
        </div>
    <!--- / view order-->


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Order List</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Date</th>
                    <th>Order Ticket Number</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Store Name</th>
                    <th>Store UID</th>
                    <th>Status</th>
                    <th>Status Comment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                 <?php 
                   if($orders) {
                    $i=0;
                    foreach ($orders as $order){
                      if($this->session->userdata('roleId') == 3 && $order['sd_email'] == $this->session->userdata('email')){
                        $i++;
                     ?>
                      <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $order['accessories_order_date'];?></td>
                      <td><?php echo $order['accessories_order_refNo'];?></td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      <td><?php 
                                if($order['accessories_order_finalStatusComment'] == "" || $order['accessories_order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['accessories_order_finalStatusComment'],0 ,10).'....'; ;    
                                  }


                      ?></td>

                      <td>
                     
                      <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['accessories_order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                       </span>
                      </td>
                      </tr>
                      <?php
                      }
                      else if($this->session->userdata('roleId') == 4 && $order['tm_email'] == $this->session->userdata('email')){
                        $i++;
                        ?>
                      <tr>
                       <td><?php echo $i;?></td>
                      <td><?php echo $order['accessories_order_date'];?></td>
                      <td><?php echo $order['accessories_order_refNo'];?></td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                       <td><?php 
                                if($order['accessories_order_finalStatusComment'] == "" || $order['accessories_order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['accessories_order_finalStatusComment'],0 ,10).'....'; ;    
                                  }


                      ?></td>
                      <td>
                      
                      <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['accessories_order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                       </span>
                      </td>
                      </tr>
                      <?php

                      }
                      else if($this->session->userdata('roleId') == 5 && $order['cm_email'] == $this->session->userdata('email')){
                        $i++;
                        ?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $order['accessories_order_date'];?></td>
                        <td><?php echo $order['accessories_order_refNo'];?></td>
                        <td><?php echo $order['emp_name'];?></td>
                        <td><?php echo $order['emp_email'];?></td>
                        <td><?php echo $order['store_name'];?></td>
                        <td><?php echo $order['store_uId'];?></td>
                        <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                         <td><?php 
                                if($order['accessories_order_finalStatusComment'] == "" || $order['accessories_order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['accessories_order_finalStatusComment'],0 ,10).'....'; ;    
                                  }


                      ?></td>
                        <td>
                       
                        <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['accessories_order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                         </span>
                        </td>
                        </tr>
                        <?php

                      }
                      else {
                        if($order['store_id'] == $this->session->userdata('storeId')){
                        $i++;
                        ?>
                          <tr>
                           <td><?php echo $i;?></td>
                          <td><?php echo $order['accessories_order_date'];?></td>
                          <td><?php echo $order['accessories_order_refNo'];?></td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['emp_email'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                           <td><?php 
                                if($order['accessories_order_finalStatusComment'] == "" || $order['accessories_order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['accessories_order_finalStatusComment'],0 ,10).'....'; ;    
                                  }


                          ?></td>
                          <td>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['accessories_order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                           </span>
                          </td>
                          </tr>
                          <?php
                           }
                        }
                      }
                    }
                   ?>
                  </tbody>
               </table>
              </div>
              <div></div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<script>

      function viewOrder(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("inventoryAccessories/user/inventoryAccessories_viewOrderModel");?>',
						data:{'order_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#viewModal').html(data.html);
						},
						error:function(data){
							console.log(data.responseText + "not work")
						},
					});
				}); 
			}
   

</script>