 <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
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
                        <th>Item Code</th>
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
            <td><?php echo $selected_order['product_code'];?></td>
            <td><input type="hidden" name="avl[]" value="<?php echo $selected_order['orderdetails_availableStock'];?>"/>  <?php echo $selected_order['orderdetails_availableStock'];?></td>
            <td><input type="hidden" name="rmt[]" value="<?php echo $selected_order['orderdetails_requiredItems'];?>"/>  <?php echo $selected_order['orderdetails_requiredItems'];?></td>
             <td class="alert alert-info"><input type="hidden" name="cmt[]" value="<?php echo $selected_order['orderdetails_comment'];?>"/><?php
              if($selected_order['orderdetails_comment'] == null){
                 echo 'Not Available';
              }
              else{
                echo $selected_order['orderdetails_comment'];
              }
                ?></td>

                 <?php if($selected_order["status_id"] == 1){?>

                 <td>
                  <select style="width:150px" class="form-control border-info required_colom" name="fStatus[]" >

                    <option value="1" >APPROVED</option>
                    
                    <option value="2">NOT APPROVED</option>
                  
                  </select>
                  
               </td>
                <?php }else {?>
              <td>
                <select style="width:150px" class="form-control border-info required_colom" name="fStatus[]" >
                  <option  <?php if($selected_order["financestatus_id"] == 3){echo 'selected';}?> value="3" >PENDING</option>
                  <option  <?php if($selected_order["financestatus_id"] == 1){echo 'selected';}?> value="1" >APPROVED</option>
                  <option  <?php if($selected_order["financestatus_id"] == 2){echo 'selected';}?> value="2">NOT APPROVED</option> 
                </select>
               </td>
                <?php } ?>
          </tr> 
          <?php

          } ?>  
            </tbody>
          </table>
          <br />
           <div>
              <div>
                  Select Final Status
              <select class="form-control border-info required_colom" name="order_status" >
                <?php  foreach($status_array as $status) { if( $status["status_id"] != 5){?>
                <option <?php if($selected_orders[0]["status_id"] == $status["status_id"]){echo 'selected';}?> value="<?php echo $status["status_id"];?>" ><?php echo $status["status_name"];?></option>
                <?php 
                } } ?>
              </select>
              </div> 
          </div>
           <br />
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
         $.confirm({
                  title: 'Comment',
                  content: '' +
                   '<form id="order_comment" >'+
                   '<div class="form-group formName" >' +
                   '</div>' +
                  '<div class="form-group">' +
                  '<label>Please Type final status Comment</label>' +
                  '<textarea rows="4" cols="50" placeholder="finalComment" name="order_finalStatusComment" class="finalComment form-control" required></textarea>' +
                  '</div>'+
                  '</form>',
                  buttons: {
                      formSubmit: {
                          text: 'Submit',
                          btnClass: 'btn-blue',
                          action: function () {
                            var order_comment = $('#order_comment');  
                             var finalSerialize = $('#edit_order').serialize() + '&' + $('#order_comment').serialize();
                              var alerMessage = $("<div class='msg2 alert'></div>") 
                              $(".formName").prepend(alerMessage); 
                              var finalComment = this.$content.find('.finalComment').val();

                              if(finalComment ==""){          
                                  
                                  $('.msg2').show();
                                  $('.msg2').removeClass('alert-success');
                                  $('.msg2').removeClass('alert-info');
                                  $('.msg2').addClass('alert-danger');
                                  $('.msg2').show().html('Please Type final status Comment');
                                  setTimeout(function(){
                                    $(".msg2").remove();
                                  },5000)
                                  return  false;
                                
                              } else if(finalComment !=""){
 
                                   $.ajax({
                                          type:'POST',
                                          url:'<?php echo base_url('storeSupplies/admin/storeSupplies_editOrder'); ?>',
                                          data: finalSerialize,
                                          dataType:'JSON',
                                          success:function(data){ 
                                            if(data.status == 'Order Already Exist'){
                                              $('#msg').show();
                                              $('.msg').removeClass('alert-success');
                                              $('.msg').addClass('alert-info');
                                              $('.msg').show().html('Order Already Exist');
                                                
                                            }else{
                                             
                                                if($('#order_status').val() == 1 || $('#order_status').val() == 2){
                                                $('#msg').show();
                                                $('.msg').removeClass('alert-danger');
                                                $('.msg').removeClass('alert-info');
                                                $('.msg').addClass('alert-success');
                                                $('.msg').show().html('Order Edited Succesfully').hide(2500);
                                                 setTimeout(function(){location.href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderList'); ?>"} , 2500);  
                                                 edit_order[0].reset();
                                                 order_comment[0].reset();

                                               }
                                                else if($('#order_status').val() == 3){
                                                $('#msg').show();
                                                $('.msg').removeClass('alert-danger');
                                                $('.msg').removeClass('alert-info');
                                                $('.msg').addClass('alert-success');
                                                $('.msg').show().html('Order Edited Succesfully').hide(2500);

                                                 setTimeout(function(){location.href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderCompletedList'); ?>"} , 2500);  
                                                 edit_order[0].reset();
                                                 order_comment[0].reset();

                                               }
                                                else {
                                                $('#msg').show();
                                                $('.msg').removeClass('alert-danger');
                                                $('.msg').removeClass('alert-info');
                                                $('.msg').addClass('alert-success');
                                                $('.msg').show().html('Order Edited Succesfully').hide(2500);

                                                 setTimeout(function(){location.href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderDeclinedList'); ?>"} , 2500);  
                                                 edit_order[0].reset();
                                                 order_comment[0].reset();
                                               }
                                              

                                                
                                            }
                                          },
                                          error:function(data){console.log('error: '+data.responseText);}
                                        });
                              }
                             
                          }
                      },
                      cancel: function () {
                         $('#msg2').show();
                         $('.msg').removeClass('alert-success');
                         $('.msg').removeClass('alert-info');
                         $('.msg').addClass('alert-danger');
                         $('.msg').show().html('Order Cencelled');
                        setTimeout(function(){
                          $('#msg2').hide();
                          $('.msg').hide();                      
                        } , 2500);  
                         
                      },
                  },
                  onContentReady: function () {
                      // bind to events
                      var jc = this;
                      this.$content.find('.formName').on('submit', function (e) {
                          // if the user submits the form by pressing enter in the field.
                          e.preventDefault();
                          jc.$$formSubmit.trigger('click'); // reference the button and click it
                      });
                  }
              });
       
      }
    });
</script>