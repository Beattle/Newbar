$(document).ready(function() {
	
	$('.fancybox').fancybox();
	
	// POPUP Окно
	function popup(object){
             
         // Если всплывающее окно уже было открыто ранее - определяем его по ранее присвоенному id
         if ($(object).attr("for")) {
                var popup = $("#"+$(object).attr("for"));
         // Если открываем впервые - перемещаем всплывающее окно в конец body
         } else {
                // присваиваем уникальный id окну
                var popupId = "popup" + Math.floor(Math.random()*10000000000);
                $(object).attr("for", popupId);
                // осуществляем перемещение
                var popup = $(object).next().attr("id", popupId);
                popup.detach();
                $("body").append(popup);
         }
         
         // Показываем всплывающее окно и задаем ему стили
         popup.css("position", "absolute").css("z-index", "999").css("top", 0).css("left", 0).css("width", "100%");
         popup.children("div").css("background-color", "#fff");
         popup.height($("body").height()+1000);
         popup.children().css("position", "relative").css("top", $(window).scrollTop() + 200 + "px");
         popup.fadeIn(100);
         
         // Запрещаем сквозной клик через элементы внутри окна
         $("body, div").on("click", "*[id^='popup'] *", function(e){
                e.stopPropagation();
         });
         //return false;
   }
   
	// Закрытие всплывающего окна
	$("body, div").on("click", ".popup-close", function(){
		var popup = $(this);
		if (popup.parents().is("*[id^='popup']")) {
			popup = popup.parents("*[id^='popup']");
		}
		popup.fadeOut(100);
		return false;
	});
	
	// Открытие всплывающего окна
	$(".popup-footer").click(function() {
		popup($(".popup-footer"));
		return false;
	});
	$(".popup-footer2").click(function() {
		popup($(".popup-footer2"));
		return false;
	});
	$(".popup-footer3").click(function() {
		popup($(".popup-footer3"));
		return false;
	});
	$(".popup-question1").click(function() {
		popup($(".popup-question1"));
		return false;
	});
	$(".popup-question2").click(function() {
		popup($(".popup-question2"));
		return false;
	});
	$(".popup-delivery1").click(function() {
		$.post(
			$(this).attr("href"),
			function(data) {
				$(".ajax-catcher-delivery").html($(data).filter("section").html());
			}
		);
		popup($(".popup-delivery1"));
		return false;
	});
/*	$(".popup-delivery2").click(function() {
		$.post(
			$(this).attr("href"),
			function(data) {
				$(".ajax-catcher-delivery").html($(data).filter("section").html());
			}
		);
		popup($(".popup-delivery2"));
		return false;
	});*/
/*	$(".popup-payment1").click(function() {
		$.post(
			$(this).attr("href"),
			function(data) {
				$(".ajax-catcher-payment").html($(data).filter("section").html());
			}
		);
		popup($(".popup-payment1"));
		return false;
	});*/
/*	$(".popup-payment2").click(function() {
		$.post(
			$(this).attr("href"),
			function(data) {
				$(".ajax-catcher-payment").html($(data).filter("section").html());
			}
		);
		popup($(".popup-payment2"));
		return false;
	});*/
	
	
	
	$(".button").click(function(){
		if ($(this).parentsUntil(".button-group-break").is(".button-group")){
			if ($(this).hasClass("active")) {
				if (!$(this).hasClass("radio")) {
					$(this).removeClass("active");
				}
			} else {
				$(this).parents(".button-group").find(".button").removeClass("active");
				$(this).addClass("active");
			}
			return false;
		} else {
			if (!$(this).hasClass("reverse")) {
				$(this).toggleClass("active");
			}
		}
	});
	
	$(".dropdown").click(function() {
		if ($(this).parentsUntil(".button-group-break").is(".button-group")){
			if ($(this).next().is(":visible")) {
				if (!$(this).hasClass("radio")) {
					$(this).next().slideUp("fast");
				}
			} else {
				$(this).parents(".button-group").find(".dropdown").next().slideUp("fast");
				$(this).next().slideDown("fast");
			}
		} else {
			$(this).next().slideToggle("fast");
		}
		return false;
	});
	
	$(".accordion-next").click(function(){
		$(this).parent().next().children().hide().eq($(".accordion-next").index(this)).show();
		return false;
	});
	$(".accordion-prev").click(function(){
		$(this).parent().prev().children().hide().eq($(".accordion-prev").index(this)).show();
		return false;
	});
	



    //bg images
    if(jQuery.browser.mobile == false){
    var cats = $('.sections  section article a');
        cats.each(function(){
           var img = $(this).find('figure img');
           var path =   img.attr('src');
           if(path.indexOf('cats') != -1){
               var filename = path.replace(/^.*[\\\/]/, '');
               var catpath =  path.substring(0, path.lastIndexOf("/"));
               var pathblue = catpath+'/blue/'+filename;
               var extra_img = $('<img alt=""  class="blue" src="'+pathblue+'" />');
               extra_img.insertAfter(img);
               hoverBlue($(this),img,extra_img)
           } else if(img.next('.blue').length){
                    extra_img = img.filter('.blue');
                    img = img.filter('.normal');
                  //  extra_img.hide();
                    hoverBlue($(this),img,extra_img);
           } else{
               return false;
           }
           return true; // for IDE
        });
    }

    function hoverBlue($this,img,extra_img){
        $this.hover(function(){
            img.finish().fadeOut('normal');
            extra_img.finish().fadeIn('normal',function(){
                $(this).css('display','inline-block');
            });
        },function(){
            extra_img.finish().fadeOut('fast');
            img.finish().fadeIn('fast');
        })
    }



    // popup menu for descktop
    $(".not-m nav .hover").hover(function(){
        if (!$(this).children(".dropdown").hasClass("active")) {
            $(this).children(".dropdown").addClass("active").parent().find('ul.top').slideDown("fast");
        }
    }, function(){
        if ($(this).children(".dropdown").hasClass("active")) {
            $(this).children(".dropdown").removeClass("active").parent().find('ul.top').stop().slideUp("fast");
        }
    });






    $(".order-call .callback-link ").click(function(){
        $(this).parent().find('form#callback').modal({
            minWidth:380,
            closeHTML: "<a href='javascript:void(0);' title='Закрыть'></a>"
        });
    });

    $('.order-call #callback').submit(function(e){
        e.preventDefault();
        submitCallback($(this));

    });

    function submitCallback(form){
        var message = '';
        var phone = form.find('input[name=phone]');
        var time = form.find('input[name=time]');
                if( phone.val() == ''){
                    message = 'Телефон  не заполнен';
                    alert(message);
                    return;
                }
                 if(time.val() == ''){
                     var time_text = time.prop('placeholder');
                     time.remove();
                 }

        var s_string = form.serialize();

                if(time_text != undefined )
                    s_string +='&time='+encodeURIComponent(time_text);

        if(s_string){
            $.ajax({
                url: '/mail/mail.php',
                type: 'post',
                data: s_string,
                success: function() {
                    alert('Ваше сообщение отправлено');
                }
            });
        }else{
            alert('Произошла ошибка при отправки почты');
        }

    }




	
	$(".descr .more").click(function(){
		$(this).parent().parent().children(".hidden").slideToggle();
		return false;
	});
	
	
	$(".products .labels div").click(function(){
		if (!$(this).hasClass("active")) {
			$(".products section").hide();
			$(".products .active").removeClass("active");
			$(this).addClass("active");
			$(".products section:eq(" + $(this).index() + ")").show();
		}
	});




	
});

function warn_qtip($obj, $parent){
	if($('.warn-tip').length == 0){
	var $tip_text = $parent.next('.warn-tip').clone();
	} else {
		var $tip_text =  $('.warn-tip').clone();
	}
    
    $obj.qtip({
        overwrite: false,
        content: {
            text: $tip_text
        },
        show:{
            // ready:true,
            event: 'pleaseDont'
        },
        hide:{
            event:false,
            inactive:2000
        },
        position:{
            my: 'top center',
            at: 'bottom center',
            target:$parent
        }
    });
    // console.log('Объект создан')
    // $obj.qtip('destroy');
}