<?php
/**
 * Template Name: Contact Page
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
      <?php while ( have_posts() ) : the_post(); ?>
		<h2><?php echo the_title(); ?></h2>
		
		<!--Sliding content starts-->
		<?php echo the_content(); ?>    
		<!--Sliding content ends-->
		<?php endwhile; ?>
    </div>
    <!--Main content area ends-->
    
    <!--Sidebar starts-->
    <div class="sidebar">
    	<?php if ( is_active_sidebar( 'sidebar-contact' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-contact' ); ?>
		<?php endif; ?>      
    </div>
    <!--Sidebar ends-->
    <div class="clear"></div>
    
  </div>
</article>
<!--Content ends-->


<?php 

//get_sidebar();
get_footer();
