<?php
/**
 * Template Name: Testimonials
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
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="innerpage_title">
<h2 class="section_title"><?php the_title(); ?></h2>
</div>
</div>
</div>
</div>
</section>
<div id="innerpages" class="inner-pages">
	<div id="primary" class="content-area clr container">
		<?php get_sidebar(); ?>
		<div id="content" class="site-content left-content" role="main">
				<?php if ( is_active_sidebar( 'all-testimonials' ) ) : ?>
					<ul><?php dynamic_sidebar( 'all-testimonials' ); ?></ul>
				<?php endif; ?>
				<?php //comments_template(); ?>
				<div class="text-center">
					<a class="btn btn-theme btn-lg" href="http://www.zillow.com/profile/0pointloan.com/Reviews/" target="_blank">View our testimonials on Zillow</a>
				</div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>