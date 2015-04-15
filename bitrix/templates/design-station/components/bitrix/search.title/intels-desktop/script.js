$(document).ready(function(){
/*		v = $("#fakeInput").attr("value");
		$(".input-text").click(function() {
			if ($("#title-search-input").attr("value") == v) {
				$("#title-search-input").attr("value", "");
			}
		});
		$(".input-text").blur(function() {
			if ($("#title-search-input").attr("value") == "") {
				$("#title-search-input").attr("value", v);
			}
		});
*/


    var sfield = $('#title-search-input');
    pv = sfield.val();
    sfield.focus(function(){
        $(this).val('');
    });
    sfield.blur(function(){
        $(this).val(pv);
    });

});