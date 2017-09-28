 <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="width : 120%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Discounts</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Discounts</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_product')); ?>
             
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S. NO</th>
                        <th>Invoice</th>
                        <th>Discount type</th>
                        <th>CTN</th>
                        <th>Discount Ammount</th>
                        <th>Sim discount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                   $i = 0;
          foreach ($selected_orders as $selected_order){  $i++;?>
            <input type="hidden" name="orderDiscount_id[]" value="<?php echo $selected_order['orderDiscount_id'];?>"/>  
            <input type="hidden" name="discountLog_id[]" value="<?php echo $selected_order['discountLog_id'];?>"/>  
          <tr>
              <td><?php echo $i?></td>
            <td><input type="text"   name="invs[]"  value="<?php echo $selected_order['discountLog_invoice'];?>" placeholder="Type Discount Invoice" class="form-control border-info required_colom" required="required">
            </td>
            <td><input type="number"  name="ctns[]" value="<?php echo $selected_order['discountLog_ctn'];?>" placeholder="Type Discount CTN" class="form-control border-info required_colom" required="required">
            </td>
            <td><input type="number"  step='any' name="actFee[]"  value="<?php echo $selected_order['discountLog_activationFee'];?>" min="0" placeholder="Type Activation Fee" class="form-control border-info required_colom" required="required">
            </td>
             <td><input type="number"  step='any' name="upgFee[]"  value="<?php echo $selected_order['discountLog_upgradeFee'];?>" placeholder="Type Upgrade Fee" class="form-control border-info required_colom" required="required">
            </td>
             <td><input type="number"  step='any' name="actDiscount[]"  value="<?php echo $selected_order['discountLog_activationDiscount'];?>" placeholder="Type Activation Discount" class="form-control border-info required_colom" required="required">
            </td>
             <td><input type="number"  step='any' name="simDiscount[]"  value="<?php echo $selected_order['discountLog_simDiscount'];?>" placeholder="Type Activation Discount" class="form-control border-info required_colom" required="required">
            </td>
            <?php
                if($selected_order['financestatus_id'] == 1){
                ?>
                <td ><span class="label label-success"><?php echo $selected_order['financestatus_name'];?></span></td>

                <?php } else if($selected_order['financestatus_id'] == 2){
                ?>
                <td ><span class="label label-warning"><?php echo $selected_order['financestatus_name'];?></span></td>

                <?php } else {?>  
                 <td ><span class="label label-primary"><?php echo $selected_order['financestatus_name'];?></span></td>
                <?php } ?>    
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
      $('#msg2').show();
      $('.msg').removeClass('alert-info');
      $('.msg').removeClass('alert-danger');
      $('.msg').addClass('alert-success');
      $('.msg').show().html('Please Wait');
      
      var new_prd_add = edit_product.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
         var valid = true;

              $.each($('input[name="ctns[]"]'), function (index1, item1) {

                  $.each($('input[name="ctns[]"]').not(this), function (index2, item2) {

                      if ($(item1).val() == $(item2).val()) {
                          $(item1).css("border-color", "red");
                          $(item2).css("border-color", "red");
                          $('#msg2').show();
                          $('.msg').removeClass('alert-success');
                          $('.msg').removeClass('alert-info');
                          $('.msg').addClass('alert-danger');
                          $('.msg').show().html('You have entered same CTN number');
                          valid = false;
                      }
                      else{
                         $(item1).css("border-color", "1px solid #CECECE");
                      }

                       });
                    });

                   if(valid){

                          $.ajax({
                                    type:'POST',
                                    url:'<?php echo base_url('discountLog/User/discountLog_editOrder'); ?>',
                                    data:new_prd_add,
                                    dataType:'JSON',
                                    success:function(data){ 
                                      if(data.status == 'CTN number already exist'){
                                        console.log(data);
                                        $('#msg').show();
                                        $('.msg').removeClass('alert-danger');
                                        $('.msg').removeClass('alert-success');
                                        $('.msg').addClass('alert-info');
                                        $('.msg').show().html('CTN number '+ data.obj[0]["discountLog_ctn"] +' already exist on other store');
                                          
                                      }
                                      else if(data.status == 'Order Already Exist'){
                                        console.log(data);
                                        $('#msg').show();
                                        $('.msg').removeClass('alert-danger');
                                        $('.msg').removeClass('alert-success');
                                        $('.msg').addClass('alert-info');
                                        $('.msg').show().html('Order Already Exist');
                                          
                                      }


                                      else{
                                        console.log(data);
                                        $('#msg').show();
                                        $('.msg').removeClass('alert-danger');
                                        $('.msg').removeClass('alert-info');
                                        $('.msg').addClass('alert-success');
                                        $('.msg').show().html('Order Edited Succesfully').hide(2500);
                                         edit_product[0].reset();
                                          setTimeout(function(){location.href="<?php echo base_url('user/discountLog_orderList'); ?>"} , 2500);  
                                      }
                                    },
                                    error:function(data){console.log('error: '+data.responseText);}
                                  });
                    }
        
      }
    });
</script>