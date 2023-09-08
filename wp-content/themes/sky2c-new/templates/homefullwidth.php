<?php
/**
* Template Name: Home Full Width
*
* @package WordPress
* @subpackage Elegant WPExplorer Theme
* @since Elegant 1.0
*/

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry clr">
<?php the_content(); ?>


</div><!-- .entry-content -->
</article><!-- #post -->
<?php //comments_template(); ?>
<?php endwhile; ?>


<?php /* Home About Tag Section Starts Here  ?>
<section id="home-about-tag" class="home-about-tag">
<div class="container">
<div class="row">
<?php dynamic_sidebar( 'home-about-text-content' ); ?>
</div>
</div>
</section>
<?php  Home About Tag Section Ends Here */ ?>


<?php /* Home Services Section Starts Here */ ?>
<section id="home-services" class="home-services">
<div class="container">
<div class="row">
<div class="heading-section">
<h2>Our Services</h2>
</div>

<?php dynamic_sidebar( 'home-services-text-content' ); ?>
</div>
</div>
</section>
<?php /* Home Services Section Ends Here */ ?>

<?php /* Home About Section Starts Here */ ?>
<section id="home-about" class="home-about">
<div class="container">
<div class="row">

<?php dynamic_sidebar( 'home-about-us-text-content' ); ?>

</div>
</div>
</section>
<?php /* Home About Section Ends Here */ ?>

<?php /* Home Why Choose Section Starts Here */ ?>
<section id="home-why-choose-us" class="home-why-choose-us">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
<?php dynamic_sidebar( 'home-why-choose-us' ); ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="home-why-choose-img-section">
<img src="<?php echo get_template_directory_uri(); ?>/images/home_why_choose_us_image.png" class="img-responsive" alt="home why choose us image" />
</div>
</div>
</div>
</div>
</section>
<?php /* Home Why Choose Section Ends Here */ ?>

<?php /* Home Crating and Printing Services Section Starts Here */ ?>
<section id="home-crating-services" class="home-crating-services">
<div class="container">
<?php dynamic_sidebar( 'home-crating-services-content' ); ?>
</div>
</section>

<?php /* Home Crating and Printing Services Section Ends Here */ ?>


<?php /* Home Quote Form Section Starts Here */ ?>
<?php
$deduct_browser_header = deduct_browser_header();
if($deduct_browser_header=="No"){ ?>
<section id="home-quote-form-new" class="home-quote-form-new">
<div class="container">
<div class="row">
<?php  dynamic_sidebar( 'home-quote-form' ); ?>
</div>
</div>
</section>
<?php } ?>
<?php /* Home Quote Form Section Ends Here */ ?>

<?php get_footer(); ?>

