 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Employee</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Employee</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_employee')); ?>
                    <div class="form-group">
                      <label for="name">Employee Name:</label>
                       <input type="hidden" name="emp_id" value="<?php echo $selected_employees[0]["emp_id"];?>" class="form-control border-info required_colom" required="required" id="name">
                      <input type="text" name="emp_name" value="<?php echo $selected_employees[0]["emp_name"];?>" class="form-control border-info required_colom" required="required" id="name">
                    </div>
                     <div class="form-group">
                      <label for="name">Employee Email:</label>
                      <input type="email" name="emp_email" value="<?php echo $selected_employees[0]["emp_email"];?>" class="form-control border-info required_colom" required="required" id="name">
                    </div>
                     <div class="form-group">
                      <label for="name">Employee ADP ID:</label>
                      <input type="number" name="emp_adpId" value="<?php echo $selected_employees[0]["emp_adpId"];?>" class="form-control border-info required_colom" required="required" id="name">
                    </div>


                   
                  <div class="form-group">
                        <label for="activeStatus">Selected Store:</label>
                          <select class="form-control" id="activeStatus" name="store_id">
                          <?php foreach ($stores as $key => $store) {?>
                                 <option  <?php if($selected_employees[0]["store_name"] == $store["store_name"]){echo 'selected';}?> value="<?php echo $store["store_id"];?>"><?php echo $store["store_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>

                  <div class="form-group">
                        <label for="activeStatus">Selected Role:</label>
                          <select class="form-control" id="activeStatus" name="role_id">
                          <?php foreach ($roles as $key => $role) {?>
                                 <option  <?php if($selected_employees[0]["role_name"] == $role["role_name"]){echo 'selected';}?> value="<?php echo $role["role_id"];?>"><?php echo $role["role_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>

                    <div class="form-group">
                        <label for="activeStatus">Employee Status:</label>
                          <select class="form-control" id="activeStatus" name="emp_status" >
                            <option  <?php if($selected_employees[0]["emp_status"] == 1){echo 'selected';}?> value="1" >Active</option>
                            <option  <?php if($selected_employees[0]["emp_status"] == 2){echo 'selected';}?> value="2">Not Active</option>
                          </select>
                  </div>
                   <div id="msg2">
                         <p class="msg alert"></p>
                   </div> 
                  <div style="margin-bottom : 10px">
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
  var edit_employee = $('#edit_employee');  
    edit_employee.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_employee.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('admin/editEmployee'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Employee Already Exist'){
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Employee Already Exist');
                
            }else{
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('Employee Edited Succesfully').hide(2500);
               edit_employee[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('admin/employeeList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>