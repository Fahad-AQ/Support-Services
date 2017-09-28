<style>
  .redborder1{
    border-color:red;
  }       
</style>
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Discounts</h1>
          <h2 class="">User</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('discountLog/user/discountLog_dashboard'); ?>">Home</a></li>
            <li class="active">Discounts</li>
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
                      <div class="col-sm-6" >
                      <div class="alert alert-warning"> <strong>For Discount: </strong>Kindly check all things before you will able to make an discounts</div>
                    </div>

                     <div class="col-sm-6" >
                      <div class="alert alert-danger"> <strong>Important :</strong> Check Your Store Name or Store UID while you add a discount , if store does n't belong to you then kindly reached out Web Department ,Web Department email address is <span class="label label-danger">web@mobilelinkusa.com</span> , Kindly dont add a discount.</div>
                    </div>
                  </section>
                </div>

               
           </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Add Discount</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'discountLog_add_order')); ?>
           
               
                 <table class="table table-bordered" id="myTable2">
                    <thead>
                      <tr>
                        <th>S. NO</th>
                        <th>INVOICE</th>
                        <th>Discount Type</th>
                        <th>CTN</th>
                        <th>IMEI</th>
                        <th>Discount Amount</th>
                        <th>Approved By (SD | TM | CM)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td>1
                      </td>
                      <td><input type="text"  step='any' name="invoice[]"  min="0" placeholder="Type Invoice Stock" class="form-control border-info required_colom" required="required">
                      </td>
                      <td>
                            <select id="activeStatus" name="discountTypes[]">
                               <option value="1">Activation Fee</option>
                               <option value="2">Upgrade Fee</option>
                            </select>
                       </td>
                       <td><input type="number"  step='any' name="ctns[]"  min="0" placeholder="Type Activation Fee" class="form-control border-info required_colom" required="required">
                      </td>
                       <td><input type="number"  step='any' name="imeis[]"  min="0" placeholder="Type Upgrade Fee" class="form-control border-info required_colom" required="required">
                      </td>
                       <td><input type="number"  step='any' name="discountAmounts[]"  min="0" placeholder="Type Activation Discount" class="form-control border-info required_colom" required="required">
                      </td>
                       <td><input type="number"  step='any' name="approvedBy[]"  min="0" placeholder="Type Simm Discount" class="form-control border-info required_colom" required="required">
                      </td>
                      <td> 
                         <div class="text-center">
                            <button type="button" onclick="removeRow(1)" class="btn btn-danger removebutton" style="border-radius: 100%" >-</button>
                        </div>
                       </td>
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
                   <div class="text-right" >
                      <button  type="button"  id="getAddBtn" class="btn btn-success" style="border-radius: 100%" >+</button>
                  </div>
                  <br>
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
  var discountLog_add_order = $('#discountLog_add_order');  
    discountLog_add_order.on('submit',function(e){
      e.preventDefault();
      $('#msg2').show();
      $('.msg').removeClass('alert-info');
      $('.msg').removeClass('alert-danger');
      $('.msg').addClass('alert-success');
      $('.msg').show().html('Please Wait');

       var new_prd_add = discountLog_add_order.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });

      
      if(assetserror > 0){return false;}else{
        if(new_prd_add){
          var valid = true;



             $.each($('input[name="ctns[]"]'), function (index1, item1) {

                  $.each($('input[name="ctns[]"]').not(this), function (index2, item2) {

                      if ($(item1).val() == $(item2).val()) {
                          $(item1).css("border-color", "red");
                          $(item2).css("border-color", "red");
                          $('#msg2').show();
                          $('.msg').removeClass('alert-success');
                          $('.msg').removeClass('alert-info');
                          $('.msg').addClass('alert-danger');
                          $('.msg').show().html('You have entered same CTN number');
                          valid = false;
                      }
                      else{
                         $(item1).css("border-color", "1px solid #CECECE");
                      }

                       });
                    });

                   if(valid){

                      

                               $.ajax({
                                      type:'POST',
                                      url:'<?php echo base_url('discountLog/user/discountLog_add_order'); ?>',
                                      data:new_prd_add,
                                      dataType:'JSON',
                                      success:function(data){ 
                                        
                                        if(data.status == 'CTN number already exist'){
                                          console.log(data);
                                             $.each($('input[name="ctns[]"]'), function (index1, item1) { 
                                              if ($(item1).val() == data.obj[0]["discountLog_ctn"]) {
                                                $(item1).css("border-color", "red");

                                              }

                                             });
                                          $('#msg2').show();
                                          $('.msg').removeClass('alert-success');
                                          $('.msg').removeClass('alert-danger');
                                          $('.msg').addClass('alert-info');
                                          $('.msg').show().html('This CTN number '+ data.obj[0]["discountLog_ctn"] +' already exist On Other Store');
                                            
                                        }
                                        else if(data.status == 'Order Already Exist'){
                                          console.log(data);
                                          $('#msg2').show();
                                          $('.msg').removeClass('alert-success');
                                          $('.msg').removeClass('alert-danger');
                                          $('.msg').addClass('alert-info');
                                          $('.msg').show().html('Order Already Exist');
                                            
                                        }else{
                                          console.log(data);
                                          $('#msg2').show();
                                          $('.msg').removeClass('alert-info');
                                          $('.msg').removeClass('alert-danger');
                                          $('.msg').addClass('alert-success');
                                          $('.msg').show().html('Order Added Succesfully').hide(2500);
                                           discountLog_add_order[0].reset();
                                            setTimeout(function(){location.href="<?php echo base_url('user/discountLog_orderList'); ?>"} , 2500);  
                                        }
                                      },
                                      error:function(data){console.log('error: '+data.responseText);}
                                    });
                    }
                  }
                  else{
                    $('#msg2').show();
                    $('.msg').removeClass('alert-success');
                    $('.msg').removeClass('alert-danger');
                    $('.msg').addClass('alert-info');
                    $('.msg').show().html('Please Click (+) to add Field');

                  }
        
             }
       });
