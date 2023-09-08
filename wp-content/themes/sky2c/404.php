<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!--Content starts-->
<article id="content">
  <div class="main">

		<!--Main content area starts-->
    	<div class="data">
			<div class="page-header">
				<h2 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h2>
			</div>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
			
		</div>

		<!--Sidebar starts-->
    <div class="sidebar">
      <!--Form starts-->
      <div class="side-quote-form">
        <?php if ( is_active_sidebar( 'sidebar-quoteform' ) ) : ?>
        	<?php dynamic_sidebar( 'sidebar-quoteform' ); ?>
    	<?php endif; ?>
      </div>
      <!--Form ends-->
      
	  <!--sidebar menus starts-->
	  <?php if ( is_active_sidebar( 'sidebar-sidebarmenu' ) ) : ?>
        	<?php dynamic_sidebar( 'sidebar-sidebarmenu' ); ?>
    	<?php endif; ?>
		<!--sidebar menus ends-->
      
    </div>
    <!--Sidebar ends-->
    <div class="clear"></div>
  </div>
</article>
<!--Content ends-->

<?php 
//get_sidebar();
get_footer();