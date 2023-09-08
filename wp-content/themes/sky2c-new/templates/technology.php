<?php
/**
 * Template Name: Technology
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
get_header();
$banner_class=get_post_meta( get_the_ID(), 'banner_class', true ); ?>
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
</div>
<?php the_content(); ?>
</div><!-- .entry-content -->
</article><!-- #post -->
<?php //comments_template(); ?>
<?php endwhile; ?>
</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>