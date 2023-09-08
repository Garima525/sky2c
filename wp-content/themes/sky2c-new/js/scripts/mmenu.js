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
    jQuery("#menuclose").toggle("", function() {});
    jQuery("#mob-site-navigation").slideToggle("", function() {});
});