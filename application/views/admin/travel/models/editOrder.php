 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content"  style="width : 120%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Orders</h4>
      </div>
      <div class="modal-body">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Order</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_order')); ?>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S .No</th>
                        <th>Regular Supplies</th>
                        <th>Unit</th>
                        <th>Available stock</th>
                        <th>Required Items</th>
                        <th>Comment</th>
                        <th>Finance Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
          foreach ($selected_orders as $selected_order){?>
            <input type="hidden" name="order_id[]" value="<?php echo $selected_order['order_id'];?>"/>  
            <input type="hidden" name="orderdetails_id[]" value="<?php echo $selected_order['orderdetails_id'];?>"/>  
            <input type="hidden" name="product_id[]" value="<?php echo $selected_order['product_id'];?>"/>  
          <tr>
            <td><?php echo $selected_order['product_id'];?></td>
            <td><?php echo $selected_order['product_name'];?></td>
            <td><?php echo $selected_order['product_unit'];?></td>
            <td>
            <input type="hidden"  step='any' name="avl[]"  min="0" value="<?php echo $selected_order['orderdetails_availableStock'];?>" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
            <input disabled="disabled" type="number"  step='any' name="avl[]"  min="0" value="<?php echo $selected_order['orderdetails_availableStock'];?>" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
            <?php echo substr($selected_order['product_unit'], strpos($selected_order['product_unit'], "-") + 1)?>
            </td>
            <td>
            <input  type="hidden"  step='any' name="rmt[]"  value="<?php echo $selected_order['orderdetails_requiredItems'];?>" min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
            <input  disabled="disabled" type="number"  step='any' name="rmt[]"  value="<?php echo $selected_order['orderdetails_requiredItems'];?>" min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
            <?php echo substr($selected_order['product_unit'], strpos($selected_order['product_unit'], "-") + 1)?>
            </td>
             <td>
             <input type="hidden"  step='any' name="cmt[]"  value="<?php echo $selected_order['orderdetails_comment'];?>" placeholder="Type Comment" class="form-control border-info required_colom" required="required">
             <input disabled="disabled" type="text"  step='any' name="cmt[]"  value="<?php echo $selected_order['orderdetails_comment'];?>" placeholder="Type Comment" class="form-control border-info required_colom" required="required">
            </td>
            <?php if($this->session->userdata('email') == 'fahad_ahmed@mobilelinkusa.com'){?>
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
              }?>
          </tr> 
          <?php

          } ?>  
            </tbody>
          </table>
          <br />
           <?php if($this->session->userdata('email') == 'fahad_ahmed@mobilelinkusa.com'){?>
             <input type="hidden" name="order_status" value="<?php echo $selected_orders[0]['status_id'];?>"/>  

             <?php }else{?>
              Select Final Status
              <select class="form-control border-info required_colom" name="order_status" >
                <?php  foreach($status_array as $status) {?>
                <option <?php if($selected_orders[0]["status_id"] == $status["status_id"]){echo 'selected';}?> value="<?php echo $status["status_id"];?>" ><?php echo $status["status_name"];?></option>
                <?php } ?>
              </select>
              <?php }?>
          <div>
              <div id="msg">
                  <p class="msg alert"></p>
              </div> 
          </div>
          <div style="margin-top : 20px;">
              <div style="margin-right : 50px">
                  <p class="text-left"><span>Note : Please check all things once you submit<span>   </p>
              </div> 
                <div class="modal-footer">
                  <button data-dismiss="modal" style="padding : 15px;" class="btn btn-danger text-right">Close <i class="icon-arrow-right14 position-right"></i></button>&nbsp; &nbsp;<button type="submit" style="padding : 15px;" class="btn btn-primary text-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
          </div>
          
      </div>

      </section>
    </div>
  </div>
  </div>

<script>
  $('#msg').hide();
  var edit_order = $('#edit_order');  
    edit_order.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_order.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('admin/editOrder'); ?>',
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
                setTimeout(function(){location.href="<?php echo base_url('admin/orderList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>