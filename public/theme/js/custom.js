/*-----------------------------------------------------------------------------------

    Project:    Energix - Solar Energy and Renewable Energy HTML Template


    Note: This is Custom Js file

-----------------------------------------------------------------------------------

    [Table of contents]
    
    1. slider-home-1
    2. new-project
    3. history-slider
    4. recent-projects-two
    5. experts-slider
    6. two-slider
    7. mobile-nav
    8. Counter Init
    9. c-slider
    10. progressbar
    11. mobile search
    12. progress go to top
    13. newsbox
    14. loaded


-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){
    if ( $.isFunction($.fn.owlCarousel) ) {

/* 1. slider-home-1 */

    $('.slider-home-1').owlCarousel({
        loop:true,
        arrows:true,
        dots:false,
        autoplay:true,
        items:1,
        navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>"],
      })

/* 2. new-project */

    $('.new-project').owlCarousel({
        loop:true,
        arrows:false,
        dots: true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            770:{
                items:1
            },
            993:{
                items:2
            }
        }
      })

/* 3. history-slider */

    $('.history-slider').owlCarousel({
        loop:true,
        arrows:false,
        dots: false,
        navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>"],
        nav:true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            },
            993:{
                items:3
            },
            1200:{
                items:4
            }
        }
      })

/* 4. recent-projects-two */

    $('.recent-projects-two').owlCarousel({
            navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>"],
            loop:true,
            nav:true,
            arrows:true,
            dots: true,
            autoplay:true,
            responsive:{
                0:{
                    items:1
                },
                770:{
                    items:1
                },
                1200:{
                    items:2
                }
            }
        });

/* 5. experts-slider */

    $('.experts-slider').owlCarousel({
            loop:true,
            dots: true,
            autoplay:true,
            responsive:{
                0:{
                    items:1
                },
                770:{
                    items:1
                },
                1200:{
                    items:2
                }
            }
        });
    /* 6. two-slider */

    $('.two-slider').owlCarousel({
        loop:true,
        arrows:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:4000,
        items:1,
      })
    }
    if ( $.isFunction($.fn.slick) ) {
      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });
    $('.slider-nav').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      centerMode: true,
      focusOnSelect: true,
      responsive: [
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
    });
  }

  /* 7. mobile-nav */
    jQuery('.mobile-nav .menu-item-has-children').on('click', function($) {

          jQuery(this).toggleClass('active');

        }); 

        jQuery('#nav-icon4').click(function($){

            jQuery('#mobile-nav').toggleClass('open');

        });

        jQuery('#res-cross').click(function($){

           jQuery('#mobile-nav').removeClass('open');

        });


        jQuery('.bar-menu').click(function($){

            jQuery('#mobile-nav').toggleClass('open');
            jQuery('#mobile-nav').toggleClass('hmburger-menu');
            jQuery('#mobile-nav').show();

        });

        jQuery('#res-cross').click(function($){

           jQuery('#mobile-nav').removeClass('open');

        });
  
}) ;
 
/* 8. Counter Init  */
(function($) {
  $.fn.countTo = function(options) {
    options = options || {};

    return $(this).each(function() {
      // set options for current element
      var settings = $.extend(
        {},
        $.fn.countTo.defaults,
        {
          from: $(this).data("from"),
          to: $(this).data("to"),
          speed: $(this).data("speed"),
          refreshInterval: $(this).data("refresh-interval"),
          decimals: $(this).data("decimals")
        },
        options
      );

      // how many times to update the value, and how much to increment the value on each update
      var loops = Math.ceil(settings.speed / settings.refreshInterval),
        increment = (settings.to - settings.from) / loops;

      // references & variables that will change with each update
      var self = this,
        $self = $(this),
        loopCount = 0,
        value = settings.from,
        data = $self.data("countTo") || {};

      $self.data("countTo", data);

      // if an existing interval can be found, clear it first
      if (data.interval) {
        clearInterval(data.interval);
      }
      data.interval = setInterval(updateTimer, settings.refreshInterval);

      // initialize the element with the starting value
      render(value);

      function updateTimer() {
        value += increment;
        loopCount++;

        render(value);

        if (typeof settings.onUpdate == "function") {
          settings.onUpdate.call(self, value);
        }

        if (loopCount >= loops) {
          // remove the interval
          $self.removeData("countTo");
          clearInterval(data.interval);
          value = settings.to;

          if (typeof settings.onComplete == "function") {
            settings.onComplete.call(self, value);
          }
        }
      }

      function render(value) {
        var formattedValue = settings.formatter.call(self, value, settings);
        $self.html(formattedValue);
      }
    });
  };

  $.fn.countTo.defaults = {
    from: 0, // the number the element should start at
    to: 0, // the number the element should end at
    speed: 1000, // how long it should take to count between the target numbers
    refreshInterval: 100, // how often the element should be updated
    decimals: 0, // the number of decimal places to show
    formatter: formatter, // handler for formatting the value before rendering
    onUpdate: null, // callback method for every time the element is updated
    onComplete: null // callback method for when the element finishes updating
  };

  function formatter(value, settings) {
    return value.toFixed(settings.decimals);
  }
})(jQuery);


