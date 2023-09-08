function doHeaderBg() {
    var home_height = 10;
    var window_top_position = jQuery(window).scrollTop();
    if (window_top_position > home_height) {
        jQuery('.home-page-header > .overlay-white').css({
            "opacity": "1"
        });
    } else {
        jQuery('.home-page-header .overlay-white').css({
            "opacity": "0.1"
        });
    }
    var inner_height = jQuery('#header-wrap').height();
    if (window_top_position > inner_height) {
        jQuery('.inner-page-header > .overlay-white').css({
            "opacity": "1"
        });
    } else {
        jQuery('.inner-page-header > .overlay-white').css({
            "opacity": "1"
        });
    };
};

function doMenuFix() {
    var headerHeight = jQuery(".topheader").height();
    var menu_h = jQuery('#header-wrap').height();
    var window_w = jQuery(window).innerWidth();
    if (jQuery(window).scrollTop() > headerHeight) {
		jQuery("#header-wrap").addClass("top-fixed-header");
		/*jQuery('#wrap').css({
			"paddingTop": menu_h
		});*/
	} else {
		jQuery("#header-wrap").removeClass("top-fixed-header");
		/*jQuery('#wrap').css({
			"paddingTop": "0px"
		});*/
	};
};

function doFoldSize() {
    var window_h = jQuery(window).innerHeight();
    var window_w = jQuery(window).innerWidth();
    var window_in_height = window_h;
    jQuery('.folditem').each(function(i) {
        var content_id = jQuery(this).attr('id');
        var content_height = jQuery('#' + content_id + ' > .folditem-content').height();
        if (content_height > window_in_height) {
            jQuery(this).css({
                "height": content_height
            });
        } else {
            jQuery(this).css({
                "height": window_in_height
            });
        };
    });
};

function doParallaxSize() {
    var window_h = jQuery(window).innerHeight();
    jQuery('.parallax-container').each(function(i) {
        var para_height = window_h * 0.75;
        jQuery(this).css({
            "height": para_height
        });
    });
};

function doParallaxWidthFix() {
    var window_pw = jQuery(window).innerWidth();
    if (window_pw > 1999) {
        jQuery('.blog-parallax').css({
            "background-size": "cover"
        });
    } else {
        jQuery('.blog-parallax').css({
            "background-size": "auto"
        });
    }
}
jQuery('.home-next-arrow').click(function() {
    var target = jQuery(this).attr('data-name');
    target = jQuery('#' + target);
    if (target.length) {
        jQuery('html,body').animate({
            scrollTop: target.offset().top
        }, 900);
        return false;
    };
});

function doInnerBannerSizing() {};

function videoResize() {
    jQuery('.video_dummy').show();
    var video_width = jQuery('.video_dummy').width();
    var video_height = Math.ceil(video_width / 1.77);
   // alert("this");
    jQuery('#mainvideo').css({
        "width": video_width,
        "height": video_height
    });
	
    jQuery('#videocontainer').css({
        "height": video_height
    });
    jQuery('.video_dummy').hide();
    jQuery('.video-container').show();
};

function doSameHeight(classname) {
    var window_w = jQuery(window).innerWidth();
    if (window_w > 767) {
        var highestBox = 0;
        jQuery('.' + classname).each(function() {
            if (jQuery(this).height() > highestBox) {
                highestBox = jQuery(this).height();
            }
        });
        jQuery('.' + classname).height(highestBox);
    } else {
        jQuery('.' + classname).css({
            "height": "auto"
        });
    };
}


jQuery(document).ready(function() {
    doFoldSize();
    doParallaxWidthFix();
    doInnerBannerSizing();
    videoResize();
    doSameHeight('services_div');
    jQuery('#client-carousel .carousel-inner li').first().addClass('active');
    doMenuFix();
});
jQuery(window).load(function() {
    jQuery('body').addClass('window-loaded');
    jQuery('.loading-indicator-wrapper').fadeOut();
    jQuery('body').removeAttr('style');
});
jQuery(window).resize(function() {
    doFoldSize();
    doInnerBannerSizing();
    doParallaxWidthFix();
    jQuery('body').removeAttr('style');
    doMenuFix();
    doSameHeight('services_div');
    videoResize();
});
jQuery(window).scroll(function() {
    doMenuFix();
});
jQuery('.faq-list h5').click(function() {
    if (jQuery(this).children().attr('class') == "fa fa-angle-right") {
        jQuery(this).children().attr('class', "fa fa-angle-down");
        jQuery(this).next().slideDown();
    } else {
        jQuery(this).children().attr('class', "fa fa-angle-right");
        jQuery(this).next().slideUp();
    }
});

jQuery('.top-scroll a').click(function(e) {
    e.preventDefault();
    var submenu_url = jQuery(this).attr('href');
    var header_height = jQuery("#header-wrap").outerHeight();
    var target = jQuery(submenu_url);
    jQuery('html,body').animate({
        scrollTop: target.offset().top - header_height
    }, 900);
});
jQuery('.show-contact').click(function(e) {
    e.preventDefault();
    jQuery("#contactmodal").modal('show');
});
// Get the height of the header
var headerHeight = jQuery("div#header-wrap").height();

jQuery('.top-scroll a').click(function(e) {
//e.preventDefault();
var anchor_url = window.location.href;
var a_hash = anchor_url.indexOf("#");
if (a_hash > -1) {
var anchor_hash = anchor_url.substring(n_hash+1);
var simple_anchor = anchor_url.substring(0, a_hash);
//console.log("simple anchor :"+simple_anchor);
}else{
var simple_anchor = anchor_url;
};
var submenu_url = jQuery(this).attr('href');
var n_hash = submenu_url.indexOf("#")
if (n_hash > -1) {
submenu_hash = submenu_url.substring(n_hash+1);
var submenu_anchor = submenu_url.substring(0, n_hash);
};
var target = jQuery('.' + submenu_hash +'-scroll');
jQuery('html,body').animate({
scrollTop: target.offset().top
}, 900);

});

jQuery('.accordianparent').prepend('<span class="accordiandown"><span class="fa fa-plus"></span></span>');

jQuery('.accordiandown').click(function(){
    if(jQuery(this).children().attr('class') == "fa fa-plus"){
        jQuery(this).children().attr('class', "fa fa-minus");
    }else{
        jQuery(this).children().attr('class', "fa fa-plus");
    }
    jQuery(this).next().next().fadeToggle("slow", function() {});
});
jQuery("#mob-menu-toggle").click(function() {
    jQuery("#menuopen").toggle("", function() {});
    jQuery("#menuclose").toggle("", function() {});
    jQuery("#mob-site-navigation").slideToggle("", function() {});
});

