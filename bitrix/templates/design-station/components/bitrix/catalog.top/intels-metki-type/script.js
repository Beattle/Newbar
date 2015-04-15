$(document).ready(function() {

    var qv = $('.hover-block span.hover-link.fast');
    var add = $('.hover-block a.hover-link.add');
    if(jQuery.browser.mobile == true){
        qv.remove();
        add.remove();
    }

	qv.click(function(){
        BX.showWait();
        var href = $(this).parent().prev('a').attr('href');
        var url = '/bitrix/templates/ajax/js/fast-view.js';
        $.ajax({
            url: url,
            dataType: "script",
            method:'GET',
            success:function(){
                proccessEl(href)
            }
        });
    });

    add.click(function(e){
        BX.showWait();
        var name = $(this).parent().siblings('h3').children('a').removeClass();

        e.preventDefault();
        var id = parseFloat($(this).attr('data-id'));
        var obj = {'ajaxaddid':id,'ajaxaction':'add'};
        var url = '/basket/process.php';


        $.ajax({
            url: url,
            method: 'POST',
            data:obj,
            cache: true,
            success: function(data){
                $('.basket-sm').html($(data).filter('.basket-sm').html());

                var $modal = $(data).filter('#container').prepend('<p>Товар '+name.prop('outerHTML')+'<br/> Добавлен в корзину</p>');
                $modal.modal({
                    close:false,
                    onShow:function(){
                        BX.closeWait();
                        $modal.find('#leave-me-alone').click(function(){
                            $.modal.close();
                        })
                    }
                })
            }
        });
    });
});
