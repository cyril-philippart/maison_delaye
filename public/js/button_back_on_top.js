var button = $('#button_back_top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 200) {
    button.addClass('show');
  } else {
    button.removeClass('show');
  }
});