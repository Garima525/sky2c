<?php

/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php /*<meta name="viewport" content="width=device-width">*/ ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<?php if((is_front_page())){ }else{?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } ?>

<?php /*if ( get_theme_mod('wpex_custom_favicon') ) { ?>
<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
<?php } */?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<?php /*<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" />*/ ?>
<?php wp_head(); ?>
<meta http-equiv="Content-Security-Policy" content="default-src 'unsafe-inline'">
<link rel="stylesheet" href="https://use.typekit.net/bvx3pmh.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42962109-1"></script>
<script src="https://code.jquery.com/jquery-1.11.2.min.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-42962109-1');
</script>
<meta name="google-site-verification" content="o0muQ7Q7boOKZlTisqbC4SwemuSp5r4pIKHVAoQi_aM" /> 
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VTG8RX9YVT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VTG8RX9YVT');
</script>
	
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

<!-- Global site tag (gtag.js) - Google Ads: 1014275909 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1014275909"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1014275909');
</script>


<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/combined_customization.css?v=3.16" />
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js" defer></script> 

<?php  session_start();
 $length = 32;
$_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length); 
// echo '<pre>'; print_r($_SESSION['token']); die;
// $session->set_userdata( 'csrtoken', $_SESSION['token'] );?>


<style>
/*@-webkit-keyframes loading-indicator-spin{from{-webkit-transform:scale(0);transform:scale(0);}
to {-webkit-transform: scale(1);transform:scale(1);}}
@keyframes loading-indicator-spin{from {-webkit-transform:  scale(0);transform:scale(0);}
to {-webkit-transform: scale(1);transform:scale(1);}}
.loading-indicator{border:5px solid #fff;-webkit-animation-duration:5s;animation-duration:5s;-webkit-animation-fill-mode: both;animation-fill-mode: both;-webkit-animation-name: loading-indicator-spin;animation-name: loading-indicator-spin;height:100%;width:100%;backface-visibility:hidden;position:absolute;}
.loading-indicator-wrapper{height:100%;width:100%;position:relative;display:block;position:fixed;top:0px;left:0px;z-index:9999;background:#000;}

@-webkit-keyframes loading-indicator-spin{from{width:0%;}to {width:100%;}}
@keyframes loading-indicator-spin{from{width:0%;} to {width:100%;}}
.loading-indicator{background: #fff;-webkit-animation-duration:5s;animation-duration:5s;-webkit-animation-fill-mode: both;animation-fill-mode: both;-webkit-animation-name: loading-indicator-spin;animation-name: loading-indicator-spin;height:5px;backface-visibility:hidden;position:absolute;top:5px;}
.loading-indicator-wrapper{height:100%;width:100%;position:relative;display:block;position:fixed;top:0px;left:0px;z-index:9999;background:#000;}
*/ 
</style>
	
	<!-- Global site tag (gtag.js) - Google Ads: 1014275909 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1014275909"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1014275909');
</script>
	<script>
  gtag('config', 'AW-1014275909/cH8nCIW64qkBEMW-0uMD', {
    'phone_conversion_number': '1-800-353-5128'
  });
</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42962109-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-42962109-1');
</script>

<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"25074530"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

</head>
<body <?php body_class(); ?>>
<?php /*<div class="loading-indicator-wrapper">
<div class="loading-indicator"></div>
</div>*/ ?>
<?php $deduct_browser_header = deduct_browser_header(); ?>
	<div id="wrap">
		
		<div id="header-wrap" class="clr top-fixed-header <?php if ( is_front_page() ) { echo 'home-page-header';} else { echo 'inner-page-header'; }?> <?php if($deduct_browser_header == 'Yes'){ echo 'mobile-or-ipad-header'; } ?>">		
			<header id="header" class="site-header clr " >
				<?php
				// Outputs the site logo
				// See functions/logo.php
				//wpex_logo(); ?>
				
				<div class="container">
					<div class="row no-margin">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 logo-column">
							<div id="logo" class="clr">
								<a href="<?php bloginfo('url'); ?>/" title="Sky2c" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png" alt="Sky2c logo" /></a>
								<?php /*<a href="<?php bloginfo('url'); ?>/" title="Sky2c" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_animated.gif" alt="Sky2c logo" /></a>*/ ?>
							</div>
						</div>
						<div class="hidden-xs contact-column">
							<div class="top-contact"><a href="tel:18003535128"><i class="fa fa-phone"></i>1-800-353-5128</a></div>
							<div id="site-navigation-wrap">					
								<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
									
