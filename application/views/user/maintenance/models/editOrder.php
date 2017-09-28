 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width : 120%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Orders</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Order</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_product')); ?>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S .No</th>
                        <th>Regular Supplies</th>
                        <th>Unit</th>
                        <th>Available stock</th>
                        <th>Required Items</th>
                        <th>Comment</th>
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
            <td><input type="number"  step='any' name="avl[]"  min="0" value="<?php echo $selected_order['orderdetails_availableStock'];?>" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
            <?php echo substr($selected_order['product_unit'], strpos($selected_order['product_unit'], "-") + 1)?>
            </td>
            <td><input type="number"  step='any' name="rmt[]"  value="<?php echo $selected_order['orderdetails_requiredItems'];?>" min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
            <?php echo substr($selected_order['product_unit'], strpos($selected_order['product_unit'], "-") + 1)?>
            </td>
             <td><input type="text"  step='any' name="cmt[]"  value="<?php echo $selected_order['orderdetails_comment'];?>" placeholder="Type Comment" class="form-control border-info required_colom" required="required">
            </td>
          </tr> 
          <?php 
          } ?>  
            </tbody>
          </table>
          <div >
              <div id="msg">
                  <p class="msg alert"></p>
              </div> 
          </div>
          <div style="margin-bottom : 20px;margin-top : 70px;">
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

</div>

</div>

<script>
  $('#msg').hide();
  var edit_product = $('#edit_product');  
    edit_product.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_product.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('User/editOrder'); ?>',
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
               edit_product[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('user/orderList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>