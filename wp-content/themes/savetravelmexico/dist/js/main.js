/**
 * Global variables
 */
"use strict";

var userAgent = navigator.userAgent.toLowerCase(),
  initialDate = new Date(),

  $document = $(document),
  $window = $(window),
  $html = $("html"),

  isDesktop = $html.hasClass("desktop"),
  isIE = userAgent.indexOf("msie") != -1 ? parseInt(userAgent.split("msie")[1]) : userAgent.indexOf("trident") != -1 ? 11 : userAgent.indexOf("edge") != -1 ? 12 : false,
  isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
  isTouch = "ontouchstart" in window,

  plugins = {
    pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
    rdNavbar: $(".rd-navbar"),
    navbarToggle: $(".rd-navbar-toggle"),
    customWaypoints: $('[data-custom-scroll-to]'),
    dateCountdown: $('.DateCountdown'),
    photoSwipeGallery: $("[data-photo-swipe-item]")
  };

/**
 * Initialize All Scripts
 */
$document.ready(function () {




  /**
   * IE Polyfills
   * @description  Adds some loosing functionality to IE browsers
   */
  if (isIE) {
    if (isIE < 10) {
      $html.addClass("lt-ie-10");
    }

    if (isIE < 11) {
      if (plugins.pointerEvents) {
        $.getScript(plugins.pointerEvents)
          .done(function () {
            $html.addClass("ie-10");
            PointerEventsPolyfill.initialize({});
          });
      }
    }

    if (isIE === 11) {
      $("html").addClass("ie-11");
    }

    if (isIE === 12) {
      $("html").addClass("ie-edge");
    }
  }


  /**
   * UI To Top
   * @description Enables ToTop Button
   */
  if (isDesktop) {
    $().UItoTop({
      easingType: 'easeOutQuart',
      containerClass: 'ui-to-top fa fa-angle-up'
    });
  }

  /**
   * RD Navbar
   * @description Enables RD Navbar plugin
   */
  if (plugins.rdNavbar.length) {
    plugins.rdNavbar.RDNavbar({
      stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone")) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false
    });
    if (plugins.rdNavbar.attr("data-body-class")) {
      document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
    }
  }

  /**
   * tooltip bootstrap
   */

  $('[data-toggle="tooltip"]').tooltip();

  /**
   * year copyright
   */
  var now = new Date();
  var getYear = now.getFullYear();
  var elCopyrightYear = document.getElementById('copyright-year');
  if (elCopyrightYear) {
    elCopyrightYear.innerHTML = getYear;
  }

  /**
   * main slider
   */
  $('.js-slider').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    fade: true,
    cssEase: 'linear',
    arrows: false,
    autoplaySpeed: 5000,
    autoplay: false
  });

  /**
   * Custom Waypoints
   */
  if (plugins.customWaypoints.length) {
    var i;
    for (i = 0; i < plugins.customWaypoints.length; i++) {
      var $this = $(plugins.customWaypoints[i]);

      $this.on('click', function (e) {
        e.preventDefault();
        $("body, html").stop().animate({
          scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
        }, 1000, function () {
          $(window).trigger("resize");
        });
      });
    }
  }

  /**
   * owl - js-reviews main
   */
  $('.js-reviews').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:1,
    //margin:30,
    //stagePadding:30,
    smartSpeed:450,
    //nav:true,
    //dots:false,
    loop:true,
    navElement: 'div class="owl-slider-arrow"',
    navText:[],
    responsive:{
      480:{
        nav:true,
        dots:false,
      }
    }

  });
  /**
   * owl - js-blog main
   */
  $('.js-blog').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:3,
    margin:70,
    stagePadding:40,
    smartSpeed:450,
    //nav:true,
    //dots:false,
    loop:true,
    navElement: 'div class="owl-slider-arrow-blog"',
    navText:[],
    responsive:{
      0:{
        items:1,
        nav:false,
        dots:true,
        margin:30,
        stagePadding:5,
      },
      700:{
        items:2,
        nav:false,
        dots:true,
      },
      992:{
        items:3,
        nav:true,
        dots:false,
      }
    }

  });

  /**
   * owl - js-reviews-three main
   */
  $('.js-reviews-three').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:3,
    margin:30,
    stagePadding:30,
    smartSpeed:450,
    //nav:true,
    //dots:false,
    loop:true,
    navElement: 'div class="owl-slider-arrow-reviews-three"',
    navText:[],
    responsive:{
      0:{
        items:1,
        nav:false,
        dots:true,
        margin:30,
        stagePadding:5,
      },
      700:{
        items:2,
        nav:false,
        dots:true,
      },
      992:{
        items:3,
        nav:true,
        dots:false,
      }
    }
  });

  /**
   * owl - js-reviews-three main
   */
  $('.js-tours').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:3,
    margin:50,
    stagePadding:40,
    smartSpeed:450,
    //nav:true,
    //dots:false,
    loop:true,
    navElement: 'div class="owl-slider-arrow-tours"',
    navText:[],
    responsive:{
      0:{
        items:1,
        nav:false,
        dots:true,
        margin:30,
        stagePadding:5,
      },
      700:{
        items:2,
        nav:false,
        dots:true,
      },
      992:{
        items:3,
        nav:true,
        dots:false,
      }
    }
  });

  /**
   * owl - js-reviews-three main
   */
  $('.js-directions').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:3,
    margin:50,
    stagePadding:40,
    smartSpeed:450,
    //nav:true,
    //dots:false,
    loop:true,
    navElement: 'div class="owl-slider-arrow-directions"',
    navText:[],
    responsive:{
      0:{
        items:1,
        nav:false,
        dots:true,
        margin:30,
        stagePadding:5,
      },
      700:{
        items:2,
        nav:false,
        dots:true,
      },
      992:{
        items:3,
        nav:true,
        dots:false,
      }
    }
  });

  /**
   * owl - js-photo-gallery
   */
  $('.js-photo-gallery').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:3,
    margin:50,
    stagePadding:40,
    smartSpeed:450,
    //nav:true,
    //dots:false,
    loop:true,
    navElement: 'div class="owl-slider-arrow-photo-gallery"',
    navText:[],
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
      0:{
        items:1,
        nav:false,
        dots:true,
        margin:30,
        stagePadding:5,
      },
      700:{
        items:2,
        nav:false,
        dots:true,
      },
      992:{
        items:3,
        nav:true,
        dots:false,
      }
    }
  });
