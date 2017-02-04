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
        console.log('something')
        app.setup.init();
        app.hovers.holdingArtistsDesktop();
    });

    $(window).resize(function() {

    });


    // App Functions
    var app = {
        setup : {
            init : function() {
                console.log('hello fdfsdworld');
                $('.bxslider').bxSlider();
            },
        },

        hovers : {
            holdingArtistsDesktop : function() {
                $('.module__repeater-item')
                    .on('mouseenter', function() {
                        console.log('ENTER')
                        $(this).children('.module__repeater-item-image').velocity({ opacity: 0 });
                    })
                    .on('mouseleave', function() {
                        console.log('LEAVE')
                        $(this).children('.module__repeater-item-image').velocity({ opacity: 1 });
                    })
            }
        }

        
    }


}(jQuery, document));