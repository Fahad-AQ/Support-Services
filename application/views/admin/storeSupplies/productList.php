<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Products</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('storeSupplies/admin/storeSupplies_dashboard'); ?>">Home</a></li>
            <li class="active">Products</li>
          </ol>
        </div>
      </div>
      
    <!--- Product order-->
         <div id="editProductModal" class="modal fade" role="dialog">
        </div>
    <!--- / Product order-->


        <div class="row">
          <div class="col-lg-12">
            <section class="panel default blue_title h2">
              <div class="panel-heading">Product List</div>
              <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                  <thead>
                  <tr>
                    <th>S. No</th>
                    <th>Product Name</th>
                    <th>Product Unit</th>
                    <th>Product Code</th>
                    <th>Portal name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php 
                   if($products) {
                    foreach ($products as $product){
                       ?>
                        <tr>
                        <td><?php echo $product['product_id'];?></td>
                        <td><?php echo $product['product_name'];?></td>
                        <td><?php echo $product['product_unit'];?></td>
                        <td><?php echo $product['product_code'];?></td>
                        <td><?php echo $product['category_name'];?></td>
                        <td class="alert alert-info"><?php if($product['product_isActive'] == 1) {echo "ACTIVE";}else{echo "NOT ACTIVE";};?></td>
                        <td>
                          <button data-toggle="modal" onclick="editProduct(<?php echo $product['product_id'];?>)" data-target="#editProductModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
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

 		function editProduct(id)
			{
				$('document').ready(function(){
				$.ajax({
						type: "POST",
						url: '<?php echo base_url("storeSupplies/admin/storeSupplies_editProductModel");?>',
						data:{'product_id':id},
						dataType:'JSON',
						success:function(data){
							console.log(data);
							$('#editProductModal').html(data.html);
						},
						error:function(data){
							console.log(data.responseText + "not work")
						},
					});
				}); 
			}

   

</script>