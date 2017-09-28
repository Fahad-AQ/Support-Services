<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
      <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(2) == 'travel_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'travel_dashboard'){echo "active";} ?>" href="<?php echo base_url('admin/travel_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
          </li>
           <?php if($this->session->userdata('email') == 'fahad_ahmed@mobilelinkusa.com' || $this->session->userdata('email') == 'arif_khan@mobilelinkusa.com'  || $this->session->userdata('email') == 'shahbaz_ahmed@mobilelinkusa.com'  || $this->session->userdata('email') == 'noman_ansari@mobilelinkusa.com'  ){
               ?>
            <li class="<?php if($this->uri->segment(2) == 'addMarket' || $this->uri->segment(2) == 'marketList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'addMarket' ){echo "active";} ?>" href="<?php echo base_url('admin/addMarket'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Market <span class="plus"></span></a>
             <ul <?php if($this->uri->segment(2) == 'addMarket' || $this->uri->segment(2) == 'marketList' ){echo "class='opened' style='display:block;'";} ?>>
                <li> <a href="<?php echo base_url('admin/addMarket'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'addMarket'){echo "theme_color";} ?>">Add Market</b> </a> </li>
                <li> <a href="<?php echo base_url('admin/marketList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'marketList'){echo "theme_color";} ?>">List Market</b> </a> </li>
              </ul>
            </li>
             
              <li class="<?php if($this->uri->segment(2) == 'addStore' || $this->uri->segment(2) == 'storeList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'addStore' ){echo "active";} ?>" href="<?php echo base_url('admin/addStore'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Store <span class="plus"></span></a>
             <ul <?php if($this->uri->segment(2) == 'addStore' || $this->uri->segment(2) == 'storeList' ){echo "class='opened' style='display:block;'";} ?>>
                <li> <a href="<?php echo base_url('admin/addStore'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'addStore'){echo "theme_color";} ?>">Add Store</b> </a> </li>
                <li> <a href="<?php echo base_url('admin/storeList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'storeList'){echo "theme_color";} ?>">List Store</b> </a> </li>
              </ul>
            </li>
             <li class="<?php if($this->uri->segment(2) == 'addEmployee' || $this->uri->segment(2) == 'employeeList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'addEmployee' ){echo "active";} ?>" href="<?php echo base_url('admin/addEmployee'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Employee <span class="plus"></span></a>
             <ul <?php if($this->uri->segment(2) == 'addEmployee' || $this->uri->segment(2) == 'employeeList' ){echo "class='opened' style='display:block;'";} ?>>
                <li> <a href="<?php echo base_url('admin/addEmployee'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'addEmployee'){echo "theme_color";} ?>">Add Employee</b> </a> </li>
                <li> <a href="<?php echo base_url('admin/employeeList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'employeeList'){echo "theme_color";} ?>">List Employee</b> </a> </li>
              </ul>
            </li>
              <?php };?>
             <li class="<?php if($this->uri->segment(2) == 'addProduct' || $this->uri->segment(2) == 'productList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'addProduct' ){echo "active";} ?>" href="<?php echo base_url('admin/addProduct'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Product <span class="plus"></span></a>
             <ul <?php if($this->uri->segment(2) == 'addProduct' || $this->uri->segment(2) == 'productList' ){echo "class='opened' style='display:block;'";} ?>>
                <li> <a href="<?php echo base_url('admin/addProduct'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'addProduct'){echo "theme_color";} ?>">Add Product</b> </a> </li>
                <li> <a href="<?php echo base_url('admin/productList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(2) == 'productList'){echo "theme_color";} ?>">List Product</b> </a> </li>
              </ul>
            </li>
            <li class="<?php if($this->uri->segment(2) == 'orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(2) == 'addOrder' ){echo "active";} ?>" href="<?php echo base_url('admin/orderList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Order <span class="plus"></span></a>
         </li>
        </ul>
      </div>
    </div>