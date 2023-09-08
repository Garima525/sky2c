<?php
/**
 * Template Name: contact-map
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
 
get_header(); ?>
<section id="inner-banner" class="parallax2 no-mp">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="innerpage_title">
<h2 class="section_title"><?php the_title(); ?></h2>
</div>
</div>
</div>
</div>
</section>
<div id="innerpages" class="inner-pages pageid-<?php the_ID(); ?>">
	<div id="primary" class="content-area clr container">
		<?php get_sidebar(); ?>
		<div id="content" class="site-content left-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="page-thumbnail">
						<img src="<?php echo wpex_get_featured_img_url(); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
					</div><!-- .page-thumbnail -->
				<?php } ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php //edit_post_link( __( 'Edit Page', 'wpex' ), '<span class="edit-link clr">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post -->
				<?php //comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
		
		
		
	</div><!-- #primary -->
</div>

<!--<section id="map">
<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3313.1593549149466!2d-117.80543237434385!3d33.85978382479909!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd11709fb13cd%3A0x4e7e8684fd3d224c!2s0Pointloan!5e0!3m2!1sen!2sus!4v1434620330737"></iframe>
</section>-->

</div> <!-- container end -->
</section>
<?php get_footer(); ?>