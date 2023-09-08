<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
?>

</div><!-- #main-content -->


<?php /* Home Testimonial Section Starts Here */ ?>
<section id="home-testimonials-section" class="home-testimonials-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="heading-section">
					<h2>Clients Experience</h2>
				</div>
				<h5>Find reasons to choose us as your freight partner</h5>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="home-testi-quote-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-testi-quote-icon.png" class="" alt="testimonial quote icon" />
				</div>
			</div>
			
			<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
				<div id="home-testimonials-slider" class="carousel slide" data-ride="carousel"> 	
					<div class="carousel-inner">  						
						<div class="item active">			
							<h3>Dear Lisa<br/>I want to thank you for your interest in working with my husband Rudolph and myself (Sandra) from start to finish. I was able to pick up my things from the warf all perfectly in one piece. A great big thank you from the heart. I know that I can recommend your company any day, any time, so thank you again.</h3>
							<p>- Sandra Wright</p>
						</div> 						
						<div class="item">				
							<h3>Thank you for the great service for getting my shipment from San Jose to Delhi, India. I did try one company prior to contacting you and after waiting for several weeks gave up on them. But you guys did a wonderful & fastest job.Thanks..</h3>
							<p>- Ryan B</p>
						</div> 							
						<div class="item">				
							<h3>We have done business with Sky2c Freight Systems for more than 8 years. We use sky2c freight Systems for many Shipping services. They are personable, accurate, on time and offer very fair price."We would highly recommend doing business with Sky2c Freight Systems."</h3>
							<p>- Steven Clark</p>
						</div> 							
						<div class="item">				
							<h3>We are dealing with Sky2c Freight Systems Inc since the first day they opened. As a freight delivery company, there is none other in San Francisco Bay Area that compare – on rates or on customer service. The staff is always eager to help out – day or night. I look forward to a continued long term relationship with them.</h3>
							<p>- M Thomas</p>
						</div>
						<div class="item">				
							<h3>Have been doing business with them for about 4+ years now, really great service, quick response time, very helpful team</h3>
							<p>- Arsal Azeem</p>
						</div>
						<div class="item">				
							<h3>They are very helpful and follow up from beginning to end of the shipping process. Always answer the phone quickly and are always helpful by email. I recomend them to many people</h3>
							<p>- Leda Adwan</p>
						</div>
						<div class="item">				
							<h3>I consider myself extremely fortunate to deal with Sky 2 C Inc since I was asked to provide notary services. I must add that both Parvathi and Anil are such wonderful and humble people to deal with.I strongly recommend them, should you wish to carry out business dealings in the future. Who says that good people are extinct? Sky 2 C - Anil Kumar Tandon 2 C Great Ho!</h3>
							<p>- Syed Ali</p>
						</div>
							
						
					</div> 					
					
					<div class="home-testimonials-slider-controls">
						<a class="left carousel-control" href="#home-testimonials-slider" data-slide="prev">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</a>
						<a class="right carousel-control" href="#home-testimonials-slider" data-slide="next">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a> 
					</div>
					
					<?php /*
					<ol class="carousel-indicators">
						<li data-target="#home-testimonials-slider" data-slide-to="0" class="active"></li>
						<li data-target="#home-testimonials-slider" data-slide-to="1"></li>
						<li data-target="#home-testimonials-slider" data-slide-to="2"></li>
						<li data-target="#home-testimonials-slider" data-slide-to="4"></li>
					</ol>
					*/ ?>
				</div> 
			</div>
		</div>
	</div>
</section>
<?php /* Home Testimonial Section Ends Here */ ?>

<?php if( is_front_page() ) {  ?>

<?php /* Home Blog Section Starts Here */ ?>
<section id="home-blog-section" class="home-blog-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="heading-section">
					<h2>Our Blog</h2>
				</div>
				<h5>Read the Latest News</h5>
			</div>
			
			<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => 3 ,'order' => 'DESC');
			//$perm = get_permalink($post_id);
			$loop = new WP_Query( $args );
			if($loop->have_posts()) {
			$n = 0;
			$total_posts = $wp_query->found_posts; ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="home-blog-block">
					<div class="home-blog-image">
						<?php the_post_thumbnail( 'large','style=max-width:100%;height:auto;'); ?>
					</div>
					<div class="home-blog-content">
						<?php the_category(); ?>
						<h2><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
						<div class="btn-section">
							<a href="<?php echo get_permalink(); ?>" class="btn btn-default btn-blue">View Post</a>
						</div>
					</div>
				</div>
			</div>
			<?php $n = $n+1; ?>
			<?php endwhile;  wp_reset_query();  ?>
			<?php } ?>
			
			
			
		</div>
	</div>