</script>



<script src="<?php echo base_url(); ?>assets/js/multiple-select.js"></script> 
   <script>
           var buttonId = 1;
          function removeRow(number){
             $("#myTable2 tr").each(function( i ) {
                      $("td", this).each(function( j ) {
                        if($(this).text() == number){
                             document.getElementById("myTable2").deleteRow(i)
                        }
                       
                      });
                    });
          }

         $("select").multipleSelect({
              filter: true,
              selectAll: false
              multiple: false,
              placeholder: "Select Discount Type"
         });

          $("#getAddBtn").click(function() {
           $('#msg2').hide();
           $('.msg').hide();
          buttonId++;
          var table = document.getElementById("myTable2");
          var row = table.insertRow(-1);
          // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          var cell6 = row.insertCell(5);
          var cell7 = row.insertCell(6);
          var cell8 = row.insertCell(7);

          // Add some text to the new cells:
          var row_id = buttonId;
          cell1.innerHTML = row_id;
         
          cell2.innerHTML = "<input type='text'  step='any' name='invs[]'  min='0' placeholder='Type Invoice Stock' class='form-control border-info required_colom' required='required'>";
          cell3.innerHTML = "<input type='number'  step='any' name='ctns[]'  min='0' placeholder='Type CTN Stock' class='form-control border-info required_colom' required='required'>";
          cell4.innerHTML = "<input  type='number'  step='any' name='actFee[]'  min='0' placeholder='Type Activation Fee' class='form-control border-info required_colom' required='required'>";
          cell5.innerHTML = "<input  type='number'  step='any' name='upgFee[]'  min='0' placeholder='Type Upgrade Fee' class='form-control border-info required_colom' required='required'>";
          cell6.innerHTML = "<input  type='number'  step='any' name='actDiscount[]'  min='0' placeholder='Type Activation Discount' class='form-control border-info required_colom' required='required'>";
          cell7.innerHTML = "<input type='number'  step='any' name='simDiscount[]'  min='0' placeholder='Type Simm Discount' class='form-control border-info required_colom' required='required'>";
           cell8.innerHTML = "<div class='text-center'><button onclick='removeRow("+buttonId+");' class='btn btn-danger removebutton' style='border-radius:100%''>-</button></div>";

          });
    </script>
    <script>

  
      
//       (function () {
//     var onload = window.onload;

//     window.onload = function () {
//         if (typeof onload == "function") {
//             onload.apply(this, arguments);
//         }

//         var fields = [];
//         var inputs = document.getElementsByTagName("input");
//         var textareas = document.getElementsByTagName("textarea");

//         for (var i = 0; i < inputs.length; i++) {
//             fields.push(inputs[i]);
//         }

//         for (var i = 0; i < textareas.length; i++) {
//             fields.push(textareas[i]);
//         }

//         for (var i = 0; i < fields.length; i++) {
//             var field = fields[i];

//             if (typeof field.onpaste != "function" && !!field.getAttribute("onpaste")) {
//                 field.onpaste = eval("(function () { " + field.getAttribute("onpaste") + " })");
//             }

//             if (typeof field.onpaste == "function") {
//                 var oninput = field.oninput;

//                 field.oninput = function () {
//                     if (typeof oninput == "function") {
//                         oninput.apply(this, arguments);
//                     }

//                     if (typeof this.previousValue == "undefined") {
//                         this.previousValue = this.value;
//                     }

//                     var pasted = (Math.abs(this.previousValue.length - this.value.length) > 1 && this.value != "");

//                     if (pasted && !this.onpaste.apply(this, arguments)) {
//                         this.value = this.previousValue;
//                     }

//                     this.previousValue = this.value;
//                 };

//                 if (field.addEventListener) {
//                     field.addEventListener("input", field.oninput, false);
//                 } else if (field.attachEvent) {
//                     field.attachEvent("oninput", field.oninput);
//                 }
//             }
//         }
//     }
// })();

    </script>