<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>TM</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('sAdmin/dashboard'); ?>">Home</a></li>
            <li class="active">TM</li>
          </ol>
        </div>
      </div>
      
    <!--- Product order-->
         <div id="editTMModal" class="modal fade" role="dialog">
        </div>
    <!--- / Product order-->


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">TM List</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>TM Name</th>
                    <th>TM Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($tms) {
                    foreach ($tms as $tm){?>
                        <tr>
                        <td><?php echo $tm['tm_id'];?></td>
                        <td><?php echo $tm['tm_name'];?></td>
                        <td><?php echo $tm['tm_email'];?></td>
                        <td>
                          <button data-toggle="modal" onclick="editTM(<?php echo $tm['tm_id'];?>)" data-target="#editTMModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
                        </td>
                      </tr>
                       <?php
                      }
                    }
                   ?>
                  </tbody>
               </table>
              </div>
              <div></div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<script>

    function editTM(id)
      {
        $('document').ready(function(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url("sAdmin/editTMModel");?>',
            data:{'tm_id':id},
            dataType:'JSON',
            success:function(data){
              console.log(data);
              $('#editTMModal').html(data.html);
            },
            error:function(data){
              console.log(data.responseText + "not work")
            },
          });
        }); 
      }

   

</script>