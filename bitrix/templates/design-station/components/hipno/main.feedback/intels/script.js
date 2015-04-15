$(document).ready(function(){
	// submit
	$(".feedbackContainer").on("submit", ".feedbackForm", function() {
		$(".feedbackContainerLoading").show(); // показываем индикатор загрузки
		$.post(	
			$(this).attr('action'),
			$(this).serialize(),
			function(data) {
				$(".feedbackContainer").html($(data).find(".feedbackContainer").html());
				$(".feedbackContainerLoading").hide(); // прячем индикатор загрузки
			}
		);
		return false;
	});	
	
	// ok
	$(".feedbackContainer").on("click", "input.buttonOk", function() {
		$(".feedbackContainerLoading").show(); // показываем индикатор загрузки
		$.get(
			document.location.href,
			function(data) {
				$(".feedbackContainer").html($(data).find(".feedbackContainer").html());
				//$(".feedbackContainerOuter").hide(); // прячем форму обратной связи
			}
		);
		return false;
	});
	
});