<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header(); ?>
<section id="inner-banner" class="parallax2">
<div class="overlay"></div>
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
					<?php /*<footer class="entry-footer">
						<?php //edit_post_link( __( 'Edit Page', 'wpex' ), '<span class="edit-link clr">', '</span>' ); ?>
					</footer><!-- .entry-footer --> */ ?>
				</article><!-- #post -->
				<?php //comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
		
		
		
	</div><!-- #primary -->
</div>
<?php if(!is_page(204)) { ?>
<?php dynamic_sidebar( 'Inner-page-rate-quote-button' ); ?>
<?php } ?>
<?php get_footer(); ?>