</section>
<?php /* Home Blog Section Ends Here */ ?>


<?php } ?>



<?php /* Home Quote Strip Section Starts Here */ ?>
<section id="home-quote-section" class="home-quote-section">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'get-a-free-quote-strip' ); ?>
		</div>
	</div>
</section>
<?php /* Home Quote Strip Section Ends Here */ ?>


<section id="footer">
	<footer>
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="foo-logo">
					<a href="<?php bloginfo('url'); ?>/" title="Sky2c" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png" alt="Sky2c logo" /></a>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<ul>
						<li>
						<?php
							$defaultsf1 = array(
								'theme_location'  => '',
								'menu'            => 'Footer Menu1',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ol id="%1$s" class="%2$s"><li><h2>Our Services</h2></li>%3$s</ol>',
								'depth'           => 0,
								'walker'          => ''
							);
							wp_nav_menu( $defaultsf1 );
						?>
					  </li>
				  </ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<ul>
						<li>
						<?php
							$defaultsf2 = array(
								'theme_location'  => '',
								'menu'            => 'Footer Menu2',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ol id="%1$s" class="%2$s"><li><h2>Useful Links</h2></li>%3$s</ol>',
								'depth'           => 0,
								'walker'          => ''
							);
							wp_nav_menu( $defaultsf2 );
						?>
					  </li>
				  </ul>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<ul>
						<li class="last">
						<?php
							$defaultsf2 = array(
								'theme_location'  => '',
								'menu'            => 'Footer Menu4',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ol id="%1$s" class="%2$s"><li><h2>Customer Service</h2></li>%3$s</ol>',
								'depth'           => 0,
								'walker'          => ''
							);
							wp_nav_menu( $defaultsf2 );
						?>
					  </li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php dynamic_sidebar( 'footer-contact' ); ?>
				</div>
				
				<div class="clear-all"></div>
			</div>
		</div>
	</footer>
</section>

<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'footer-copyright' ); ?>
		</div>
	</div>
</div>


<?php if((is_page(1066)) || (is_page(1074)) || (is_page(1080)) || (is_page(1145)) || (is_page(1147))){?>
<script>
jQuery(document).ready(function(){
	var url = "countries_list.php";
	jQuery.getJSON(url, function (data) {
	    console.log(data);
		jQuery('#consignee_country').append('<option value="">Select Country</option>');
		jQuery('#receiver_country').append('<option value="">Select Country</option>');
		jQuery.each(data, function (index, value){ 			
			jQuery('#consignee_country').append('<option value="' +value.name + '">' + value.name + '</option>');
			jQuery('#receiver_country').append('<option value="' +value.name + '">' + value.name + '</option>');
		});
	});	
	var url1 = "states_list.php";
	jQuery.getJSON(url1, function (data1){
	    console.log(data1);
		jQuery('#FromState').append('<option value="">Select State</option>');
		jQuery('#ToState').append('<option value="">Select State</option>');
		jQuery('#State').append('<option value="">Select State</option>');
		jQuery('#container_loading_state').append('<option value="">Select State</option>');
		jQuery.each(data1, function (index1, value1){
			jQuery('#FromState').append('<option value="' +value1.name + '">' + value1.name + '</option>');
			jQuery('#ToState').append('<option value="' +value1.name + '">' + value1.name + '</option>');
			jQuery('#State').append('<option value="' +value1.name + '">' + value1.name + '</option>');
			jQuery('#container_loading_state').append('<option value="' +value1.name + '">' + value1.name + '</option>');
		});
	});	
});
</script>	
<?php } ?>
<?php wp_footer(); ?>
</div> <!--#wrap close -->
<?php /*<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pretty-checkbox.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/customize.css?v=48" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mmenu.css?v=2" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/customize-responsive.css?v=22" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/customize1.css?a=114" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/customize-responsive1.css?a=30" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/css-menu.css?v=20" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/combined_customization.css?" />*/ ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" defer></script>
<?php /*<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.nanoscroller.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts/loadtoanimate.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts/scrolltofade.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/smk-accordion.js" defer></script>*/ ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/scripts/customization.js?a=12"></script>
<script src="<?php echo site_url(); ?>/js/validation.js?ver=2.0"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/videoplayer/video-js.css?v=2" />
<?php
$deduct_browser_header = deduct_browser_header();
if($deduct_browser_header=="No"){ ?>
<?php if ( (is_front_page()) ||  ( is_page( 1275 ) ) || ( is_page( 1278 ) )) {?>
<script src="<?php echo get_template_directory_uri(); ?>/videoplayer/video.js"></script>
<script>
videojs.options.flash.swf = "<?php echo get_template_directory_uri(); ?>/videoplayer/video-js.swf"
videojs("mainvideo", {}, function(){
    this.play();
});
</script>
<?php } ?>
<?php } ?>


