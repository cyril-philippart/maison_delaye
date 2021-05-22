var button = $('#button_back_top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 200) {
    button.addClass('show');
  } else {
    button.removeClass('show');
  }
});

$("#card_main_img").vegas({
  slides: [
      { src: "/pictures/testimage.jpg" },
      { src: "/pictures/photo_menu.jpg" },
      { src: "/pictures/photo_melissa.jpg" },
      { src: "/pictures/photo_devanture.jpg" }
  ],

  overlay: true,
    transition: 'fade',
    transitionDuration: '2000',
    delay: '8000',
    animation: 'random',
    animationDuration: '8000'
});