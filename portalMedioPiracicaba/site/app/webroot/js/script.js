$(window).scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removeClass('opaque');
    }
});

var didScroll;
var lastScrollTop = 0;
var navbarHeight = $('.navbar').outerHeight();

// on scroll, let the interval function know the user has scrolled
$(window).scroll(function(event){
  didScroll = true;
});
// run hasScrolled() and reset didScroll status
setInterval(function() {
  if (didScroll) {
    hasScrolled();
    didScroll = false;
  }
}, 250);

function hasScrolled() {
  var st = $(this).scrollTop();
	// If current position > last position AND scrolled past navbar...
	if (st > lastScrollTop && st > navbarHeight){
	  // Scroll Down
	  $('.navbar').addClass('nav-up');
	} else {
	  // Scroll Up
	  // If did not scroll past the document (possible on mac)...
	  if(st + $(window).height() < $(document).height()) { 
	    $('.navbar').removeClass('nav-up');
	  }
	}
	lastScrollTop = st;
}