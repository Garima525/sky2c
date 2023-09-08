<?php

/**

 * Template Name: Innerpages fullwidth

 *

 * @package WordPress

 * @subpackage Elegant WPExplorer Theme

 * @since Elegant 1.0

 */

get_header();

$banner_class=get_post_meta( get_the_ID(), 'banner_class', true ); ?>

<div class="inner-page-banner <?php echo $banner_class; ?>" id="post-<?php the_ID(); ?>" >
	<div class="innerpage_title">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
					<?php /* <h1 class="section_title"><?php the_title(); ?></h1> */ ?>
				</div>
			</div>

		<?php /*  <div class="breadcrumb"><p><?php get_breadcrumb(); ?></p></div> */ ?>
		</div>
	</div>
</div>

<div id="primary" class="content-area innerpages-content clr">
	<div id="content" class="site-content innerpages" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry clr">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
								<h1 class="innerpages-content-title"><?php the_title(); ?></h1>
							</div>
						</div>
						
						<div class="row ">
							<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">
								<div class="innerpages-content-image-block">
									<?php dynamic_sidebar( 'sidebar-images' ); ?>
								</div>
							</div>

							<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
								<div class="innerpages-content-block">
									<?php the_content(); ?>
								</div>
							</div>

						</div>
						
						

					</div>
				</div><!-- .entry-content -->
			</article><!-- #post -->
		<?php //comments_template(); ?>
	<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>