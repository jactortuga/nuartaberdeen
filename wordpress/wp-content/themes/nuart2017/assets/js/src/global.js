(function($, document) {
    // globals
    // var touchDev = Modernizr.touch;

    // var breakpoint = {
    //     'small': 0,
    //     'mediumSmall': 440,
    //     'medium': 640,
    //     'large': 1024,
    //     'xlarge': 1200,
    //     'xxlarge': 1400,
    //     'xxxlarge': 1600,
    // }

    $(document).ready(function() {
        app.setup.bxSlider();
        app.setup.subMenuFix();
        app.click.mobileMenu();
        app.hovers.global();
        app.hovers.holdingArtistsDesktop();
        app.hovers.holdingPartnersDesktop();
    });

    $(window).load(function(){
        app.animations.subheaderLogo();
    })

    $(window).resize(function() {

    });

    $(document).on('scroll', function() {
        app.setup.menuScroll();
    });


    // App Functions
    var app = {
        setup : {
            bxSlider : function() {
                if($('.module__carousel-container').length) {
                    $('.module__carousel-container').each(function(index) {
                        $(this).bxSlider({
                            adaptiveHeight: true,
                            pager: false
                        });
                    });
                }  
            },

            subMenuFix : function() {
                if($('.site-header__link--submenu').length) {
                    $('.site-header__link--submenu').each(function(index) {
                        $(this).append($(this).next('.site-header__sub-nav'));
                    });
                }
                
            },

            menuScroll: function() {
                if($(document).scrollTop() > 80) {
                    $('#main-header').css('height', 10);
                } else {
                    $('#main-header').css('height', 80);
                }
            }
        },

        click : {
            mobileMenu : function() {
                $('body').on('click', '#hamburger-menu', function() {
                    if($(this).hasClass('is-active')) {
                        $(this).removeClass('is-active');
                        $('#mobile-nav').velocity('fadeOut', {
                            duration: 500,
                            complete: function() {
                                $('body').css('overflow', 'initial');
                            }
                        });
                    } else {
                        $(this).addClass('is-active');
                        $('#mobile-nav').velocity('fadeIn', {
                            duration: 500,
                            display: 'flex',
                            begin: function() {
                                $('body').css('overflow', 'hidden');
                            }
                        });
                    }
                })
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

            holdingPartnersDesktop : function() {
                $('.module__repeater-item--partner')
                    .on('mouseenter', function() {
                        $(this).children('.module__repeater-item-image').velocity(
                            { opacity: 0 },
                            { mobileHA: false, complete: function() {
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
                            { mobileHA: false, begin: function() {
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