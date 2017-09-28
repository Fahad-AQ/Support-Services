<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Market</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('sAdmin/dashboard'); ?>">Home</a></li>
            <li class="active">Market</li>
          </ol>
        </div>
      </div>
      
    <!--- Product order-->
         <div id="editMarketModal" class="modal fade" role="dialog">
        </div>
    <!--- / Product order-->


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Market List</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Market Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($markets) {
                    foreach ($markets as $market){?>
                        <tr>
                        <td><?php echo $market['market_id'];?></td>
                        <td><?php echo $market['market_name'];?></td>
                        <td class="alert alert-info"><?php if($market['market_status'] == '1') {echo "ACTIVE";}else{echo "NOT ACTIVE";};?></td>
                        <td>
                          <button data-toggle="modal" onclick="editMarket(<?php echo $market['market_id'];?>)" data-target="#editMarketModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
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

 		function editMarket(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("sAdmin/editMarketModel");?>',
						data:{'market_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#editMarketModal').html(data.html);
						},
						error:function(data){
							console.log(data.responseText + "not work")
						},
					});
				}); 
			}

   

</script>