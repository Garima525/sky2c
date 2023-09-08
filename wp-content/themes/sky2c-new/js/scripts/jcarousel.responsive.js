(function($) {
    $(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 769) {
                    width = width / 2;
                } else if (width >= 350) {
                    width = width / 1;
                }
                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
                
            })
            .jcarousel({
                wrap: 'circular',
                animation: {
                    duration: 400,
                    easing:   'linear',
                    complete: function() {
                    }
                },
                swipe:true
            })
            .jcarouselAutoscroll({
                interval: 3000,
                target: '+=1',
                autostart: false
            });
            
        

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
})(jQuery);

/*
(function($) {
    $(function() {
        var jcarouselt = $('.jcarousel-testimonials');

        jcarouselt
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 768) {
                    width = width / 1;
                } else if (width >= 350) {
                    width = width / 1;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
                
            })
            .jcarousel({
                wrap: 'circular',
                animation: {
                    duration: 400,
                    easing:   'linear',
                    complete: function() {
                    }
                },
                swipe:true
            })
            .jcarouselAutoscroll({
                interval: 3000,
                target: '+=1',
                autostart: true
            });
            
        

        $('.jcarousel-control-prev-t')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next-t')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination-t')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
})(jQuery);
*/

