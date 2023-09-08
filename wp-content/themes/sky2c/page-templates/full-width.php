<?php
/**
 * Template Name: Full Width Page
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
    <div class="data specification">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();  ?>
                <h2><?php echo the_title(); ?></h2>
				<?php 
					// Include the page content template.
					echo the_content();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						//comments_template();
					}
				endwhile;
			?>
		</div>
    <!--Main content area ends--> 
	<div class="clear"></div>
  </div>
</article>
<!--Content ends-->

<div class="clear"></div>
<?php 
//get_sidebar();
get_footer();