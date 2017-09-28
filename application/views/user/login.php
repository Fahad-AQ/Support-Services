<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Support & Services Login</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body class="light_theme" style="background:url('<?php echo base_url();?>assets/images/bg-login.jpg');">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="login_page">
	  <div class="login_content">
		<h5 class="panel-heading">
		  Welcome to Support & Services Dept.
		</h5>
        <div class="message alert alert-styled-left"></div>
	   <div class="content-group-lg">
		 <img style="width: 70%;" src="<?php echo base_url(); ?>assets/images/support_icon.png" /><br>
		</div>
	 
	  <button type="button" id="customBtn" class="btn btn-primary text-bold">Log in</button> 
	 </div>
  </div>
</div>
<!--\\\\\\\ wrapper end\\\\\\-->  

<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common-script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
 <script src="https://apis.google.com/js/api:client.js"></script>
		<script>
			$(document).ready(function () { 
				$('.message').hide();
                var googleUser = {};
				gapi.load('auth2', function(){
				// Retrieve the singleton for the GoogleAuth library and set up the client.
				auth2 = gapi.auth2.init({
					client_id: '151553518651-r2ag04hvjooa2r071eatff031nf6jpj4.apps.googleusercontent.com',
					// Request scopes in addition to 'profile' and 'email'
					//scope: 'additional_scope'
				});
				auth2.attachClickHandler('customBtn', {},
					function(googleUser) {
					  $('.msg').show();
				      $('.msg').removeClass('alert-info');
				      $('.msg').removeClass('alert-danger');
				      $('.msg').addClass('alert-success');
				      $('.msg').show().html('Please Wait');
						var profile = googleUser.getBasicProfile();	
						var email = profile.getEmail();
						var checkEmail = email.split("@");
						if(checkEmail[1] != "mobilelinkusa.com"){
                            $('.message').addClass('alert-warning');
							$('.message').removeClass('alert-success');
							$('.message').slideDown(2500).html('Company email only allowed');
						}
					   else{
						$.ajax({
						type:'post',
						data:{"email" : profile.getEmail() ,"photo" : profile.getImageUrl()},
						url:'<?php echo base_url('user/login'); ?>',
						dataType:'json',
						success:function(data){
					            if(data.status == "Credential Not Created" ){

						            $('.message').addClass('alert-warning');
						            $('.message').removeClass('alert-success');
						            $('.message').slideDown(2500).html("Kindly reach out Web Depart For Your Credentials");
						            
						            }
						            else if(data.object["roleId"] == "1" ){

						              if(data.object["empStatus"] == "1" ){
						                 $('.message').removeClass('alert-warning');
						                 $('.message').addClass('alert-success');
						                 $('.message').slideDown(2500).html("Login Success");
						                 setTimeout(function(){location.href="<?php echo base_url('sAdmin/dashboard'); ?>"} , 2500);  
						                }
						              else{
						                $('.message').addClass('alert-warning');
						                $('.message').removeClass('alert-success');
						                $('.message').slideDown(2500).html("Kindly reach out Web Depart For Your Credentials");

						              }
						               
						            }
						             else if(data.object["roleId"] == "2" ){

						              if(data.object["empStatus"] == "1" ){
						                 $('.message').removeClass('alert-warning');
						                 $('.message').addClass('alert-success');
						                 $('.message').slideDown(2500).html("Login Success");
						                 setTimeout(function(){location.href="<?php echo base_url('admin/mainDashboard'); ?>"} , 2500);  
						                }
						              else{
						                $('.message').addClass('alert-warning');
						                $('.message').removeClass('alert-success');
						                $('.message').slideDown(2500).html("Kindly reach out Web Depart For Your Credentials");

						              }
						               
						            }
						            else{
						              
						              if(data.object["empStatus"] == "1" ){
						                 $('.message').removeClass('alert-warning');
						                 $('.message').addClass('alert-success');
						                 $('.message').slideDown(2500).html("Login Success");
						                 setTimeout(function(){location.href="<?php echo base_url('user/mainDashboard'); ?>"} , 2500);  
						                }
						              else{
						                $('.message').addClass('alert-warning');
						                $('.message').removeClass('alert-success');
						                $('.message').slideDown(2500).html("Kindly reach out Web Depart For Your Credentials");

						              }
						              
						             }
						 
						},
						error:function(data){console.log(data.responseText)}
				     });
				 	}
				
				});
				});
			})
  </script>
</body>
</html>
