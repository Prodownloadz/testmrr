(function($) {
    "use strict";

    // Hover Dropdown
    (function($, window, delay) {
        // http://jsfiddle.net/AndreasPizsa/NzvKC/
        var theTimer = 0;
        var theElement = null;
        var theLastPosition = {
            x: 0,
            y: 0
        };
        $('[data-toggle]')
            .closest('li')
            .on('mouseenter', function(inEvent) {
                if (theElement) theElement.removeClass('open');
                window.clearTimeout(theTimer);
                theElement = $(this);

                theTimer = window.setTimeout(function() {
                    theElement.addClass('open');
                }, delay);
            })
            .on('mousemove', function(inEvent) {
                if (Math.abs(theLastPosition.x - inEvent.ScreenX) > 4 ||
                    Math.abs(theLastPosition.y - inEvent.ScreenY) > 4) {
                    theLastPosition.x = inEvent.ScreenX;
                    theLastPosition.y = inEvent.ScreenY;
                    return;
                }

                if (theElement.hasClass('open')) return;
                window.clearTimeout(theTimer);
                theTimer = window.setTimeout(function() {
                    theElement.addClass('open');
                }, delay);
            })
            .on('mouseleave', function(inEvent) {
                window.clearTimeout(theTimer);
                theElement = $(this);
                theTimer = window.setTimeout(function() {
                    theElement.removeClass('open');
                }, delay);
            });
    })(jQuery, window, 10); // 200 is the delay in milliseconds



    //Flex Carousel
    (function() {
        SyntaxHighlighter.all();
    });
    $(window).on("load", function() {
        $('#main-slider').flexslider({
            animation: "slide",
            animationLoop: false,
            directionNav: false,
            slideshow: true,
            animationLoop: true,
            slideshowSpeed: 3000,
            itemWidth: 210,
            itemMargin: 5,
            minItems: 1,
            maxItems: 1,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });

        /*$('#testimonials').flexslider({
            animation: "slide",
            animationLoop: false,
            directionNav: false,
            slideshow: true,
            animationLoop: true,
            slideshowSpeed: 3000,
            itemWidth: 210,
            itemMargin: 5,
            minItems: 1,
            maxItems: 1,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });

        $('#partners').flexslider({
            animation: "slide",
            animationLoop: false,
            directionNav: false,
            slideshow: true,
            animationLoop: true,
            slideshowSpeed: 3000,
            itemWidth: 146,
            itemMargin: 10,
            minItems: 1,
            maxItems: 7,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
        $('#post-slider').flexslider({
            animation: "slide",
            animationLoop: false,
            directionNav: false,
            slideshow: true,
            animationLoop: true,
            slideshowSpeed: 3000,
            itemWidth: 146,
            itemMargin: 0,
            minItems: 1,
            maxItems: 1,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });*/

        
    });


    //Loader

    /*$(window).on("load", function() {
        $("#loader").delay(500).fadeOut("slow");
    });*/


    //Sticky Header                
    $('.percentage').addClass('load');

    var stickyNavTop = $('.nav').offset().top;

    var stickyNav = function() {
        var scrollTop = $(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            $('#header').addClass('sticky-header');
        } else {
            $('#header').removeClass('sticky-header');
        }
    };

    stickyNav();

    $(window).on('scroll', function() {
        stickyNav();
    });

    /* magnificPopup video view */

        
    $('.popup-video').magnificPopup({
        type: 'iframe'
    });
        

    // team - active
    $('.team-active').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                }
            }
        ]
    });

    // client - active
    $('.client-active').slick({
        autoplay:true,
        autoplaySpeed:5000,
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                }
            }
        ]
    });

    //Parallax 
    function simpleParallax() {
        //This variable is storing the distance scrolled
        var scrolled = $(window).scrollTop() + 1;

        //Every element with the class "scroll" will have parallax background 
        //Change the "0.3" for adjusting scroll speed.
        $('.scroll').css('background-position', '0' + -(scrolled * 0.3) + 'px');
    }
    //Everytime we scroll, it will fire the function
    $(window).on('scroll', function() {
        simpleParallax();
    });


}(jQuery));

