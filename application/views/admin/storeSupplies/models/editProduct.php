 <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Products</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit Product</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_product')); ?>
                    <div class="form-group">
                      <label for="name">Product Name:</label>
                       <input type="hidden" name="product_id" value="<?php echo $selected_products[0]["product_id"];?>" class="form-control border-info required_colom" required="required" id="name">
                      <input type="text" name="product_name" value="<?php echo $selected_products[0]["product_name"];?>" class="form-control border-info required_colom" required="required" id="name">
                    </div>
                    <div class="form-group">
                      <label for="unit">Product Unit:</label>
                      <input type="text" name="product_unit" value="<?php echo $selected_products[0]["product_unit"];?>" class="form-control border-info required_colom" required="required" id="unit">
                    </div>
                    <div class="form-group">
                      <label for="code">Product Code:</label>
                      <input type="text" name="product_code" value="<?php echo $selected_products[0]["product_code"];?>" class="form-control border-info required_colom" required="required" id="code">
                    </div>

                    <div class="form-group">
                        <label for="activeStatus">Select Portal:</label>
                          <select class="form-control" id="activeStatus" name="category_id" >
                             <?php foreach ($categorys as $key => $category) {if($category["category_name"] == 'Store Supplies'){?>
                                 <option  <?php if($selected_products[0]["category_id"] == $category["category_id"]){echo 'selected';}?> value="<?php echo $category["category_id"];?>"><?php echo $category["category_name"];?></option>
                              <?php }}; ?>
                          </select>
                     </div>

                    <div class="form-group">
                        <label for="activeStatus">Product Status:</label>
                          <select class="form-control" id="activeStatus" name="product_isActive" >
                            <option  <?php if($selected_products[0]["product_isActive"] == 1){echo 'selected';}?> value="1" >Active</option>
                            <option  <?php if($selected_products[0]["product_isActive"] == 2){echo 'selected';}?> value="2">Not Active</option>
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
  var edit_product = $('#edit_product');  
    edit_product.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_product.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('storeSupplies/admin/storeSupplies_editProduct'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Product Already Exist'){
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
              $('.msg').show().html('Product Edited Succesfully').hide(2500);
               edit_product[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('storeSupplies/admin/storeSupplies_productList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>