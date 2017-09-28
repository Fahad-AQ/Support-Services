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
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_dashboard'); ?>">Home</a></li>
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
               <form class="form-group text-right" action="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_ordersExportExcel') ?>" method="post" id="exportOrders" enctype="multipart/form-data">
                    <b>Note :</b> Only Pending & Inprogress Orders Export &nbsp; <button type="submit" name="Export" class="btn btn-primary"><i class="fa fa-download add-tooltip"></i> &nbsp; Export to Excel</button>
            
                </form>

               <table  class="display table table-bordered table-striped" id="dynamic-table"  style="overflow-x:auto;">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Date</th>
                    <th>Ticket No</th>
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
                    foreach ($orders as $order) {if ($order['status_id'] == 1 || $order['status_id'] == 2){
                       $i++;
                     ?>
                          <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $order['accessories_order_date'];?></td>
                          <td><?php echo $order['accessories_order_refNo'];?></td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['role_name'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                          <td style="width:20px">
                            <?php 
                                 if($order['accessories_order_finalStatusComment'] == "" || $order['accessories_order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['accessories_order_finalStatusComment'],0 ,10).'....';    
                                  }


                              ?>

                          </td>
                          <td>
                          <button data-toggle="modal" onclick="editOrder(<?php echo $order['accessories_order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['accessories_order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
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
  $('#msg').hide();
  var edit_order = $('#edit_order');  
    edit_order.on('submit',function(e){
      e.preventDefault();
      $('#msg').show();
      $('.msg').removeClass('alert-info');
      $('.msg').removeClass('alert-danger');
      $('.msg').addClass('alert-success');
      $('.msg').show().html('Please Wait');
      
      var new_prd_add = edit_order.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        if(new_prd_add){
          $.ajax({
                  type:'POST',
                  url:'<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_fnanceEditOrder'); ?>',
                  data:new_prd_add,
                  dataType:'JSON',
                  success:function(data){ 
                    if(data.status == 'Order Already Exist'){
                      console.log(data);
                      $('#msg').show();
                      $('.msg').removeClass('alert-success');
                      $('.msg').addClass('alert-info');
                      $('.msg').show().html('Order Already Exist');
                        
                    }else{
                      console.log(data);
                      $('#msg').show();
                      $('.msg').removeClass('alert-info');
                      $('.msg').addClass('alert-success');
                      $('.msg').show().html('Order Edited Succesfully').hide(2500);
                       edit_order[0].reset();
                        setTimeout(function(){location.href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_orderList'); ?>"} , 2500);  
                    }
                  },
                  error:function(data){console.log('error: '+data.responseText);}
                });
        
        }
       
         else{
          $('.msg').removeClass('alert-danger');
          $('.msg').removeClass('alert-success');
          $('.msg').addClass('alert-info');
          $('.msg').show().html('No Recent Pending Special Discount Found');

        }
      }
    });
</script>

<script>

 		function editOrder(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("inventoryAccessories/admin/inventoryAccessories_editOrderModel");?>',
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
						url: '<?php echo base_url("inventoryAccessories/admin/inventoryAccessories_viewOrderModel");?>',
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