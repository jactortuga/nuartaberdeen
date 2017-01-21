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
        $('.bxslider').bxSlider();
        app.setup.init();

    });

    $(window).resize(function() {

    });


    // App Functions
    var app = {
        setup : {
            init : function() {
                console.log('hello world');
            },
        },
    }


}(jQuery, document));