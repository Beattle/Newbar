$(document).ready(function(){
		v = $("#fakeInput-mob").attr("value");
		$("#title-search-input-mob").click(function() {
			if ($("#title-search-input-mob").attr("value") == v) {
				$("#title-search-input-mob").attr("value", "");
			}
		});
		$("#title-search-input-mob").blur(function() {
			if ($("#title-search-input-mob").attr("value") == "") {
				$("#title-search-input-mob").attr("value", v);
			}
		});
});