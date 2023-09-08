<?php
/**
 * Template Name: Map page
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */

get_header();
$banner_class=get_post_meta( get_the_ID(), 'banner_class', true );?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div class="inner-page-banner <?php echo $banner_class; ?>" id="post-<?php the_ID(); ?>" >
<?php /*<div class="inner-parallax" data-top-bottom="background-position:50% 50%;" data-top="background-position:50% 0%;"></div>*/?>
<div class="innerpage_title">
<h1 class="section_title"><?php the_title(); ?></h1>
</div>
</div>

<div id="primary" class="content-area clr">
<div class="middle-bar"></div>
<div id="content" class="site-content" role="main">
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

<script type="text/javascript">
//Run these scripts as soon as the document is ready
jQuery(document).ready(function($){
(function($){
function render_map( $el ){
	// var
	var $markers = $el.find('.marker');
	// vars
	var args={
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		streetViewControl	: false,
		mapTypeControl		: false,
		scrollwheel: false,
		zoomControlOptions: {
		  style: google.maps.ZoomControlStyle.SMALL
		},
		styles: [
			{
				"featureType": "poi",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#a3ddd1"
					},
					{
						"saturation": "0"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#a3ddd1"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
					{
						"lightness": "100"
					},
					{
						"weight": "0.81"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#d6d6d6"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"color": "#7ecdcd"
					},
					{
						"saturation": "0"
					}
				]
			}
		]
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});
	
	//If we're under 500px wide turn off dragging
	var wi = $(window).width();
		 
	if (wi <= 500){
		map.setOptions({draggable:false});
		}

	// center map
	center_map( map );
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/
var openedInfoWindow = null;

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,		
		icon		: '<?php echo get_template_directory_uri(); ?>/images/map-marker.png'
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function(){			
			if (openedInfoWindow != null) openedInfoWindow.close();
				map.panTo(marker.getPosition());
				infowindow.open(map,marker);
				openedInfoWindow = infowindow;
				google.maps.event.addListener(infowindow, 'closeclick', function() {
					  openedInfoWindow = null;
			
				});
		});
		//Close openInfowWindow on Map Click
		google.maps.event.addListener(map, 'click', function() {
			if (openedInfoWindow != null) openedInfoWindow.close();
		  });
	}
}

function center_map(map){
	var bounds = new google.maps.LatLngBounds();	
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});
	
	if(map.markers.length == 1)
	{
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}

$(document).ready(function(){
	$('.pokemap').each(function(){
		render_map($(this));
	});
});

})(jQuery);
});
//End scripts to run when the document is ready
</script>
<?php get_footer(); ?>