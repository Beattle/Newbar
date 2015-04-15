$(document).ready(function() {
	
	$(".slides > .slideContainer:eq(0)").show(); // Включает первый слайдер
	response();	// Меняет высоту и ширину слайдера под родителя, а так же высоту и положение стрелок
	$(window).resize(function() {	// При изменении ширины окна браузера меняет высоту и ширину слайдера
		response();
	});
	
	// Запускает автопереключение слайдера
	if ($("#USE_AUTO").attr("value") == "Y") {var autoswitch = setInterval(rightArrow, $("#AUTO_TIME").attr("value"));}	
	
	// Изменение размеров слайдера, размеров и положения стрелок
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
	
	// Переключение стрелками
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
	
	
	// Переключение свитчером
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
	
	
	// При наводе мышки на слайд, стрелки или свитчер тормозит автопрокрутку
	if ($("#USE_AUTO").attr("value") == "Y") {
		$(".switcher, .leftArrow, .rightArrow, .slides").hover(function() {
			clearInterval(autoswitch);
		}, function() {
			autoswitch = setInterval(rightArrow, $("#AUTO_TIME").attr("value"));
		});
	}
	
});