<div class="inner" >
    <div class="contentpanel" >
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
      
    <!--- Product order-->
         <div id="editEmployeeModal" class="modal fade" role="dialog">
        </div>
    <!--- / Product order-->


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Employee List</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Employee Name</th>
                    <th>Employee Designation</th>
                    <th>Employee Adp ID</th>
                    <th>Employee Market</th>
                    <th>Employee Store</th>
                    <th>Employee Store UID</th>
                    <th>Employee Store SD</th>
                    <th>Employee Store TM</th>
                    <th>Employee Store CM</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($employees) {
                    foreach ($employees as $employee){?>
                        <tr>
                        <td><?php echo $employee['emp_id'];?></td>
                        <td><?php echo $employee['emp_name'];?></td>
                        <td><?php echo $employee['role_name'];?></td>
                        <td><?php echo $employee['emp_adpId'];?></td>
                        <td><?php echo $employee['market_name'];?></td>
                        <td><?php echo $employee['store_name'];?></td>
                        <td><?php echo $employee['store_uId'];?></td>
                        <td><?php echo $employee['sd_name'];?></td>
                        <td><?php echo $employee['tm_name'];?></td>
                        <td><?php echo $employee['cm_name'];?></td>
                        <td class="alert alert-info"><?php if($employee['emp_status']  == 1) {echo "ACTIVE";}else{echo "NOT ACTIVE";};?></td>
                        <td>
                          <button data-toggle="modal" onclick="editEmployee(<?php echo $employee['emp_id'];?>)" data-target="#editEmployeeModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                        </td>
                      </tr>
                       <?php
                      }
                    }
                   ?>
                  </tbody>
               </table>
              </div>
              <div></div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<script>

    function editEmployee(id)
      {
        $('document').ready(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("admin/editEmployeeModel");?>',
            data:{'emp_id':id},
            dataType:'JSON',
            success:function(data){
              console.log(data);
              $('#editEmployeeModal').html(data.html);
            },
            error:function(data){
              console.log(data.responseText + "not work")
            },
          });
        }); 
      }

   

</script>