<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Maintenance</title>
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

	<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/font-awesome-animation.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/plugins/kalendar/kalendar.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/scroll/nanoscroller.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" rel="stylesheet" />
	<!--- Datatable CSS --->
	<link href="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" />
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.js"></script>
	<!--Notification-->
	<!--End Notification-->
	<style>
		.label{    
			font-weight: normal;
			border-radius: .1em;
			font-size: 85%;
			line-height:2;
		}
		.m-top{margin-top:2%;}
		.add-btn{float:right;}
		.text-bold{font-weight:bold;}
		.redborder{border:1px solid red;}
		#div2 {
			white-space: nowrap; 
			width: 18em; 
			overflow: hidden;
			text-overflow: ellipsis;
		}
	</style>
</head>
<body class="light_theme  fixed_header left_nav_fixed">
	<div class="wrapper">
		<div class="header_bar">
			<div class="brand">
			  <div class="logo" style="display:block"><span class="theme_color"></span>Maintenance</div>
			  <!--<div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>-->
			</div>
			<div class="header_top_bar">
				<a style="text-decoration : none" href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i>&nbsp; Menu</a>
			  <div class="top_right_bar">
				<div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img style="    width: 45px;
    border-radius: 100%;"  src="<?php echo $this->session->userdata('photo'); ?>" class="profile-img" /><?php echo $this->session->userdata('name'); ?><b class="caret"></b> </a>
				  <ul class="dropdown-menu animated rubberBand">
					<div class="top_pointer"></div>
					<li> <a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a> </li>
				  </ul>
				</div>
			  </div>
			</div>
		</div>
		

		<?php $this->load->view('user/maintenance/nav'); ?>