<?php if((is_front_page())){ }else{?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.maskedinput.min.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-datepicker.min.js" defer></script>
<?php } ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
jQuery(document).ready(function(){
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();
});
jQuery(document).ready(function($){
	// on focus
	$(".innercontent-form input").focus(function() {
		$(this).parent().siblings('label').addClass('has-value');
	})
	
	// blur input fields on unfocus + if has no value
	.blur(function() {
		var text_val = $(this).val();
		if(text_val === "") {
			$(this).parent().siblings('label').removeClass('has-value');
		}
	});
	
});
</script>
<script>
jQuery(document).ready(function($){
	// on focus
	$(".wpcf7-form input").focus(function() {
			$(this).parent().siblings('label').addClass('has-value');
	})
	
	// blur input fields on unfocus + if has no value
	.blur(function() {
		var text_val = $(this).val();
		if(text_val === "") {
			$(this).parent().siblings('label').removeClass('has-value');
		}
	});
	
	$(".wpcf7-form textarea").focus(function() {
			$(this).parent().siblings('label').addClass('has-value');
	})
	// blur input fields on unfocus + if has no value
	.blur(function() {
		var text_val = $(this).val();
		if(text_val === "") {
			$(this).parent().siblings('label').removeClass('has-value');
		}
	});
});
</script>

<script>
jQuery(document).ready(function($){
	$(function () {
	  $("#datepicker").datepicker({ 
			startDate: '-0m',
			autoclose: true, 
			todayHighlight: true
	  }).datepicker('update', new Date());
	});
	$(function () {
	  $("#SurveyDate").datepicker({ 
			autoclose: true, 
			todayHighlight: true
	  }).datepicker('update', new Date());
	});
	$(function () {
	  $("#datetimepicker_mask").datepicker({ 
			startDate: '-0m',
			autoclose: true, 
			todayHighlight: true
	  }).datepicker('update', new Date());
	});
	$(function () {
	  $("#datetimepicker_mask21").datepicker({ 
			startDate: '-0m',
			autoclose: true, 
			todayHighlight: true
	  }).datepicker('update', new Date());
	});
});

</script>

<?php /*  Script For Landing Page  */ ?>
<script>
jQuery(document).ready(function($){
	jQuery('#request-tab').click(function(){
		jQuery('#request-quote').toggle('slow');
	});
	jQuery('#antispamurl').hide();
	//jQuery('#phone').mask('(999) 999-9999');
	//jQuery('#CellPhone').mask('(999) 999-9999');
	
	/*jQuery('#contact_home_no').mask('(999)999-9999');
	jQuery('#contact_cell').mask('(999)999-9999');
	jQuery('#contact_work_no').mask('(999)999-9999');*/	
});
</script>
<script>
jQuery(function(){ 
	var token = '<?php echo $_SESSION['token']?>'; 
	//jQuery("#csrtoken").val(token);
	document.getElementById("csrtoken").value = token;
});
</script>
</body>
</html>