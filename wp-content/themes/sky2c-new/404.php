<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header(); ?>
<div id="primary" class="content-area clr">
	<div id="content" class="site-content clr" role="main">
		<div id="error-page" class="clr">
			<img alt="" src="<?php echo get_template_directory_uri(); ?>/images/404-error.jpg" class="img-responsive center-block" />
			<?php /*<h1 id="error-page-title">Sorry! Page not found</h1>
			       **/?>
			
			
			<?php /* <p>&nbsp;</p>
			<p id="error-page-text">
			<?php _e( 'Unfortunately, the page you tried accessing could not be retrieved.', 'wpex' ); ?>
			</p>
			<p>&nbsp;</p> */ ?>
			
		</div><!-- #error-page -->
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>