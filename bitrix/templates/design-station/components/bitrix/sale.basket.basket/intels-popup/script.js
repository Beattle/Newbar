$(document).ready(function(){
	
	var ajaxGo;
	function basketChange() {
		if (ajaxGo) {
			ajaxGo.abort();
		}
		ajaxGo = $.post(
			$(".basketForm").attr("action"),
			$(".basketForm").serialize(),
			function(data) {
				$(".basketContainer").html($(data).find(".basketContainer").html());
				$(".basket-sm span.small").html($(data).find(".basket-sm span.small").html());
				$(".only-m .basket-sm .ajaxTaker").html($(data).find(".only-m .basket-sm .ajaxTaker").html());
				$(".basket-message").html($(data).find(".basket-message").html());
			}
		);
	}
	
	// ARROWS
	$(".basketContainer").on("click", ".quantityChanger .up", function() {
		$(this).css("background-color", "#34B03A");
		newValue = $(this).siblings("input").val() - 0 + 1;
		$(this).siblings("input").val(newValue);
		basketChange();
	});
	
	$(".basketContainer").on("click", ".quantityChanger .down", function() {
		$(this).css("background-color", "#34B03A");
		if ($(this).siblings("input").val() == 1) {return false;}
		newValue = $(this).siblings("input").val() - 1;
		$(this).siblings("input").val(newValue);
		basketChange();
	});
	
	
	// QUANTITY INPUT
	$(".basketContainer").on("keyup", ".quantity", function() {
		if (event.keyCode != 8 && event.keyCode != 13 && event.keyCode != 46) {
			var qty = $(this).val().replace(/[^0-9]+/, "") - 0;
			if (qty == 0) {qty = 1;}
			$(this).val(qty);
		}
		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
			basketChange();
		}
	});
	
	$(".basketContainer").on("focusout", ".quantity", function() {
		if ($(this).val() == "") {
			$(this).val("1");
			basketChange();
		}
	});
	
	

	// DELETE
	$(".basketContainer").on("click", ".basket-delete .button", function() {
		$(this).addClass("close-on");
		$(this).siblings("input").val("Y");
		basketChange();
	});
	
	$(".basketContainer").on("click", ".basket-clear", function() {
		$(this).css("background-color", "#34B03A");
		$(".basket-delete input").val("Y");
		basketChange();
	});
	
});