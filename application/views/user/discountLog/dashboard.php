
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('discountLog/user/discountLog_dashboard'); ?>">Home</a></li>
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
              <div class="panel-heading">Discounts</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Start Date & Time</th>
                    <th>End Date  & Time</th>
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
                      if($this->session->userdata('roleId') == 3 && $order['sd_email'] == $this->session->userdata('email')){
                     ?>
                      <tr>
                      <td><?php echo $order['orderDiscount_id'];?></td>
                      <td><?php echo $order['orderDiscount_startDate'];?></td>
                       <td> 
                        <?php 
                          if( $order['orderDiscount_endDate'] != null ) {  
                              echo $order['orderDiscount_endDate']; 
                           } 
                          else { 
                            echo 'Not Available';
                          }
                        ?>
                          
                        </td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['role_name'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      
                      </tr>
                      <?php
                      }
                      else if($this->session->userdata('roleId') == 4 && $order['tm_email'] == $this->session->userdata('email')){
                        ?>
                      <tr>
                      <td><?php echo $order['orderDiscount_id'];?></td>
                      <td><?php echo $order['orderDiscount_startDate'];?></td>
                       <td> 
                        <?php 
                          if( $order['orderDiscount_endDate'] != null ) {  
                              echo $order['orderDiscount_endDate']; 
                           } 
                          else { 
                            echo 'Not Available';
                          }
                        ?>
                          
                        </td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      
                      </tr>
                      <?php

                      }
                      else if($this->session->userdata('roleId') == 5 && $order['cm_email'] == $this->session->userdata('email')){
                        ?>
                        <tr>
                        <td><?php echo $order['orderDiscount_id'];?></td>
                        <td><?php echo $order['orderDiscount_startDate'];?></td>
                         <td> 
                        <?php 
                          if( $order['orderDiscount_endDate'] != null ) {  
                              echo $order['orderDiscount_endDate']; 
                           } 
                          else { 
                            echo 'Not Available';
                          }
                        ?>
                          
                        </td>
                        <td><?php echo $order['emp_name'];?></td>
                        <td><?php echo $order['emp_email'];?></td>
                        <td><?php echo $order['store_name'];?></td>
                        <td><?php echo $order['store_uId'];?></td>
                        <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                        
                        </tr>
                        <?php

                      }
                      else {
                        if($order['store_id'] == $this->session->userdata('storeId')){
                        ?>
                          <tr>
                          <td><?php echo $order['orderDiscount_id'];?></td>
                          <td><?php echo $order['orderDiscount_startDate'];?></td>
                           <td> 
                        <?php 
                          if( $order['orderDiscount_endDate'] != null ) {  
                              echo $order['orderDiscount_endDate']; 
                           } 
                          else { 
                            echo 'Not Available';
                          }
                        ?>
                          
                        </td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['emp_email'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                         
                          </tr>
                          <?php
                           }
                        }
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