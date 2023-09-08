<?php
/**
 * Template Name: Innerpage banner title center
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
get_header();
$banner_class=get_post_meta( get_the_ID(), 'banner_class', true );?>
<div class="inner-page-banner <?php echo $banner_class; ?>" id="post-<?php the_ID(); ?>" >
<div class="innerpage_title">
<h1 class="section_title"><?php the_title(); ?></h1>
</div>
</div>
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