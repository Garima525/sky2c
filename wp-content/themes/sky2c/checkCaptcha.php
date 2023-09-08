<?php session_start(); 
include("wp-config.php");
if( $_SESSION['security_code'] == $_REQUEST['captcha'] && !empty($_SESSION['security_code'] ) ) {
		echo "sucess";
	} else {
		echo "invalid";
	}
?>