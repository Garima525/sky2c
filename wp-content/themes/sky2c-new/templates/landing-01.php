<?php
/**
 * Template Name: LandingPage01
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

<?php
$deduct_browser_header = deduct_browser_header();
if($deduct_browser_header=="No"){ ?>
<div class="home-video-wrapper">
	<div id="videocontainer" class="video-wrapper">

		<img class="video_dummy" src="<?php echo get_template_directory_uri(); ?>/images/home-banner-video-bg1.png" alt="" />
		<video id="mainvideo" class="video-js vjs-default-skin" autoplay preload controls muted loop >
			<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/video.mp4" type='video/mp4' />
			<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/video.mp4" type='video/mp4' />
			<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/video.webm" type='video/webm' />
			<source src="<?php echo get_template_directory_uri(); ?>/videoplayer/video.ogv" type='video/ogg' />
		</video>

<?php /*if($deduct_browser_header=="Yes"){ ?>
<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/home-banner-video-bg1.png" alt="home video image" />
<?php }*/ ?>
		<div class="video-bg-overlay"></div>
		
		<?php /* Banner Text Content Starts Here */ ?>
		<div class="video-text video-text-landing-page landing-page-normal-form">
			<div class="container">
				<div class="row table-row-all">
					
					<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 table-cell">
					<?php if($deduct_browser_header=="No"){ ?>
						<?php dynamic_sidebar( 'home-video-text' ); ?>
					<?php } ?>
					</div>
					
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 landing-quote-form-block table-cell">
						<?php /* Quote Form Section Starts Here */ ?>
						<div class="landing-quote-form">
							<h2>Quick Quotes</h2>
							<?php /*<p>Fill out the form to have an expert give you custom quotes or <strong>Call us at <a href="tel:+18003535128">+1.800.353.5128</a></strong></p>*/ ?>
							<?php dynamic_sidebar( 'landing-quote-form' ); ?>
						</div>
						<?php /* Quote Form Section Ends Here */ ?>
					</div>
				</div>
			</div>
		</div>
		<?php /* Banner Text Content Ends Here */ ?>
		
	</div>
	
</div>
<?php } else {?>
<div class="video-text video-text-landing-page landing-page-normal-form mobile-landing-form">
			<div class="container">
				<div class="row no-margin">
					<div class="col-xs-12 landing-quote-form-block">
						<?php /* Quote Form Section Starts Here */ ?>
						<div class="landing-quote-form">
							<h2>Quick Quotes</h2>
							<?php /*<p>Fill out the form to have an expert give you custom quotes or <strong>Call us at <a href="tel:+18003535128">+1.800.353.5128</a></strong></p>*/ ?>
							<?php dynamic_sidebar( 'landing-quote-form' ); ?>
						</div>
						<?php /* Quote Form Section Ends Here */ ?>
					</div>
				</div>
			</div>
		</div>

<?php } ?>
<?php /* main slider end */ ?>

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
<?php get_footer(); ?>