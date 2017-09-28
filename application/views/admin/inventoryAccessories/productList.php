<style>
  table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}

td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr { border: 1px solid #ccc; }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
  }
  
  td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
  }
  
  /*
  Label the data
  */

}

</style>
<div class="inner" >
    <div class="contentpanel" >
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Product</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_dashboard'); ?>">Home</a></li>
            <li class="active">Product</li>
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
                    <th>Product Tracking No</th>
                    <th>Product Amount</th>
                    <th>Product Category</th>
                    <th>Product Sub-Category</th>
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
                        <td><?php echo $product['accessories_product_id'];?></td>
                        <td><?php echo $product['accessories_product_name'];?></td>
                        <td><?php echo $product['accessories_product_code'];?></td>
                        <td><?php echo $product['accessories_product_amount'];?></td>
                        <td><?php echo $product['accessories_category_name'];?></td>
                        <td><?php echo $product['accessories_subcategory_name'];?></td>
                        <td class="alert alert-info"><?php if($product['accessories_product_status'] == 1) {echo "ACTIVE";}else{echo "NOT ACTIVE";};?></td>
                        <td>
                          <button data-toggle="modal" onclick="editProduct(<?php echo $product['accessories_product_id'];?>)" data-target="#editProductModal" class="btn btn-warning fa fa-pencil add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Edit details"></button>
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
						url: '<?php echo base_url("inventoryAccessories/admin/inventoryAccessories_editProductModel");?>',
						data:{'accessories_product_id':id},
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