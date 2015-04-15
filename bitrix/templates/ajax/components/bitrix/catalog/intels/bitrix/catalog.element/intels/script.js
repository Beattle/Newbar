$(document).ready(function() {
    alert('robot');

	// POPUP Окно
	function popupProduct(object){
             
         // Если всплывающее окно уже было открыто ранее - определяем его по ранее присвоенному id
         if ($(object).attr("for")) {
                var popup = $("#"+$(object).attr("for"));
         // Если открываем впервые - перемещаем всплывающее окно в конец body
         } else {
                // присваиваем уникальный id окну
                var popupId = "popup" + Math.floor(Math.random()*10000000000);
                $(object).attr("for", popupId);
                // осуществляем перемещение
                var popup = $("#product-popup").attr("id", popupId);
                popup.detach();
                $("body").append(popup);
         }
         
         // Показываем всплывающее окно и задаем ему стили
         popup.css("position", "absolute").css("z-index", "999").css("top", 0).css("left", 0).css("width", "100%");
         popup.children("div").css("background-color", "#fff");
         popup.height($("body").height());
         popup.children().css("position", "relative").css("top", $(window).scrollTop() + 200 + "px");
         popup.fadeIn(100);
         
         // Запрещаем сквозной клик через элементы внутри окна
         $("body, div").on("click", "*[id^='popup'] *", function(e){
                e.stopPropagation();
         });
         //return false;
   }
   // Закрытие всплывающего окна
   $("body, div").on("click", ".popupProduct-close", function(){
         var popup = $(this);
         if (popup.parents().is("*[id^='popup']")) {
                popup = popup.parents("*[id^='popup']");
         }
         popup.fadeOut(100);
         return false;
   });
	
	
	
	// Карточка товара
	$(".thumbs .button").click(function(){
		$(".img figure").hide().eq($(".thumbs .button").index(this)).show();
		return false;
	});
	
	if ($(".colors .button-group > div").width() / ($(".colors .button-group > div > div").length*53) > 1) {
		$(".colors .dropdown").hide();
	}
	
	$(".colors .dropdown").click(function(){
		$(this).siblings(".button-group").css("max-height", "1000px");
		$(this).hide();
		return false;
	});
	
	
	
	$(".colors .button").click(function() {
		$("#color").html($(this).children(".colorHolder").children("img").attr("alt"));
		$(".add2basket .color-input").attr("value", $(this).children("input").attr("value"));
	});
	
	$(".add2basket .up").click(function() {
		newValue = $(this).siblings("input").attr("value") - 0 + 1;
		$(this).siblings("input").attr("value", newValue);
	});
	
	$(".add2basket .down").click(function() {
    //alert('1');
		if ($(this).siblings("input").attr("value") == 1) {return false;}
		newValue = $(this).siblings("input").attr("value") - 1;
		$(this).siblings("input").attr("value", newValue);
        alert('console.log');
	});
	
	$(".add2basket .quantity").keyup(function() {
		if (event.keyCode != 8 && event.keyCode != 13 && event.keyCode != 46) {
			var qty = $(this).val().replace(/[^0-9]+/, "") - 0;
			if (qty == 0) {qty = 1;}
			$(this).val(qty);
		}
	});
	
	$(".add2basket .quantity").focusout(function() {
		if ($(this).val() == "") {$(this).val("1");}
	});
	
	$(".add2basket").submit(function() {
		$(".intoCart").css("background-color", "#34B03A");
		basketAjax = $.post(
			$(".add2basket").attr("action"),
			$(".add2basket").serialize(),
			function(data) {
				$(".basket-message").html($(data).find(".basket-message").html());
				$(".intoCart").css("background-color", "#ff8c26");
				$(".not-m .basket-sm span.small").html($(data).find(".basket-sm span.small").html());
				$(".only-m .basket-sm .ajaxTaker").html($(data).find(".only-m .basket-sm .ajaxTaker").html());
				popupProduct($(".popupProduct"));
				$(".basketContainer").html($(data).find(".basketContainer").html());
			}
		);
		return false;
	});
	
});