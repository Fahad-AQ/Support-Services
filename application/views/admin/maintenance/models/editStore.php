 <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stores</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Store</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_store')); ?>
                    <div class="form-group">
                      <label for="name">Store Name:</label>
                       <input type="hidden" name="store_id" value="<?php echo $selected_stores[0]["store_id"];?>" class="form-control border-info required_colom" required="required" id="name">
                      <input type="text" name="store_name" value="<?php echo $selected_stores[0]["store_name"];?>" class="form-control border-info required_colom" required="required" id="name">
                    </div>
                     <div class="form-group">
                      <label for="name">Store Unique ID:</label>
                      <input type="number" name="store_uId" value="<?php echo $selected_stores[0]["store_uId"];?>" class="form-control border-info required_colom" required="required" id="name">
                    </div>

                   <div class="form-group">
                        <label for="activeStatus">Selected Market:</label>
                          <select class="form-control" id="activeStatus" name="market_id">
                          <?php foreach ($markets as $key => $market) {?>
                                 <option  <?php if($selected_stores[0]["market_name"] == $market["market_name"]){echo 'selected';}?> value="<?php echo $market["market_id"];?>"><?php echo $market["market_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>
                   <div class="form-group">
                        <label for="activeStatus">Selected SD:</label>
                          <select class="form-control" id="activeStatus" name="sd_id">
                          <?php foreach ($sds as $key => $sd) {?>
                                 <option  <?php if($selected_stores[0]["sd_name"] == $sd["sd_name"]){echo 'selected';}?> value="<?php echo $sd["sd_id"];?>"><?php echo $sd["sd_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>
                   <div class="form-group">
                        <label for="activeStatus">Selected TM:</label>
                          <select class="form-control" id="activeStatus" name="tm_id">
                          <?php foreach ($tms as $key => $tm) {?>
                                 <option  <?php if($selected_stores[0]["tm_name"] == $tm["tm_name"]){echo 'selected';}?> value="<?php echo $tm["tm_id"];?>"><?php echo $tm["tm_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>
                   <div class="form-group">
                        <label for="activeStatus">Selected CM:</label>
                          <select class="form-control" id="activeStatus" name="cm_id">
                          <?php foreach ($cms as $key => $cm) {?>
                                 <option  <?php if($selected_stores[0]["cm_name"] == $cm["cm_name"]){echo 'selected';}?> value="<?php echo $cm["cm_id"];?>"><?php echo $cm["cm_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>

                    <div class="form-group">
                        <label for="activeStatus">Store Status:</label>
                          <select class="form-control" id="activeStatus" name="store_status" >
                            <option  <?php if($selected_stores[0]["store_status"] == 1){echo 'selected';}?> value="1" >Active</option>
                            <option  <?php if($selected_stores[0]["store_status"] == 2){echo 'selected';}?> value="2">Not Active</option>
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
  var edit_store = $('#edit_store');  
    edit_store.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_store.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('admin/editStore'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Store Already Exist'){
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Store Already Exist');
                
            }else{
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('Store Edited Succesfully').hide(2500);
               edit_store[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('admin/storeList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>