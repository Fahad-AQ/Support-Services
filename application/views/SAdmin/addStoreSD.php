<style>
  .redborder1{
    border-color:red;
  }       
</style>
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>SD</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('sAdmin/dashboard'); ?>">Home</a></li>
            <li class="active">SD</li>
          </ol>
        </div>
      </div>
      
    <!--- Patients Detail -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Add SD</div>
              <div class="panel-body">
                <form id="add_SD">
                    <div class="form-group">
                      <label for="name">SD Name:</label>
                      <input type="text" name="sd_name"  class="form-control border-info required_colom" required="required" id="sd_name">
                    </div>
                     <div class="form-group">
                      <label for="name">SD Email:</label>
                      <input type="email" name="sd_email"  class="form-control border-info required_colom" required="required" id="sd_email">
                    </div>
     
                      <div id="msg2">
                         <p class="msg alert"></p>
                      </div> 
                  </div>
                  <div style="margin-bottom : 50px;margin-top : 70px;">
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
  var add_SD = $('#add_SD');  
    add_SD.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = add_SD.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('sAdmin/add_SDForm'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'SD Already Exist'){
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('SD Already Exist');
                
            }else{
              console.log(data);
              $('#msg2').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('SD Added Succesfully').hide(2500);
               add_SD[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('sAdmin/SDList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>