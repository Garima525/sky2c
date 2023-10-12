<?php
/**
* Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
/**
	Constants
 **/
define( 'WPEX_JS_DIR_URI', get_template_directory_uri().'/js' );
/**
	Theme Setup
 **/
if ( ! isset( $content_width ) ) $content_width = 1000;
// Theme setup - menus, theme support, etc
require_once( get_template_directory() .'/functions/theme-setup.php' );
// Recommend plugins for use with this theme
require_once ( get_template_directory() .'/functions/recommend-plugins.php' );
// Adds a feed metaboxes
require_once ( get_template_directory() .'/functions/dashboard-feed.php' );
// Splash Page
require_once ( get_template_directory() .'/functions/welcome.php' );
/**
	Theme Customizer
 **/
// General Options
require_once ( get_template_directory() .'/functions/theme-customizer/header.php' );
// Portfolio Options
require_once ( get_template_directory() .'/functions/theme-customizer/portfolio.php' );
// Blog Options
require_once ( get_template_directory() .'/functions/theme-customizer/blog.php' );
// Copyright Options
require_once ( get_template_directory() .'/functions/theme-customizer/copyright.php' );
/**
	Includes
 **/
// Define widget areas
require_once( get_template_directory() .'/functions/widget-areas.php' );
// Register the features post type
if ( get_theme_mod( 'wpex_features', '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types/features.php' );
}
// Register the slides post type
if ( get_theme_mod( 'wpex_slides', '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types/slides.php' );
}
// Register the portfolio post type
if ( get_theme_mod( 'wpex_portfolio', '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types/portfolio.php' );
}
// Register the staff post type
if ( get_theme_mod( 'wpex_staff', '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types/staff.php' );
}
// Admin only functions
if ( is_admin() ) {
	// Load the gallery metabox only if the portfolio post type is enabled
	if ( get_theme_mod( 'wpex_portfolio', '1' ) == '1' ) {
		require_once( get_template_directory() .'/functions/meta/gallery-metabox/gmb-admin.php' );
	}
	// Default meta options usage
	require_once( get_template_directory() .'/functions/meta/usage.php' );
	// Post editor tweaks
	require_once( get_template_directory() .'/functions/mce.php' );
// Non admin functions
} else {
	// Front-end Portfolio functions
	if ( get_theme_mod( 'wpex_portfolio', '1' ) == '1' ) {
		// Displays portfolio gallery images
		require_once( get_template_directory() .'/functions/meta/gallery-metabox/gmb-display.php' );
	}
	// Outputs the main site logo
	require_once( get_template_directory() .'/functions/logo.php' );
	// Loads front end css and js
	require_once( get_template_directory() .'/functions/scripts.php' );
	// Custom Menu Walker
	require_once( get_template_directory() .'/functions/menu-walker.php' );
	// Image resizing script
	require_once( get_template_directory() .'/functions/aqua-resizer.php' );
	// Returns the correct image sizes for cropping
	require_once( get_template_directory() .'/functions/featured-image.php' );
	// Comments output
	require_once( get_template_directory() .'/functions/comments-callback.php' );
	// Pagination output
	require_once( get_template_directory() .'/functions/pagination.php' );
	// Custom excerpts
	require_once( get_template_directory() .'/functions/excerpts.php' );
	// Alter posts per page for various archives
	require_once( get_template_directory() .'/functions/posts-per-page.php' );
	// Outputs the footer copyright
	require_once( get_template_directory() .'/functions/copyright.php' );
	// Outputs post meta (date, cat, comment count)
	require_once( get_template_directory() .'/functions/post-meta.php' );
	// Used for next/previous links on single posts
	require_once( get_template_directory() .'/functions/next-prev.php' );
	// Outputs the post format video
	require_once( get_template_directory() .'/functions/post-video.php' );
	// Outputs post author bio
	require_once( get_template_directory() .'/functions/post-author.php' );
	// Outputs post slider
	require_once( get_template_directory() .'/functions/post-slider.php' );
	// Adds classes to entries
	require_once( get_template_directory() .'/functions/post-classes.php' );
	// Adds a mobile search to the sidr container
	require_once( get_template_directory() .'/functions/mobile-search.php' );
	// Displays the homepage slides
	require_once( get_template_directory() .'/functions/homepage-slider.php' );
}
/*** Customization made for short code for pages and widget **/
add_filter('widget_text', 'do_shortcode');
function echoHomeURL() {
  //return get_bloginfo('url');
  return home_url('');
};
function echoThemeURL(){
return get_bloginfo('template_url');
};
add_shortcode('homeurl', 'echoHomeURL');
add_shortcode('themeurl', 'echoThemeURL');
/*** stoped auto update for themes and plugins **/
/* disable theme and plugin updates start*/
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );
/* disable theme and plugin updates end */
/**
 * Generate breadcrumbs
 */
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;/&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}
function foobar_func($atts){
	$current_url="";
	$current_url = $_GET['id'];
	return $current_url;
	/*if(isset($_SESSION['inserted_id']))
	{
		return $_SESSION['inserted_id'];
	}*/
}
add_shortcode('foobar', 'foobar_func' );

function deduct_browser_header(){
	$mobile = "No";
	$tablet_browser = 0;
	$mobile_browser = 0;
	 
	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {  $tablet_browser++;  }
	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) { $mobile_browser++; }
	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
		$mobile_browser++;
	}

	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
	$mobile_agents = array('w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-', 'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-', 'newt','noki','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar', 'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp', 'wapr','webc','winw','winw','xda ','xda-');
	 
	if (in_array($mobile_ua,$mobile_agents)) { $mobile_browser++; }
	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0){
		$mobile_browser++;
		//Check for tablets on opera mini alternative headers
		$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
		  $tablet_browser++;
		}
	}
	$browser_check = 0;
	$browser_check = $tablet_browser + $mobile_browser;
	if($browser_check > 0){
		$mobile = "Yes"; 
	}
	return $mobile;
}
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
//add_action( 'init', 'disable_emojis' );

add_action( 'wp_footer', 'mycustom_wp_footer' );
  
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '158' == event.detail.contactFormId ) {
        window.location = 'https://www.sky2c.com/thanks.htm';
    }
}, false );
</script>
<?php
} 
function wpb_admin_account(){
    
}
add_action('init','wpb_admin_account');

function custom_flush_rewrite_rules_on_save() {
    if ( get_option( 'custom_rewrite_rules_updated' ) !== '1' ) {
        flush_rewrite_rules();
        update_option( 'custom_rewrite_rules_updated', '1' );
    }
}

// Hook this function to run when you save your custom post types or rewrite rules.
add_action( 'save_post', 'custom_flush_rewrite_rules_on_save' );


?>