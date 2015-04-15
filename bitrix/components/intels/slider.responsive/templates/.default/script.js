$(document).ready(function() {
	
	$(".slides > .slideContainer:eq(0)").show(); // First slider on
	response();	// Height and width of slider and arrows
	$(window).resize(function() {	// Use response() when window width changes
		response();
	});
	
	// Autoswitch on if parameter check
	if ($("#USE_AUTO").attr("value") == "Y") {var autoswitch = setInterval(rightArrow, $("#AUTO_TIME").attr("value"));}	
	
	// Height and width of slider and arrows
	function response() {
		if ($("#MOBILE_SCREEN_POINT").attr("value") == 0 || $(window).width() >= $("#MOBILE_SCREEN_POINT").attr("value")) {
			var sliderProportion = $("#PROPORTION").attr("value");
		} else {
			var sliderProportion = $("#PROPORTION_MOBILE").attr("value");
		}
		var sliderWidth = $(".slidercontainer").width();
		var sliderHeight = sliderWidth / sliderProportion;
		$(".slidercontainer > .slides").width(sliderWidth);
		$(".slidercontainer > .slides").height(sliderHeight);
		var arrowsPosition = sliderHeight / 100 * $("#ARROWS_TOP_MARGIN").attr("value");
		$(".arrows > .arrow").css("top", "-" + arrowsPosition + "px");
		var arrowsHeight = sliderHeight / 100 * $("#ARROWS_HEIGHT").attr("value");
		$(".arrows > .arrow").height(arrowsHeight);
	}
	
	// Arrows work
	function leftArrow() {
		var changeTime = $("#SLIDE_CHANGE_TIME").attr("value");
		var lastIndex = $(".slides").children().last().index();
		var activeIndex = $(".slides").children(".active").index();
		var slideIndex = activeIndex - 1;
		if (slideIndex < 0) {slideIndex = lastIndex}
		$(".slides").children(".active").fadeOut(changeTime).removeClass("active");
		$(".slides").children().eq(slideIndex).delay(changeTime).fadeIn(changeTime).addClass("active");
		$(".slides").siblings(".switcher").children("a").removeClass("activeSwitch");
		$(".slides").siblings(".switcher").children("a").eq(slideIndex).delay(changeTime).addClass("activeSwitch");
	}
	function rightArrow() {
		var changeTime = $("#SLIDE_CHANGE_TIME").attr("value");
		var lastIndex = $(".slides").children().last().index();
		var activeIndex = $(".slides").children(".active").index();
		var slideIndex = activeIndex + 1;
		if (slideIndex > lastIndex) {slideIndex = 0;}
		$(".slides").children(".active").fadeOut(changeTime).removeClass("active");
		$(".slides").children().eq(slideIndex).delay(changeTime).fadeIn(changeTime).addClass("active");
		$(".slides").siblings(".switcher").children("a").removeClass("activeSwitch");
		$(".slides").siblings(".switcher").children("a").eq(slideIndex).delay(changeTime).addClass("activeSwitch");
	}
	$(".leftArrow").click(leftArrow);
	$(".rightArrow").click(rightArrow);
	
	
	// Switcher work
	$(".switcher > *").click(function() {
		var slideIndex = $(this).index();
		var activeIndex = $(this).parent().siblings(".slides").children(".active").index();
		if (slideIndex == activeIndex) {return false;}
		$(this).siblings().removeClass("activeSwitch");
		$(this).addClass("activeSwitch");
		var changeTime = $("#SLIDE_CHANGE_TIME").attr("value");
		$(this).parent().siblings(".slides").children(".active").fadeOut(changeTime).removeClass("active");
		$(this).parent().siblings(".slides").children().eq(slideIndex).delay(changeTime).fadeIn(changeTime).addClass("active");
		return false;
	});
	
	
	// Stop autoswitch timer on slide, arrows or switcher hover
	if ($("#USE_AUTO").attr("value") == "Y") {
		$(".switcher, .leftArrow, .rightArrow, .slides").hover(function() {
			clearInterval(autoswitch);
		}, function() {
			autoswitch = setInterval(rightArrow, $("#AUTO_TIME").attr("value"));
		});
	}
	
});