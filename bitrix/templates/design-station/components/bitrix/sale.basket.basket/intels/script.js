$(document).ready(function(){
	
	var ajaxGo;
	function basketChange(obj) {
        BX.showWait();
		ajaxGo = $.ajax({
            url:'/basket/process.php',
            type:'POST',
            cache:true,
            data:obj,
            success:function(data){
                $('.basket-sm').html($(data).filter('.basket-sm').html());

                if(obj.removeAll || !$(data).filter('.total-price').length){
                    $('.basketContainer').html('' +
                        '<section class="basket mar-t row">' +
                        '<header class="row vpad">' +
                        '<h1>Корзина</h1>' +
                        '</header>' +
                        '<h2>В корзине ничего нет</h2>' +
                        '</section>');
                } else{
                    if($(data).filter('.sum-price').length){
                        var newsum = $(data).filter('.sum-price');
                        $('#'+newsum.attr('id')).html(newsum[0].innerHTML);
                    }


                    if(obj.ajaxaction == 'delete'){

                        $('#'+obj.basketid).closest('article').remove();
                    }
                    $('.total-price').html($(data).filter('.total-price').html());
                }



                BX.closeWait();
            }
        });
	}
	
	var bskcon =  $('.basketContainer'); 
	// ARROWS
    
	bskcon.on("click", ".quantityChanger .qty-ch .up", function() {
		// $(this).css("background-color", "#34B03A");
		var newValue = parseFloat($(this).parent().siblings("input").val()) + 1;
		$(this).parent().siblings("input").val(newValue);
        var id = $(this).closest('.quantityChanger').prev().find('#PASS-ID').val();
        var  obj = {'basketid':id,'ajaxaction':'update','quantity':newValue};
		basketChange(obj);
	});
	
	bskcon.on("click", ".quantityChanger .qty-ch .down", function() {
		if ($(this).parent().siblings("input").val() == 1) {return;}
    var minqw = $(this).parent().parent().data().minqw;
    if ($.isNumeric(minqw)) {
      if ($(this).parent().siblings("input").attr("value") == minqw) {
		$(this).trigger('pleaseDont');
		return;
		}
    } 
		newValue = parseFloat($(this).parent().siblings("input").val()) - 1;
		$(this).parent().siblings("input").val(newValue);
        var id = $(this).closest('.quantityChanger').prev().find('#PASS-ID').val();
        var  obj = {'basketid':id,'ajaxaction':'update','quantity':newValue};
		basketChange(obj);
	});

	var down = $(".quantityChanger .qty-ch .down");
	var q = $('.quantity');
	warn_qtip(down,q);
	
	
	// QUANTITY INPUT
	bskcon.on("keyup", ".quantity", function(event) {
    var minqw = $(this).parent().data().minqw;
		if (event.keyCode != 8 && event.keyCode != 13 && event.keyCode != 46) {
			var qty = parseFloat($(this).val());
      if ($.isNumeric(minqw)) {
       // if (qty <= minqw) {qty = minqw;}
      }
			if (qty == 0) qty = 1;
			    $(this).val(qty);
		}
		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
            var id = $(this).closest('.quantityChanger').prev().find('#PASS-ID').val();
            var  obj = {'basketid':id,'ajaxaction':'update','quantity':qty};
            delay(function(){
                basketChange(obj);
            }, 400 );
		}
	});
	
	bskcon.on("focusout", ".quantity", function() {
    var minqw = $(this).parent().data().minqw;
    var qty = parseFloat($(this).val());
    if ($.isNumeric(minqw)) {
		if(qty < minqw) $('.quantityChanger .qty-ch .down').trigger('pleaseDont');
      if (qty <= minqw) {
        $(this).val(minqw);
        var id = $(this).closest('.quantityChanger').prev().find('#PASS-ID').val();
        var  obj = {'basketid':id,'ajaxaction':'update','quantity': minqw};
			  basketChange(obj); 
      }
    }
		if ($(this).val() == "") {
      q = 1;
			if ($.isNumeric(minqw)) { 
        $(this).val(minqw);
        q = minqw;
      } else {
        $(this).val("1");
      }
      var id = $(this).closest('.quantityChanger').prev().find('#PASS-ID').val();
      var  obj = {'basketid':id,'ajaxaction':'update','quantity':q};
			basketChange(obj);
		}
	});
	
	

	// DELETE
	bskcon.on("click", ".basket-delete .button", function() {
        var id = $(this).parent().siblings('.properties').find('#PASS-ID').val();
        var obj = {'basketid':id,'ajaxaction':'delete'};
		basketChange(obj);
	});
	
	bskcon.on("click", ".basket-clear", function() {
        var obj = {};
        obj['removeAll'] = true;
		basketChange(obj);
	});
	
});

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();