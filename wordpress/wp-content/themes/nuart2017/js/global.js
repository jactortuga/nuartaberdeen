// Go To Line 265 To Change Slider Speed, Just Add Number And Save

$(window).on('beforeunload', function(){
  $(window).scrollTop(0);
});

function introAnimation(){
  $(".intro").css("background-color", "#FFFFFF");
  $(".intro-studio").css("display", "none");
  $(".intro-bergini").css("display", "block");
}

function outroAnimation(){
  $(".intro").css("display", "none");
  $("header").css("display", "block");
  $("main").css("display", "block");
}

function scrollToFooter() {
  $('html, body').animate({
      scrollTop: $("#custom-footer").offset().top
  }, 500);
  $('.menu-arrow').addClass('open-menu');
}

var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if(st <= lastScrollTop) {
       $('.menu-arrow').removeClass('open-menu');
   }
   lastScrollTop = st;
});

// function openMenu() {
//   $('.menu-arrow').removeClass('close-menu');
//   $('.menu-arrow').addClass('open-menu');
//   $('.home-link').removeClass('close-menu');
//   $('.home-link').addClass('open-menu');
//   $('.left-navigation').removeClass('close-menu-nav');
//   $('.left-navigation').addClass('open-menu-nav');
//   $('.sidebar').removeClass('close-menu');
//   $('.sidebar').addClass('open-menu');
// }

// function closeMenu() {
//   $('.sidebar').show();
//   $('.menu-arrow').removeClass('open-menu');
//   $('.menu-arrow').addClass('close-menu');
//   $('.home-link').removeClass('open-menu');
//   $('.home-link').addClass('close-menu');
//   $('.left-navigation').removeClass('open-menu-nav');
//   $('.left-navigation').addClass('close-menu-nav');
//   $('.sidebar').removeClass('open-menu');
//   $('.sidebar').addClass('close-menu');
// }

// function openMenuMobile() {
//   $('.menu-arrow').removeClass('close-menu');
//   $('.menu-arrow').addClass('open-menu');
//   $('body').removeClass('close-menu-main');
//   $('body').addClass('open-menu-main');
//   $('.home-link').removeClass('close-menu');
//   $('.home-link').addClass('open-menu');
//   $('.left-navigation').removeClass('close-menu-nav');
//   $('.left-navigation').addClass('open-menu-nav');
//   $('.sidebar').removeClass('close-menu');
//   $('.sidebar').addClass('open-menu');
// }

// function closeMenuMobile() {
//   $('.sidebar').show();
//   $('.menu-arrow').removeClass('open-menu');
//   $('.menu-arrow').addClass('close-menu');
//   $('body').removeClass('open-menu-main');
//   $('body').addClass('close-menu-main');
//   $('.home-link').removeClass('open-menu');
//   $('.home-link').addClass('close-menu');
//   $('.left-navigation').removeClass('open-menu-nav');
//   $('.left-navigation').addClass('close-menu-nav');
//   $('.sidebar').removeClass('open-menu');
//   $('.sidebar').addClass('close-menu');
// }




