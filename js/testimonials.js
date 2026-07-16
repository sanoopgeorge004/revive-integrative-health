/**
 * Testimonials slider (Slick Carousel)
 */
(function ($) {
  'use strict';

  $(function () {
    var $slider = $('[data-testimonials-slider]');

    if (!$slider.length || typeof $.fn.slick !== 'function') {
      return;
    }

    $slider.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      dots: false,
      adaptiveHeight: true,
      speed: 400,
      prevArrow:
        '<button type="button" class="testimonials-section__arrow testimonials-section__arrow--prev" aria-label="Previous testimonial">' +
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>' +
        '</button>',
      nextArrow:
        '<button type="button" class="testimonials-section__arrow testimonials-section__arrow--next" aria-label="Next testimonial">' +
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>' +
        '</button>'
    });
  });
})(jQuery);
