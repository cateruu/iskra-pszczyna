$(function() {
  $(".main__container__sponsor__image").scroll(function() {
    const slider = $(this);
    width = slider.innerWidth();
    scrollWidth = slider[0].scrollWidth;
    scrollLeft = slider.scrollLeft();

    if (scrollWidth - width == scrollLeft) {
      slider
        .children()
        .clone()
        .appendTo(slider);
    }
  });
});
