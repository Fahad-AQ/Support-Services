<style>
  .redborder1{
    border-color:red;
  }       
</style>
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Order</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('user/maintenance_dashboard'); ?>">Home</a></li>
            <li class="active">Order</li>
          </ol>
        </div>
      </div>
      
		<!--- Patients Detail -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Add Order</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'add_order')); ?>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S .No</th>
                        <th>Regular Supplies</th>
                        <th>Unit</th>
                        <th>Available stock</th>
                        <th>Required Items</th>
                        <th>Comment</th>
                      </tr>
                    </thead>
                    <tbody>
               <?php if($products)
                foreach ($products as $product){if($product['product_isActive'] == 1 ){?> 
                  <input type="hidden" name="product_id[]" value="<?php echo $product['product_id'];?>"/>  
                <tr>
                  <td><?php echo $product['product_id'];?></td>
                  <td><?php echo $product['product_name'];?></td>
                  <td><?php echo $product['product_unit'];?></td>
                  <td><input type="number"  step='any' name="avl[]"  min="0" placeholder="Type Available Stock" class="form-control border-info required_colom" required="required">
                  <?php echo substr($product['product_unit'], strpos($product['product_unit'], "-") + 1)?>
                  </td>
                  <td><input type="number"  step='any' name="rmt[]"  min="0" placeholder="Type Required Stock" class="form-control border-info required_colom" required="required">
                  <?php echo substr($product['product_unit'], strpos($product['product_unit'], "-") + 1)?>
                  </td>
                  <td><input type="text"  step='any' name="cmt[]"  placeholder="Type Comment" class="form-control border-info required_colom" required="required">
                  </td>
                </tr> 
                <?php 
                }
                } ?>  
                    </tbody>
                  </table>
                 <?php if($this->session->userdata('roleId') == '2' ){
                  ?>
                        <div class="form-group">
                                <label for="activeStatus">Select Store:</label>
                                  <select class="form-control" id="activeStatus" name="store_id">
                                  <?php foreach ($stores as $key => $store) {
                                         if($store["sd_email"] == $this->session->userdata('email')){
                                          ?>
                                         <option value="<?php echo $store["store_id"];?>"><?php echo $store["store_name"];?></option>
                               <?php   }
                               }; ?>

                                  </select>
                          </div>

                 <?php } else if($this->session->userdata('roleId') == '3' ){
                  ?>
                  <div class="form-group">
                            <label for="activeStatus">Select Store:</label>
                              <select class="form-control" id="activeStatus" name="store_id">
                              <?php foreach ($stores as $key => $store) {
                                     if($store["tm_email"] == $this->session->userdata('email')){
                                      ?>
                                     <option value="<?php echo $store["store_id"];?>"><?php echo $store["store_name"];?></option>
                           <?php   }
                           }; ?>

                              </select>
                      </div>
                 <?php }
                  else if($this->session->userdata('roleId') == '4'){
                  ?>
                  <div class="form-group">
                          <label for="activeStatus">Select Store:</label>
                            <select class="form-control" id="activeStatus" name="store_id">
                            <?php foreach ($stores as $key => $store) {
                                   if($store["cm_email"] == $this->session->userdata('email')){
                                    ?>
                                   <option value="<?php echo $store["store_id"];?>"><?php echo $store["store_name"];?></option>
                         <?php   }
                         }; ?>

                            </select>
                    </div>

                  <?php }
                  ?>
                   
                  <div >
                      <div id="msg2">
                         <p class="msg alert"></p>
                      </div> 
                  </div>
                  <div style="margin-bottom : 20px;margin-top : 70px;">
                      <div style="margin-right : 50px">
                         <p class="text-left"><span>Note : Please check all things once you submit<span>   </p>
                         <p class="text-right"><span class="text-right"> <button type="submit" style="padding : 15px;" class="btn btn-primary text-right">Submit <i class="icon-arrow-right14 position-right"></i></button></span></p>
                      </div> 
                  </div>
                 
              </div>

            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#msg2').hide();
  var add_order = $('#add_order');  
    add_order.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = add_order.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('user/add_order'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Order Already Exist'){
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Order Already Exist');
                
            }else{
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('Order Added Succesfully').hide(2500);
               add_order[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('user/orderList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/multiple-select.js"></script> 
   <script>
           function deleteRow(s) {
                    $("#myTable tr").each(function( i ) {
                      $("td", this).each(function( j ) {
                        if($(this).text() == s){
                             document.getElementById("myTable").deleteRow(i)
                        }
                       
                      });
                    });
           }
         $("select").multipleSelect({
              filter: true,
              placeholder: "Select Products For Order"
         });

        $("#getSelectsBtn").click(function() {
                      $('.msg').hide()
                       var values = $('#products').val();

                          if(values){
                              $('#msg2').show();
                              $('.msg').addClass('alert-success');
                              $('.msg').removeClass('alert-info');
                              $('.msg').show().html('Please Wait')

                            var values2 = $("input[name='product_id[]']")
                           .map(function(){return $(this).val();}).get();

                           if(values2.length !=0){


                               for(var i = 0 ; i < values.length ; i++ ){

                                       $.ajax({
                                            type:'POST',
                                            url:'<?php echo base_url('User/storeSupplies_getSelectedProduct'); ?>',
                                            data: {'product_id' : values[i] },
                                            dataType:'JSON',
                                            success:function(data){ 
                                              if(data.status == 'true'){
                                                var duplicateFound = false;
                                                 var values2 = $("input[name='product_id[]']")
                                                   .map(function(){

                                                        if($(this).val() == data.objectGet[0]["product_id"]){
                                                           duplicateFound = true;
                                                           $('#msg2').hide();
                                      
                                                        } 

                                                   });
                                                    if (duplicateFound == false ) {
                                                       var table = document.getElementById("myTable");
                                                          var row = table.insertRow(1);
                                                          // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                                                          var cell1 = row.insertCell(0);
                                                          var cell2 = row.insertCell(1);
                                                          var cell3 = row.insertCell(2);
                                                          var cell4 = row.insertCell(3);
                                                          var cell5 = row.insertCell(4);
                                                          var cell6 = row.insertCell(5);
                                                          var cell7 = row.insertCell(6);

                                                          // Add some text to the new cells:
                                                          var product_id = data.objectGet[0]["product_id"];
                                                          cell1.innerHTML = data.objectGet[0]["product_id"];
                                                          cell2.innerHTML = data.objectGet[0]["product_name"];
                                                          cell3.innerHTML = data.objectGet[0]["product_unit"];
                                                          cell4.innerHTML = "<p><input type='hidden' name='product_id[]' value="+data.objectGet[0]["product_id"]+" ;/><input type='number'  step='any' name='avl[]''  min='0' placeholder='Type Available Stock' class='form-control border-info required_colom' required='required'>"+data.objectGet[0]["product_unit"].substr(data.objectGet[0]["product_unit"].indexOf("-") + 1)+"</p>";
                                                          cell5.innerHTML = "<p><input type='number'  step='any' name='rmt[]''  min='1' placeholder='Type Required Stock' class='form-control border-info required_colom' required='required'>"+data.objectGet[0]["product_unit"].substr(data.objectGet[0]["product_unit"].indexOf("-") + 1)+"</p>";
                                                          cell6.innerHTML = "<p><input type='text'  step='any' name='cmt[]''  placeholder='Type Comment' class='form-control border-info required_colom' required='required'>"+"</p>";
                                                            cell7.innerHTML = "<button  onclick='deleteRow("+product_id+")' class='btn btn-danger'>remove</button>";
                                                             $('#msg2').hide();
                                                    }
                                                      
                                                  
                                                 
                                                 }

                                            },
                                            error:function(data){console.log('error: '+data.responseText);}
                                          });

                                      }
                                       
                           }else {

                                 for(var i = 0 ; i < values.length ; i++ ){
                                       $.ajax({
                                            type:'POST',
                                            url:'<?php echo base_url('User/storeSupplies_getSelectedProduct'); ?>',
                                            data: {'product_id' : values[i] },
                                            dataType:'JSON',
                                            success:function(data){ 
                                              if(data.status == 'true'){
                                                    var table = document.getElementById("myTable");
                                                    var row = table.insertRow(1);
                                                    // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                                                    var cell1 = row.insertCell(0);
                                                    var cell2 = row.insertCell(1);
                                                    var cell3 = row.insertCell(2);
                                                    var cell4 = row.insertCell(3);
                                                    var cell5 = row.insertCell(4);
                                                    var cell6 = row.insertCell(5);
                                                    var cell7 = row.insertCell(6);

                                                    // Add some text to the new cells:
                                                    var product_id = data.objectGet[0]["product_id"];
                                                    cell1.innerHTML = data.objectGet[0]["product_id"];
                                                    cell2.innerHTML = data.objectGet[0]["product_name"];
                                                    cell3.innerHTML = data.objectGet[0]["product_unit"];
                                                    cell4.innerHTML = "<p><input type='hidden' name='product_id[]' value="+data.objectGet[0]["product_id"]+" ;/><input type='number'  step='any' name='avl[]'  min='0' placeholder='Type Available Stock' class='form-control border-info required_colom' required='required'>"+data.objectGet[0]["product_unit"].substr(data.objectGet[0]["product_unit"].indexOf("-") + 1)+"</p>";
                                                    cell5.innerHTML = "<p><input type='number'  step='any' name='rmt[]'  min='1' placeholder='Type Required Stock' class='form-control border-info required_colom' required='required'>"+ data.objectGet[0]["product_unit"].substr(data.objectGet[0]["product_unit"].indexOf("-") + 1)+"</p>";
                                                    cell6.innerHTML = "<p><input type='text'  step='any' name='cmt[]'  placeholder='Type Comment' class='form-control border-info required_colom' required='required'>"+"</p>";
                                                    cell7.innerHTML = "<button  type='button' onclick='deleteRow("+product_id+")' class='btn btn-danger'>remove</button>";
                                                    $('#msg2').hide();
                                                    
                                                 
                                                 }

                                            },
                                            error:function(data){console.log('error: '+data.responseText);}
                                          });
                                  }

                           }
                 }

            
          $('#products').val(null);
        });
    </script>