jQuery(function($) {
  // custom formatting example
  $(".count-number").data("countToOptions", {
    formatter: function(value, options) {
      return value
        .toFixed(options.decimals)
        .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    }
  });

  // start all the timers
  $(".timer").each(count);

  function count(options) {
    var $this = $(this);
    options = $.extend({}, options || {}, $this.data("countToOptions") || {});
    $this.countTo(options);
  }
});


/* 9. c-slider */

    if (jQuery(".c-slider")[0]){
        jQuery('.c-slider').slick({

            slidesToShow: 1,

            slidesToScroll: 1,

            arrows: false,

            dots: false,

            draggable: false,

            waitForAnimate: true,

             lazyLoad: 'ondemand',

             fade: false,

             speed: 30000

        });
    }

    // C-Slider

    jQuery('.next-slide').on('click', function() {

    var img_src = "";

    jQuery('.next-slide.nav-active').removeClass('nav-active');

    jQuery(this).addClass('nav-active');

    img_src = jQuery(this).html();

    jQuery('.slider-main-img').html(img_src);

    var slideno = jQuery(this).data('slide');

    jQuery('.c-slider').slick('slickGoTo', slideno - 1, true);

    });


/* 10. progressbar */
  {
    function animateElements() {
      $('.progressbar').each(function () {
        var elementPos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        var percent = $(this).find('.circle').attr('data-percent');
        var percentage = parseInt(percent, 10) / parseInt(100, 10);
        var animate = $(this).data('animate');
        if (elementPos < topOfWindow + $(window).height() - 10 && !animate) {
          $(this).data('animate', true);
          $(this).find('.circle').circleProgress({
            startAngle: -Math.PI / 2,
            value: percent / 100,
            size: 250,
            thickness: 16,
            emptyFill: "rgba(250,250,250, 1)",
            fill: {
              color: '#0A9642'
            }
          }).on('circle-animation-progress', function (event, progress, stepValue) {
            $(this).find('div').text((stepValue*100).toFixed() + "%");
          }).stop();
        }
      });
    }

    // Show animated elements
    animateElements();
    $(window).scroll(animateElements);
  };

//* 11. mobile search  *//
    $('.search-btn').on("click",function(){$('.mobile-search').addClass('slide');})
    $('.search-cross-btn').on("click",function(){$('.mobile-search').removeClass('slide');})



/* 12. progress go to top */

let calcScrollValue = () => {
  let scrollProgress = document.getElementById("progress");
  let progressValue = document.getElementById("progress-value");
  let pos = document.documentElement.scrollTop;
  let calcHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  let scrollValue = Math.round((pos * 100) / calcHeight);
  if (pos > 100) {
    scrollProgress.style.display = "grid";
  } else {
    scrollProgress.style.display = "none";
  }
  scrollProgress.addEventListener("click", () => {
    document.documentElement.scrollTop = 0;
  });
  scrollProgress.style.background = `conic-gradient(#0A9642 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;



 /* 13. newsbox */ 
    $('.newsbox').on("click",function(){$('.latterbox').addClass('slide');})
    $('.latterbox-cross-btn').on("click",function(){$('.latterbox').removeClass('slide');})


/* 14. loaded */ 

$(window).on('load', function () {
    $("body").addClass("page-loaded");
    console.log("loaded")
});