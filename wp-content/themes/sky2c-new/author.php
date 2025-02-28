<?php
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content left-content clr" role="main">
			<?php if ( have_posts() ) : the_post(); ?>
				<header class="page-header">
					<h1 class="page-header-title"><?php _e( 'Articles Written By', 'wpex' ); ?>: <?php echo get_the_author() ?></h1>
				</header><!-- #page-header -->
				<div id="post" class="post clr">  
					<?php rewind_posts(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile;	 ?>
					<?php wpex_pagination(); ?>
				</div><!--/post -->
			<?php endif; ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>