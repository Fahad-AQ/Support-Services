<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
      <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(3) == 'discountlog_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'travel_dashboard'){echo "active";} ?>" href="<?php echo base_url('discountLog/admin/discountlog_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
          </li>
           
            <li class="<?php if($this->uri->segment(3) == 'discountlog_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'addOrder' ){echo "active";} ?>" href="<?php echo base_url('discountLog/admin/discountlog_orderList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i>Discounts <span class="plus"></span></a>
         </li>
        </ul>
      </div>
    </div>