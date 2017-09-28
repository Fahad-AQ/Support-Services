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
                <table class="table table-bordered" id="myTable2">
                    <thead>
                      <tr>
                        <th>S. NO</th>
                        <th>Invoice</th>
                        <th>CTN</th>
                        <th>Activation Fee</th>
                        <th>Upgrade Fee</th>
                        <th>Activation discount</th>
                        <th>Sim discount</th>
                        <th>Approver discount</th>
                        <th>Remarks</th>
                        <th>Discount Type</th>
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
              <td><?php echo $i;?></td>
              <td><?php echo $selected_order['discountLog_invoice'];?></td>
              <td><?php echo $selected_order['discountLog_ctn'];?></td>
              <td><?php echo $selected_order['discountLog_activationFee'];?></td>
              <td><?php echo $selected_order['discountLog_upgradeFee'];?></td>
              <td><?php echo $selected_order['discountLog_activationDiscount'];?></td>
              <td><?php echo $selected_order['discountLog_simDiscount'];?></td>
              <td>

              <input type="hidden"  step='any' name="appDiscount[]"  value="<?php echo $selected_order['discountLog_approverDiscount'];?>" placeholder="Type Approver Discount" class="form-control border-info appDiscount1" required="required">

            <input <?php if($selected_order["discountLog_typeId"] == 2 ){echo 'disabled';}?> type="number"  step='any' name="appDiscount[]"  value="<?php echo $selected_order['discountLog_approverDiscount'];?>" placeholder="Type Approver Discount" class="form-control border-info required_colom appDiscount2" required="required">
            </td>
            <td>
            <input  type="hidden"  step='any' name="remarks[]"  value="<?php echo $selected_order['discountLog_remarks'];?>" placeholder="Type Remarks" class="form-control border-info remarks1" >

            <input <?php if($selected_order["discountLog_typeId"] == 2 ){echo 'disabled';}?> type="text"  step='any' name="remarks[]"  value="<?php echo $selected_order['discountLog_remarks'];?>" placeholder="Type Remarks" class="form-control border-info remarks2" >
            </td>
            <td style="width :18%">
               <select class="form-control border-info discountLog_typeId" id="activeStatus" name="discountLog_typeId[]" >

                <?php foreach ($getDiscountLog_type as $DiscountType) {;?>

                       <option  <?php if($selected_order["discountLog_typeId"] == $DiscountType["discountLog_typeId"]){echo 'selected';}?> value="<?php echo $DiscountType["discountLog_typeId"];?>"><?php echo $DiscountType["discountLog_typeName"];?>
                       </option>
               <?php }; ?>

                </select>
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

 $('.discountLog_typeId').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if(valueSelected == 2){
         $(this).closest( "tr" ).find("input[name='appDiscount[]']").val("");
         $(this).closest( "tr" ).find("input[name='remarks[]']").val("");
         $(this).closest( "tr" ).find(".appDiscount1").removeAttr("disabled");
         $(this).closest( "tr" ).find(".remarks1").removeAttr("disabled");
         $(this).closest( "tr" ).find(".appDiscount2").attr("disabled", "true");
         $(this).closest( "tr" ).find(".remarks2").attr("disabled", "true");
         
         $(this).closest( "tr" ).find(".appDiscount2").removeClass('required_colom');

    }
    if(valueSelected == 1){
         $(this).closest( "tr" ).find(".appDiscount1").attr("disabled", "true");
         $(this).closest( "tr" ).find(".remarks1").attr("disabled", "true");
         $(this).closest( "tr" ).find(".appDiscount2").removeAttr("disabled");
         $(this).closest( "tr" ).find(".remarks2").removeAttr("disabled");
         $(this).closest( "tr" ).find(".appDiscount2").attr("required", "true");
         $(this).closest( "tr" ).find(".appDiscount2").addClass('required_colom');
    }

});


 

  var edit_product = $('#edit_product');  
    edit_product.on('submit',function(e){
      e.preventDefault();
      $('#msg').show();
      $('.msg').removeClass('alert-info');
      $('.msg').removeClass('alert-danger');
      $('.msg').addClass('alert-success');
      $('.msg').show().html('Please Wait');
      $('.discountLog_typeId').each(function () {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == 2){
             $(this).closest( "tr" ).find("input[name='appDiscount[]']").val("");
             $(this).closest( "tr" ).find("input[name='remarks[]']").val("");
             $(this).closest( "tr" ).find(".appDiscount1").removeAttr("disabled");
             $(this).closest( "tr" ).find(".remarks1").removeAttr("disabled");
             $(this).closest( "tr" ).find(".appDiscount2").attr("disabled", "true");
             $(this).closest( "tr" ).find(".remarks2").attr("disabled", "true");
             
             $(this).closest( "tr" ).find(".appDiscount2").removeClass('required_colom');

        }
        if(valueSelected == 1){
             $(this).closest( "tr" ).find(".appDiscount1").attr("disabled", "true");
             $(this).closest( "tr" ).find(".remarks1").attr("disabled", "true");
             $(this).closest( "tr" ).find(".appDiscount2").removeAttr("disabled");
             $(this).closest( "tr" ).find(".remarks2").removeAttr("disabled");
             $(this).closest( "tr" ).find(".appDiscount2").attr("required", "true");
             $(this).closest( "tr" ).find(".appDiscount2").addClass('required_colom');
        }

    });
      
      var new_prd_add = edit_product.serialize();
      console.log(new_prd_add);
      
     
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == '' ){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');

        }
      });
      console.log(assetserror);
      if(assetserror > 0){return false;}else{

        $.ajax({
            type:'POST',
            url:'<?php echo base_url('discountLog/admin/discountLog_editOrder'); ?>',
            data:new_prd_add,
            dataType:'JSON',
            success:function(data){ 
              if(data.status == 'Order Already Exist'){
                console.log(data);
                $('#msg').show();
                $('.msg').removeClass('alert-danger');
                $('.msg').removeClass('alert-success');
                $('.msg').addClass('alert-info');
                $('.msg').show().html('Dicount Already Exist');
                  
              }


              else{
                console.log(true);
                $('#msg').show();
                $('.msg').removeClass('alert-danger');
                $('.msg').removeClass('alert-info');
                $('.msg').addClass('alert-success');
                $('.msg').show().html('Dicount Edited Succesfully').hide(2500);
                 edit_product[0].reset();
                  setTimeout(function(){location.href="<?php echo base_url('discountLog/admin/discountLog_orderList'); ?>"} , 2500);  
              }
            },
            error:function(data){console.log('error: '+data.responseText);}
          });
       
      }
    });
</script>