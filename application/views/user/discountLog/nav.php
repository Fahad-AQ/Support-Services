<div class="left_nav">
      <!--<div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Search Dashboard..." />
      </div>-->
      <div class="left_nav_slidebar">
        <ul>
          <li class="<?php if($this->uri->segment(3) == 'discountLog_dashboard'){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'discountLog_dashboard'){echo "active";} ?>" href="<?php echo base_url('discountLog/user/discountLog_dashboard'); ?>"> <i class="fa fa-dashboard animated-hover faa-wrench"></i> DASHBOARD <span class="plus"></span></a>
            
          </li>
          <?php if($this->session->userdata('roleId') == 3 || $this->session->userdata('roleId') == 4|| $this->session->userdata('roleId') == 5){
              ;?>
               <?php if($this->session->userdata('roleId') == 3){
              ;?>

              <li class="<?php if($this->uri->segment(3) == 'discountLog_specialDicountList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'discountLog_specialDicountList' ){echo "active";} ?>" href="<?php echo base_url('discountLog/user/discountLog_specialDicountList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i>Special Discounts <span class="plus"></span></a>
             </li>
                 <?php
               } ?>

             <li class="<?php if($this->uri->segment(3) == 'discountLog_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'discountLog_orderList' ){echo "active";} ?>" href="<?php echo base_url('discountLog/user/discountLog_orderList'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i>Normal Discounts <span class="plus"></span></a>
             </li>
          <?php
          }
          else{
            ;?>
            <li class="<?php if($this->uri->segment(3) == 'discountLog_addOrder' || $this->uri->segment(3) == 'discountLog_orderList' ){echo "left_nav_active theme_border";} ?>"><a class="<?php if($this->uri->segment(3) == 'discountLog_addOrder' ){echo "active";} ?>" href="<?php echo base_url('discountLog/user/discountLog_addOrder'); ?>"> <i class="fa fa-list animated-hover faa-wrench"></i> Discounts <span class="plus"></span></a>
            <ul class='opened' style='display:block;' >
                <li> <a href="<?php echo base_url('discountLog/user/discountLog_addOrder'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'discountLog_addOrder'){echo "theme_color";} ?>">Add Discount</b> </a> </li>
                <li> <a href="<?php echo base_url('discountLog/user/discountLog_orderList'); ?>"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="<?php if($this->uri->segment(3) == 'discountLog_orderList'){echo "theme_color";} ?>">List Discount</b> </a> </li>
            </ul>
         </li>

         <?php }; ?>
           

       

        </ul>
      </div>
    </div>