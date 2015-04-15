$(document).ready(function() {




    // we need to adjust zoom window but how? this version zoom doesnt support that. Ok, then EAT IT
    var w = $('.product2').width();
    $( "<style> .zoom-zoom { width:"+ w +"px}</style>" ).appendTo( "head" );
    if(jQuery.browser.mobile == false){
        CloudZoom.quickStart();
    }

/*    var pos = $('.product2').position();
    $('.zoom-zoom').waitUntilExists(function(){
       $(this).css({
           'left':pos.left,
           'top':pos.top
       })
    });*/

/*
    var h = 0;
   var imgs = $('.product .thumbs img');
    for(i=0,l = imgs.length;i<l;i++){
        h += $(imgs[i]).height();
        $(imgs[i]).attr('data-height',h);
    }
    imgs.css({
        'height':h/imgs.length
    });
*/

    var lis  = $('.thumbs .row ul li');
    if(lis.length > 3){
        $('.thumbs .row').jCarouselLite({
            btnNext: ".next",
            btnPrev: ".prev",
            circular: false
        });
    }

    // fixing carousel
/*    var cont_wid = $('.thumbs').outerWidth();
    var els_width = lis.outerWidth()*3;
    var margin = parseInt((cont_wid-els_width)/3/2);
   lis.css({
       'margin-left':margin+'px',
       'margin-right':margin+'px'
   });
    lis.parent().width(lis.outerWidth(true)*lis.length);*/

/*    $('.thumbs button.next').click(function(){
        console.log(lis.parent().css('left'));
        console.log(lis.parent().outerWidth()-els_width);

        if(lis.parent().css('left') == -els_width){
            console.log('stop');
        }
        lis.parent().css({
            'left':'-='+lis.outerWidth(true)
        });
    });
    lis.closest('.prev').click(function(){

    });*/




	// POPUP Окно
/*	function popupProduct(object){
             
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
   });*/

	
	
	// Карточка товара
    var $ths = $(".thumbs .button");
    $ths.filter(':first-child').addClass('active');
	$ths.click(function(){
        $(this).addClass('active');
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

    var qty = $(".add2basket .qty input.quantity");
	var qty_con = $(".add2basket .qty");
	var minqw = qty.parent().data().minqw;

    $(".add2basket .up").click(function() {
		var qty = $(this).closest('.qty');
        var newValue = $(this).parent().prev("input.quantity").attr("value") - 0 + 1;
        $(this).parent().prev("input.quantity").attr("value", newValue);
    });
    var down = $(".add2basket .down");
    down.click(function() {
		var qty = $(this).closest('.qty');        
        if ($(this).parent().prev("input.quantity").attr("value") == 1) {return;}		
        if ($.isNumeric(minqw)) {             
         if ($(this).parent().prev("input.quantity").attr("value") == minqw) {
			$(this).trigger('pleaseDont');
			return;
		 } else {
			}
        } 
        var newValue = $(this).parent().prev("input.quantity").attr("value") - 1;
        $(this).parent().prev("input.quantity").attr("value", newValue);
    });
	warn_qtip(down,qty_con);

    qty.keyup(function(event) {        
        if (event.keyCode != 8 && event.keyCode != 13 && event.keyCode != 46) {
            var qty = $(this).val().replace(/[^0-9]+/, "") - 0;
            if ($.isNumeric(minqw)) {
				if(qty < minqw){ down.trigger('pleaseDont'); }
             // if (qty <= minqw) {qty = minqw;}
            }
            if (qty == 0) {qty = 1;}
            $(this).val(qty);
        }
    });

	// warn_qtip(qty, qty_con)

    qty.focusout(function() {
		    if ($.isNumeric(minqw)) {
				console.log(qty.val());
				if(qty.val() < minqw){ down.trigger('pleaseDont'); }
                if (qty.val() <= minqw) {qty.val(minqw); }
            }
        if ($(this).val() == "") {$(this).val("1");}
    });

//	warn_qtip($('#leave-me-alone'),$('#leave-me-alone'))
	$(".add2basket").submit(function(e) {        
        if ($.isNumeric(minqw)) {
            if(qty.val() < minqw){
                var check = true;
            }
            if (qty.val() <= minqw) { qty.val(minqw);}
            if (qty.val() == "") {qty.val(minqw);}
        }

            var name = $('.product .box > h1').text();
            var id = parseFloat($(this).find('input[name=id]').val());
            var q=parseFloat($(this).find('input.quantity').val());
            var obj = {'ajaxaddid':id,'quantity':q,'ajaxaction':'add'};
            var bm = $(this).next('.basket-message');
            if($('.color-input').length != false){
                obj['color'] = $(this).find('.color-input').val();
            }
                var url = '/basket/process.php';

                $.ajax({
                    url: url,
                    method: 'POST',
                    data:obj,
                    cache: true,
                    success: function(data){
                        bm.html($(data).filter('.basket-message').html());
                        $('.basket-sm').html($(data).filter('.basket-sm').html());
                        console.log($(data));
                        var $modal = $(data).filter('#container');
                       var leave_me = $modal.find('#leave-me-alone');
                        if (check !== undefined) {
                            leave_me.qtip({
                                overwrite:false,
                                show:{
                                    ready:true,
                                    event:false
                                },
                                hide:{
                                    event:false,
                                    inactive:2000
                                },
                                content:{
                                    text:$('.warn-tip').clone()
                                },
                                position:{
                                    my: 'top center',
                                    at: 'bottom center',
                                    target:leave_me
                                }
                            })
                        }
                        $modal.modal({
                            close:true,
                            onShow:function(){
                                leave_me.click(function(){
                                $.modal.close();
                                });
                            },
                            onClose:function(){
                                $('.qtip').hide();
                                $.modal.close();
                            }


                        })
                    }
                });

		$(".intoCart").css("background-color", "#34B03A");
	//	basketAjax = $.post(
/*			$(".add2basket").attr("action"),
			$(".add2basket").serialize(),
			function(data) {
				$(".basket-message").html($(data).find(".basket-message").html());
				$(".intoCart").css("background-color", "#ff8c26");
				$(".not-m .basket-sm span.small").html($(data).find(".basket-sm span.small").html());
				$(".only-m .basket-sm .ajaxTaker").html($(data).find(".only-m .basket-sm .ajaxTaker").html());
				$(".basketContainer").html($(data).find(".basketContainer").html());
			}
		);*/
            e.preventDefault();
           // location.reload();
 //        }


	});

});

