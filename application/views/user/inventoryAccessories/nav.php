<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
     <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'storeSupplies_dashboard'){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
            
          </li>
          <?php if($this->session->userdata('roleId') == 3 || $this->session->userdata('roleId') == 4 || $this->session->userdata('roleId') == 5 ){
            ;?>
             <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderList' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_orderList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Orders <span class="plus"></span></a>
             </li>
         <?php
          }
          else{
            ;?>
            <li class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addOrder' || $this->uri->segment(3) == 'inventoryAccessories_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addOrder' ){echo "active";} ?>" href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_addOrder'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Order <span class="plus"></span></a>
            <ul class='opened' style='display:block;'>
                <li> <a href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_addOrder'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_addOrder'){echo "theme_color";} ?>">Add Order</b> </a> </li>
                <li> <a href="<?php echo base_url('inventoryAccessories/user/inventoryAccessories_orderList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'inventoryAccessories_orderList'){echo "theme_color";} ?>">List Order</b> </a> </li>
            </ul>
         </li>

         <?php }; ?>
            

       

        </ul>
      </div>
    </div>