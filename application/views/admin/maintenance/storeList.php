<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Store</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/maintenance_dashboard'); ?>">Home</a></li>
            <li class="active">Store</li>
          </ol>
        </div>
      </div>
      
    <!--- Product order-->
         <div id="editStoreModal" class="modal fade" role="dialog">
        </div>
    <!--- / Product order-->


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Store List</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Market Name</th>
                    <th>Store Name</th>
                    <th>Store Unique ID</th>
                    <th>Store SD</th>
                    <th>Store TM</th>
                    <th>Store CM</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($stores) {
                    foreach ($stores as $store){?>
                        <tr>
                        <td><?php echo $store['store_id'];?></td>
                        <td><?php echo $store['market_name'];?></td>
                        <td><?php echo $store['store_name'];?></td>
                        <td><?php echo $store['store_uId'];?></td>
                        <td><?php echo $store['sd_name'];?></td>
                        <td><?php echo $store['tm_name'];?></td>
                        <td><?php echo $store['cm_name'];?></td>
                        <td class="alert alert-info"><?php if($store['store_status']  == 1) {echo "ACTIVE";}else{echo "NOT ACTIVE";};?></td>
                        <td>
                          <button data-toggle="modal" onclick="editStore(<?php echo $store['store_id'];?>)" data-target="#editStoreModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
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

 		function editStore(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("admin/editStoreModel");?>',
						data:{'store_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#editStoreModal').html(data.html);
						},
						error:function(data){
							console.log(data.responseText + "not work")
						},
					});
				}); 
			}

   

</script>