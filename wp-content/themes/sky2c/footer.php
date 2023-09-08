<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!--Testimonials starts-->
<article id="testmonial-block">
	<?php if ( is_active_sidebar('sidebar-ctestimonials')) : ?>
		<?php dynamic_sidebar('sidebar-ctestimonials' ); ?>
	<?php endif; ?>
</article>
<!--Testimonials ends-->
<?php if(is_home() || is_front_page()) {?>

<!--Map starts-->
<?php /*
<article id="map">


<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<div style="width:100%;margin-left:auto;margin-right:auto;"><div class="wpgmappity_container" id="wpgmappitymap"></div></div>
<script type="text/javascript">
(function(){
function wpgmappity_maps_loaded() {
var latlng = new google.maps.LatLng(37.5042267,-121.96437450000002);
var options = {
 center : latlng,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 zoomControl : true,
 zoomControlOptions :
 {
 style: google.maps.ZoomControlStyle.SMALL,
 position: google.maps.ControlPosition.TOP_LEFT
 },
 mapTypeControl : true,
 mapTypeControlOptions :
 {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
 position: google.maps.ControlPosition.TOP_RIGHT
 },
 scaleControl : false,
 scrollwheel: false,
 streetViewControl : true,
 streetViewControlOptions :
 {
 position: google.maps.ControlPosition.TOP_LEFT
 },
 panControl : false, zoom : 13
};
var wpgmappitymap = new google.maps.Map(document.getElementById('wpgmappitymap'), options);
var point0 = new google.maps.LatLng(37.5042267,-121.96437450000002);
var marker0= new google.maps.Marker({
 position : point0,
 map : wpgmappitymap
 });
google.maps.event.addListener(marker0,'click',
 function() {
 var infowindow = new google.maps.InfoWindow(
 {content: 'Sky2c Freight Systems, Inc. 4221 Business Center Dr, Suite 5 & 6, Fremont, CA 94538'});
 infowindow.open(wpgmappitymap,marker0);
 });
}
window.onload = function() {
 wpgmappity_maps_loaded();
};
})()
</script>



</article>
*/ ?>
<section class="gmap">
<div class="embed-responsive embed-responsive-21by9 res-gmap">
  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.082282605289!2d-121.95596158519874!3d37.50597743535264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fc71b9034e09b%3A0x5e0352d2950bd32f!2sSky+2+C+Inc!5e0!3m2!1sen!2sin!4v1549522337355" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</section>
<style>
.res-gmap { height: 300px; }
</style>

<!--Map ends-->
<?php } ?>

