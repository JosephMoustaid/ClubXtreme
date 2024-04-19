$(document).ready(function() {
    var navbar = $('#nav');
    var scrollOffset = navbar.offset().top;
  
    $(window).scroll(function() {
      if ($(window).scrollTop() >= scrollOffset) {
        navbar.addClass('navbar-transparent');
      } else {
        navbar.removeClass('navbar-transparent');
      }
    });
  });
  