//Popup youtube video
$(document).ready(function () {
  $(".popup-youtube").magnificPopup({
    disableOn: 700,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false,
  });
});

//Wow js
$(document).ready(function () {
  new WOW().init();
});

// Preloader
var AUTOFIREBOX = {};
var $window = $(window);

AUTOFIREBOX.preloader = function () {
  $("#load").fadeOut();
  $("#pre-loader").delay(0).fadeOut("slow");
};

$window.on("load", function () {
  AUTOFIREBOX.preloader();
});

// scrollToTop
$.scrollUp({
  scrollName: "scrollUp", // Element ID
  topDistance: "300", // Distance from top before showing element (px)
  topSpeed: 300, // Speed back to top (ms)
  animation: "fade", // Fade, slide, none
  animationInSpeed: 200, // Animation in speed (ms)
  animationOutSpeed: 200, // Animation out speed (ms)
  scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
  activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});

//Mobile men
$(document).ready(function () {
  // Add minus icon for collapse element which is open by default
  $(".collapse.show").each(function () {
    $(this)
      .prev(".menu-link")
      .find(".fa-minus")
      .addClass("fa-minus")
      .removeClass("fa-plus");
  });

  // Toggle plus minus icon on show hide of collapse element
  $(".collapse")
    .on("show.bs.collapse", function () {
      $(this)
        .prev(".menu-link")
        .find(".fa-plus")
        .removeClass("fa-plus")
        .addClass("fa-minus");
    })
    .on("hide.bs.collapse", function () {
      $(this)
        .prev(".menu-link")
        .find(".fa-minus")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    });
  /*mobile-menu-click*/
  $(".mmenu-btn").click(function () {
    $(this).toggleClass("menu-link-active");
  });
});

//Article Slider
$(document).ready(function () {
  $(".article-slider").slick({
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    arrows: true,
    nextArrow: $(".art-nxt"),
    prevArrow: $(".art-prv"),
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

//Training Slider
$(document).ready(function () {
  $(".training-slider").slick({
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    arrows: true,
    nextArrow: $(".trn-nxt"),
    prevArrow: $(".trn-prv"),
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

//Training Slider
$(document).ready(function () {
  $(".writeup-slider").slick({
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    arrows: true,
    nextArrow: $(".wrtp-nxt"),
    prevArrow: $(".wrtp-prv"),
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

//////////Solution slider
$(document).ready(function () {
  $(".solution-slider").slick({
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 2,
    arrows: true,
    nextArrow: $(".nxt-slsn"),
    prevArrow: $(".prv-slsn"),
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

//////////news slider
$(document).ready(function () {
  $(".news-slider").slick({
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: true,
    vertical: true,
    nextArrow: $(".nxt-news"),
    prevArrow: $(".prv-news"),
    dots: true,
  });
});

//////////events slider
$(document).ready(function () {
  $(".events-slider").slick({
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: true,
    vertical: true,
    nextArrow: $(".nxt-events"),
    prevArrow: $(".prv-events"),
    dots: true,
  });
});
