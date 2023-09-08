<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!--Content starts-->
<article id="content">
  <div class="main">
    <?php /*<div class="sidebar mobile-sidebar">
      <!--Form starts-->
      <div class="side-quote-form">
        <?php if ( is_active_sidebar( 'sidebar-quoteform' ) ) : ?>
        	<?php dynamic_sidebar( 'sidebar-quoteform' ); ?>
    	<?php endif; ?>
      </div>
      <!--Form ends-->
    </div> */ ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						//comments_template();
					}
				endwhile;
			?>

	<!--Sidebar starts-->
    <div class="sidebar">
      <!--Form starts-->
      <div class="side-quote-form desktop-quoteform">
	<a href="#" id="quick-quote-m"></a>
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

<div class="clear"></div>
<?php 
//get_sidebar();
get_footer();
