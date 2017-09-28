<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Discounts</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('discountLog/admin/discountlog_dashboard'); ?>">Home</a></li>
            <li class="active">Discounts</li>
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
              <div class="panel-heading">Discount List</div>
              <div class="panel-body">
               <form class="form-group text-right" action="<?php echo base_url('discountLog/admin/discountLog_ordersExportExcel') ?>" method="post" id="exportOrders" enctype="multipart/form-data">
                   <b>Note :</b> Only Pending Discount Request Export &nbsp;  <button type="submit" name="Export" class="btn btn-primary"><i class="fa fa-download add-tooltip"></i> &nbsp; Export to Excel</button>
            
                </form>
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Start Date & Time</th>
                    <th>End Date  & Time</th>
                    <th>Employee Name</th>
                    <th>Employee Designation</th>
                    <th>Store Name</th>
                    <th>Store UID</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($orders) {
                    foreach ($orders as $order){
                     ?>
                          <tr>
                          <td><?php echo $order['orderDiscount_id'];?></td>
                          <td><?php echo $order['orderDiscount_startDate'];?></td>
                            <td> 
                          <?php 
                            if( $order['orderDiscount_endDate'] != null ) {  
                                echo $order['orderDiscount_endDate']; 
                             } 
                            else { 
                              echo 'Not Available';
                            }
                          ?>
                            
                          </td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['role_name'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                          <td>
                          <button data-toggle="modal" onclick="editOrder(<?php echo $order['orderDiscount_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['orderDiscount_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                           </span>
                          </td>
                          </tr>
                          <?php
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
						url: '<?php echo base_url("discountLog/admin/discountLog_editOrderModel");?>',
						data:{'orderDiscount_id':id},
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
						url: '<?php echo base_url("discountLog/admin/discountLog_viewOrderModel");?>',
						data:{'orderDiscount_id':id},
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