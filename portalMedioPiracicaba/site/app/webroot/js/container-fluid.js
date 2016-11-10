$(document).ready(function() {
	if (screen.width < 768) {
		$(".responsive-large").removeClass("container");
		$(".responsive-large").addClass("container-fluid");
	} 
});

window.addEventListener("resize", function() {
	if (screen.width < 768) {
		$(".responsive-large").removeClass("container");
		$(".responsive-large").addClass("container-fluid");
	} else {
		$(".responsive-large").removeClass("container-fluid");
		$(".responsive-large").addClass("container");
	}
});