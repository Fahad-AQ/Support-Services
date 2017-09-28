
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/travel_dashboard'); ?>">Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
     <!--  <div class="row">
          
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-arrow-circle-o-down icon"></i></div>
                <span>PENDING</span>
                <h1 class="bolded"><?php echo $pendingCount; ?> <?php if($pendingCount > 1) echo 'Orders' ;else echo 'Order';?></h1>
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
                <h1 class="bolded"><?php echo $inprogressCount; ?> <?php if($inprogressCount > 1) echo 'Orders' ;else echo 'Order';?></h1>
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
                <h1 class="bolded"><?php echo $completedCount; ?> <?php if($completedCount > 1) echo 'Orders' ;else echo 'Order';?></h1>
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
                <h1 class="bolded"><?php echo $declinedCount; ?> <?php if($declinedCount > 1) echo 'Orders' ;else echo 'Order';?></h1>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
                <div class="pull-right" id="work-progress3"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
        </div> -->
      <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Orders</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Employee Designation</th>
                    <th>Store Name</th>
                    <th>Store UID</th>
                    <th>Status</th>
                   <!--  <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($orders) {
                    foreach ($orders as $order){
                        ?>
                        <tr>
                        <td><?php echo $order['order_id'];?></td>
                        <td><?php echo $order['order_date'];?></td>
                        <td><?php echo $order['emp_name'];?></td>
                        <td><?php echo $order['role_name'];?></td>
                        <td><?php echo $order['store_name'];?></td>
                        <td><?php echo $order['store_uId'];?></td>
                        <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                        <!-- <td>
                          <button data-toggle="modal" onclick="editOrder(<?php echo $order['order_id'];?>)" data-target="#editModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                          <span><button data-toggle="modal" onclick="viewOrder(<?php echo $order['order_id'];?>)" data-target="#viewModal" class="btn btn-primary fa fa-laptop add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="View details"></button>
                           </span>
                        </td> -->
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