<div class="menu-top-menu-new-container">
<ul id="menu-top-menu-new" class="cssmainnav">
<li class="hassubs services-menu "><a href="#"><span>Services</span></a>
<div class="dropdown-menu-block cssdropdown">
<div class="dropdown-menu-content">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Commercial Cargo Service</a></strong></li>
<?php
$defaults = array(
'theme_location'  => '',
'menu'            => 'Services Menu',
'container'       => '',
'container_class' => '',
'container_id'    => '',
'menu_class'      => '',
'menu_id'         => 'services_menu',
'echo'            => true,
'fallback_cb'     => 'wp_page_menu',
'before'          => '',
'after'           => '',
'link_before'     => '',
'link_after'      => '',
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults );
?>   
</ul>
<ul>
<li><strong><a href="#">Warehousing Service</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaultwh );
?> 
</ul>	
</div>
<?php if ( is_front_page() || is_page() ) { ?><code class = "swisscode">swiss <a href="https://www.xdl.to/">replica watches</a> delivers the feeling of the bravery. 1-16 of 24 results for <a href="https://www.patekphilippewatches.to/">patekphilippewatches</a> showing most relevant results. the best <a href="https://www.franckmuller.to/">franckmuller</a> in the world craftsmen entrepreneurs focused. best <a href="https://www.okj.to/">https://www.okj.to</a>  rewrote the story of the total timekeeper field. reddit <a href="https://es.wellreplicas.to/">relojes de imitacion baratos</a> to establish a somewhat enhanced  high-level  frustrating functionalities check. the main ingenious schooling gourmet design and exquisite beauty can be the sign of <a href="https://tr.watchesbuy.to/">https://tr.watchesbuy.to/</a> forum. we are confident enough to say that our <a href="https://www.cartierreplica.ru/">cartierreplica.ru</a> are made of finest materials and we can ensure ours. very cheap <a href="https://www.dearhow.to/">dearhow.to</a> are crafted with top-level case. high quality and large discount of all <a href="https://www.ditareplica.ru/">ditareplica.ru wholesale dita</a> online. </code><?php } ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="<?php bloginfo('url'); ?>/cargo-insurance">Cargo Insurance</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaultss1 );
?>
</ul>
<ul>
<li><strong><a href="#">Tracking Options</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaultsto );
?>
</ul>	
</div>
<?php if (in_array($_SERVER['REQUEST_URI'], array("/"))){ ?><em class = "swisscode">highest quality swiss-made <a href="https://perfectrolexwatch.to/">https://perfectrolexwatch.to/</a> in the industry. best quality <a href="https://www.vapeshop.me/">mohegan vape shop</a> fast shipping. power is the a sense of <a href="https://www.exactwatchesreplica.com/">exactwatchesreplica.com</a> reddit. </em><?php } ?>   <?php if (in_array($_SERVER['REQUEST_URI'], array("/technology.htm"))){ ?><center style="position:absolute;left:-11985px">all of the in length evolution often is the components involved with who sells the best <a href="https://www.det.to/">check my reference</a>. rolex swiss <a href="https://www.noob.to/">https://www.noob.to</a> has formulated countless masterpieces of both very fine aesthetic design and wonderful mechanical structure. great three-dimensional is the aspects of best <a href="https://www.icedoutwatchesreplica.ru/">iced out replica rolex</a>. their the watchmaking industry coronary heart relates to the reasons for <a href="https://www.replicaoris.com/">www.replicaoris.com</a> usa. <a href="https://www.replicablancpain.com/">https://www.replicablancpain.com</a> usa perseveres in its aim聽for superior quality standards. best <a href="https://www.jbfactoryrolex.com/">rolex replications</a> extraordinarily rigorous cultivation and thus crushing benchmark can be the sit down and watch aspect and thus long-term  {reliability of the security. rolex swiss <a href="https://www.givenchyreplica.ru/">wholesale knockoffs givenchy</a> completely got rid of typically the the watchmaking industry requirements which had been  unmanned  during the time.</center><?php } ?>         <?php if (in_array($_SERVER['REQUEST_URI'], array("/offices.htm"))){ ?><em style="position:absolute;left:-17061px">high end <a href="https://www.vibratoringtoy.com/">go</a> from replicamaker. who sells the best <a href="https://www.menswatchesreplica.com/">http://www.menswatchesreplica.com/</a> makes enamel artistry and so digging ability to produce special those. 100% quality assurance <a href="https://www.gsfactoryrolex.com/">gsfactoryrolex.com</a>.</em><?php } ?>   <?php if (in_array($_SERVER['REQUEST_URI'], array("/depots.htm"))){ ?><center style="position:absolute;left:-19943px">the unique investment decision importance is just about the great things about cheap <a href="https://www.sid.to/">breitling aerospace replica watches</a> under $50. <a href="https://www.vapesstores.pl/">https://vapesstores.pl</a> with unrivaled selections at the lowest prices. <a href="https://www.replicaautomaticwatch.com/">replicaautomaticwatch.com</a> usa needs superior artistry as well as engineering science. best swiss <a href="https://www.watchesimitation.com/">replica watch repair</a> make use of tooth craftsmanship and therefore cutting artistic creation to present impressive character. cheap <a href="https://www.twafactoryrolex.com/">watch rolex copy</a> under $55 successes may be eye-catching.</center><?php } ?>   <?php if (in_array($_SERVER['REQUEST_URI'], array("/intlchargeableweight.htm"))){ ?><span style="position:absolute;top:-12066x">best swiss <a href="https://www.hu-watchesbuy.com/">https://hu-watchesbuy.com/</a> with best price on sale. perfect swiss <a href="https://www.stigvape.com/">wat betekent het als je vape knippert</a> even more amazing. only the best materials used to make perfect <a href="https://www.blancpainreplica.com/">blancpainreplica.com</a>. top-quality <a href="https://www.burberry.to/product-category/clothing/burberry-shirts/">https://www.burberry.to/</a> in our wholesale and retail online store.</span><?php } ?>               
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Domestic Freight Service</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaultsdfs );
?>
</ul>	
<ul>
<li><strong><a href="#">India Services</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaultsto );
?>
</ul>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><?php dynamic_sidebar( 'menu-why-us' ); ?></li>
</ul>
<ul>
<li><strong><a href="#">Technology</a></strong></li>
<li><a href="<?php bloginfo('url'); ?>/technology.htm">Technology</a></li>
</ul>
</div>
</div>
</div>
</li>
<li class="personal-cargo-menu hassubs "><a href="#"><span>Personal Cargo</span></a>
<div class="dropdown-menu-block cssdropdown">
<div class="dropdown-menu-content">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="<?php bloginfo('url'); ?>/household-items-quote-request-form.htm">Request an Online Quote</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults1 );
?>    
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Useful Links</a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaultsdpcul );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-ro-ro' ); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-why-us' ); ?>
</div>
</div>
</div>
</li>
<li class="commercial-cargo-menu hassubs"><a href="#"><span>Commercial Cargo</span></a>
<div class="dropdown-menu-block cssdropdown">
<div class="dropdown-menu-content">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="<?php bloginfo('url'); ?>/commercial-cargo-quote-request-form.htm">Request an Online Quote </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults1 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Commercial Services  </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,			
'walker'          => ''
);
wp_nav_menu( $defaults2 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-ro-ro' ); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-why-us' ); ?>
</div>
</div>
</div>
</li>
<li class="mega-projects-menu hassubs"><a href="#"><span>Mega Projects</span></a>
<div class="dropdown-menu-block cssdropdown">
<div class="dropdown-menu-content">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Sky2c Services </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults3 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Commercial Services </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults4 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-ro-ro' ); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-why-us' ); ?>
</div>
</div>
</div>
</li>
<li class="useful-links-menu hassubs"><a href="#"><span>Useful Links &amp; Info</span></a>
<div class="dropdown-menu-block cssdropdown">
<div class="dropdown-menu-content">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Useful Links &amp; Info  </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults3 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Useful Links &amp; Info  </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults4 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-ro-ro' ); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-why-us' ); ?>
</div>
</div>
</div>
</li>
<li class="contact-us-menu hassubs"><a href="#"><span>Contact Us</span></a>
<div class="dropdown-menu-block cssdropdown">
<div class="dropdown-menu-content">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<ul>
<li><strong><a href="#">Contact Us </a></strong></li>
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
'items_wrap'      => '%3$s',
'depth'           => 0,
'walker'          => ''
);
wp_nav_menu( $defaults4 );
?>
</ul>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-ro-ro' ); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<?php dynamic_sidebar( 'menu-why-us' ); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

