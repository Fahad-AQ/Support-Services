<style>
  .redborder1{
    border-color:red;
  }       
</style>
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Employee</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/travel_dashboard'); ?>">Home</a></li>
            <li class="active">Employee</li>
          </ol>
        </div>
      </div>
      
    <!--- Patients Detail -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Add Employee</div>
              <div class="panel-body">
                <form id="add_employee">
                    <div class="form-group">
                      <label for="name">Employee Name:</label>
                      <input type="text" name="emp_name"  class="form-control border-info required_colom" required="required" id="name">
                    </div>
                     <div class="form-group">
                      <label for="name">Employee Email:</label>
                      <input type="email" name="emp_email"  class="form-control border-info required_colom" required="required" id="name">
                    </div>
                     <div class="form-group">
                      <label for="name">Employee Adp ID:</label>
                      <input type="number" name="emp_adpId" class="form-control border-info required_colom" required="required" id="name">
                    </div>

          

                  <div class="form-group">
                        <label for="activeStatus">Select Store:</label>
                          <select class="form-control" id="activeStatus" name="store_id">
                          <?php foreach ($stores as $key => $store) {?>
                                 <option value="<?php echo $store["store_id"];?>"><?php echo $store["store_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>

                  <div class="form-group">
                        <label for="activeStatus">Select Role:</label>
                          <select class="form-control" id="activeStatus" name="role_id">
                          <?php foreach ($roles as $key => $role) {?>
                                 <option  value="<?php echo $role["role_id"];?>"><?php echo $role["role_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>

                      <div id="msg2">
                         <p class="msg alert"></p>
                      </div> 
                  </div>
                  <div style="margin-bottom : 50px;margin-top : 70px;">
                      <div style="margin-right : 50px">
                         <p class="text-left"><span>Note : Please check all things once you submit<span>   </p>
                         <p class="text-right"><span class="text-right"> <button type="submit" style="padding : 15px;" class="btn btn-primary text-right">Submit <i class="icon-arrow-right14 position-right"></i></button></span></p>
                      </div> 
                  </div>
                  <br />
                </form>
                 
              </div>

            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#msg2').hide();
  var add_employee = $('#add_employee');  
    add_employee.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = add_employee.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('admin/add_employeeForm'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Employee Already Exist'){
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Employee Already Exist');
                
            }else{
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('Employee Added Succesfully').hide(2500);
               add_employee[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('admin/employeeList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>