<?php

/**

 * Template Name: Get Quote

 *

 * @package WordPress

 * @subpackage Elegant WPExplorer Theme

 * @since Elegant 1.0

 */

get_header();

?>
<div id="primary" class="content-area innerpages-content clr">
	<div id="content" class="site-content innerpages" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry clr">
					<div class="container">
					
						<div class="row ">
							<?php the_content(); ?>
						</div>
						
						

					</div>
				</div><!-- .entry-content -->
			</article><!-- #post -->
		<?php //comments_template(); ?>
	<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php /* Home Quote Form Section Starts Here */ ?>
<section id="home-quote-form-new" class="home-quote-form-new">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'home-quote-form' ); ?>
		</div>
	</div>
</section>
<?php /* Home Quote Form Section Ends Here */ ?>



<?php get_footer(); ?>