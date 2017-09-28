 <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SD</h4>
      </div>
      <div class="modal-body">
        
<div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Edit SD</div>
              <div class="panel-body">
             <?php echo form_open(base_url(''),array('class'=>"form-horizontal",'id'=>'edit_SD')); ?>
                    <div class="form-group">
                      <label for="name">SD Name:</label>
                       <input type="hidden" name="sd_id" value="<?php echo $selected_sd[0]["sd_id"];?>" class="form-control border-info required_colom" required="required" id="sd_id">
                      <input type="text" name="sd_name" value="<?php echo $selected_sd[0]["sd_name"];?>" class="form-control border-info required_colom" required="required" id="sd_name">
                    </div>
                     <div class="form-group">
                      <label for="name">SD Email:</label>
                      <input type="email" name="sd_email" value="<?php echo $selected_sd[0]["sd_email"];?>" class="form-control border-info required_colom" required="required" id="sd_email">
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
  var edit_SD = $('#edit_SD');  
    edit_SD.on('submit',function(e){
      e.preventDefault();
      
      var new_prd_add = edit_SD.serialize();
      console.log(new_prd_add);
      var assetserror = 0;
      $('.required_colom').each(function(){
        if($(this).val() == ''){$(this).addClass('redborder1');assetserror = assetserror + 1;}else{$(this).removeClass('redborder1');
            
        }
      });
      
      if(assetserror > 0){return false;}else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('sAdmin/editSD'); ?>',
          data:new_prd_add,
          dataType:'JSON',
          success:function(data){ 
            if(data.status == 'SD Already Exist'){
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-success');
              $('.msg').addClass('alert-info');
              $('.msg').show().html('SD Already Exist');
                
            }else{
              console.log(data);
              $('#msg').show();
              $('.msg').removeClass('alert-info');
              $('.msg').addClass('alert-success');
              $('.msg').show().html('SD Edited Succesfully').hide(2500);
               edit_SD[0].reset();
                setTimeout(function(){location.href="<?php echo base_url('sAdmin/SDList'); ?>"} , 2500);  
            }
          },
          error:function(data){console.log('error: '+data.responseText);}
        });
      }
    });
</script>