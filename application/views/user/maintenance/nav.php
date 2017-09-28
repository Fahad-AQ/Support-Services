<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
      <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(2) == 'maintenance_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'maintenance_dashboard'){echo "active";} ?>" href="<?php echo base_url('user/maintenance_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
            
          </li>
            <li class="<?php if($this->uri->segment(2) == 'addOrder' || $this->uri->segment(2) == 'orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'addOrder' ){echo "active";} ?>" href="<?php echo base_url('user/addOrder'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Order <span class="plus"></span></a>
            <ul <?php if($this->uri->segment(2) == 'addOrder' || $this->uri->segment(2) == 'orderList' ){echo "class='opened' style='display:block;'";} ?>>
                <li> <a href="<?php echo base_url('user/addOrder'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'addOrder'){echo "theme_color";} ?>">Add Order</b> </a> </li>
                <li> <a href="<?php echo base_url('user/orderList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'orderList'){echo "theme_color";} ?>">List Order</b> </a> </li>
            </ul>
         </li>

       

        </ul>
      </div>
    </div>