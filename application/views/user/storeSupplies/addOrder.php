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
            <li><a href="<?php echo base_url('storeSupplies/user/storeSupplies_dashboard'); ?>">Home</a></li>
            <li class="active">Order</li>
          </ol>
        </div>
      </div>


      
    <!--- Patients Detail -->

        <div class="row" >
              <div class="col-md-12">
                  <section class="panel default blue_title h2" >
                  <div class="panel-heading"><span class="semi-bold"> Requester Information</span> </div>
                  <div class="panel-body" >
                   
                   <p> Store Name : <b><?=$this->session->userdata('store')?></b></p>
                   <p> Store UID : <b><?=$this->session->userdata('storeUid')?></b></p>
                   <p> Sender Name : <b><?=$this->session->userdata('name')?></b></p>
                   <p> Date : <b><?=date('D-M-Y')?></b></p>
                   </div>
                </section>
              </div>
         </div>
        

            <div class="row"> 
                
                <div class="col-md-12" >
                    <section class="panel default blue_title h2" >
                    <div class="panel-heading"><span class="semi-bold"> Note:</span> </div>
                    <div class="panel-body"  >
                      <div class="col-sm-4" >
                      <div class="alert alert-success"> <strong>For Order: </strong>Kindly check all products because you will able to make an order for products <span class="label label-danger">once in a month</span></div>
                    </div>
                     <div class="col-sm-4" >
                      <div class="alert alert-warning"> <strong>Available Draft: </strong> Please update the correct AVAILABLE STOCK LEVEL because finance team will approve according to the mention available stock in level , Kindly use <span class="label label-danger">0.5</span> for (Half Item Remaining) in Available Draft. </div>
                    </div>
                     <div class="col-sm-4" >
                      <div class="alert alert-danger"> <strong>Important :</strong> Check Your Store Name or Store UID while you add an order , if store does n't belong to you then kindly reached out Web Department ,Web Department email address is <span class="label label-danger">web@mobilelinkusa.com</span> , Kindly dont add an order.</div>
                    </div>
                  </section>
                </div>

                 <div class="col-md-12">
                  <section class="panel default blue_title h2">
                    <div class="panel-heading"><span class="semi-bold"> Products</span> </div>
                    <div class="panel-body">
                      <b> Select Product :  </b>
                        <select id="products" class="w300"  multiple="multiple">
                           <?php if($products)
                               foreach ($products as $product){if($product['product_isActive'] == 1 && $product['category_id'] == $this->session->userdata('categoryId')  ){?> 
                                <option value="<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?></option>
                                <?php }}?>
                          </select>
                          <button type="button" id="getSelectsBtn" class="btn btn-primary"><i class="fa fa-laptop"></i> Get Products</button>
                    </div>
                  </section>
                </div>
           </div>

           <div class="row" >
              <div class="col-md-12">
                <section class="panel default blue_title h2" >
                   <div class="panel-heading"><span class="semi-bold">Add Order </span> </div>
                    <div class="panel-body">
              
                     <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'add_order')); ?>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                              <tr>
                                <th>S .No</th>
                                <th>Regular Supplies</th>
                                <th>Unit</th>
                                <th>Available stock</th>
                                <th>Required Items</th>
                                <th>Comment</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                             <tr id="myTableRow">
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td>Kindly Select Products</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                             </tr>
               
                            </tbody>
                          </table>
                <!--  <?php if($this->session->userdata('roleId') == '3' ){
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

                 <?php } else if($this->session->userdata('roleId') == '4' ){
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
                  else if($this->session->userdata('roleId') == '5'){
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
                  ?> -->
                      <div >
                    <div id="msg2">
                       <p class="msg alert"></p>
                    </div> 
                  </div>
                   
                 
                  <div style="margin-bottom : 20px;margin-top : 70px;">
                      <div style="margin-right : 50px">
                       <p class="text-right"><span class="text-right"> <button type="submit" style="padding : 15px;" class="btn btn-primary text-right">Submit <i class="icon-arrow-right14 position-right"></i></button></span></p>   
                      </div> 
                  </div>
                 
              </div>

            </section>
          </div>
        </div>


  </div>
</div>
<script>

  $('#show_order').hide();
  $('#msg2').hide();
  $('.msg2').hide();
  var add_order = $('#add_order');  
    add_order.on('submit',function(e){
      e.preventDefault();
      $('.onlySpecificNumber').on('keydown keyup', function(e){
            if ($(this).val() != 1  && e.keyCode != 46 // delete
                && e.keyCode != 8 // backspace
               ) {
               e.preventDefault();
               $(this).val(1);
               return true;
            }
        });
      $('#msg2').show();
      $('.msg').removeClass('alert-info');
      $('.msg').removeClass('alert-danger');
      $('.msg').addClass('alert-success');
      $('.msg').show().html('Please Wait');


      // confirm code




      //
      
      var new_prd_add = add_order.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        if(new_prd_add) {

          

           $.confirm({
                  title: 'Please Confirm Store',
                  content: '' +
                  '<form action="" class="formName">' +
                   '<div class="form-group">' +
                   '<p>' +
                    'Example : 70144111' +
                   '</p>' +
                   '</div>' +
                  '<div class="form-group">' +
                  '<label>Please Type Your Current Store Unique ID , Kindly Use MTD Report</label>' +
                  '<input type="text" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" minlength="8" maxlength="8" onkeypress="return isStoreNumber(event)" placeholder="Store UID" class="confirmStoreUID form-control" required />' +
                  '</div>' +
                  '</form>',
                  buttons: {
                      formSubmit: {
                          text: 'Submit',
                          btnClass: 'btn-blue',
                          action: function () {
                              var alerMessage = $("<div class='msg2 alert'></div>") 
                              $(".formName").prepend(alerMessage); 
                              var strorUID = this.$content.find('.confirmStoreUID').val();
                              var currentstrorUID = <?=$this->session->userdata('storeUid')?>;

                              if(strorUID ==""){          
                                  
                                  $('.msg2').show();
                                  $('.msg2').removeClass('alert-success');
                                  $('.msg2').removeClass('alert-info');
                                  $('.msg2').addClass('alert-danger');
                                  $('.msg2').show().html('Please Type Store UID');
                                  setTimeout(function(){
                                    $(".msg2").remove();
                                  },5000)
                                  return  false;
                                
                              }
                               else if(strorUID.length < 8){          
                                  
                                  $('.msg2').show();
                                  $('.msg2').removeClass('alert-success');
                                  $('.msg2').removeClass('alert-info');
                                  $('.msg2').addClass('alert-danger');
                                  $('.msg2').show().html('Please Type 8 digit Store UID');
                                  setTimeout(function(){
                                    $(".msg2").remove();
                                  },5000)
                                  return  false;
                                
                              }
                             else if(strorUID !="" && strorUID != currentstrorUID ){

                                  $('.msg2').show();
                                  $('.msg2').removeClass('alert-success');
                                  $('.msg2').removeClass('alert-info');
                                  $('.msg2').addClass('alert-danger');
                                  $('.msg2').show().html('Sorry Store UID not Matched , Kindly reached out Web Department ');
                                  setTimeout(function(){
                                    $(".msg2").remove();
                                  },5000)
                                   return  false;
                                
                              }
                              else if(strorUID !="" && strorUID == currentstrorUID ){
                                   $.ajax({
                                        type:'POST',
                                        url:'<?php echo base_url('storeSupplies/user/storeSupplies_add_order'); ?>',
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
                                              setTimeout(function(){location.href="<?php echo base_url('storeSupplies/user/storeSupplies_orderList'); ?>"} , 2500);  
                                          }
                                        },
                                        error:function(data){console.log('error: '+data.responseText);}
                                      });
                                   setTimeout(function(){
                                    $(".msg2").remove();
                                  },5000)
                              }
                          }
                      },
                      cancel: function () {
                          //close
                      },
                  },
                  onContentReady: function () {
                      // bind to events
                      var jc = this;
                      this.$content.find('.formName').on('submit', function (e) {
                          // if the user submits the form by pressing enter in the field.
                          e.preventDefault();
                          jc.$$formSubmit.trigger('click'); // reference the button and click it
                      });
                  }
              });

          

        }
        else{
              $('#msg2').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Please Select Products')
             
        }
        
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
         $("#products").multipleSelect({
              filter: true,
              placeholder: "Select Products For Order"
         });

        $("#getSelectsBtn").click(function() {
                       $('.msg').hide()
                       $('#myTableRow').remove();
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
                                            url:'<?php echo base_url('storeSupplies/user/storeSupplies_getSelectedProduct'); ?>',
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
                                                       var rowCount = $('#myTable tr').length;
                                                        var row = table.insertRow(rowCount);
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
                                                          cell4.innerHTML = "<p><input type='hidden' name='product_id[]' value="+data.objectGet[0]["product_id"]+" ;/><input type='text'  step='any' name='avl[]'  placeholder='Type Available Stock' onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' onkeypress='return isNumber(event)' minlength='1' maxlength='3' class='form-control border-info required_colom txtInput' required='required'><b>PER "+data.objectGet[0]["product_unit"].substr(data.objectGet[0]["product_unit"].indexOf("-") + 1)+"</b></p>";
                                                          cell5.innerHTML = "<p><input type='hidden'  step='any' name='rmt[]'  minlength='1' maxlength='1'  onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' placeholder='Type Required Stock' class='form-control border-info required_colom txtInput onlySpecificNumber' onkeypress='return requrementIsNumber(event)' required='required' value='1' ><input type='text'  step='any' disabled name='rmt[]'  minlength='1' maxlength='1'  onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' placeholder='Type Required Stock' class='form-control border-info required_colom txtInput onlySpecificNumber' onkeypress='return requrementIsNumber(event)' required='required' value='1' > <b>PER Unit</b></p>";
                                                          cell6.innerHTML = "<p><input type='text'  step='any' name='cmt[]'  placeholder='Type Comment' class='form-control border-info'>"+"</p>";
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
                                            url:'<?php echo base_url('storeSupplies/user/storeSupplies_getSelectedProduct'); ?>',
                                            data: {'product_id' : values[i] },
                                            dataType:'JSON',
                                            success:function(data){ 
                                              if(data.status == 'true'){
                                                    var table = document.getElementById("myTable");
                                                    var rowCount = $('#myTable tr').length;
                                                    var row = table.insertRow(rowCount);
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
                                                    cell4.innerHTML = "<p><input type='hidden' name='product_id[]' value="+data.objectGet[0]["product_id"]+" ;/><input type='text'  step='any' name='avl[]'  placeholder='Type Available Stock'  onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' minlength='1' maxlength='3' onkeypress='return isNumber(event)' class='form-control border-info required_colom txtInput' required='required'> <b>PER "+data.objectGet[0]["product_unit"].substr(data.objectGet[0]["product_unit"].indexOf("-") + 1)+"</b></p>";
                                                    cell5.innerHTML = "<p><input type='hidden'  step='any' name='rmt[]'  minlength='1' maxlength='1'  onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' placeholder='Type Required Stock' onkeypress='return requrementIsNumber(event)' class='form-control border-info required_colom txtInput onlySpecificNumber' required='required'  value='1'><input type='text' disabled step='any' name='rmt[]'  minlength='1' maxlength='1'  onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' placeholder='Type Required Stock' onkeypress='return requrementIsNumber(event)' class='form-control border-info required_colom txtInput onlySpecificNumber' required='required'  value='1'><b>PER Unit</b></p>";
                                                    cell6.innerHTML = "<p><input type='text'  step='any' name='cmt[]'  placeholder='Type Comment' class='form-control border-info'>"+"</p>";
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
    <script>
          function isStoreNumber(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
               if (charCode > 31 && ( charCode < 48 || charCode > 57)) {
                    return false;
                }
              
              return true;
          
          }
      
          function isNumber(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode != 46) {
                  if (charCode > 31 && ( charCode < 48 || charCode > 57)) {
                    return false;
                }
              }
              
              return true;
          
          }
          function requrementIsNumber(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode > 31 && ( charCode < 48 || charCode > 57)) {
                  return false;
              }
              else{
                $(document).ready(function(){
                     
                    $('.onlySpecificNumber').on('keydown keyup', function(e){
                        if ($(this).val() != 1  && e.keyCode != 46 // delete
                            && e.keyCode != 8 // backspace
                           ) {
                           e.preventDefault();
                           $(this).val(1);
                           return true;
                        }
                    });

                });

              }

              
          }

       $(document).ready(function(){
            $('.txtInput').bind("paste",function(e) {
            e.preventDefault();
            });
            $('.onlySpecificNumber').on('keydown keyup', function(e){
                if ($(this).val() > 1 && e.keyCode != 46 // delete
                    && e.keyCode != 8 // backspace
                   ) {
                   e.preventDefault();
                   $(this).val(1);
                }
            });
         });
    </script>