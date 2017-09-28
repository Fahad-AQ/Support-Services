<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
      <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(3) == 'storeSupplies_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'storeSupplies_dashboard'){echo "active";} ?>" href="<?php echo base_url('storeSupplies/admin/storeSupplies_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
          </li>
          
            <li class="<?php if($this->uri->segment(3) == 'storeSupplies_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'storeSupplies_orderList' ){echo "active";} ?>" href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i>Pending Orders <span class="plus"></span></a>
         </li>
         <li class="<?php if($this->uri->segment(3) == 'storeSupplies_orderCompletedList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'storeSupplies_orderCompletedList' ){echo "active";} ?>" href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderCompletedList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Completed Orders  <span class="plus"></span></a>
         </li>
          <li class="<?php if($this->uri->segment(3) == 'storeSupplies_orderDeclinedList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'storeSupplies_orderDeclinedList' ){echo "active";} ?>" href="<?php echo base_url('storeSupplies/admin/storeSupplies_orderDeclinedList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Declined Orders  <span class="plus"></span></a>
         </li>
         <li class="<?php if($this->uri->segment(3) == 'storeSupplies_addProduct' || $this->uri->segment(3) == 'storeSupplies_productList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'storeSupplies_addProduct' ){echo "active";} ?>" href="<?php echo base_url('storeSupplies/admin/storeSupplies_addProduct'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Product <span class="plus"></span></a>
             <ul class='opened' style='display:block;' >
                <li> <a href="<?php echo base_url('storeSupplies/admin/storeSupplies_addProduct'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'storeSupplies_addProduct'){echo "theme_color";} ?>">Add Product</b> </a> </li>
                <li> <a href="<?php echo base_url('storeSupplies/admin/storeSupplies_productList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'storeSupplies_productList'){echo "theme_color";} ?>">List Product</b> </a> </li>
              </ul>
            </li>
        

        </ul>
      </div>
    </div>