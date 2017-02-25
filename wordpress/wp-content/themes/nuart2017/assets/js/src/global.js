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
        app.hovers.artistsModule();
        app.hovers.postsModule();
        google.maps.event.addDomListener(window, 'load', app.map.init);
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

            artistsModule : function() {
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

            postsModule : function() {
                $('.module__posts-item')
                    .on('mouseenter', function() {
                        $(this).children('.module__posts-item-overlay').velocity('fadeIn', { display: 'flex' });
                    })
                    .on('mouseleave', function() {
                        $(this).children('.module__posts-item-overlay').velocity('fadeOut');
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
        },

        map: {

            map: false,
            markers: [],
            bounds: false,

            init : function() {
                app.map.map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 57.154319, lng: -2.109757},
                    zoom: 8,
                    scrollwheel: false,
                });

                // this.makers = [];
                console.log('what is this? 1')
                console.log(this)
                console.log(this.map)

                app.map.setMarkers();
            },

            setMarkers : function() {
                console.log('what is this? 2')
                console.log(this)
                console.log(this.map)
                console.log(app.map.map)
                console.log(app.map.init.map)

                $('.module__map-info').each(function(index) {
                    var marker = new google.maps.Marker({
                        map: app.map.map,
                        title: $(this).data('name'),
                        position: { lat: $(this).data('lat'), lng: $(this).data('lng') }
                    })
                    app.map.markers.push(marker);
                    // console.log('looooopinz')
                    // console.log($(this).data('name'));
                    // console.log($(this).data('lat'));
                    // console.log($(this).data('lng'));

                    app.map.setZoom();
                });
            },

            setZoom : function() {
                app.map.bounds = app.map.markers.reduce(function(bounds, marker) {
                    return bounds.extend(marker.getPosition());
                }, new google.maps.LatLngBounds());

                app.map.map.setCenter(app.map.bounds.getCenter());
                app.map.map.fitBounds(app.map.bounds);
            }
        }
    }


}(jQuery, document));