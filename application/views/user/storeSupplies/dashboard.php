
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('storeSupplies/user/storeSupplies_dashboard'); ?>">Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
      <?php if($this->session->userdata('roleId') == 6 || $this->session->userdata('roleId') == 7|| $this->session->userdata('roleId') == 8|| $this->session->userdata('roleId') == 9){
      ?>
      <div class="row">
        <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-building-o icon"></i></div>
                <span>Market Name</span>
                <h3 class="bolded"><?php echo $this->session->userdata('market'); ?></h3>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <div class="pull-right" id="work-progress2"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></div>
              </div>
            </div>
          </div>
    
          <div class="col-sm-3 col-sm-6">
           <div class="information gray_info">
              <div class="information_inner">
              <div class="info gray_symbols"><i class="fa fa-map-marker icon"></i></div>
                <span>Store Name</span>
                <h3 class="bolded"><?php echo $this->session->userdata('store'); ?></h3>
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
                <div class="info green_symbols"><i class="fa fa-pencil-square-o icon"></i></div>
                <span>Store UID</span>
                <h3 class="bolded"><?php echo $this->session->userdata('storeUid'); ?></h3>
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
              <div class="info red_symbols"><i class="fa fa-user icon"></i></div>
                <span>Employee Role</span>
                <h3 class="bolded"><?php echo $this->session->userdata('role'); ?></h3>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
                <div class="pull-right" id="work-progress3"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
        </div>
        <?php }; ?>
      <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Orders</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Ticket Unique ID</th>
                    <th>Date</th>
                    <th>Employee Name</th>
                    <th>Employee Designation</th>
                    <th>Store Name</th>
                    <th>Store UID</th>
                    <th>Status</th>
                    <th>Status Comment</th>
                   <!--  <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>

                  
                   
                 <?php 
                   if($orders) {
                    $i=0;
                    foreach ($orders as $order){
                      if($this->session->userdata('roleId') == 3 && $order['sd_email'] == $this->session->userdata('email')){
                       $i++;
                     ?>
                      <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $order['order_refNo'];?></td>
                      <td><?php echo $order['order_date'];?></td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      <td style="width:20px">
                            <?php 
                                 if($order['order_finalStatusComment'] == "" || $order['order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['order_finalStatusComment'],0 ,10).'....';    
                                  }


                              ?>

                          </td>
                     
                      </tr>
                      <?php
                      }
                      else if($this->session->userdata('roleId') == 4 && $order['tm_email'] == $this->session->userdata('email')){
                         $i++;
                        ?>
                      <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $order['order_refNo'];?></td>
                      <td><?php echo $order['order_date'];?></td>
                      <td><?php echo $order['emp_name'];?></td>
                      <td><?php echo $order['emp_email'];?></td>
                      <td><?php echo $order['store_name'];?></td>
                      <td><?php echo $order['store_uId'];?></td>
                      <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                      <td style="width:20px">
                            <?php 
                                 if($order['order_finalStatusComment'] == "" || $order['order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['order_finalStatusComment'],0 ,10).'....';    
                                  }


                              ?>

                          </td>
                      
                      </tr>
                      <?php

                      }
                      else if($this->session->userdata('roleId') == 5 && $order['cm_email'] == $this->session->userdata('email')){
                         $i++;
                        ?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $order['order_refNo'];?></td>
                        <td><?php echo $order['order_date'];?></td>
                        <td><?php echo $order['emp_name'];?></td>
                        <td><?php echo $order['emp_email'];?></td>
                        <td><?php echo $order['store_name'];?></td>
                        <td><?php echo $order['store_uId'];?></td>
                        <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                        <td style="width:20px">
                            <?php 
                                 if($order['order_finalStatusComment'] == "" || $order['order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['order_finalStatusComment'],0 ,10).'....';    
                                  }


                              ?>

                          </td>
                        
                        </tr>
                        <?php

                      }
                      else {
                        if($order['store_id'] == $this->session->userdata('storeId')){
                           $i++;
                        ?>
                          <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $order['order_refNo'];?></td>
                          <td><?php echo $order['order_date'];?></td>
                          <td><?php echo $order['emp_name'];?></td>
                          <td><?php echo $order['emp_email'];?></td>
                          <td><?php echo $order['store_name'];?></td>
                          <td><?php echo $order['store_uId'];?></td>
                          <td class="alert alert-info"><?php echo $order['status_name'];?></td>
                          <td style="width:20px">
                            <?php 
                                 if($order['order_finalStatusComment'] == "" || $order['order_finalStatusComment'] == null){
                                   echo "Not Availble";
                                      
                                     } 
                                else{
                                    echo substr($order['order_finalStatusComment'],0 ,10).'....';    
                                  }


                              ?>

                          </td>
                         
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