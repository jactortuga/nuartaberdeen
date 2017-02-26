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
        app.setup.partnersModules();
        app.click.mobileMenu();
        app.click.mobileLinks();
        app.hovers.global();
        app.hovers.artistsModule();
        app.hovers.postsModule();

        if($('.module__map').length) {
            google.maps.event.addDomListener(window, 'load', app.map.init);
        }
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

            menuScroll : function() {
                if($(document).scrollTop() > 80) {
                    $('#main-header').css('height', 10);
                } else {
                    $('#main-header').css('height', 80);
                }
            },

            partnersModules : function() {
                if($('.module__partners').length) {
                    $('.module__partners:first').addClass('-state-first');
                    $('.module__partners:last').addClass('-state-last');
                }
            },
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
                                $('body').css('position', 'initial');
                                $('#main-header').css('overflow', 'hidden');
                            }
                        });
                    } else {
                        $(this).addClass('is-active');
                        $('#mobile-nav').velocity('fadeIn', {
                            duration: 500,
                            display: 'flex',
                            begin: function() {
                                $('body').css('overflow', 'hidden');
                                $('body').css('position', 'fixed');
                                $('#main-header').css('overflow', 'initial');
                            }
                        });
                    }
                })
            },

            mobileLinks : function() {
                $('body').on('click', '#mobile-nav .site-header__link', function() {
                    if($('#hamburger-menu').hasClass('is-active') && $(this).attr('href').indexOf('#') > -1 && window.location.href.indexOf($(this).attr('href').split('#')[0]) > -1) {
                        $('#hamburger-menu').removeClass('is-active');
                        $('#mobile-nav').velocity('fadeOut', {
                            duration: 500,
                            begin: function() {
                                    $('body').css('overflow', 'initial');
                                    $('body').css('position', 'initial');
                                    $('#main-header').css('overflow', 'hidden');
                            }
                        });
                    }
                });
            }
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
            infoWindow: false,
            bounds: false,

            init : function() {
                app.map.map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: $('#map-info').data('lat'), lng: $('#map-info').data('lng')},
                    zoom: 14,
                    scrollwheel: false,
                    styles: $('#map-info').data('style'),
                });
                app.map.infoWindow = new google.maps.InfoWindow({ maxWidth: 400 });
                app.map.infoWindow.addListener('closeclick', function() {
                    app.map.setZoom();
                });
                app.map.setMarkers();
            },

            setMarkers : function() {
                $('.module__map-info').each(function(index) {
                    var marker = new google.maps.Marker({
                        map: app.map.map,
                        title: $(this).data('name'),
                        position: { lat: $(this).data('lat'), lng: $(this).data('lng') },
                        icon: $('#map-info').data('marker')
                    })

                    app.map.markers.push(marker);

                    var infoContent = '<div class="module__map-box">' +
                        '<h1 class="module__map-box-title">' + $(this).data('name') + '</h1>' +
                        '<div class="module__map-box-body">' +
                        '<p class="module__map-box-description">' + $(this).data('info') + '</p>' +
                        '<img src="' + $(this).data('image') + '" class="module__map-box-image"' +
                        '</div>' + '</div>';

                    marker.addListener('click', function() {
                        app.map.infoWindow.setContent(infoContent);
                        app.map.infoWindow.open(map, marker);
                        app.map.map.setCenter(marker.getPosition());
                    });
                });

                app.map.setZoom();
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