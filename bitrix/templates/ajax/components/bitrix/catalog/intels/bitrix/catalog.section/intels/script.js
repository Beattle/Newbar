$(document).ready(function() {
	
	$('.hover-block a.hover-link.fast').click(function(){
        var url = $(this).closest('article').find('> a').attr('href');
/*        $.ajax({
            url: url,
            cache: false,
            dataType:'html',
            success: function(response) {

           // result = $(response).find("#result");
              //  alert(response); // works as expected (returns all html)
               //  alert(result); // returns [object Object]*//**//*
                var product = $(response).filter('header');
                console.log(product);
            }*/

                //  });

            BX.ajax({
                url: 'url',
                method: 'GET',
                timeout: 30,
                async: true,
                dataType:'html',
                processData: false,
                scriptsRunFirst: false,
                emulateOnload: false,
                start: true,
                cache: false,
                onsuccess: function(data){
                },
                onfailure: function(){
                }

        });


    })
	
});