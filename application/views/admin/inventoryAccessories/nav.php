<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
      <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_dashboard'){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
          </li>
          
            <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderList' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_orderList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i>Pending Orders <span class="plus"></span></a>
         </li>
         <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderCompletedList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderCompletedList' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_orderCompletedList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Completed Orders  <span class="plus"></span></a>
         </li>
          <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderDeclinedList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderDeclinedList' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_orderDeclinedList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Declined Orders  <span class="plus"></span></a>
         </li>
          <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addCategory' || $this->uri->segment(3) == 'inventoryAccessories_categoryList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addCategory' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_addCategory'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i>Product Category <span class="plus"></span></a>
            <ul class='opened' style='display:block;'>
                <li> <a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_addCategory'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addCategory'){echo "theme_color";} ?>">Add Category</b> </a> </li>
                <li> <a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_categoryList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_categoryList'){echo "theme_color";} ?>">List Category</b> </a> </li>
            </ul>
         </li>
          <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addSubCategory' || $this->uri->segment(3) == 'inventoryAccessories_subCategoryList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addSubCategory' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_addSubCategory'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Product Sub-Category <span class="plus"></span></a>
            <ul class='opened' style='display:block;'>
                <li> <a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_addSubCategory'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addSubCategory'){echo "theme_color";} ?>">Add Sub-Category</b> </a> </li>
                <li> <a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_subCategoryList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_subCategoryList'){echo "theme_color";} ?>">List Sub-Category</b> </a> </li>
            </ul>
         </li>
          <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addProduct' || $this->uri->segment(3) == 'inventoryAccessories_productList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addProduct' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_addProduct'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Products <span class="plus"></span></a>
            <ul class='opened' style='display:block;'>
                <li> <a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_addProduct'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addProduct'){echo "theme_color";} ?>">Add Products</b> </a> </li>
                <li> <a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_productList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_productList'){echo "theme_color";} ?>">List Products</b> </a> </li>
            </ul>
         </li>

        </ul>
      </div>
    </div>