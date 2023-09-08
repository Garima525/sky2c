<?php
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!--Slider area starts-->
<section id="slider-panel">
      <div class="spin"></div>
      <div class="slider-inner">
      <!--Slider starts-->
      <article id="slides">
		<div class="slides_container">
			<div>
			    <h1><span>Sky2C</span> Freight Systems Inc.</h1>
                <h2>International Shipping, Logistics & Freight Forwarding Services</h2>
				<p>At Sky2C, we offer our clients a comprehensive suite of shipping solutions and logistics services.</p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/slide1.png">
			</div>
            <!--<div>
                <h1><span>Sky2C</span> Freight Systems Inc.</h1>
                <h2>Comprehensive Suite of Services</h2>
				<p>At Sky2C, we offer our clients a comprehensive suite of shipping solutions and services.</p>
                <img src="<?php //echo get_template_directory_uri(); ?>/images/slide2.png">
		    </div>
            <div>
                <h1><span>Sky2C</span> Freight Systems Inc.</h1>
                <h2>Comprehensive Suite of Services</h2>
				<p>At Sky2C, we offer our clients a comprehensive suite of shipping solutions and services.</p>
                <img src="<?php //echo get_template_directory_uri(); ?>/images/slide3.png">
		   </div>-->
		</div>
      </article>
      <!--Slider ends-->
      
      <!--Form starts-->
      <div class="quote-form">
        <?php if ( is_active_sidebar( 'sidebar-quoteform' ) ) : ?>
        	<?php dynamic_sidebar( 'sidebar-quoteform' ); ?>
    	<?php endif; ?>
      </div>
      <!--Form ends-->
      </div>
</section>
<!--Slider area ends-->

<div class="clear"></div>

	<!--Services area starts-->
	<article id="services">
		<?php if ( is_active_sidebar( 'sidebar-services' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-services' ); ?>
		<?php endif; ?>
	</article>
	<!--Services area ends-->

<!--Why us area starts-->
<article id="why">
  <div class="whyus">
  	<?php while ( have_posts() ) : the_post(); ?>
		<h2><?php echo the_title(); ?></h2>
		
		<!--Sliding content starts-->
		<?php echo the_content(); ?>    
		<!--Sliding content ends-->
		<?php endwhile; ?>
  </div>
</article>
<!--Why us area ends-->


	<!--What's happening starts-->
	<article id="whats">
		<?php if ( is_active_sidebar( 'sidebar-whathappen' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-whathappen' ); ?>
		<?php endif; ?>
	</article>
	<!--What's happening ends-->

<?php 
//get_sidebar();
get_footer();
