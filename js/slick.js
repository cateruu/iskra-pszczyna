$(document).ready(function () {
  $(".slick").slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 4000,
    draggable: true,
    mobileFirst: true,
    pauseOnHover: true,
    prevArrow: '<i class="fas fa-chevron-left left"></i>',
    nextArrow: '<i class="fas fa-chevron-right right"></i>',
  });
});

$(document).ready(function () {
  $(".slick_galeria").slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 4000,
    draggable: true,
    mobileFirst: true,
    pauseOnHover: true,
    prevArrow: '<i class="fas fa-chevron-left left"></i>',
    nextArrow: '<i class="fas fa-chevron-right right"></i>',
    slidesToShow: 1,
    centerMode: true,
    centerPadding: "60px",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 750,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });
});

$(document).ready(function () {
  $(".slajder").slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: "linear",
    speed: 2000,
    slidesToShow: 8,
    centerMode: true,
    arrows: false,
    draggable: false,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 5,
          autoplaySpeed: 700,
        },
      },
      {
        breakpoint: 750,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });
});

$(document).ready(function () {
  $(".slajderPartner").slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: "linear",
    speed: 2000,
    arrows: false,
    draggable: false,
    variableWidth: true,
  });
});