/* swiper*/
  var swiper = new Swiper('.swiper-container', {
    loop: true,
    effect: 'fade',
    speed: 600,
    //autoplay: {
      //delay: 5000,
    //},
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  /**
   * TimeCircles
   * @description  Enable TimeCircles plugin
   */
  if (plugins.dateCountdown.length) {
    var i;
    for (i = 0; i < plugins.dateCountdown.length; i++) {
      var dateCountdownItem = $(plugins.dateCountdown[i]),
        time = {
          "Days": {
            "text": "Дней",
            "color": "#43d0d9",
            "show": true
          },
          "Hours": {
            "text": "Часов",
            "color": "#43d0d9",
            "show": true
          },
          "Minutes": {
            "text": "Минут",
            "color": "#43d0d9",
            "show": true
          },
          "Seconds": {
            "text": "Секунд",
            "color": "#43d0d9",
            "show": true
          }
        };
      dateCountdownItem.TimeCircles({
        fg_width: 0.025,
        circle_bg_color: "#f4f4f4",
        bg_width: 0.5
      });
      $(window).on('load resize orientationchange', function () {
        if (window.innerWidth < 479) {
          dateCountdownItem.TimeCircles({
            time: {
              Days: {
                color: "#43d0d9",
                show: true
              },
              Hours: {
                color: "#43d0d9",
                show: true
              },
              Minutes: {
                color: "#43d0d9",
                show: true
              },
              Seconds: {show: false}
            }
          }).rebuild();
        } else if (window.innerWidth < 991) {
          dateCountdownItem.TimeCircles({
            time: {
              Days: {
                color: "#43d0d9",
                show: true
              },
              Hours: {
                color: "#43d0d9",
                show: true
              },
              Minutes: {
                color: "#43d0d9",
                show: true
              },
              Seconds: {show: false}
            }
          }).rebuild();
        } else {
          dateCountdownItem.TimeCircles({time: time}).rebuild();
        }
      });
    }
  }

  /**
   * PhotoSwipe Gallery
   * @description Enables PhotoSwipe Gallery plugin
   */
  if (plugins.photoSwipeGallery.length) {

    // init image click event
    $document.delegate("[data-photo-swipe-item]", "click", function (event) {
      event.preventDefault();

      var $el = $(this),
        $galleryItems = $el.parents("[data-photo-swipe-gallery]").find("a[data-photo-swipe-item]"),
        pswpElement = document.querySelectorAll('.pswp')[0],
        encounteredItems = {},
        pswpItems = [],
        options,
        pswpIndex = 0,
        pswp;

      if ($galleryItems.length == 0) {
        $galleryItems = $el;
      }

      // loop over the gallery to build up the photoswipe items
      $galleryItems.each(function () {
        var $item = $(this),
          src = $item.attr('href'),
          size = $item.attr('data-size').split('x'),
          pswdItem;

        if ($item.is(':visible')) {

          // if we have this image the first time
          if (!encounteredItems[src]) {
            // build the photoswipe item
            pswdItem = {
              src: src,
              w: parseInt(size[0], 10),
              h: parseInt(size[1], 10),
              el: $item // save link to element for getThumbBoundsFn
            };

            // store that we already had this item
            encounteredItems[src] = {
              item: pswdItem,
              index: pswpIndex
            };

            // push the item to the photoswipe list
            pswpItems.push(pswdItem);
            pswpIndex++;
          }
        }
      });

      options = {
        index: encounteredItems[$el.attr('href')].index,

        getThumbBoundsFn: function (index) {
          var $el = pswpItems[index].el,
            offset = $el.offset();

          return {
            x: offset.left,
            y: offset.top,
            w: $el.width()
          };
        }
      };

      // open the photoswipe gallery
      pswp = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, pswpItems, options);
      pswp.init();
    });
  }

  /*DatePicker*/


  $('#time').bootstrapMaterialDatePicker
  ({
    //format : 'DD-MM-YYYY HH:mm',
    format : 'DD-MM-YYYY HH:mm',
    lang: 'ru',
    date: true,
    //time: false,
    weekStart : 1,
    cancelText : 'Отмена',
    okText : 'Ok',
    minDate : new Date(),
    //maxDate : '22-12-2017'
  });
  $('.time-rent-car').bootstrapMaterialDatePicker
  ({
    //format : 'DD-MM-YYYY HH:mm',
    format : 'DD-MM-YYYY HH:mm',
    lang: 'ru',
    date: true,
    //time: false,
    weekStart : 1,
    cancelText : 'Отмена',
    okText : 'Ok',
    minDate : new Date(),
    //maxDate : '22-12-2017'
  });

  /*$('#date-format').bootstrapMaterialDatePicker
  ({
    format: 'dddd DD MMMM YYYY - HH:mm'
  });
  $('#date-fr').bootstrapMaterialDatePicker
  ({
    format: 'DD/MM/YYYY HH:mm',
    lang: 'fr',
    weekStart: 1,
    cancelText : 'ANNULER',
    nowButton : true,
    switchOnClick : true
  });

  $('#date-end').bootstrapMaterialDatePicker
  ({
    weekStart: 0, format: 'DD/MM/YYYY HH:mm'
  });
  $('#date-start').bootstrapMaterialDatePicker
  ({
    weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
  }).on('change', function(e, date)
  {
    $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
  });

  $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });*/


  /*validate reservation-tours__form*/
  $('.reservation-tours__form').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true
      },
      policy: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Введите Ваше имя"
      },
      email: {
        required: "Введите адрес электронной почты",
        email: "Не корректный адрес электронной почты"
      },
      policy: {
        required: "Введите Ваши контакты"
      }
    }
  });

  /*validate reservation-tours__form*/
  $('.contacts-form__form').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true
      },
      policy: {
        required: true,
      },
      comment: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Введите Ваше имя"
      },
      email: {
        required: "Введите адрес электронной почты",
        email: "Не корректный адрес электронной почты"
      },
      policy: {
        required: "Введите Ваши контакты"
      },
      comment: {
        required: "Введите Ваш комментарии"
      }
    }
  });

  /*
  * validate policy
  * '.js-private-policy click': function ($el) {
   this.checkPolicy();
   },

   '{events.restoreDefaults}': function () {
   this.restoreDefaults();
   },

   '{events.focusToFirstItem}': function () {
   this.focusToFirstItem();
   },


   checkPolicy: function () {
   if (this.element.find(".js-private-policy").is(':checked')) {
   this.element.find("[type=submit]").prop('disabled', false);
   } else {
   this.element.find("[type=submit]").prop('disabled', true);
   }
   },
   */

  /* end validate policy */

  /*validate modal-reviews__form*/
  $('.modal-reviews__form').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true
      },
      comment: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Введите Ваше имя"
      },
      email: {
        required: "Введите адрес электронной почты",
        email: "Не корректный адрес"
      },
      comment: {
        required: "Введите Ваш отзыв"
      }
    }
  });

  $('.js-policy').on('click', function($el){
    checkPolicy();
  });
  function checkPolicy () {
    if ($(".js-policy").is(':checked')) {
      $("[type=submit]").prop('disabled', false);
    } else {
      $("[type=submit]").prop('disabled', true);
    }
  }

  /* end validate modal-reviews__form*/

  /*validate comments__form*/
  $('.comments__form').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true
      },
      comment: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Введите Ваше имя"
      },
      email: {
        required: "Введите адрес электронной почты",
        email: "Не корректный адрес"
      },
      comment: {
        required: "Введите Ваш комментарий"
      }
    }
  });
  /*end comments__form */

  /*modal*/
  var modalVerticalCenterClass = ".modal";
  function centerModals($element) {
    var $modals;
    if ($element.length) {
      $modals = $element;
    } else {
      $modals = $(modalVerticalCenterClass + ':visible');
    }
    $modals.each( function(i) {
      var $clone = $(this).clone().css('display', 'block').appendTo('body');
      var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
      top = top > 0 ? top : 0;
      $clone.remove();
      $(this).find('.modal-content').css("margin-top", top);
    });
  }
  $(modalVerticalCenterClass).on('show.bs.modal', function(e) {
    centerModals($(this));
  });
  $(window).on('resize', centerModals);
  /*end modal*/

  /*******inputfile******/

  var inputs = document.querySelectorAll( '.inputfile' );
  Array.prototype.forEach.call( inputs, function( input )
  {
    var label	 = input.nextElementSibling,
      labelVal = label.innerHTML;

    input.addEventListener( 'change', function( e )
    {
      var fileName = '';
      if( this.files && this.files.length > 1 )
        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
      else
        fileName = e.target.value.split( '\\' ).pop();

      if( fileName )
        label.querySelector( 'span' ).innerHTML = fileName;
      else
        label.innerHTML = labelVal;
    });
  });

  /*******end inputfile******/


});



