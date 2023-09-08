<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header(); ?>
<?php /*<div class="blog-parallax"data-top-bottom="background-position:50% 100px;"
data-top="background-position:50% 0%;">
<div class="blog-parallax-wrapper">
<div class="blog-parallax-container">
<div class="inner-parallax" data-top-bottom="background-position:50% 50%;"
data-top="background-position:50% 0%;"></div>
</div>
</div>
</div>

<div class="blog-title-wrapper">
<div class="innerpage_title">
<h1 class="section_title">Blog</h1>
</div>
</div>
<div class="blog-category-wrapper">
<div class="container">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
<?php dynamic_sidebar( 'blog-top-categories' ); ?>
</div>
</div>
</div>*/ ?>
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
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			</div>
		</div><!-- #clr -->
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