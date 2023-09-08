<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header(); ?>

<div class="inner-page-banner <?php echo $banner_class; ?>" id="post-<?php the_ID(); ?>" >
	<div class="innerpage_title">
		<div class="container">
			<?php /* <h1 class="section_title">Blog</h1>
			<div class="breadcrumb"><p><?php get_breadcrumb(); ?></p></div> */ ?>
		</div>
	</div>
</div>

<div id="primary" class="content-area clr container">
	<div id="content" class="site-content left-content clr" role="main">
		<?php if ( have_posts() ) { ?>
			<div id="blog-wrap" class="clr">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			</div><!-- #post -->
			<?php wpex_pagination(); ?>
		<?php } else { ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php } ?>
	</div><!-- #content -->
	<div class="blog-post-content-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div><!-- #primary -->

<?php get_footer(); ?>