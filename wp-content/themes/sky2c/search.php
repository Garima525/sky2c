<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<!--Content starts-->
<article id="content">
  <div class="main">
   <?php /* <div class="sidebar mobile-sidebar">
      <!--Form starts-->
      <div class="side-quote-form">
        <?php if ( is_active_sidebar( 'sidebar-quoteform' ) ) : ?>
        	<?php dynamic_sidebar( 'sidebar-quoteform' ); ?>
    	<?php endif; ?>
      </div>
      <!--Form ends-->
    </div> */ ?>
  
  		<!--Main content area starts-->
    <div class="data">

			<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h2>
			</div><!-- .page-header -->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next post navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
			
		</div>

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
