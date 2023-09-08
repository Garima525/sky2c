<?php
/** * The template for displaying Search Results pages. * * @package WordPress * @subpackage Elegant WPExplorer Theme * @since Elegant 1.0 */
get_header();
$banner_class=get_post_meta( get_the_ID(), 'banner_class', true );
?>
<div class="inner-page-banner <?php echo $banner_class; ?>" id="search-pg">
<div class="innerpage_title">
<div class="container">
<div class="row">
<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12"> </div>
</div>
</div>
</div>
</div>
<div id="primary" class="content-area search-results-page clr">
<div class="container">
<div class="row">
<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
<h1 class="innerpages-content-title"><?php printf( __( 'Search Results for: %s', 'wpex' ), get_search_query() ); ?></h1> </div>
</div>
<div class="row">
<div id="content" class="site-content search-results-page-block clr" role="main">
<?php if ( have_posts() ) { ?>
<div id="blog-wrap" class="clr">
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'search' ); ?>
<?php endwhile; ?>
</div>
<!-- #clr -->
<?php wpex_pagination(); ?>
<?php } else { ?>
<?php get_template_part( 'content', 'none' ); ?>
<?php } ?>
</div>
<!-- #content -->
</div>
<!-- #primary -->
</div>
<!-- #primary -->
</div>
<!-- #primary -->

<?php get_footer(); ?>