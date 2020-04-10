(function ($) {
  "use strict"

  // NAVIGATION
  var responsiveNav = $('#responsive-nav'),
    catToggle = $('#responsive-nav .category-nav .category-header'),
    catList = $('#responsive-nav .category-nav .category-list'),
    menuToggle = $('#responsive-nav .menu-nav .menu-header'),
    menuList = $('#responsive-nav .menu-nav .menu-list');

  catToggle.on('click', function () {
    // menuList.removeClass('open');
    // catList.toggleClass('open');
      menuList.addClass('open');
      $('#navigation').addClass('shadow');
      responsiveNav.addClass('open');
  });

  $('.menu-nav').on('click', function () {
        $('#navigation').addClass('shadow');
        responsiveNav.addClass('open');
    });

  menuToggle.on('click', function () {
    // catList.removeClass('open');
    //   menuList.toggleClass('open');
      if (responsiveNav.hasClass('open')) {
          responsiveNav.removeClass('open');
          $('#navigation').removeClass('shadow');
      }
  });



  menuList.addClass('open');

  $(document).click(function (event) {
    if (!$(event.target).closest(responsiveNav).length) {
      if (responsiveNav.hasClass('open')) {
          var clicked = false;
          $('.menu-nav').on('click', function () {
              clicked = true;
              alert(clicked);
          });
          if (clicked) {
              alert("clecked INSIDE");
              alert(clicked);
              $('#navigation').addClass('shadow');
              responsiveNav.addClass('open');
          } else {
              alert("OUTSIDE");
              alert(clicked);
              responsiveNav.removeClass('open');
              $('#navigation').removeClass('shadow');
          }

      } else {
        if ($(event.target).closest('.nav-toggle > button').length) {
          if (!menuList.hasClass('open') && !catList.hasClass('open')) {
            catList.addClass('open');
          }
          $('#navigation').addClass('shadow');
          responsiveNav.addClass('open');
        }
      }
    }
  });

  // HOME SLICK
  $('#home-slick').slick({
    autoplay: true,
    infinite: true,
    speed: 1000,
    arrows: true,
  });

  // PRODUCTS SLICK
  // $('#product-slick-1').slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 4,
  //   autoplay: true,
  //   infinite: true,
  //   speed: 1500,
  //   dots: true,
  //   arrows: false,
  //   appendDots: '.product-slick-dots-1',
  //   responsive: [{
  //     breakpoint: 991,
  //     settings: {
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       dots: false,
  //       arrows: true,
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   },
  //   ]
  // });

  // $('#product-slick-2').slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 4,
  //   autoplay: true,
  //   infinite: true,
  //   speed: 1500,
  //   dots: true,
  //   arrows: false,
  //   appendDots: '.product-slick-dots-2',

  //   responsive: [{
  //     breakpoint: 991,
  //     settings: {
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       dots: false,
  //       arrows: true,
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   },
  //   ]
  // });
  // $('#product-slick-3').slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 4,
  //   autoplay: true,
  //   infinite: true,
  //   speed: 1500,
  //   dots: true,
  //   arrows: false,
  //   appendDots: '.product-slick-dots-3',

  //   responsive: [{
  //     breakpoint: 991,
  //     settings: {
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       dots: false,
  //       arrows: true,
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   },
  //   ]
  // });

  $('.product-slick').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    infinite: true,
    speed: 1000,
    dots: false,
    arrows: true,
    appendDots: '.product-slick-dots-3',

    responsive: [{
      breakpoint: 991,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    ]
  });

  // PRODUCT DETAILS SLICK
  $('#product-main-view').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-view',
  });

  $('#product-view').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
    asNavFor: '#product-main-view',
  });

  // PRODUCT ZOOM
  $('#product-main-view .product-view').zoom();

  // PRICE SLIDER
  var slider = document.getElementById('price-slider');
  if (slider) {
    noUiSlider.create(slider, {
      start: [1, 999],
      connect: true,
      tooltips: [true, true],
      format: {
        to: function (value) {
          return value.toFixed(2) + '$';
        },
        from: function (value) {
          return value
        }
      },
      range: {
        'min': 1,
        'max': 999
      }
    });
  }

})(jQuery);

// jQuery(document).ready(function ($) {
//   var alterClass = function () {
//     var ww = document.body.clientWidth;
//     if (ww < 950) {
//       $('#header').removeClass('header1');
//       $('#search').removeClass('header-search1');
//       $('#navigation').removeClass('navigation');
//       $('#logoPosition').removeClass('logoPosition');
//     }
//   };
//   $(window).resize(function () {
//     alterClass();
//   });
//   alterClass();
// });
