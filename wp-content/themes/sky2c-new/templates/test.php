<?php
/**
 * Template Name: Test tage
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
get_header();
$banner_class=get_post_meta( get_the_ID(), 'banner_class', true ); ?>
<div id="primary" class="content-area clr">
<div class="middle-bar"></div>
<div id="content" class="site-content innerpages" role="main">
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
<?php get_footer(); ?>