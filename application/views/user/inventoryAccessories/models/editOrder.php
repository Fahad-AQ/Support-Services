 <div class="modal-dialog modal-lg">

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
                        <th>Product Category</th>
                        <th>Product Sub-Category</th>
                        <th>Product Detail</th>
                        <th>Available Stock</th>
                        <th>Requirement Stock</th>
                        <th>Product Comment</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                   $i=0;
          foreach ($selected_orders as $selected_order){
             $i++; ?>
            <input type="hidden" name="accessories_order_id[]" value="<?php echo $selected_order['accessories_order_id'];?>"/>  
            <input type="hidden" name="accessories_orderdetails_id[]" value="<?php echo $selected_order['accessories_orderdetails_id'];?>"/>  
            <input type="hidden" name="accessories_product_id[]" value="<?php echo $selected_order['accessories_product_id'];?>"/>  
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $selected_order['accessories_category_name'];?></td>
            <td><?php echo $selected_order['accessories_subcategory_name'];?></td>
            <td><?php echo $selected_order['accessories_product_name'];?></td>
            <td><input type="number"  step='any' name="avl[]"  min="0" value="<?php echo $selected_order['accessories_orderdetails_availableStock'];?>" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
            </td>
            <td><input type="number"  step='any' name="rmt[]"  value="<?php echo $selected_order['accessories_orderdetails_requiredItems'];?>" min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
            </td>
             <td><input type="text"  step='any' name="cmt[]"  value="<?php echo $selected_order['accessories_orderdetails_comment'];?>" placeholder="Type Comment" class="form-control border-info" required="required">
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
          url:'<?php echo base_url('inventoryAccessories/user/inventoryAccessories_editOrder'); ?>',
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
                setTimeout(function(){location.href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_orderList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>