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
                $('a')
                    .on('mouseenter', function() {
                        $(this).addClass('--hover');
                    })
                    .on('mouseleave', function() {
                        $(this).removeClass('--hover');
                    })
            },

            holdingArtistsDesktop : function() {
                $('.module__repeater-item-artist')
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
                $('.module__repeater-item-sponsor')
                    .on('mouseenter', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 0 },
                            { complete: function() {
                                    $(this).siblings('.module__repeater-item-content').css({
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
                                        'z-index': 0
                                    })
                                }
                            }
                        );
                    })
            }
        }

        
    }


}(jQuery, document));