(function($, document) {
    // globals
    // var touchDev = Modernizr.touch;

    var breakpoint = {
        'small': 0,
        'mediumSmall': 440,
        'medium': 640,
        'large': 1024,
        'xlarge': 1200,
        'xxlarge': 1400,
        'xxxlarge': 1600,
    }

    $(document).ready(function() {
        console.log('hello world')
        app.setup.init();
        app.hovers.global();
        app.hovers.holdingArtistsDesktop();
        app.hovers.holdingSponsorsDesktop();
    });

    $(window).load(function(){
        app.animations.subheaderLogo();
    })

    $(window).resize(function() {

    });


    // App Functions
    var app = {
        setup : {
            init : function() {
                $('.bxslider').bxSlider();
            },
        },

        hovers : {
            global : function() {
                $('body')
                    .on('mouseenter', 'a', function() {
                        $(this).addClass('-state-hover');
                    })
                    .on('mouseleave', 'a', function() {
                        $(this).removeClass('-state-hover');
                    })
            },

            holdingArtistsDesktop : function() {
                $('.module__repeater-item--artist')
                    .on('mouseenter', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 0 },
                            { complete: function() {
                                    $(this).siblings('.module__repeater-item-content').css('z-index', 2)
                                }
                            }
                        );
                    })
                    .on('mouseleave', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 1 },
                            { begin: function() {
                                    $(this).siblings('.module__repeater-item-content').css('z-index', 0)
                                }
                            }
                        );
                    })
            },

            holdingSponsorsDesktop : function() {
                $('.module__repeater-item--sponsor')
                    .on('mouseenter', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 0 },
                            { complete: function() {
                                    $(this).siblings('.module__repeater-item-content').css({
                                        'display': 'block',
                                        'opacity': 1,
                                        'z-index': 2,
                                    })
                                }
                            }
                        );
                    })
                    .on('mouseleave', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 1 },
                            { begin: function() {
                                    $(this).siblings('.module__repeater-item-content').css({
                                        'opacity': 0,
                                        'z-index': 0,
                                        'display': 'none'
                                    })
                                }
                            }
                        );
                    })
            }
        },

        animations : {
            subheaderLogo : function() {
                if($('#subheader-logo').length) {
                    $('#subheader-logo').velocity(
                        { opacity: 1 },
                        { delay: 1000, duration: 1000, easing: 'ease-in' }
                    )
                }
            }
        }
        
    }


}(jQuery, document));