<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Order</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('user/travel_dashboard'); ?>">Home</a></li>
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
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Store Name</th>
                    <th>Store UID</th>
                    <th>Supplies Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                 <?php 
                   if($orders) {
                    foreach ($orders as $order){
                      if($this->session->userdata('roleId') == 2 && $order['sd_email'] == $this->session->userdata('email')){
                     ?>
                      <tr>
                      <td><?php echo $order['order_id'];?></td>
                      <td><?php echo $order['order_date'];?></td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      <td>
                      <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                      <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                       </span>
                      </td>
                      </tr>
                      <?php
                      }
                      else if($this->session->userdata('roleId') == 3 && $order['tm_email'] == $this->session->userdata('email')){
                        ?>
                      <tr>
                      <td><?php echo $order['order_id'];?></td>
                      <td><?php echo $order['order_date'];?></td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      <td>
                      <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                      <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                       </span>
                      </td>
                      </tr>
                      <?php

                      }
                      else if($this->session->userdata('roleId') == 4 && $order['cm_email'] == $this->session->userdata('email')){
                        ?>
                        <tr>
                        <td><?php echo $order['order_id'];?></td>
                        <td><?php echo $order['order_date'];?></td>
                        <td><?php echo $order['emp_name'];?></td>
                        <td><?php echo $order['emp_email'];?></td>
                        <td><?php echo $order['store_name'];?></td>
                        <td><?php echo $order['store_uId'];?></td>
                        <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                        <td>
                        <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                        <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                         </span>
                        </td>
                        </tr>
                        <?php

                      }
                      else {
                        if($order['store_id'] == $this->session->userdata('storeId')){
                        ?>
                          <tr>
                          <td><?php echo $order['order_id'];?></td>
                          <td><?php echo $order['order_date'];?></td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['emp_email'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                          <td>
                          <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
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

 		function editOrder(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("user/editOrderModel");?>',
						data:{'order_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#editModal').html(data.html);
						},
						error:function(data){
							console.log(data.responseText + "not work")
						},
					});
				}); 
			}
      function viewOrder(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("user/viewOrderModel");?>',
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