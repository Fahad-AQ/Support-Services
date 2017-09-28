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
            <li><a href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_dashboard'); ?>">Home</a></li>
            <li class="active">Order</li>
          </ol>
        </div>
      </div>


      
    <!--- Patients Detail -->

        <div class="row" >
              <div class="col-md-12 col-sm-12 col-xm-12">
                  <section class="panel default blue_title h2" >
                  <div class="panel-heading"><span class="semi-bold">Requester Information</span> </div>
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
                
                <div class="col-sm-12" >
                    <section class="panel default blue_title h2" >
                    <div class="panel-heading"><span class="semi-bold"> Note:</span> </div>
                    <div class="panel-body"  >
                      <div class="col-sm-4" >
                      <div class="alert alert-success"> <strong>For Order: </strong>Kindly check all products because you will able to make an order for products <span class="label label-danger">once in a week</span><br/><br/><br/></div>
                    </div>
                     <div class="col-sm-4" >
                      <div class="alert alert-warning"> <strong>Available Draft: </strong> Please update the correct <span class="label label-danger">AVAILABLE STOCK LEVEL</span> because finance team will approve according to the mention available stock in level <br/><br/></div>
                    </div>
                     <div class="col-sm-4" >
                      <div class="alert alert-danger"> <strong>Important :</strong> Check Your Store Name or Store UID while you add an order , if store does n't belong to you then kindly reached out Web Department ,Web Department email address is <span class="label label-danger">web@mobilelinkusa.com</span> , Kindly dont add an order<br/></div>
                    </div>
                  </section>
                </div>

                 <div class="col-md-12 col-sm-12 col-xm-12">
                  <section class="panel default blue_title h2">
                    <div class="panel-heading"><span class="semi-bold">Products</span> </div>
                    <div class="panel-body">
                        <p>
                            <b> Select Category :  </b>
                              <select  id="access_category" onchange="selectCategory()" class="js-example-basic-single" style="width: 75%;">
                              <option value="">Select Category</option>
                                 <?php if($categories)
                                     foreach ($categories as $category){if($category['accessories_category_status'] == 1){?> 
                                      <option value="<?php echo $category['accessories_category_id'] ?>"><?php echo $category['accessories_category_name'] ?></option>
                                      <?php }}?>
                                </select>

                          </p>
                          <p class="accs_catogory">
                              <b> Select Sub-Category :  </b>
                              <select id="accs_subCatogory" onchange="selectSubCategory()" class="js-example-basic-singleSub" style="width: 75%;"></select>
                          </p>
                          <p class="accs_catogory">
                               <b> Select Product :  </b>
                             <select id="accs_product" class="js-example-basic-multiple" multiple="multiple" style="width: 75%;"></select>
                          </p>
                          <p class="msg3 alert"></p>
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
                                <th>Product Category</th>
                                <th>Product Sub-Category</th>
                                <th>Product Description</th>
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
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
    width: '90%',
    placeholder: "Select Products"// need to override the changed default
   });
});

$(document).ready(function() {
    $('.js-example-basic-singleSub').select2({
    placeholder: "Select Products"// need to override the changed default
   });
});
$(document).ready(function() {
    $('.js-example-basic-single').select2({
    width: '90%',
    placeholder: "Select Products"// need to override the changed default
   });
});

$('.accs_catogory').hide();
$('#accs_subCatogory').hide();
$('#accs_product').hide();
$('#msg2').hide();
$('.msg2').hide();
$('.msg3').hide();