$(function() {

  // ARCHIVE PAGE

  // external JS: masonry.pkgd.js

  var $grid = $('.grid').masonry({
    columnWidth: '.grid-sizer',
    gutter: '.gutter-sizer',
    itemSelector: '.grid-item',
    percentPosition: true,
    transitionDuration: '0.5s',
  });

  // bind event
  $grid.masonry( 'on', 'layoutComplete', function() {
    console.log('layout is complete');
    $('.grid').addClass('positioned');
  });

  function startMasonry() {
    $grid.masonry()
  }

  $grid.on('click', '.grid-item', function(event) {
    if($(this).hasClass('grid-item--full')) {
      if($(event.target).is('.close-grid-full')) {
        $(this).removeClass('grid-item--full');
        $grid.masonry();
      } else {
        return false
      }
    } else {
      $(this).toggleClass('grid-item--full');
      $grid.masonry();
    }
  });





  initialize();

  function initialize() {
    checkForHash();
    checkForMobile();
    getImageInfo();
  }

  var currentHash = "#initial_hash"

  if($('.body').hasClass('page-template-home-page')) {
    $(document).scroll(function () {
      $('.anchor').each(function () {
        var top = window.pageYOffset;
        // console.log(top)
        // var bottom = $(this).attr('href').height();
        // console.log($(this).attr('id'))
        var blala = $('section.project').first()
        var bottom = blala[0].offsetHeight
        // console.log(bottom)
        var distance = top - $(this).offset().top;
        console.log($(this).offset().top)
        // var distance = top - bottom;
        console.log(distance)
        var hash = $(this).attr('id');
                // 30 is an arbitrary padding choice, 
                // if you want a precise check then use distance===0
        if (distance === 0 && currentHash != hash) {
                  window.location.hash = (hash);
                  currentHash = hash;
                }
              });
    });
  }
  

  function getImageWidth() {
    var array = [];
    $('img').each(function() {
      array.push(parseFloat($(this).width()))
    });
    var imageWidth = Math.min.apply(Math,array);
    $('.slider-background').each(function() {
      $(this).css("width", imageWidth);
    });
  }


  function checkForHash() {
    var url = window.location.href;
    var hash = "#"
    var windowWidth = $(window).width()
    if($('body').hasClass('page-template-archive-page')) {
          $('.intro').css('display', 'none');
          $('header').css('display', 'block');
          $('main').css('display', 'block');
          setTimeout(getImageWidth, 500);
          setTimeout(startMasonry, 500);
    } else if (url.indexOf(hash) >= 0) {
      $('.intro').css('display', 'none');
      $('header').css('display', 'block');
      $('main').css('display', 'block');
      setWaypoints();
      getImageWidth();
    } else {
      setTimeout(introAnimation, 10);
      setTimeout(outroAnimation, 1000);
      setTimeout(setWaypoints, 1000);
      setTimeout(getImageWidth, 1000);
    }
  }

  function checkForMobile() {
    var windowWidth = $(window).width()
    if (windowWidth < 1000) {
      $('.menu-arrow, .home-link').on('click', function(e) {
        e.preventDefault();
        scrollToFooter();
      })
    } else {
      $('.menu-arrow, .home-link').on('click', function(e) {
        e.preventDefault();
        scrollToFooter();
      })
    }
  }

  function setWaypoints() {
    var continuousElements = document.getElementsByClassName('continuous-true')
    for (var i = 0; i < continuousElements.length; i++) {
      new Waypoint({
        element: continuousElements[i],
        handler: function(direction) {
          if(direction == 'down') {
            if($('#' + this.element.id + ' .text-toggle-more').is(':visible')) {
              if($('#' + this.element.id + ' ul .unslider-active img').attr('alt') == undefined) {
                var imageInfo = ($('#' + this.element.id + ' ul li img').first().attr('alt'));
                var imageNum = ($('#' + this.element.id + ' ul li img').first().attr('data-num'));
                var imageMax = getImageMax(this.element.id);
                var imageFullText = imageInfo + ' ' + imageNum + '/' + imageMax;
                $('.slider-info').text(imageFullText);
              } else {
                var imageInfo = ($('#' + this.element.id + ' ul .unslider-active img').attr('alt'))
                var imageNum = ($('#' + this.element.id + ' ul .unslider-active img').attr('data-num'));
                var imageMax = getImageMax(this.element.id);
                var imageFullText = imageInfo + ' ' + imageNum + '/' + imageMax;
                $('.slider-info').text(imageFullText);
              }
            } else {
              $('.slider-info').text('');
            }
          }
        },
        offset: 75
      })
      new Waypoint({
        element: continuousElements[i],
        handler: function(direction) {
          if(direction == 'up') {
            if($('#' + this.element.id + ' .text-toggle-more').is(':visible')) {
              if($('#' + this.element.id + ' ul .unslider-active img').attr('alt') == undefined) {
                var imageInfo = ($('#' + this.element.id + ' ul li img').first().attr('alt'));
                var imageNum = ($('#' + this.element.id + ' ul li img').first().attr('data-num'));
                var imageMax = getImageMax(this.element.id);
                var imageFullText = imageInfo + ' ' + imageNum + '/' + imageMax;
                $('.slider-info').text(imageFullText);
              } else {
                var imageInfo = ($('#' + this.element.id + ' ul .unslider-active img').attr('alt'))
                var imageNum = ($('#' + this.element.id + ' ul .unslider-active img').attr('data-num' ));
                var imageMax = getImageMax(this.element.id);
                var imageFullText = imageInfo + ' ' + imageNum + '/' + imageMax;
                $('.slider-info').text(imageFullText);
              }
            } else {
              $('.slider-info').text('');
            }
          }
        },
        offset: function() {
          return -(this.element.clientHeight - 75)
        }
      })
    }
  }

  $(window).on('resize', function(){
    getImageWidth();
    forceTextToggle();
    $('.sidebar').removeClass('close-menu');
  });

  function forceTextToggle(){
    $('.text-toggle-less').css('display', 'none');
    $('.text-left, .text-center, .text-right').css('display', 'none');
    $('.unslider').css('display', 'block');
    $('.slider-background').css('display', 'block');
    $('.text-toggle-more').css('display', 'block');
    setWaypoints();
  }


  function getImageInfo() {
    var sections = $('section.project');
    for (var i = 0; i < sections.length; i++) {
      var sectionId = sections[i].id
      var imageInfo = $('#' + sectionId + ' ul li img').first().attr('alt');
      var imageNum = $('#' + sectionId + ' ul li img').first().attr('data-num');
      var imageMax = getImageMax(sectionId);
      var imageFullText = imageInfo + ' ' + imageNum + '/' + imageMax
      $('#' + sectionId + ' h4.image-info').text(imageFullText);
    };
  }

  function getImageMax(sectionId) {
    var maximum = null;
    $('#' + sectionId + ' ul li img').each(function() {
      var value = parseFloat($(this).attr('data-num'));
      maximum = (value > maximum) ? value : maximum;
    });
    return maximum
  }

  // $('.home-link').on('click', function(e) {
  //   e.preventDefault();
  //   $('body, html').animate({ scrollTop: 0 }, 1000);
  // })

  // $("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(){
  //       $('html, body').stop();
  //   });

  function addMobileProjectText(sectionId){
    var textLeft = $('#' + sectionId + ' .text-left').html();
    var textCenter = $('#' + sectionId + ' .text-center').html();
    var textRight = $('#' + sectionId + ' .text-right').html();
    $('#' + sectionId + ' .project-mobile').append(textLeft + '<br><br>' + textCenter + '<br><br>' + textRight + '<h6 class="extra-mobile-toggle">(less)</h6>');
    $('.extra-mobile-toggle').on('click', function(e) {
      e.preventDefault();
      var sectionId = $(this).parents('section')[0].id;
      var anchorId = $('#' + sectionId).prev()[0].id;
      removeMobileProjectText(sectionId);
      $('#' + sectionId + ' .toggle-text-mobile').text('(more)');
      $('#' + sectionId + ' .toggle-text-mobile').removeClass('read-less-mobile');
      $('#' + sectionId + ' .toggle-text-mobile').addClass('read-more-mobile');
      var tag = $('#' + anchorId);
      $('html,body').animate({scrollTop: tag.offset().top});
    })
  }

  function removeMobileProjectText(sectionId){
    $('#' + sectionId + ' .project-mobile').empty();
  }


  // Change Slider Speed Here
  $('.my-slider').unslider({
    animation: 'fade',
    speed: 350
  });

  $('.prev, .next').on('click', function() {
    var sections = $('section.project');
    for (var i = 0; i < sections.length; i++) {
      var sectionId = sections[i].id
      var imageInfo = $('#' + sectionId + ' ul .unslider-active img').attr('alt');
      var imageNum = $('#' + sectionId + ' ul .unslider-active img').attr('data-num');
      var imageMax = getImageMax(sectionId);
      $('#' + sectionId + ' h4.image-info').text(imageInfo + ' ' + imageNum + '/' + imageMax);
    };
    setWaypoints();
  });

  $('.toggle-more').on('click', function(e) {
    e.preventDefault();
    setWaypoints();
    var sectionId = $(this).parents('section')[0].id;
    $('#' + sectionId + ' .text-toggle-more').css('display', 'none');
    $('#' + sectionId + ' .unslider').css('display', 'none');
    $('#' + sectionId + ' .slider-background').css('display', 'none');
    $('#' + sectionId + ' .text-left, #' + sectionId + ' .text-center, #' + sectionId + ' .text-right').css('display', 'inline-block ');
    $('#' + sectionId + ' .text-toggle-less').css('display', 'block');
  })

  $('.toggle-less').on('click', function(e) {
    e.preventDefault();
    setWaypoints();
    var sectionId = $(this).parents('section')[0].id;
    $('#' + sectionId + ' .text-toggle-less').css('display', 'none');
    $('#' + sectionId + ' .text-left, #' + sectionId + ' .text-center, #' + sectionId + ' .text-right').css('display', 'none');
    $('#' + sectionId + ' .unslider').css('display', 'block');
    $('#' + sectionId + ' .slider-background').css('display', 'block');
    $('#' + sectionId + ' .text-toggle-more').css('display', 'block');
  })

  $('.toggle-text-mobile').on('click', function(e) {
    e.preventDefault();
    var sectionId = $(this).parents('section')[0].id;
    if($(this).hasClass('read-more-mobile')) {
      addMobileProjectText(sectionId)
      $(this).text('(less)');
      $(this).removeClass('read-more-mobile');
      $(this).addClass('read-less-mobile');
    } else {
      removeMobileProjectText(sectionId)
      $(this).text('(more)');
      $(this).removeClass('read-less-mobile');
      $(this).addClass('read-more-mobile');
    }
  })

});