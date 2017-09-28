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
         <div id="viewModal" class="modal fade" role="dialog">
        </div>
    <!--- / view order-->
    <!--- view order-->
         <div id="editModal" class="modal fade" role="dialog">
        </div>
    <!--- / view order-->
   

       <?php 
       if($this->session->userdata('email') == 'skyatha@mobilelinkusa.com' && $this->session->userdata('roleId') == '2' ){
        ?>
          <div class="row">
          <div class="col-lg-12">
             <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Order</div>
              <div class="panel-body">

              <input style="float: right; margin-bottom: 10px;" type="text" id="myInputTextField"  placeholder="Search">
              <br />
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_order')); ?>
                <table class="table table-bordered table-striped dataTable" id="tableApprover">
                    <thead>
                      <tr>
                        <th>S .No</th>
                        <th>Store Name</th>
                        <th>Store UID</th>
                        <th>Sender Name</th>
                        <th>Date</th>
                        <th>Order Number</th>
                        <th>Regular Supplies</th>
                        <th>Unit</th>
                        <th>Item Code</th>
                        <th>Available stock</th>
                        <th>Required Items</th>
                        <th>Comment</th>
                        <th>Finance Action</th>
                      </tr>
                    </thead>
                    <tbody>
                 
                   <?php
                   if($financeOrders){
                     $i=0;
                          foreach ($financeOrders as $financeOrder){
                              $i++;
                            ?>
                      <input type="hidden" name="order_id[]" value="<?php echo $financeOrder['order_id'];?>"/>  
                      <input type="hidden" name="orderdetails_id[]" value="<?php echo $financeOrder['orderdetails_id'];?>"/>  
                      <input type="hidden" name="product_id[]" value="<?php echo $financeOrder['product_id'];?>"/>  
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $financeOrder['store_name'];?></td>
                      <td><?php echo $financeOrder['store_uId'];?></td>
                      <td><?php echo $financeOrder['emp_name'];?></td>
                      <td><?php echo $financeOrder['order_date'];?></td>
                      <td><?php echo $financeOrder['order_refNo'];?></td>
                      <td><?php echo $financeOrder['product_name'];?></td>
                      <td><?php echo $financeOrder['product_unit'];?></td>
                      <td><?php echo $financeOrder['product_code'];?></td>
                      <td>
                      <input type="hidden"  step='any' name="avl[]"  min="0" value="<?php echo $financeOrder['orderdetails_availableStock'];?>" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
                      <input disabled="disabled" type="number"  step='any' name="avl[]"  min="0" value="<?php echo $financeOrder['orderdetails_availableStock'];?>" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
                      <?php echo substr($financeOrder['product_unit'], strpos($financeOrder['product_unit'], "-") + 1)?>
                      </td>
                      <td>
                      <input  type="hidden"  step='any' name="rmt[]"  value="<?php echo $financeOrder['orderdetails_requiredItems'];?>" min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
                      <input  disabled="disabled" type="number"  step='any' name="rmt[]"  value="<?php echo $financeOrder['orderdetails_requiredItems'];?>" min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
                      <?php echo substr($financeOrder['product_unit'], strpos($financeOrder['product_unit'], "-") + 1)?>
                      </td>
                       <td>
                       <input type="hidden"  step='any' name="cmt[]"  value="<?php echo $financeOrder['orderdetails_comment'];?>" placeholder="Type Comment" class="form-control border-info" required="required">
                       <input disabled="disabled" type="text"  step='any' name="cmt[]"  value="<?php echo $financeOrder['orderdetails_comment'];?>" placeholder="Type Comment" class="form-control border-info" required="required">
                      </td>
                       <td>
                        <select style="width:150px" class="form-control border-info required_colom" name="fStatus[]" >

                          <option value="1" >APPROVED</option>

                          <option value="2">NOT APPROVED</option>
                        
                        </select>
                       </td>
                       <!--  <?php if($this->session->userdata('email') == 'fahad_ahmed@mobilelinkusa.com'){?>
                        <td>
                          <select style="width:150px" class="form-control border-info required_colom" name="fStatus[]" >
                            <option  <?php if($selected_order["financestatus_id"] == 3){echo 'selected';}?> value="3" >PENDING</option>
                            <option  <?php if($selected_order["financestatus_id"] == 1){echo 'selected';}?> value="1" >APPROVED</option>
                            <option  <?php if($selected_order["financestatus_id"] == 2){echo 'selected';}?> value="2">NOT APPROVED</option>
                          
                          </select>
                         </td>
                         <?php }else{?>
                           <input type="hidden" name="fStatus[]" value="<?php echo $selected_order['financestatus_id'];?>"/>  
                          <?php
                              if($selected_order['financestatus_id'] == 1){
                           ?>
                             <td ><span class="label label-success"><?php echo $selected_order['financestatus_name'];?></span></td>

                           <?php } else{
                           ?>
                             <td ><span class="label label-warning"><?php echo $selected_order['financestatus_name'];?></span></td>

                          <?php } 
                          }?> -->
                    </tr> 
          <?php
               }
             }
             else {
              ?>
                    <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>No Recent Pending Orders Found</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     </tr>
              <?php
             }
          ?>  
            </tbody>
          </table>
          <script >
            $(document).ready(function(){

              var $rows = $('#tableApprover tbody tr');
              $('#myInputTextField').keyup(function() {
                  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                  $rows.show().filter(function() {
                      var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                      return !~text.indexOf(val);
                  }).hide();
              });

            })
  
          </script>
          <br />

          <div>
              <div id="msg">
                  <p class="msg alert"></p>
              </div> 
          </div>
          
          <div style="margin-top : 20px;">
              <div style="margin-right : 50px">
                  <p class="text-left"><span><b>Note :</b> Kindly Check All Store Products approved or Net approved.<span>   </p>
              </div> 
                <div class="modal-footer">
                 <button type="submit" style="padding : 15px;" class="btn btn-primary text-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
          </div>
          
      </div>

      </section>
            </div>
        </div>
     <?php
       }

       else {
        ?>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Order List</div>
              <div class="panel-body">
               <form class="form-group text-right" action="<?php echo base_url('storeSupplies/admin/storeSupplies_ordersExportExcel') ?>" method="post" id="exportOrders" enctype="multipart/form-data">
                    <b>Note :</b> Only Pending & Inprogress Orders Export &nbsp; <button type="submit" name="Export" class="btn btn-primary"><i class="fa fa-download add-tooltip"></i> &nbsp; Export to Excel</button>
            
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
                    foreach ($orders as $order) {if ($order['status_id'] == 1 || $order['status_id'] == 2){
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
                          <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
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
          <?php 

            }

       ?>
        
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
                  url:'<?php echo base_url('storeSupplies/admin/storeSupplies_fnanceEditOrder'); ?>',
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
                        setTimeout(function(){location.href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderList'); ?>"} , 2500);  
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
						url: '<?php echo base_url("storeSupplies/admin/storeSupplies_editOrderModel");?>',
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
						url: '<?php echo base_url("storeSupplies/admin/storeSupplies_viewOrderModel");?>',
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