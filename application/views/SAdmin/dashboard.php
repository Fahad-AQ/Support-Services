
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('sAdmin/dashboard'); ?>">Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
      <!-- <div class="row">
          
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-arrow-circle-o-down icon"></i></div>
                <span>PENDING</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <div class="pull-right" id="work-progress2"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
    
          <div class="col-sm-3 col-sm-6">
           <div class="information gray_info">
              <div class="information_inner">
              <div class="info gray_symbols"><i class="fa fa-arrow-circle-o-up icon"></i></div>
                <span>INPROGRESS</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_gray">
                  <div class="grayprogress"></div>
                </div>
                <div class="pull-right" id="work-progress4"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
                <div class="info green_symbols"><i class="fa fa-check-circle-o icon"></i></div>
                <span>COMPLETED</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
                <div class="pull-right" id="work-progress1"><canvas width="47" height="20" style="display: inline-block; vertical-align: top; width: 47px; height: 20px;"></canvas></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
              <div class="information_inner">
              <div class="info red_symbols"><i class="fa fa-ban icon"></i></div>
                <span>DECLINED</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
                <div class="pull-right" id="work-progress3"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
        </div> -->
          <div id="editEmployeeModal" class="modal fade" role="dialog">
        </div>
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
    <script>

    function editEmployee(id)
      {
        $('document').ready(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("sAdmin/editEmployeeModel");?>',
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