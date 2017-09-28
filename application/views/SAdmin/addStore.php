<style>
  .redborder1{
    border-color:red;
  }       
</style>
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Store</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('sAdmin/dashboard'); ?>">Home</a></li>
            <li class="active">Store</li>
          </ol>
        </div>
      </div>
      
		<!--- Patients Detail -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Add Store</div>
              <div class="panel-body">
                <form id="add_store">
                     <div class="form-group">
                      <label for="name">Store Name:</label>
                      <input type="text" name="store_name"  class="form-control border-info required_colom" required="required" id="name">
                    </div>
                     <div class="form-group">
                      <label for="name">Store Unique ID:</label>
                      <input type="number" name="store_uId"  class="form-control border-info required_colom" required="required" id="name">
                    </div>

                   <div class="form-group">
                        <label for="activeStatus">Select Market:</label>
                          <select class="form-control" id="activeStatus" name="market_id" >
                          <?php foreach ($markets as $key => $market) { ?>
                                 <option  value="<?php echo $market["market_id"];?>"><?php echo $market["market_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>
                   <div class="form-group">
                        <label for="activeStatus">Select SD:</label>
                          <select class="form-control" id="activeStatus" name="sd_id" >
                          <?php foreach ($sds as $key => $sd) { ?>
                                 <option  value="<?php echo $sd["sd_id"];?>"><?php echo $sd["sd_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>
                   <div class="form-group">
                        <label for="activeStatus">Select TM:</label>
                          <select class="form-control" id="activeStatus" name="tm_id" >
                          <?php foreach ($tms as $key => $tm) { ?>
                                 <option  value="<?php echo $tm["tm_id"];?>"><?php echo $tm["tm_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>
                   <div class="form-group">
                        <label for="activeStatus">Select CM:</label>
                          <select class="form-control" id="activeStatus" name="cm_id" >
                          <?php foreach ($cms as $key => $cm) { ?>
                                 <option  value="<?php echo $cm["cm_id"];?>"><?php echo $cm["cm_name"];?></option>
                       <?php }; ?>

                          </select>
                  </div>

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
                   <br />
                </form>
                 
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
  var add_store = $('#add_store');  
    add_store.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = add_store.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('sAdmin/add_storeForm'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'Store Already Exist'){
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('Store Already Exist');
                
            }else{
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('Store Added Succesfully').hide(2500);
               add_store[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('sAdmin/storeList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>