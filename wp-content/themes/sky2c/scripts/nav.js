$(window).load(function () {
    var nav = $("#onPageNav");
    if (nav.length === 0) return;
    var navTop = nav.offset().top, 
    	cta = nav.find(".cta"), 
    	height = nav.height(),
    	threshold = 100,
     	contentTop = [];

    $(window).scroll(function () {
        if ($(window).scrollTop() > navTop) {
            nav.addClass('fixed');
            $(cta).show();
            cta.addClass('show');
            // Set top position of each section 
            if(contentTop.length === 0){
                $(nav.find("ul li a")).each(function(){
                    contentTop.push($($(this).attr('href')).offset().top - height);
                });
			}
        } else {
            nav.removeClass("fixed");
            $(cta).hide();
            cta.removeClass('show');
        }
        var winTop = $(window).scrollTop();
          $.each( contentTop, function(i,loc){
           if  (winTop > loc - threshold && winTop < loc + threshold ){
            $('#onPageNav li')
             .removeClass('active')
             .eq(i).addClass('active');
           }
          });
    });
    nav.on('click', 'ul li', function (e) {
        e.preventDefault();
        var $this = $(this),
            to = $($this.find("a").attr('href')).offset().top - height;
        $this.parent().find('li.active').removeClass('active');
        $this.toggleClass('active');
        $('html,body').animate({scrollTop:to}, 800);
    });
});

