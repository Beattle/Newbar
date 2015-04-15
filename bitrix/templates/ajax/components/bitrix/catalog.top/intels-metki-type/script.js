$(document).ready(function() {
	
	$(".top-opener").click(function() {
		$(".products article").slideDown(100);
		$(this).hide();
		//$(this).children("span").toggle();
	});
	
});