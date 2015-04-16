/**
 * Created by Hipno on 19.02.14.
 */
function proccessEl(url){
    BX.ajax({
        url: url+'?ajax=y',
        method: 'GET',
        async: true,
        dataType:'html',
        processData: false,
        scriptsRunFirst: false,
        emulateOnload: true,
        start: true,
        cache: true,
        onsuccess: function(data){
            var product = $.parseHTML(data);
            product = $(product).filter('.response').find('.product');
            processResponseBasket(product);
            processResponseColors(product);
            ajaxAdd2Basket(product);
            ZOOM(product);

                product.modal({
                    Width:'45.882352941176470588235294117647%',
                    Height:'51%',
                    autoResize:false,
                    minWidth:'950px',

                    onShow: function(){

                        BX.closeWait();

                    }
                });



        },
        onfailure: function(){
        }

    });
}


function ZOOM(product){
    CloudZoom.quickStart();
    var w = product.find('.params').width();
    $( "<style> .zoom-zoom { width:"+ w +"px;z-index:1003;}</style>" ).appendTo( "head" );
    var $link =  product.find('.img figure a img');
    options = {}; // This would be your options object.
    $link.CloudZoom(options);


}

function processResponseBasket(product){
    window.qty = product.find(".add2basket .qty input.quantity");
    window.qty_con = product.find(".add2basket .qty");

    product.find(".add2basket .up").click(function() {
        newValue = $(this).parent().prev("input.quantity").attr("value") - 0 + 1;
        $(this).parent().prev("input.quantity").attr("value", newValue);
    });

    product.find(".add2basket .down").click(function() {
        var minqw = $(this).parent().parent().data().minqw;
        if ($(this).parent().prev("input.quantity").attr("value") == 1) {return;}
        if ($.isNumeric(minqw)) {
         if ($(this).parent().prev("input.quantity").attr("value") == minqw) {
             $(this).trigger('pleaseDont');
             return;
         }
        } 
        newValue = $(this).parent().prev("input.quantity").attr("value") - 1;
        $(this).parent().prev("input.quantity").attr("value", newValue);
    });
    warn_qtip(product.find('.add2basket .down'),qty_con);		
    qty.keyup(function(event) {
        var minqw = $(this).parent().data().minqw;
        if (event.keyCode != 8 && event.keyCode != 13 && event.keyCode != 46) {
            var qty = $(this).val().replace(/[^0-9]+/, "") - 0;
            if ($.isNumeric(minqw)) {
             if (qty < minqw) {
			// qty = minqw;
			 product.find('.add2basket .down').trigger('pleaseDont');
			 }
            }
            if (qty == 0) {qty = 1;}
            $(this).val(qty);
        }
    });

    qty.focusout(function() {
        var minqw = $(this).parent().data().minqw;
        var qty = parseInt($(this).val());
        if ($.isNumeric(minqw)) {
			if(qty < minqw) product.find('.add2basket .down').trigger('pleaseDont');
          if (qty <= minqw) { $(this).val(minqw);}
          if ($(this).val() == "") {$(this).val(minqw);}
        }
        if ($(this).val() == "") {$(this).val("1");}
    });

    product.find('.add2basket input[type=submit]').val('Добавить в корзину');
}

function processResponseColors(product){
    var colors = product.find('.colors .color');
    colors.each(function(i,el){
        $(this).qtip({
            content: {
                text: $(this).find('img').attr('alt')
            }
        });
    });

    colors.click(function() {
        if($(this).hasClass('active') == false) {
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
        }
        product.find(".add2basket .color-input").attr("value", $(this).children("input").attr("value"));
    });
}

function ajaxAdd2Basket(product){
    product.find('form.add2basket').submit(function(e){
        e.preventDefault();
        var minqw = qty_con.data().minqw;
        if ($.isNumeric(minqw)) {
            if(qty.val() < minqw){
                product.find('.add2basket .down').trigger('pleaseDont');
            }
            if (qty.val() <= minqw) { qty.val(minqw);}
            if (qty.val() == "") {qty.val(minqw);}
        }

        //good thoughts come after

        if($('.color-input').length == false){
            var id = parseFloat($(this).find('input[name=ELEMENT_ID]').val());
            var q=parseFloat($(this).find('input.quantity').val());

            var url = '/basket/process.php';

            BX.ajax({
                url: url,
                method: 'POST',
                data:{'ajaxaddid':id,'quantity':q,'ajaxaction':'add'},
                cache:true,
                onsuccess: function(data){
                    product.find('.basket-message')[0].innerHTML=$(data).filter('.basket-message').html();
                    $('.basket-sm')[0].innerHTML = $(data).filter('.basket-sm').html();

                },
                onfailure: function(){
                }

            });

            //  old thoughts
        } else {
            url = $(this).attr('action');
            var sendData = $(this).find('input[type=hidden],input.quantity');
            var amp = '&';
            for(i=0;i<sendData.length;i++){
                url += amp + $(sendData[i]).attr('name') + '=' + $(sendData[i]).val();
            }
            BX.showWait();
            BX.ajax({
                url: url,
                method: 'GET',
                async: true,
                dataType:'html',
                processData: false,
                scriptsRunFirst: false,
                emulateOnload: false,
                start: true,
                cache: true,
                onsuccess: function(data){
                    // add Message
                    var response = $($.parseHTML(data)).filter('.response');
                    product.find('.basket-message')[0].innerHTML=response.find('.basket-message').html();
                    // update count and price
                    var curTinyBasket = $('.basket-sm .tiny');
                    curTinyBasket[0].innerHTML = response.find('.basket-sm .tiny').html();

                    BX.closeWait();
                },
                onfailure: function(){

                }

            });
        }

    });
}