<!--Footer starts-->
<footer>
  <div class="footer-inner">
    
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
      <li>
        <ol>
			<?php if ( is_active_sidebar( 'sidebar-footeraddress' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-footeraddress' ); ?>
			<?php endif; ?>
          <!--<li><h2>Contacts</h2></li>
          <li>
          <strong>Sky2c Freight Systems, Inc.</strong><br>
          4221 Business Center Dr<br>
          Suite 5 & 6<br>
          Fremont, CA 94538<br><br>
          Tel: 510-743-3300<br>
          Fax: 510-743-3301<br>
          Email: <a href="info@sky2c.com" class="mail">info@sky2c.com</a>
          </li>-->
          <li><br>
		  	<?php if ( is_active_sidebar( 'sidebar-footersharingicons' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-footersharingicons' ); ?>
			<?php endif; ?>
          </li>
        </ol>
      </li>
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
    <div class="clear"></div>    
  </div>
  
  <div class="copyright">
    <?php if ( is_active_sidebar( 'sidebar-copyright' ) ) : ?>
    	<?php dynamic_sidebar( 'sidebar-copyright' ); ?>
    <?php endif; ?>
  </div>
</footer>
<!--Footer ends-->

	<?php wp_footer(); ?>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom_validation.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1014275909;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>

<?php if(get_the_ID()=="47"){ ?>
<script>
jQuery("#SurveyDate,#Planningtoshipon,#MustArriveDestinationonorBefore").datepicker({
	minDate : 0,
	changeMonth: true,
	beforeShow: function (input, inst){
		setTimeout(function(){
			calluidatepicker(input,inst);
		},0);
	}
});
function calluidatepicker(input,inst){
	var tr_dob = input.id;	
	var position = $("#"+tr_dob).offset().top-40;
	inst.dpDiv.css({
		top: position		
	});
}


jQuery('#AdditionalInformation').keypress(function(e){    
	 var regex = new RegExp("^[a-zA-Z0-9 .]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)){		
        return true;
    }
	var keycode = e.which;
	if(keycode==8 || keycode==44 || keycode==0){
		return true;
	}	
    e.preventDefault();
    return false;
});

jQuery('#AdditionalInformation').bind("cut copy paste",function(e) {
      e.preventDefault();
});


jQuery(".ui-datepicker-next").show();

jQuery("#hname").focusout(function(){
	var hname = jQuery("#hname").val();		
	if(hname==""){
		setTimeout(function(){			
			jQuery("#nameerror").html("Name is required");
		},900);
	}else{
		if(hname!=""){					
			jQuery("#nameerror").html("");
		}
	}
});

jQuery('#hname').keypress(function (e){
	var keywhich = e.which;
	if(keywhich==8 || keywhich==37 || keywhich==39 || keywhich==46 || keywhich==0){
	}else{
		var regex = new RegExp("^[a-zA-Z- ]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)){
			return true;
		}
		e.preventDefault();
		return false;
	}
});


jQuery("#hFromCity").focusout(function(){
	var hFromCity = jQuery("#hFromCity").val();		
	if(hFromCity==""){
		setTimeout(function(){			
			jQuery("#frmcityerror").html("From City is required");
		},900);
	}else{							
		jQuery("#frmcityerror").html("");		
	}
});

jQuery("#hToCity").focusout(function(){
	var hToCity = jQuery("#hToCity").val();		
	if(hToCity==""){
		setTimeout(function(){			
			jQuery("#tocityerror").html("To City is required");
		},900);
	}else{
		jQuery("#tocityerror").html("");		
	}
});


jQuery("#hemail").focusout(function(){	
	var email = jQuery("#hemail").val();	
	if(email==""){
		setTimeout(function(){			
			jQuery("#emailerror").html("Email Address is required");		  
		},900);
	}else{
		if(email!=""){
			if(!isValidEmailAddress(email)){
				jQuery("#emailerror").html("Please enter valid email address");
				signupfocus();
			}else{				
				jQuery("#emailerror").html("");				
			}
		}
	}
});


function isValidEmailAddress(email){
  if(email.length >= 75){
	  return false;
  }else{
	  if(email.indexOf('.') !== -1)
	  {	  
		var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return regex.test(email);
	  }else{
		if(email.indexOf('@') !== -1)
		{			
			var countofatsymbol = (email.match(/@/g) || []).length;
			if(countofatsymbol==2){ return false; }			
			
			return true;
		}else{
			return false;
		}
	  }
  }  
}


function check_householdForm(){
	var hname = jQuery("#hname").val();
	var email = jQuery("#hemail").val();
	var frmcity = jQuery("#hFromCity").val();
	var tocity = jQuery("#hToCity").val();
	
	err = 0;	
	if(hname==""){
		jQuery("#nameerror").html("Name is required");
		jQuery("#hname").focus();
		err = 1;
	}
	
	if(email==""){
		jQuery("#emailerror").html("Email Address is required");		
		err = 1;
	}else{
		if(email!=""){
			if(!isValidEmailAddress(email)){
				jQuery("#emailerror").html("Please enter valid email address");
				err = 1;
			}
		}
	}
	
	if(frmcity==""){
		jQuery("#frmcityerror").html("From City is required");		
		err = 1;
	}
	
	if(tocity==""){
		jQuery("#tocityerror").html("To City is required");
		err = 1;
	}	
		
	if(err==1){
		return false;		
	}
	
	var response = grecaptcha.getResponse(); 
    if(response.length == 0){
        jQuery("#captachalert").html("Please fill the captcha");
        return false;
    }else{
        jQuery("#captachalert").html("");
    }
}
</script>
<?php } ?>

<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1014275909/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>