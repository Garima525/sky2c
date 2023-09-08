<?php
/**
 * Template Name: Key Contacts Page
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
    <?php while ( have_posts() ) : the_post(); ?>
				
		
		<?php echo the_content(); ?>    
	
		<?php endwhile; ?>
    <!--Main content area ends-->    
    
    <div class="clear"></div>
    
  </div>
</article>
<!--Content ends-->

<div class="clear"></div>

<?php 
//get_sidebar();
get_footer();
