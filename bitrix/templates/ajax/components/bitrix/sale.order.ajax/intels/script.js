$(document).ready(function(){
	
	// Text fields
	$(".basketContainer").on("click", "input.input-text, textarea", function() {
		if ($(this).val() == "Телефон" || $(this).val() == "E-mail" || $(this).val() == "Имя" || $(this).val() == "Адрес доставки" || $(this).val() == "Комментарий к заказу") {
			$(this).val("");
		}
	});
	$(".basketContainer").on("blur", "input.input-text, textarea", function() {
		if ($(this).val() == "") {
			$(this).val($(this).next().html());
		}
	});
	
	// Checkbox
	$(".basketContainer").on("click", ".input-checkbox", function() {
		$(this).children(".button").toggleClass("active");
		if ($(this).children(".button").hasClass("active")) {
			$(this).children("input").val("Y");
		} else {
			$(this).children("input").val("N");
		}
	});
	
	// Select
	$(".basketContainer").on("click", ".select .input-button", function() {
		$(this).siblings(".options").children(".hidden").slideToggle(100);
		$(this).toggleClass("up").toggleClass("down");
	});
	$(".basketContainer").on("click", ".select .options > .input-text", function() {
		$(this).siblings(".hidden").slideToggle(100);
		$(this).parent().siblings(".button").toggleClass("up").toggleClass("down");
	});
	$(".basketContainer").on("click", ".select .hidden .input-text", function() {
		$(this).parent(".hidden").slideToggle(100);
		$(this).parent(".hidden").parent(".options").siblings(".input-button").toggleClass("up").toggleClass("down");
		$(this).parent(".hidden").siblings(".input-text").html($(this).html());
		$(this).parent(".hidden").parent(".options").siblings("input").val($(this).parent(".hidden").siblings(".input-text").children(".hidden").html());
	});
	
	// Submit
	$(".basketContainer").on("submit", "#orderForm", function() {
		$(this).find("input.button").css("background-color", "#34B03A");	// Делает кнопку зеленой
		if ($("#ORDER_PROP_3").val() == $("#ORDER_PROP_3").next().html()) {
			$("#ORDER_PROP_3").val("");
		}
		if ($("#ORDER_PROP_1").val() == "" || $("#ORDER_PROP_1").val() == "E-mail") {	// Вставляет фейковый емейл, если пользователь не указал - необходимо, т.к. битрикс без емейла не пропускает никак
			$("#ORDER_PROP_1").css("color", "#fff");
			$("#ORDER_PROP_1").val("konstantin-ponizov@yandex.ru");
		}
		$.post(
			$(this).attr("action"),
			$(this).serialize(),
			function(data) {
				if ($(data).find("#orderComplite").is("#orderComplite")) {
					$(".not-m .basket-sm span.small").html("Пусто");
					$(".only-m .basket-sm .ajaxTaker").html("<span>Пусто</span>");
					$(".basket").remove();
					$(".basketTotal").remove();
				}
				$(".order").html($(data).find(".order").html());
			}
		);
		return false;
	});
	
});