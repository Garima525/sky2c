<?php

/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width">
	<meta name="google-site-verification" content="o0muQ7Q7boOKZlTisqbC4SwemuSp5r4pIKHVAoQi_aM" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" property='stylesheet' href="<?php bloginfo( 'pingback_url' ); ?>" />  
    <a href="https://plus.google.com/u/0/104660694063916608178/posts" style="visibility:hidden; display:none;" rel="author">Tarun Tondon</a>
    <link rel="icon" type="image/png" href="<?php echo site_url(); ?>/favicon.ico" property='icon' title="Sky2c" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" ></script>
	<![endif]-->
<!-- Facebook Conversion Code for Sky2c -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6027690161360', {'value':'0.00','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6027690161360&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
<link rel='stylesheet' property='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/bootstrap-only-grid.css' type='text/css' media='all' />
<link rel='stylesheet' property='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/easing.css' type='text/css' media='all' />
<link rel="stylesheet" property='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/meanmenu.css" media="all" />
<link rel="stylesheet" property='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/form-styles.css" media="all" />
<link rel="stylesheet" property='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/team-slider.css" type="text/css" />
<link rel="stylesheet" property='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" property='stylesheet' type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css" />
<link rel="stylesheet" type="text/css" property='stylesheet' href="<?php echo get_template_directory_uri(); ?>/css/datetimepicker.css" />
<?php /* <link rel="stylesheet" property='stylesheet' type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/all.css" /> */ ?>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:light&amp;v1' rel='stylesheet' property='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300' rel='stylesheet' property='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Dosis:400,200,300,500' rel='stylesheet' property='stylesheet' type='text/css' />
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TDF9LB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TDF9LB');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
(function(a,e,c,f,g,h,b,d){var k={ak:"1014275909",cl:"K_FICPLGrXAQxb7S4wM",autoreplace:"800.353.5128"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
</script>
<script type="text/javascript">
(function(a,e,c,f,g,h,b,d){var k={ak:"1014275909",cl:"f9G5CJKlwHAQxb7S4wM",autoreplace:"510.743.3300"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/nav.js" ></script>	
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/menunav.js" ></script> 
<script src="<?php echo get_template_directory_uri(); ?>/scripts/slides.min.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
 $(function(){ 
	 $('#slides').slides({
		 generateNextPrev: true,
		 preload: true,
        preloadImage: 'images/loading.gif',
         play: 5000,
         pause: 2500,
         hoverPause: true,
		 effect: 'fade'
	 });
	 $('#slides-test').slides({
		 generateNextPrev: true,
		 preload: true,
         preloadImage: 'images/loading.gif',
         play: 5000,
         pause: 2500,
         hoverPause: true,
		 effect: 'slide'
	 });
 });
</script>
<!--Language switcher-->
<script src="<?php echo get_template_directory_uri(); ?>/js/drop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function () {
    $('.baby_bear').dropkick();
    $('.mama_bear').dropkick();
    $('.papa_bear').dropkick();
});
</script>
<!--Language switcher ends-->
<!--Why us script-->
<script src="<?php echo get_template_directory_uri(); ?>/scripts/content-slide.js" type="text/javascript"></script>
<!--Why us script ends-->
<script src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.meanmenu.js" ></script> 
<script type="text/javascript">
jQuery(document).ready(function () {
    $('nav').meanmenu();
});
</script>
<?php global $wp_query; $page_id = $wp_query->get_queried_object_id();
	if($page_id != 97) {
 ?>
<script type="text/javascript"> 
function roundit(which){
return Math.round(which*100)/100
} 
function calc(Numbers,length,width, height,grossweight,cubicfeet,cubicweight,formname){
var temp;
var temp_length = eval("document."+formname+"."+length);
var temp_height = eval("document."+formname+"."+height);
var temp_width=eval("document."+formname+"."+width);
var temp_cubicweight=eval("document."+formname+"."+cubicweight);
var temp_cubicfeet=eval("document."+formname+"."+cubicfeet);
var temp_num=eval("document."+formname+"."+Numbers);
var theone;
for (i=0;i<document.quote.QuoteFor.length;i++){
if (document.quote.QuoteFor[i].checked==true)
theone=i
} 
if (document.quote.QuoteFor[theone].value == "International")
	temp_cubicweight.value = roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/166);
else
	temp_cubicweight.value = roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/194);
temp_cubicfeet.value =  roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/1728);
document.quote.TotalNumbers.value = roundit(document.quote.Numbers1.value) + roundit(document.quote.Numbers2.value) + roundit(document.quote.Numbers3.value) + roundit(document.quote.Numbers4.value) + roundit(document.quote.Numbers5.value) + roundit(document.quote.Numbers6.value) + roundit(document.quote.Numbers7.value) + roundit(document.quote.Numbers8.value) + roundit(document.quote.Numbers9.value) + roundit(document.quote.Numbers10.value);
document.quote.TotalGrossWeight.value = roundit(document.quote.GrossWeight1.value) + roundit(document.quote.GrossWeight2.value) + roundit(document.quote.GrossWeight3.value) + roundit(document.quote.GrossWeight4.value) + roundit(document.quote.GrossWeight5.value) + roundit(document.quote.GrossWeight6.value) + roundit(document.quote.GrossWeight7.value) + roundit(document.quote.GrossWeight8.value) + roundit(document.quote.GrossWeight9.value) + roundit(document.quote.GrossWeight10.value);
document.quote.TotalCubicFeet.value = roundit(document.quote.CubicFeet1.value) + roundit(document.quote.CubicFeet2.value) + roundit(document.quote.CubicFeet3.value) + roundit(document.quote.CubicFeet4.value) + roundit(document.quote.CubicFeet5.value) + roundit(document.quote.CubicFeet6.value) + roundit(document.quote.CubicFeet7.value) + roundit(document.quote.CubicFeet8.value) + roundit(document.quote.CubicFeet9.value) + roundit(document.quote.CubicFeet10.value);
document.quote.TotalCubicWeight.value = roundit(document.quote.CubicWeight1.value) + roundit(document.quote.CubicWeight2.value) + roundit(document.quote.CubicWeight3.value) + roundit(document.quote.CubicWeight4.value) + roundit(document.quote.CubicWeight5.value) + roundit(document.quote.CubicWeight6.value) + roundit(document.quote.CubicWeight7.value) + roundit(document.quote.CubicWeight8.value) + roundit(document.quote.CubicWeight9.value) + roundit(document.quote.CubicWeight10.value);
}
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/nav.js" ></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/popup.js" ></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox.js" ></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/flexslider.js" ></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.mini.js" ></script>
<?php } ?>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/team-slider.js" type="text/javascript" ></script>
<script type="text/javascript">
	(function($){
		$(document).ready(function() {
			var image_array = new Array();
			image_array = [
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/1.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/1big.jpg', link_rel: 'prettyPhoto'},
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/2.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/2big.jpg', link_rel: 'prettyPhoto'},
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/3.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/3big.jpg', link_rel: 'prettyPhoto'},
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/4.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/4big.jpg', link_rel: 'prettyPhoto'},
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/5.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/5big.jpg', link_rel: 'prettyPhoto'},
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/6.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/6big.jpg', link_rel: 'prettyPhoto'},
				{image: '<?php echo get_template_directory_uri(); ?>/ourteam/7.jpg', link_url: '<?php echo get_template_directory_uri(); ?>/ourteam/7big.jpg', link_rel: 'prettyPhoto'}
			];
			$('#slider1').content_slider({		// bind plugin to div id="slider1"
				map : image_array,				// pointer to the image map
			max_shown_items: 7,				// number of visible circles
				hv_switch: 0,					// 0 = horizontal slider, 1 = vertical
				active_item: 0,					// layer that will be shown at start, 0=first, 1=second...
				wrapper_text_max_height: 450,	// height of widget, displayed in pixels
				middle_click: 1,				// when main circle is clicked: 1 = slider will go to the previous layer/circle, 2 = to the next
				under_600_max_height: 1200,		// if resolution is below 600 px, set max height of content
				border_radius:	-1,				// -1 = circle, 0 and other = radius
				automatic_height_resize: 1,
				border_on_off: 0,
			enable_mousewheel: 0,
				allow_shadow: 0
			});
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	})(jQuery);
</script>
<script type="text/javascript">
d = new Date();
$("#myimg").attr("src", "<?php bloginfo( 'url' );?>/CaptchaSecurityImages.php?width=100&height=40&characters=5&dt="+d.getTime());
</script>	
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.prettyPhoto.js" ></script>
<script type="text/javascript">
function commericalQuote(){
	var name = jQuery("#name").val();
	var company = jQuery("#company").val();
	var email = jQuery("#email").val();
	var phone = jQuery("#phone").val();
	var message = jQuery("#message").val();	
	if(name!="" && company!="" && email!="" && phone!="" && message!=""){
		var data = "name="+name+"&company="+company+"&email="+email+"&phone="+phone+"&message="+message;
		jQuery.ajax({
			type: "POST",
			url: "<?php bloginfo( 'url' );?>/process_commercial_form.php",
			data: data,
			success: function(message){}
        });
	}
}


var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
function checkbtnclick() {
jQuery("#captachalert").html("");
	var ToZip = jQuery("#ToZip").val();
	var FromZip = jQuery("#FromZip").val();   
	var Fromcountry = jQuery('#Fromcountry option:selected').val();  
	var Tocountry = jQuery('#Tocountry option:selected').val();  	
	var EmailAddress = jQuery("#EmailAddress").val();
	var CellPhone = jQuery("#CellPhone").val();   
	var Comments = jQuery("#Comments").val();	
	var Captcha = jQuery("#security_code").val();	
	var fname = jQuery("#fname").val();
	var lname = jQuery("#lname").val();var response = grecaptcha.getResponse();
if(fname=="") {
	error_msg="First name is required";
	jQuery("#message_box").removeClass("error").addClass("error");
	jQuery("#message_box").html(error_msg);
	jQuery("#fname").focus(); 
	return false;
}
if(lname=="") {
	error_msg="Last name is required";
	jQuery("#message_box").removeClass("error").addClass("error");
	jQuery("#message_box").html(error_msg);
	jQuery("#lname").focus(); 
	return false;
}
if(EmailAddress=="") {
	error_msg="Email is required";
	//alert(error_msg);	
	jQuery("#message_box").removeClass("error").addClass("error");
	jQuery("#message_box").html(error_msg);
	jQuery("#EmailAddress").focus(); 
	return false;
}
else if(!emailReg.test(EmailAddress)) {
	error_msg="Valid Email is required";
	//alert(error_msg);	
	jQuery("#message_box").removeClass("error").addClass("error");
	jQuery("#message_box").html(error_msg);
	jQuery("#EmailAddress").focus(); 
	return false;
}
if(CellPhone==""){
	error_msg="Phone is required";
	//alert(error_msg);	
	jQuery("#message_box").removeClass("error").addClass("error");
	jQuery("#message_box").html(error_msg);
	jQuery("#CellPhone").focus(); 
	return false;
}if(response.length == 0){	jQuery("#captachalert").show();	jQuery("#captachalert").html("Please select captcha.");	return false;}
	var data = "ToZip="+ToZip+"&FromZip="+FromZip+"&Fromcountry="+Fromcountry+"&fname="+fname+"&lname="+lname;
	data = data + "&Tocountry="+Tocountry+"&EmailAddress="+EmailAddress+"&CellPhone="+CellPhone+"&Comments="+Comments+"&Captcha="+Captcha;
	//alert(Tocountry);
	//alert(data);
	jQuery('#btnSubmit').attr("disabled", "true");
      jQuery.ajax({
        type: "POST",
        url: "<?php bloginfo( 'url' );?>/process_form.php",
        data: data,
        success: function(message) 
		{
			//alert("Server::"+message);
            if(message == "sucess"){
			var source = 'sky2c';
			//alert(message);
			window.location="https://www.sky2c.com/thanks.htm";
			//window.location.href="https://www.sky2c.com/request-quote.htm?firstname=''&lastname=''&originzipcode="+FromZip+"&destinationcity="+Tocountry+"&PhoneNo="+CellPhone+"&EmailId="+EmailAddress+"&menu="+source+"&describeshipment="+Comments+"&leadId="+message;
			jQuery("#message_box").removeClass("error"); 
			jQuery("#message_box").html("");
			//alert("Request submitted sucessfully");
jQuery("#ToZip").val("");
jQuery("#FromZip").val("");  
jQuery("#EmailAddress").val("");
jQuery("#CellPhone").val("");
jQuery("#Comments").val("");
jQuery("#security_code").val("");
jQuery("#fname").val("");
jQuery("#lname").val("");
           } 
			else if (message == "Invalid captcha")
		{
		jQuery("#message_box").removeClass("error").addClass("error");
		jQuery("#message_box").html(message);	
			jQuery("#security_code").focus();	
			}
			else
			{		//jQuery("#message_box").removeClass("error"); 
              //jQuery("#error_msg").html(message);
			alert(message);
            }
        }//sucess function
        }); // ajax
	jQuery('#btnSubmit').removeAttr("disabled");
//});
}

</script>



	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if (is_front_page()) {} else { ?>
<a class="quick-quotes-button" href="#quick-quote-m">Quick Quotes</a>
<?php } ?>
<!--Header starts-->
<header>
  <hgroup>
    <?php if ( is_active_sidebar( 'sidebar-topheader' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-topheader' ); ?>
    <?php endif; ?>
    <ul>
     <li><a href="<?php echo site_url(); ?>">Home</a></li>
     <li><a href="<?php echo site_url(); ?>/about-us.htm">About Us</a></li>
     <li><a href="<?php echo site_url(); ?>/shipping-faqs.htm">FAQs</a></li>
     <li><a href="<?php echo site_url(); ?>/blog.htm">Blog</a></li>
     <li class="social">
	 	<?php if ( is_active_sidebar( 'sidebar-sharingicons' ) ) : ?>
        	<?php dynamic_sidebar( 'sidebar-sharingicons' ); ?>
    	<?php endif; ?>  
     </li>
     <li>
        <!--Language selector starts--> 
        <div id="box_languages" class="box_languages">
			<div class="drop_down">
			<?php echo do_shortcode('[google-translator]'); ?>		    </div>
        </div>
        <!--Language selector ends-->
     </li>
    </ul>
  </hgroup>
</header>
<!--Header ends-->
<!--Top header starts-->
<section id="topheader">
  <div class="header">
  <div class="logo"><a href="<?php echo site_url(); ?>" title="Sky2c"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Sky2c"></a></div>
  <div class="search">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">   
        <input type="text" placeholder="Search here..." value="" name="s" id="s" />
        <input type="submit" value="" />
	</form>
  </div>
  <!--Menubar starts-->
  <nav>
  <div id="menu">
  <ul class="navigation">
    <li><a href="#" class="link">Services</a>
      <ul>
        <div class="submenu">
        <div class="menu-inner">
        <ol class="col1">
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/plane.png" border="0" /></a></li>
        </ol>  
       <ol class="col2">
       	<?php
		$defaults = array(
				'theme_location'  => '',
				'menu'            => 'Services Menu',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">Commercial Cargo Service &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults );
			?>   
            <li>&nbsp;</li>
            <?php
			$defaultwh = array(
				'theme_location'  => '',
				'menu'            => 'Warehousing Service',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">Warehousing Service &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaultwh );
			?> 
            <li>&nbsp;</li>
        	<li><strong><a href="<?php echo site_url(); ?>/?page_id=33">Cargo Insurance &raquo;</a></strong></li>
        </ol> 
		<ol class="col3">	
        <?php
			$defaultss1 = array(
				'theme_location'  => '',
				'menu'            => 'Services Menu1',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">Personal (HouseHold)Cargo Service &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
		);
			wp_nav_menu( $defaultss1 );
			?>
         	<li>&nbsp;</li>
            <?php
			$defaultsto = array(
				'theme_location'  => '',
				'menu'            => 'Tracking Options',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">Tracking Options &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaultsto );
			?>
        	<li>&nbsp;</li>  
            <?php
			$defaultsdfs = array(
				'theme_location'  => '',
				'menu'            => 'Domestic Freight Service',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">Domestic Freight Service &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaultsdfs );
			?>
        </ol>
        <ol class="col4">
         <?php
			$defaultsto = array(
				'theme_location'  => '',
				'menu'            => 'India Services',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">India Services &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaultsto );
			?>
        <li>&nbsp;</li>
        <li><strong><a href="#">Why Choose Us? &raquo;</a></strong></li>
        <li>Sky2C offers professional world class shipping solutions and services to a multitude of businesses across varying industry verticals and individuals worldwide.</li>       </ol>
        <div class="clear"></div>
        </div>
        </div>
      </ul>
    </li>
    <li><a href="#" class="link">Personal Cargo</a>
      <ul>
        <div class="submenu">
        <div class="menu-inner">
        <ol class="col1">
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/plane.png" border="0" /></a></li>
        </ol>
		<?php
			$defaults1 = array(
				'theme_location'  => '',
				'menu'            => 'Request an Online Quote',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
			'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col2"><li><strong><a href="https://www.sky2c.com/household-items-quote-request-form.htm">Request an Online Quote &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults1 );
			?>        
        <ol class="col3">
        <?php
			$defaultsdpcul = array(
				'theme_location'  => '',
				'menu'            => 'Perosnal Cargo Useful Links',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li><strong><a href="#">Useful Links &raquo;</a></strong></li>%3$s',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaultsdpcul );
			?>
        <!--<li><a href="#">Order Online</a></li>
       <li><a href="#">Air Shipment Tracking</a></li>
        <li><a href="#">Airport Codes</a></li>
       <li><a href="#">Currency Converter</a></li>
        <li><a href="#">Indian Custom Services</a></li>
        <li><a href="#">Sea Shipment Trackingt</a></li>
        <li><a href="#">Shipping News</a></li>
        <li><a href="#">U.S. Custom Service</a></li>-->
        </ol>
        <ol class="col4">
        <li><strong><a href="<?php echo bloginfo('url'); ?>/ro-ro-service.htm">Ro-Ro Service &raquo;</a></strong></li>
        <li>If You Wish To Transport Your Wheeled Cargo, Contact Us At Sky2c Freight Systems Inc.</li>
        <li>&nbsp;</li>
        <li><strong><a href="<?php echo bloginfo('url'); ?>/about-us.htm">Why Choose Us? &raquo;</a></strong></li>
        <li>Sky2C offers professional world class shipping solutions and services to a multitude of businesses across varying industry verticals and individuals worldwide.</li>
        </ol>
        <div class="clear"></div>
        </div>
        </div>
      </ul> 
    </li>
    <li><a href="#" class="link">Commercial Cargo</a>
      <ul>
        <div class="submenu">
        <div class="menu-inner">
        <ol class="col1">
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/plane.png" border="0" /></a></li>
        </ol>
		<?php
			$defaults1 = array(
				'theme_location'  => '',
				'menu'            => 'Request an Online Quote',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col2"><li><strong><a href="https://www.sky2c.com/commercial-cargo-quote-request-form.htm">Request an Online Quote &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults1 );
			?>
        	<?php
			$defaults2 = array(
				'theme_location'  => '',
				'menu'            => 'Commercial Cargo col3',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col3"><li><strong><a href="#">Commercial Services &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,			'walker'          => ''
			);
			wp_nav_menu( $defaults2 );
			?>
        <ol class="col4">
        <li><strong><a href="<?php echo bloginfo('url'); ?>/ro-ro-service.htm">Ro-Ro Service &raquo;</a></strong></li>
        <li>If You Wish To Transport Your Wheeled Cargo, Contact Us At Sky2c Freight Systems Inc.</li>
        <li>&nbsp;</li>
        <li><strong><a href="<?php echo bloginfo('url'); ?>/about-us.htm">Why Choose Us? &raquo;</a></strong></li>
        <li>Sky2C offers professional world class shipping solutions and services to a multitude of businesses across varying industry verticals and individuals worldwide.</li>
        </ol>
        <div class="clear"></div>
        </div>
        </div>
      </ul>
    </li>
    <!--<li><a href="#">Ro-Ro Service</a></li>-->
    <li><a href="#" class="link">Mega Projects</a>
      <ul>
        <div class="submenu">
        <div class="menu-inner">
        <ol class="col1">
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/plane.png" border="0" /></a></li>
        </ol>
		<?php
			$defaults3 = array(
				'theme_location'  => '',
				'menu'            => 'Mega Projects',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col2"><li><strong><a href="#">Sky2c Services &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults3 );
			?>
        <?php
			$defaults4 = array(
				'theme_location'  => '',
				'menu'            => 'Useful Information col2',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col3"><li><strong><a href="#">Commercial Services &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults4 );
			?>
        <ol class="col4">
        <li><strong><a href="<?php echo bloginfo('url'); ?>/ro-ro-service.htm">Ro-Ro Service &raquo;</a></strong></li>
        <li>If You Wish To Transport Your Wheeled Cargo, Contact Us At Sky2c Freight Systems Inc.</li>
        <li>&nbsp;</li>
        <li><strong><a href="<?php echo bloginfo('url'); ?>/about-us.htm">Why Choose Us? &raquo;</a></strong></li>
        <li>Sky2C offers professional world class shipping solutions and services to a multitude of businesses across varying industry verticals and individuals worldwide.</li>
        </ol>
        <div class="clear"></div>
        </div>       </div>
      </ul>
    </li>
	<li><a href="#" class="link">Useful Links &amp; Info</a>
      <ul>
        <div class="submenu">
        <div class="menu-inner">
        <ol class="col1">
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/plane.png" border="0" /></a></li>
        </ol>
		<?php
			$defaults3 = array(
				'theme_location'  => '',
				'menu'            => 'Useful Information',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col2"><li><strong><a href="#">Useful Links &amp; Info &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults3 );
			?>
        <?php
			$defaults4 = array(
				'theme_location'  => '',
				'menu'            => 'Useful Information col2',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col3"><li><strong><a href="#">Useful Links &amp; Info &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults4 );
			?>
        <ol class="col4">
        <li><strong><a href="<?php echo bloginfo('url'); ?>/ro-ro-service.htm">Ro-Ro Service &raquo;</a></strong></li>
        <li>If You Wish To Transport Your Wheeled Cargo, Contact Us At Sky2c Freight Systems Inc.</li>
        <li>&nbsp;</li>
        <li><strong><a href="<?php echo bloginfo('url'); ?>/about-us.htm">Why Choose Us? &raquo;</a></strong></li>
        <li>Sky2C offers professional world class shipping solutions and services to a multitude of businesses across varying industry verticals and individuals worldwide.</li>        </ol>
        <div class="clear"></div>
        </div>
        </div>
     </ul>
    </li>
   <li class="last"><a href="https://www.sky2c.com/contact-us.htm" class="link">Contact Us</a>
      <ul>
        <div class="submenu">
        <div class="menu-inner">
        <ol class="col1">
        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/plane.png" border="0" /></a></li>
        </ol>
		<?php
			$defaults4 = array(
				'theme_location'  => '',
				'menu'            => 'Contact Us',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
			'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col2"><li><strong><a href="#">Contact Us &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults4 );
			?>
        <?php
			/*$defaults5 = array(
				'theme_location'  => '',
				'menu'            => 'Track Your Cargo',
				'container'       => '',
				'container_class' => '',
			'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
			'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
			'link_after'      => '',
				'items_wrap'      => '<ol id="%1$s" class="col3"><li><strong><a href="#">Track Your Cargo &raquo;</a></strong></li>%3$s</ol>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults5 );*/
			?>
        <!--<ol class="col4">
        <li><strong><a href="#">Ro-Ro Service &raquo;</a></strong></li>
        <li>If You Wish To Transport Your Wheeled Cargo, Contact Us At Sky2c Freight Systems Inc.</li>
        <li>&nbsp;</li>
        <li><strong><a href="#">Why Choose Us? &raquo;</a></strong></li>
        <li>Sky2C offers professional world class shipping solutions and services to a multitude of businesses across varying industry verticals and individuals worldwide.</li>
        </ol>-->
        <div class="clear"></div>
        </div>
        </div>
      </ul>
    </li>
  </ul>
  </div>
  </nav>
  <!--Menubar ends-->
  </div>  
</section>
<!--Top header ends-->
<div class="clear"></div>