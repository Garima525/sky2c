jQuery('.accordianparent').prepend('<span class="accordiandown"><span class="fa fa-plus"></span></span>');
jQuery('.accordiandown').click(function() {
    if (jQuery(this).children().attr('class') == "fa fa-plus") {
        jQuery(this).children().attr('class', "fa fa-minus");
    } else {
        jQuery(this).children().attr('class', "fa fa-plus");
    }
    jQuery(this).next().next().fadeToggle("slow", function() {});
});
jQuery("#mob-menu-toggle").click(function() {
    jQuery("#menuopen").toggle("", function() {});
    //jQuery("#menuclose").toggle("", function() {});
    jQuery("#mob-site-navigation").slideToggle("", function() {});
    jQuery()
});

jQuery(document).ready(function() {
    var menuContents = jQuery(".side-navigation");
    var menuToggle = jQuery(".mob-menu-toggle-btn");
    var bodywrapper = jQuery("body > #wrap");
    menuToggle.on("click", function(e) {
        e.preventDefault();
        var target = jQuery('body');
        jQuery('html,body').animate({
        scrollTop: target.offset().top
        }, 100);
        var self = jQuery(this);
        var target = self.attr("data-target-element");
        var elem = jQuery(target);
        var elem_width = elem.width();
        var elem_height = jQuery('#wrap').height();
        var elem_left = 0 - elem_width; 
        var isMenuContentOpen = elem.hasClass("site-navigation-active") ? 1 : 0;
        var isWrapperMoved = bodywrapper.hasClass("wrapper-moved") ? 1 : 0;
        menuToggle.removeClass("site-navigation-active");
        menuContents.removeClass("site-navigation-active");
        bodywrapper.removeClass("wrapper-moved"); /*jQuery('#wrap')*/        
        if (isMenuContentOpen) {
            self.removeClass("site-navigation-active");
            bodywrapper.removeClass("wrapper-moved");
            bodywrapper.stop().animate({
                "right": "0px"
            }, 300);
            menuContents.stop().animate({
                "right": elem_left,
            }, 300);
        } else {
            self.addClass("site-navigation-active");
            elem.addClass("site-navigation-active");
            bodywrapper.addClass("wrapper-moved");
            bodywrapper.stop().animate({
                "right": elem_width
            }, 300);
            menuContents.stop().animate({
                "right": "0px"
            }, 300);
        }
    });
    var fmenuClose = jQuery(".menu-closer-btn");
    fmenuClose.on("click", function(e) {
        e.preventDefault();
        jQuery("#menuopen").toggle("", function() {});
        var elem = menuContents;
        var elem_width = elem.width();
        var elem_height = jQuery('#wrap').height();
        var elem_left = 0 - elem_width;
        var glossary_wrap = jQuery("#glossary1");
        var bodywrapper = jQuery("body > #wrap");
        var isGlossaryFixed = glossary_wrap.hasClass("scroll-to-fixed-fixed") ? 1 : 0;
        if (isGlossaryFixed) {
            var glossary_left = jQuery('.scroll-to-fixed-fixed').position().left;
            var glossary_left1 = glossary_left + elem_width;
            var glossary_left2 = glossary_left - elem_width;
        };
        menuContents.removeClass("site-navigation-active");
        menuToggle.removeClass("site-navigation-active");
        bodywrapper.removeClass("wrapper-moved");
        bodywrapper.stop().animate({
            "right": "0px"
        }, 300);
        menuContents.stop().animate({
            "right": elem_left
        }, 300);
    });
});

/*
 *
jQuery(document).ready(function() {
    var menuContents = jQuery(".side-navigation");
    var menuToggle = jQuery(".mob-menu-toggle-btn");
    var bodywrapper = jQuery("body > #wrap");
    menuToggle.on("click", function(e) {
        e.preventDefault();
        var self = jQuery(this);
        var target = self.attr("data-target-element");
        var elem = jQuery(target);
        var elem_width = elem.width();
        var elem_height = jQuery('#wrap').height();
        var elem_left = 0 - elem_width; 
        var isMenuContentOpen = elem.hasClass("site-navigation-active") ? 1 : 0;
        var isWrapperMoved = bodywrapper.hasClass("wrapper-moved") ? 1 : 0;
        menuToggle.removeClass("site-navigation-active");
        menuContents.removeClass("site-navigation-active");
        bodywrapper.removeClass("wrapper-moved"); 
        var glossary_wrap = jQuery("#glossary1");
        var isGlossaryFixed = glossary_wrap.hasClass("scroll-to-fixed-fixed") ? 1 : 0;
        if (isGlossaryFixed) {
            var glossary_left = jQuery('.scroll-to-fixed-fixed').position().left;
            var glossary_left1 = glossary_left + elem_width;
            var glossary_left2 = glossary_left - elem_width;
        };
        if (isMenuContentOpen) {
            self.removeClass("site-navigation-active");
            bodywrapper.removeClass("wrapper-moved");
            bodywrapper.stop().animate({
                "right": "0px"
            }, 300);
            menuContents.stop().animate({
                "right": elem_left,
            }, 300);
            jQuery('.header-fixed header').css({
                "left": "0px"
            });
            if (isGlossaryFixed) {
                jQuery('.scroll-to-fixed-fixed').stop().animate({
                    "left": glossary_left2
                });
            };
        } else {
            self.addClass("site-navigation-active");
            elem.addClass("site-navigation-active");
            bodywrapper.addClass("wrapper-moved");
            bodywrapper.stop().animate({
                "right": elem_width
            }, 300);
            menuContents.stop().animate({
                "right": "0px"
            }, 300);
            jQuery('.header-fixed header').css({
                "left": elem_width
            });
            if (isGlossaryFixed) {
                jQuery('.scroll-to-fixed-fixed').stop().animate({
                    "left": glossary_left1
                });
            };
        }
    });
    var fmenuClose = jQuery(".menu-closer-btn");
    fmenuClose.on("click", function(e) {
        e.preventDefault();
        jQuery("#menuopen").toggle("", function() {});
        var elem = menuContents;
        var elem_width = elem.width();
        var elem_height = jQuery('#wrap').height();
        var elem_left = 0 - elem_width;
        var glossary_wrap = jQuery("#glossary1");
        var bodywrapper = jQuery("body > #wrap");
        var isGlossaryFixed = glossary_wrap.hasClass("scroll-to-fixed-fixed") ? 1 : 0;
        if (isGlossaryFixed) {
            var glossary_left = jQuery('.scroll-to-fixed-fixed').position().left;
            var glossary_left1 = glossary_left + elem_width;
            var glossary_left2 = glossary_left - elem_width;
        };
        menuContents.removeClass("site-navigation-active");
        menuToggle.removeClass("site-navigation-active");
        bodywrapper.removeClass("wrapper-moved");
        bodywrapper.stop().animate({
            "right": "0px"
        }, 300);
        menuContents.stop().animate({
            "right": elem_left
            //"display":"none"
        }, 300);
        menuContents.hide();
        jQuery('.header-fixed header').css({
            "left": "0px"
        });
        if (isGlossaryFixed) {
            jQuery('.scroll-to-fixed-fixed').stop().animate({
                "left": glossary_left2
            });
        };
    });
});

*/