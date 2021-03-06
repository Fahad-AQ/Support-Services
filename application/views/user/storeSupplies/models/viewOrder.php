 <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Orders</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">View Order</div>
              <div class="panel-body">
             
                <table class="table table-bordered">
                    <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Product Id</th>
                    <th>Product Unit</th>
                    <th>Available Stock</th>
                    <th>Requirement Stock</th>
                    <th>Comment Stock</th>
                    <th>Finance Status</th>
                    <th>Supplies Status</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                   <?php 
                   if($selected_orders) {
                    $i=0;
                    foreach ($selected_orders as $selectedOrder){
                      $i++; 
                      ?>
                       <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $selectedOrder['product_name'];?></td>
                        <td><?php echo $selectedOrder['product_unit'];?></td>
                        <td><?php echo $selectedOrder['orderdetails_availableStock'];?></td>
                        <td><?php echo $selectedOrder['orderdetails_requiredItems'];?></td>
                         <td class="alert alert-info"><?php
                          if($selectedOrder['orderdetails_comment'] == null){
                             echo 'Not Available';
                          }
                          else{
                            echo $selectedOrder['orderdetails_comment'];
                          }
                            ?></td>
                        <?php
                        if($selectedOrder['financestatus_id'] == 1){
                        ?>
                        <td ><span class="label label-success"><?php echo $selectedOrder['financestatus_name'];?></span></td>

                        <?php } else if($selectedOrder['financestatus_id'] == 2){
                        ?>
                        <td ><span class="label label-warning"><?php echo $selectedOrder['financestatus_name'];?></span></td>

                        <?php } else {?>  
                         <td ><span class="label label-primary"><?php echo $selectedOrder['financestatus_name'];?></span></td>
                        <?php } ?>                 
                        <td class="alert alert-info"><?php
                          if($selectedOrder['financestatus_id'] == 2 && $selectedOrder['status_id'] == 2 || $selectedOrder['financestatus_id'] == 2 && $selectedOrder['status_id'] == 3){
                             echo 'DECLINED';
                          }
                          else{
                            echo $selectedOrder['status_name'];
                          }
                            ?></td>
                      </tr>
                       <?php
                      }
                   }
                   ?>
                  </tbody>
                  </table>

                   <br/>
                   <br/>
                   <div class="row" >
                      <div class="col-sm-12" >
                          <div class="alert alert-info"> <strong>Supplies Department Comment &nbsp;:</strong>&nbsp;<?php 
                                        if($selectedOrder['order_finalStatusComment'] == "" || $selectedOrder['order_finalStatusComment'] == null){
                                           echo "Not Availble";
                                              
                                             } 
                                        else{
                                            echo $selectedOrder['order_finalStatusComment'] ;    
                                          }


                              ?><br/>
                          </div>
                       </div>
                   </div>


            </section>
          </div>
          <div class="modal-footer">
             <button data-dismiss="modal" style="padding : 15px;" class="btn btn-danger text-right">Close <i class="icon-arrow-right14 position-right"></i></button>
          </div>
        </div>
      </div>

    </div>

  </div>
