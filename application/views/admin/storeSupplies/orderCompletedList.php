<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Order</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('storeSupplies/admin/storeSupplies_dashboard'); ?>">Home</a></li>
            <li class="active">Order</li>
          </ol>
        </div>
      </div>

    <!--- view order-->
         <div id="viewCompletedModal" class="modal fade" role="dialog">
        </div>
    <!--- / view order-->
    <!--- view order-->
         <div id="editCompletedModal" class="modal fade" role="dialog">
        </div>
    <!--- / view order-->
   


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Order List</div>
              <div class="panel-body">
               <form class="form-group text-right" action="<?php echo base_url('storeSupplies/admin/storeSupplies_completedOrdersExportExcel') ?>" method="post" id="exportOrders" enctype="multipart/form-data">
                    <b>Note :</b> Only Completed Orders Export &nbsp; <button type="submit" name="Export" class="btn btn-primary"><i class="fa fa-download add-tooltip"></i> &nbsp; Export to Excel</button>
            
                </form>

               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Ticket No</th>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Employee Designation</th>
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
                    foreach ($orders as $order) {if ($order['status_id'] == 3){
                       $i++;
                     ?>
                          <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $order['order_refNo'];?></td>
                          <td><?php echo $order['order_date'];?></td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['role_name'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                          <td style="width:20px">
                            <?php 
                                 if($order['order_finalStatusComment'] == "" || $order['order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['order_finalStatusComment'],0 ,10).'....';    
                                  }


                              ?>

                          </td>
                          <td>
                          <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editCompletedModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewCompletedModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                           </span>
                          </td>
                          </tr>
                          <?php
                        }
                      }
                    }
                   ?>
                  </tbody>
               </table>
              </div>
             
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
						url: '<?php echo base_url("storeSupplies/admin/storeSupplies_editOrderModel");?>',
						data:{'order_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#editCompletedModal').html(data.html);
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
						url: '<?php echo base_url("storeSupplies/admin/storeSupplies_viewOrderModel");?>',
						data:{'order_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#viewCompletedModal').html(data.html);
						},
						error:function(data){
							console.log(data.responseText + "not work")
						},
					});
				}); 
			}
   

</script>