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
              <div class="panel-heading">View Discounts</div>
              <div class="panel-body">
             
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th>S. NO</th>
                          <th>Invoice</th>
                          <th>CTN</th>
                          <th>Activation Fee</th>
                          <th>Upgrade Fee</th>
                          <th>Activation discount</th>
                          <th>Simm Discount</th>
                          <th>Approved Discount</th>
                          <th>Remarks</th>
                          <th>Discount Type</th>
                          <th>Status</th>
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
                              <td><b><?php echo $selectedOrder['discountLog_invoice'];?></b></td>
                              <td><b><?php echo $selectedOrder['discountLog_ctn'];?></b></td>
                              <td><b><?php echo $selectedOrder['discountLog_activationFee'];?></b></td>
                              <td><b><?php echo $selectedOrder['discountLog_upgradeFee'];?></b></td>
                              <td><b><?php echo $selectedOrder['discountLog_activationDiscount'];?></b></td>
                              <td><b><?php echo $selectedOrder['discountLog_simDiscount'];?></b></td>
                              <?php
                              if($selectedOrder['discountLog_approverDiscount']  >= 0 && $selectedOrder['discountLog_approverDiscount'] != null){
                              ?>
                              <td ><b><?php echo $selectedOrder['discountLog_approverDiscount'];?></b></td>
                              <td ><b><?php echo $selectedOrder['discountLog_remarks'];?></b></td>

                              <?php }?>
                              <?php
                              if($selectedOrder['discountLog_approverDiscount']  == null){
                              ?>
                              <td ><b><?php echo 'Not Available';?></b></td>
                              <td ><b><?php echo  'Not Available'; ?></b></td>

                              <?php }?>
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
                              <?php
                              if($selectedOrder['discountLog_typeId'] == 1){
                              ?>
                              <td ><span class="label label-info"><?php echo $selectedOrder['discountLog_typeName'];?></span></td>

                              <?php } else {?>  
                               <td ><span class="label label-info"><?php echo $selectedOrder['discountLog_typeName'];?></span></td>
                              <?php } ?>                 
                              
                            </tr>
                             <?php
                            }
                         }
                         ?>
                        </tbody>
                        </table>


            </section>
          </div>
          <div class="modal-footer">
             <button data-dismiss="modal" style="padding : 15px;" class="btn btn-danger text-right">Close <i class="icon-arrow-right14 position-right"></i></button>
          </div>
        </div>
      </div>

    </div>

  </div>
