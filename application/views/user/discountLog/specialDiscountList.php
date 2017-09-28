<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Discounts</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('discountLog/user/discountLog_dashboard'); ?>">Home</a></li>
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
              <div class="panel-heading">Edit Discounts</div>
              <div class="panel-body">
              <input style="float: right; margin-bottom: 10px;" type="text" id="myInputTextField"  placeholder="Search">
              <br />
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_product')); ?>
                <table class="table table-bordered table-striped dataTable" id="tableApprover">
                    <thead>
                      <tr>
                        <th>S. NO</th>
                        <th>Store Name</th>
                        <th>Store UID</th>
                        <th>Sender Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
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
                   $visible = false;
                   $i = 0;
                   if($specialOrders){

                  
          foreach ($specialOrders as $specialOrder){  
            if($this->session->userdata('roleId') == 3 && $specialOrder['sd_email'] == $this->session->userdata('email') && $specialOrder['discountLog_typeId'] == 2){
                     $i++;
                      $visible = true;

                     ?>
            <input type="hidden" name="orderDiscount_id[]" value="<?php echo $specialOrder['orderDiscount_id'];?>"/>  
            <input type="hidden" name="discountLog_id[]" value="<?php echo $specialOrder['discountLog_id'];?>"/>  
          <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $specialOrder['store_name'];?></td>
              <td><?php echo $specialOrder['store_uId'];?></td>
              <td><?php echo $specialOrder['emp_name'];?></td>
              <td><?php echo $specialOrder['orderDiscount_startDate'];?></td>
              <td><?php  echo 'Not Available';?></td>
              <td><?php echo $specialOrder['discountLog_invoice'];?></td>
              <td><?php echo $specialOrder['discountLog_ctn'];?></td>
              <td><?php echo $specialOrder['discountLog_activationFee'];?></td>
              <td><?php echo $specialOrder['discountLog_upgradeFee'];?></td>
              <td><?php echo $specialOrder['discountLog_activationDiscount'];?></td>
              <td><?php echo $specialOrder['discountLog_simDiscount'];?></td>
              <td>


            <input  type="number"  step='any' name="appDiscount[]"  value="<?php echo $specialOrder['discountLog_approverDiscount'];?>" placeholder="Type Approver Discount" class="form-control border-info required_colom appDiscount2" required="required">
            </td>
            <td>

            <input type="text"  step='any' name="remarks[]"  value="<?php echo $specialOrder['discountLog_remarks'];?>" placeholder="Type Remarks" class="form-control border-info remarks2" >
            </td>
            <?php
            if($specialOrder['discountLog_typeId'] == 1){
                              ?>
            <td ><span class="label label-info"><?php echo $specialOrder['discountLog_typeName'];?></span></td>

            <?php } else {?>  
             <td ><span class="label label-info"><?php echo $specialOrder['discountLog_typeName'];?></span></td>
            <?php } ?> 

            <?php
              if($specialOrder['financestatus_id'] == 1){
              ?>
              <td ><span class="label label-success"><?php echo $specialOrder['financestatus_name'];?></span></td>

              <?php } else if($specialOrder['financestatus_id'] == 2){
              ?>
              <td ><span class="label label-warning"><?php echo $specialOrder['financestatus_name'];?></span></td>

              <?php } else {?>  
               <td ><span class="label label-primary"><?php echo $specialOrder['financestatus_name'];?></span></td>
              <?php } ?> 
              
          </tr> 
          <?php
             } 
            }
          }else {
              ?>
                    <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>No Recent Pending Special Discount Found</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    </tr>
              <?php
             }

               if(!$visible && $specialOrders !=null ){
             ?>

               <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>No Recent Pending Special Discount Found</td>
                     <td></td>
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
                 <button type="submit" style="padding : 15px;" class="btn btn-primary text-right">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
          </div>
          
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



  var edit_product = $('#edit_product');  
    edit_product.on('submit',function(e){
      e.preventDefault();
      $('#msg').show();
      $('.msg').removeClass('alert-info');
      $('.msg').removeClass('alert-danger');
      $('.msg').addClass('alert-success');
      $('.msg').show().html('Please Wait');
  
      
      var new_prd_add = edit_product.serialize();
      console.log(new_prd_add);
      
     
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == '' ){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');

        }
      });
      console.log(assetserror);
      if(assetserror > 0){return false;}else{
        if(new_prd_add){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url('discountLog/user/discountLog_specialDicountEditOrder'); ?>',
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
                  setTimeout(function(){location.href="<?php echo base_url('discountLog/user/discountLog_specialDicountList'); ?>"} , 2500);  
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