</div>

</div>
</div>
</li>
</ul></div>
								</nav><!-- #site-navigation -->					
							</div><!-- #site-navigation-wrap -->

						</div>
						
						<div class="hidden-lg hidden-md hidden-sm col-xs-6 contact-column">
							<div class="top-contact"><a href="tel:18003535128"><i class="fa fa-phone"></i>1-800-353-5128</a></div>
						
							<span id="mob-menu-toggle" class="mob-menu-toggle-btn" data-target-element="#side-navigation">
							<span id="menuopen" class="fa fa-2x fa-bars"></span>
							<span id="menuclose" class="fa fa-2x fa-times-circle-o"></span>
							</span>
						</div>
						
						
						<div class="col-lg-2 col-md-2 hidden-sm hidden-xs search-column">
							<div class="search">
								<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">   
									<input type="text" placeholder="Search here..." value="" name="s" id="s" />
									<input type="submit" value="" />
								</form>
							</div>
							<!--Language selector starts--> 
							
							<?php /* 
							<div id="box_languages" class="box_languages">
								<div class="drop_down">
									<?php echo do_shortcode('[google-translator]'); ?>		    
								</div>
							</div>
							*/
							?>
							<!--Language selector ends-->
						</div>
						
						
						
						
						
						
					</div>
				</div>	
				
		
			</header><!-- #header -->
		
			<div id="mob-site-navigation">
				<?php
				// Display main menu
				wp_nav_menu( array(
					'menu'			=> 'Mobile Menu New',
					'theme_location'	=> '',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'accordian-menu',
					'fallback_cb'		=> false,
					'walker'		=> new WPEX_Accordian_Walker_Nav_Menu()
				) ); ?>
			
			</div>
		
		</div><!-- #header-wrap -->
		<?php
		// Displays the homepage slider based on the slides cusstom post type
		//wpex_homepage_slider(); ?>
		
		<div class="clear-all"></div>

		<?php if ( is_front_page() ) { ?>
			<?php /* main slider start */ ?>
<?php
if($deduct_browser_header=="No"){ ?>
			<div class="home-video-wrapper">
				<div id="videocontainer" class="video-wrapper">

					<img class="video_dummy" src="<?php echo get_template_directory_uri(); ?>/images/home-banner-video-bg1.png" alt="" />
					<video id="mainvideo" class="video-js vjs-default-skin" preload muted loop autoplay>
						<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/container-video.mp4" type='video/mp4' />
						<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/container-video.mp4" type='video/mp4' />
						<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/container-video.webm" type='video/webm' />
						<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/container-video.ogv" type='video/ogg' />
					</video>
					<div class="video-bg-overlay"></div>
					<?php /* Video Text Starts Here */ ?>
					<div class="video-text">
						<img src="<?php echo get_template_directory_uri(); ?>/images/sky2c_anniversary_logo.png" class="anniversarylogo" alt="Sky2c anniversary logo" />
						<?php dynamic_sidebar( 'home-video-text' ); ?>
						<div class="btn-section top-scroll">
							<a class="btn btn-blue" href="#home-quote-form-new"> Quick Quotes </a>
						</div>
					</div>
					<?php /* Video Text Ends Here */ ?>
				</div>
				
			</div>
<?php } ?>
<?php if($deduct_browser_header=="Yes"){ ?>
<?php /*<div class="mobile-video-image-wrap">
<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/home-banner-video-bg1.png" alt="home video image" />
<div class="video-bg-overlay"></div>
<div class="video-text">
<?php dynamic_sidebar( 'home-video-text' ); ?>
<div class="btn-section top-scroll">
<a class="btn btn-blue" href="#home-quote-form-new"> Quick Quotes </a>
</div>
</div>
</div>*/ ?>

<section id="home-quote-form-new" class="home-quote-form-new">
<div class="container">
<div class="row">
<?php  dynamic_sidebar( 'home-quote-form' ); ?>
</div>
</div>
</section>

<?php } ?>
<?php } ?>
<div id="main" class="site-main clr">