function escapeHtml(text) {
  return text
      .replace(/&trade;/g, "™")
}

  function selectCategory(){
   
    if($('#access_category').val()){
      (function() {

      $('.accs_catogory').show();
      $('.msg3').show();
      $('.msg3').removeClass('alert-danger');
      $('.msg3').removeClass('alert-info');
      $('.msg3').addClass('alert-success');
      $('.msg3').show().html('Please wait');
       $.ajax({
          type: 'POST',
          data: {'categoryId' : $("#access_category").val()},
          url: '<?php echo base_url('inventoryAccessories/user/inventoryAccessories_subCategories');?>', 
          dataType: 'json',
          success: function (data){
            if(data.status == 'true' ){
             var elm = document.getElementById('accs_subCatogory'), // get the select
                    df = document.createDocumentFragment();
                     // create a document fragment to hold the options while we create them
                  for (var i = 0; i < data.objectGet.length; i++) {
                    if(data.objectGet[i].accessories_subcategory_status == "1"){
                           $('#accs_subCatogory').show();
                           $("#accs_subCatogory").empty();
                          var option = document.createElement('option'); // create the option element
                          option.value = data.objectGet[i].accessories_subcategory_id; // set the value property
                          option.appendChild(document.createTextNode(escapeHtml(data.objectGet[i].accessories_subcategory_name)));
                          df.appendChild(option);
                    }
                }
                for (var i = 0; i < data.objectGet.length; i++) {
                  if(data.objectGet[i].accessories_subcategory_status == "1"){
                         $('#accs_product').show();
                         $("#accs_product").empty();

                        if(data.objectGet[i].accessories_subcategory_name == "No Sub-Category" ){
                          $.ajax({
                            type: 'POST',
                          data: {'categoryId' : $("#access_category").val()},
                          url: '<?php echo base_url('inventoryAccessories/user/inventoryAccessories_Catproducts');?>', 
                          dataType: 'json',
                          success: function (data){
                            if(data.status == 'true' ){
                             var elm = document.getElementById('accs_product'), // get the select
                                    df = document.createDocumentFragment(); // create a document fragment to hold the options while we create them
                                    $('.msg3').hide();
                                for (var i = 0; i < data.objectGetProduct.length; i++) { 

                                    if(data.objectGetProduct[i].accessories_product_status == "1"){
                                        var option = document.createElement('option'); // create the option element
                                        option.value = data.objectGetProduct[i].accessories_product_id; // set the value property
                                        option.appendChild(document.createTextNode(escapeHtml(data.objectGetProduct[i].accessories_product_name))); // set the textContent in a safe way.
                                        df.appendChild(option); 

                                    }
                                    
                                     
                                }
                                elm.appendChild(df);
    
                                 
                             }
                            },
                            error:function(data){console.log(data.responseText);}
                            });  

                        }
                        if( data.objectGet[i].accessories_subcategory_name != "No Sub-Category" ){
                           console.log(data.objectGet[i].accessories_subcategory_name)
                          $.ajax({
                            type: 'POST',
                          data: {'subCategoryId' : data.objectGet[i].accessories_subcategory_id  },
                          url: '<?php echo base_url('inventoryAccessories/user/inventoryAccessories_SubCatproducts');?>', 
                          dataType: 'json',
                          success: function (data){
                            if(data.status == 'true' ){
                             var elm = document.getElementById('accs_product'), // get the select
                                    df = document.createDocumentFragment(); // create a document fragment to hold the options while we create them
                                    $('.msg3').hide();
                                for (var i = 0; i < data.objectGetProduct.length; i++) { 
                                  if(data.objectGetProduct[i].accessories_product_status == "1"){
                                    var option = document.createElement('option'); // create the option element
                                    option.value = data.objectGetProduct[i].accessories_product_id; // set the value property
                                    option.appendChild(document.createTextNode(escapeHtml(data.objectGetProduct[i].accessories_product_name))); // set the textContent in a safe way.
                                    df.appendChild(option); 
                                  }
                                }

                                elm.appendChild(df);
       

                              
                             }
                            },
                            error:function(data){console.log(data.responseText);}
                            });  
                          break;
                        }
                    }
                }
                elm.appendChild(df);
             }
             else{

                    $.ajax({
                      type: 'POST',
                    data: {'categoryId' : $("#access_category").val()},
                    url: '<?php echo base_url('inventoryAccessories/user/inventoryAccessories_Catproducts');?>', 
                    dataType: 'json',
                    success: function (data){
                      if(data.status == 'true' ){
                         $('.accs_subCatogory').show();
                         $('#accs_subCatogory').show();
                         $("#accs_subCatogory").empty();
                         $('#accs_product').show();
                         $("#accs_product").empty();
                       var elm2 = document.getElementById('accs_subCatogory'), // get the select
                           df2 = document.createDocumentFragment();
                       var option2 = document.createElement('option'); // create the option element
                           option2.value = 1; // set the value property
                           option2.appendChild(document.createTextNode("No Sub-Category")); 

                               // create a document fragment to hold the options while we create them
                        var elm = document.getElementById('accs_product'), // get the select
                              df = document.createDocumentFragment();
                              $('.msg3').hide();
                          for (var i = 0; i < data.objectGetProduct.length; i++) { // loop, i like 42.
                             
                             if(data.objectGetProduct[i].accessories_product_status == "1"){
                              var option = document.createElement('option'); // create the option element
                              option.value = data.objectGetProduct[i].accessories_product_id; // set the value property
                              option.appendChild(document.createTextNode(escapeHtml(data.objectGetProduct[i].accessories_product_name))); // set the textContent in a safe way.
                              df.appendChild(option);  
                              } // append the option to the document fragment
                               
                          }
                          elm.appendChild(df);
                          df2.appendChild(option2);
                          elm2.appendChild(df2);     
                       }
                      },
                      error:function(data){console.log(data.responseText);}
                      });  

                    }
                },
          error:function(data){console.log(data.responseText);}
          });  

          // append the document fragment to the DOM. this is the better way rather than setting innerHTML a bunch of times (or even once with a long string)
      }());
    }

    else{
      $('.accs_catogory').hide();
      $('#accs_subCatogory').hide();
      $('#accs_product').hide();
      $('#access_category').val(null);
      $('#accs_subCatogory').val(null);
      $('#accs_product').val(null);
    }
        
  }

  function selectSubCategory(){


    (function() {
    $('.accs_catogory').show();
      $('.msg3').show();
      $('.msg3').removeClass('alert-danger');
      $('.msg3').removeClass('alert-info');
      $('.msg3').addClass('alert-success');
      $('.msg3').show().html('Please wait');
     $.ajax({
          type: 'POST',
        data: {'subCategoryId' : $("#accs_subCatogory").val()},
        url: '<?php echo base_url('inventoryAccessories/user/inventoryAccessories_SubCatproducts');?>', 
        dataType: 'json',
        success: function (data){
          if(data.status == 'true' ){
              $('#accs_product').show();
              $("#accs_product").empty();
             var elm = document.getElementById('accs_product'), // get the select
                df = document.createDocumentFragment(); // create a document fragment to hold the options while we create them
                $('.msg3').hide();
            for (var i = 0; i < data.objectGetProduct.length; i++) { // loop, i like 42.
                var option = document.createElement('option'); // create the option element
                option.value = data.objectGetProduct[i].accessories_product_id; // set the value property
                option.appendChild(document.createTextNode(escapeHtml(data.objectGetProduct[i].accessories_product_name))); // set the textContent in a safe way.
                df.appendChild(option); // append the option to the document fragment
            }
            elm.appendChild(df);

          
           }

          },
          error:function(data){console.log(data.responseText);}
          });  

      }());
        
  }

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
                                        url:'<?php echo base_url('inventoryAccessories/user/inventoryAccessories_add_order'); ?>',
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
                                              setTimeout(function(){location.href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_orderList'); ?>"} , 2500);  
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
                         $('#msg2').show();
                         $('.msg').removeClass('alert-success');
                         $('.msg').removeClass('alert-info');
                         $('.msg').addClass('alert-danger');
                         $('.msg').show().html('Order Cencelled');
                        setTimeout(function(){
                          $('#msg2').hide();
                          $('.msg').hide();                      
                        } , 2500);  
                         
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
       

        $("#getSelectsBtn").click(function() {
                       $('.msg').hide()
                       $('#myTableRow').remove();
                       var values = $('#accs_product').val();
                       console.log(values);
                          if(values){
                              $('#msg2').show();
                              $('.msg').addClass('alert-success');
                              $('.msg').removeClass('alert-info');
                              $('.msg').show().html('Please Wait')

                            var values2 = $("input[name='accessories_product_id[]']")
                           .map(function(){return $(this).val();}).get();

                           if(values2.length !=0){


                               for(var i = 0 ; i < values.length ; i++ ){

                                       $.ajax({
                                            type:'POST',
                                            url:'<?php echo base_url('inventoryAccessories/user/inventoryAccessories_products'); ?>',
                                            data: {'productId' : values[i] },
                                            dataType:'JSON',
                                            success:function(data){ 
                                              if(data.status == 'true'){
                                                var duplicateFound = false;
                                                 var values2 = $("input[name='accessories_product_id[]']")
                                                   .map(function(){

                                                        if($(this).val() == data.objectGetProduct[0]["accessories_product_id"]){
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
                                                          var cell8 = row.insertCell(7);

                                                          // Add some text to the new cells:
                                                          var accessories_product_id = data.objectGetProduct[0]["accessories_product_id"];
                                                          cell1.innerHTML = data.objectGetProduct[0]["accessories_product_id"];
                                                          cell2.innerHTML = data.objectGetProduct[0]["accessories_category_name"];
                                                          cell3.innerHTML = data.objectGetProduct[0]["accessories_subcategory_name"];
                                                          cell4.innerHTML = data.objectGetProduct[0]["accessories_product_name"];
                                                          cell5.innerHTML = "<p><input type='hidden' name='accessories_product_id[]' value="+data.objectGetProduct[0]["accessories_product_id"]+" ;/><input type='text'  step='any' name='avl[]'  placeholder='Type Available Stock' onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' onkeypress='return isNumber(event)' minlength='1' maxlength='3' class='form-control border-info required_colom txtInput' required='required' value='0'> <b>PER ITEM</b></p>";
                                                           cell6.innerHTML = "<p><input type='text'  step='any' name='rmt[]' placeholder='Type Required Stock'  onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' onkeypress='return isNumber(event)' minlength='1' maxlength='3' class='form-control border-info required_colom txtInput' required='required' value='1'> <b>PER ITEM</b></p>";
                                                          cell7.innerHTML = "<p><input type='text'  step='any' name='cmt[]'  placeholder='Type Comment' class='form-control border-info'>"+"</p>";
                                                            cell8.innerHTML = "<button  onclick='deleteRow("+accessories_product_id+")' class='btn btn-danger'>remove</button>";
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
                                            url:'<?php echo base_url('inventoryAccessories/user/inventoryAccessories_products'); ?>',
                                            data: {'productId' : values[i] },
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
                                                          var cell8 = row.insertCell(7);

                                                          // Add some text to the new cells:
                                                          var accessories_product_id = data.objectGetProduct[0]["accessories_product_id"];
                                                          cell1.innerHTML = data.objectGetProduct[0]["accessories_product_id"];
                                                          cell2.innerHTML = data.objectGetProduct[0]["accessories_category_name"];
                                                          cell3.innerHTML = data.objectGetProduct[0]["accessories_subcategory_name"];
                                                          cell4.innerHTML = data.objectGetProduct[0]["accessories_product_name"];
                                                          cell5.innerHTML = "<p><input type='hidden' name='accessories_product_id[]' value="+data.objectGetProduct[0]["accessories_product_id"]+" ;/><input type='text'  step='any' name='avl[]'  placeholder='Type Available Stock' onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' onkeypress='return isNumber(event)' minlength='1' maxlength='3' class='form-control border-info required_colom txtInput' required='required' value='0'> <b>PER ITEM</b></p>";
                                                           cell6.innerHTML = "<p><input type='text'  step='any' name='rmt[]' placeholder='Type Required Stock' onCopy='return false' onDrag='return false' onDrop='return false' onPaste='return false' onkeypress='return isNumber(event)' minlength='1' maxlength='3' class='form-control border-info required_colom txtInput' required='required' value='1'> <b>PER ITEM</b></p>";
                                                          cell7.innerHTML = "<p><input type='text'  step='any' name='cmt[]'  placeholder='Type Comment' class='form-control border-info'>"+"</p>";
                                                            cell8.innerHTML = "<button  onclick='deleteRow("+accessories_product_id+")' class='btn btn-danger'>remove</button>";
                                                             $('#msg2').hide();
                                                    
                                                 
                                                 }

                                            },
                                            error:function(data){console.log('error: '+data.responseText);}
                                          });
                                  }

                           }
                 }

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