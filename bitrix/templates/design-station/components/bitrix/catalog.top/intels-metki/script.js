$(document).ready(function() {
	
	$(".top-opener").click(function() {
		$(this).parent().children("div:gt(0)").toggle();
		$(this).children("span").toggle();
	});
	
});