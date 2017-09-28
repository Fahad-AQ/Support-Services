<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_superAdmin_login'))
{
    function check_superAdmin_login()
    {
        $ci=& get_instance();
        $ci->load->helper('url');
        $ci->load->library('session');
        if($ci->session->userdata('roleId') == '1' && $ci->session->userdata('empStatus') == '1' ){
            return true;
        }
        else{
            redirect(base_url("sadmin"));
        }
    }   
}
if ( ! function_exists('check_admin_login'))
{
    function check_admin_login()
    {
    	$ci=& get_instance();
		$ci->load->helper('url');
        $ci->load->library('session');
    	if($ci->session->userdata('roleId') == '2' &&  $ci->session->userdata('empStatus') == '1' ){
    		return true;
    	}
		else{
    		redirect(base_url("admin"));
    	}
    }   
}

if ( ! function_exists('check_user_login'))
{
    function check_user_login()
    {
    	$ci=& get_instance();
		$ci->load->helper('url');
        $ci->load->library('session');
    	if( $ci->session->userdata('roleId') == '3' &&  $ci->session->userdata('empStatus') == '1'||
            $ci->session->userdata('roleId') == '4' &&  $ci->session->userdata('empStatus') == '1'||
            $ci->session->userdata('roleId') == '5' &&  $ci->session->userdata('empStatus') == '1'||
            $ci->session->userdata('roleId') == '6' &&  $ci->session->userdata('empStatus') == '1'||
            $ci->session->userdata('roleId') == '7' &&  $ci->session->userdata('empStatus') == '1'||
            $ci->session->userdata('roleId') == '8' &&  $ci->session->userdata('empStatus') == '1'||
            $ci->session->userdata('roleId') == '9' &&  $ci->session->userdata('empStatus') == '1'){
    		return true;
    	}
		else{
    		redirect(base_url("user"));
    	}
    }   
}


