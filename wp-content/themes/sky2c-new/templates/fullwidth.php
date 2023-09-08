<?php
/**
 * Template Name: Fullwidth
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
get_header(); ?>
<?php /*<section id="inner-banner" class="parallax2">
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
</section>*/ ?>
<div id="innerpages" class="inner-pages pageid-<?php the_ID(); ?>">
	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry clr">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post -->
				<?php //comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>