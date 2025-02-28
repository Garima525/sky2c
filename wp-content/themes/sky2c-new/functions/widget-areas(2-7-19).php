<?php
/**
 * Define sidebars for use in this theme
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

// Sidebar
register_sidebar(array(
	'name'			=> __( 'Sidebar', 'wpex' ),
	'id'			=> 'sidebar',
	'description'	=> __( 'Widgets in this area are used in the sidebar region.', 'wpex' ),
	'before_widget'	=> '<div class="sidebar-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h5 class="widget-title"><span>',
	'after_title'	=> '<span></h5>',
));

// Home About Text
register_sidebar(array(
	'name'			=> __( 'Home About Text', 'wpex' ),
	'id'			=> 'home-about-text-content',
	'description'	=> __( 'Widgets in this area are used in the home about text content region.', 'wpex' ),
	'before_widget'	=> '<div class="home-about-text-content %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h5 class="widget-title"><span>',
	'after_title'	=> '<span></h5>',
));
// Home Services Text
register_sidebar(array(
	'name'			=> __( 'Home Services Text', 'wpex' ),
	'id'			=> 'home-services-text-content',
	'description'	=> __( 'Widgets in this area are used in the home services text-content.', 'wpex' ),
	'before_widget'	=> '<div class="home-services-text-content %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h5 class="widget-title"><span>',
	'after_title'	=> '<span></h5>',
));
// Home About Us 
register_sidebar(array(
	'name'			=> __( 'Home About Us Text', 'wpex' ),
	'id'			=> 'home-about-us-text-content',
	'description'	=> __( 'Widgets in this area are used in the home about us text-content.', 'wpex' ),
	'before_widget'	=> '<div class="home-about-us-text-content %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h5 class="widget-title"><span>',
	'after_title'	=> '<span></h5>',
));
// Home Crating Services
register_sidebar(array(
	'name'			=> __( 'Home Crating Services', 'wpex' ),
	'id'			=> 'home-crating-services-content',
	'description'	=> __( 'Widgets in this area are used in the home crating services content.', 'wpex' ),
	'before_widget'	=> '<div class="home-crating-services-content %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h5 class="widget-title"><span>',
	'after_title'	=> '<span></h5>',
));
// Home Quote Strip
register_sidebar(array(
	'name'			=> __( 'Get a free quote strip', 'wpex' ),
	'id'			=> 'get-a-free-quote-strip',
	'description'	=> __( 'Widgets in this area are used for free quote strip.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
// Footer Contact
register_sidebar(array(
	'name'			=> __( 'Footer Contact', 'wpex' ),
	'id'			=> 'footer-contact',
	'description'	=> __( 'Widgets in this area are used for Footer Contact.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
// Footer Copyright
register_sidebar(array(
	'name'			=> __( 'Footer Copyright', 'wpex' ),
	'id'			=> 'footer-copyright',
	'description'	=> __( 'Widgets in this area are used for Footer copyright.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));

// Footer 1
register_sidebar(array(
	'name'			=> __( 'Footer 1', 'wpex' ),
	'id'			=> 'footer-one',
	'description'	=> __( 'Widgets in this area are used in the first footer region.', 'wpex' ),
	'before_widget'	=> '<div class="footer-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h6 class="widget-title"><span>',
	'after_title'	=> '</span></h6>',
));
// Footer 2
register_sidebar(array(
	'name'			=> __( 'Footer 2', 'wpex' ),
	'id'			=> 'footer-two',
	'description'	=> __( 'Widgets in this area are used in the second footer region.', 'wpex' ),
	'before_widget'	=> '<div class="footer-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h6 class="widget-title"><span>',
	'after_title'	=> '</span></h6>',
));
// Footer 3
register_sidebar(array(
	'name'			=> __( 'Footer 3', 'wpex' ),
	'id'			=> 'footer-three',
	'description'	=> __( 'Widgets in this area are used in the third footer region.', 'wpex' ),
	'before_widget'	=> '<div class="footer-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h6 class="widget-title"><span>',
	'after_title'	=> '</span></h6>',
));
register_sidebar(array(
	'name'			=> __( 'Top contact', 'wpex' ),
	'id'			=> 'top-contacts',
	'description'	=> __( 'Widgets in this area are used for header top contacts.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Social links', 'wpex' ),
	'id'			=> 'social-links',
	'description'	=> __( 'Widgets in this area are used for social links.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));

register_sidebar(array(
	'name'			=> __( 'Home quote form', 'wpex' ),
	'id'			=> 'home-quote-form',
	'description'	=> __( 'Widgets in this area are used for home quote form.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Home Services', 'wpex' ),
	'id'			=> 'home-services',
	'description'	=> __( 'Widgets in this area are used for home our services.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Home About Us', 'wpex' ),
	'id'			=> 'home-about-us',
	'description'	=> __( 'Widgets in this area are used for home about us.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Home Why Choose Us', 'wpex' ),
	'id'			=> 'home-why-choose-us',
	'description'	=> __( 'Widgets in this area are used for Home why choose us.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Home Packaging Services', 'wpex' ),
	'id'			=> 'home-packaging-services',
	'description'	=> __( 'Widgets in this area are used for home packaging services.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Home testimonials', 'wpex' ),
	'id'			=> 'home-testimonials',
	'description'	=> __( 'Widgets in this area are used for home testimonials.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'All testimonials', 'wpex' ),
	'id'			=> 'all-testimonials',
	'description'	=> __( 'Widgets in this area are used for all testimonials.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Contact us form', 'wpex' ),
	'id'			=> 'contact-us-form',
	'description'	=> __( 'Widgets in this area are used for all testimonials.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Sidebar Images', 'wpex' ),
	'id'			=> 'sidebar-images',
	'description'	=> __( 'Widgets in this area are used in innerpages sidebar images.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));
register_sidebar(array(
	'name'			=> __( 'Landing Page quote form', 'wpex' ),
	'id'			=> 'landing-quote-form',
	'description'	=> __( 'Widgets in this area are used for landing page quote form.', 'wpex' ),
	'before_widget'	=> '',
	'after_widget'	=> '',
));