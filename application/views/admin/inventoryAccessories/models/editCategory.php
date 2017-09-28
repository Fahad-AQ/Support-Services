 <div class="modal-dialog modal-lg"">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Category</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Category</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_category')); ?>
                    <div class="form-group">
                      <label for="name">Category Name:</label>
                       <input type="hidden" name="accessories_category_id" value="<?php echo $selected_category[0]["accessories_category_id"];?>" class="form-control border-info required_colom" required="required" >
                      <input type="text" name="accessories_category_name" value="<?php echo $selected_category[0]["accessories_category_name"];?>" class="form-control border-info required_colom" required="required">
                    </div>
                    <div class="form-group">
                        <label for="activeStatus">Category Status:</label>
                          <select class="form-control" id="activeStatus" name="accessories_category_status" >
                            <option  <?php if($selected_category[0]["accessories_category_status"] == 1){echo 'selected';}?> value="1" >Active</option>
                            <option  <?php if($selected_category[0]["accessories_category_status"] == 2){echo 'selected';}?> value="2">Not Active</option>
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
  var edit_category = $('#edit_category');  
    edit_category.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_category.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_editCategory'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Category Already Exist'){
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Product Already Exist');
                
            }else{
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('Category Edited Succesfully').hide(2500);
               edit_category[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_categoryList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>