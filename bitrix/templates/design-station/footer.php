<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
</div>
<footer class="row small">


    <? if ($APPLICATION->GetCurPage(false) === '/'): ?>
        <div class="row pad-t seo-text vpad ">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "/bitrix/templates/design-station/includes/index-text-left.php",
                    "EDIT_TEMPLATE" => "standard.php"
                )
            );?>
        </div>
    <? endif; ?>
    <div class="list-menu cell-d-100 cell-t-100 cell-m-100">
        <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH."/includes/menu-list.php",
                "EDIT_TEMPLATE" => "standard.php"
            ),
            false
        );?>
    </div>
  <div class="copy-cont row">
      <div class="copy cell-m-100"> 					<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/includes/footer_description.php",
		"EDIT_TEMPLATE" => "standard.php"
	)
);?> 					 
       <!-- <p>Разработка сайта &mdash; <a href="http://intels.pro" target="_blank" >INTELS&nbsp;production</a></p>-->
       				</div>
   		</div>
        <div class="social mar-t">
            <a class="vk" title="Мы вконтакте" target="_blank" href="http://vk.com/dizainstation"></a>
            <a class="fb" title="Мы в фейсбуке" target="_blank" href="https://www.facebook.com/dizainstation/"></a>
            <a class="gp" title="Гугл плюс" target="_blank" href="https://plus.google.com/‎"></a>
            <a class="tw" title="Твитер" target="_blank" href="https://twitter.com/"></a>
            <a class="jj" title="Живой журнал" target="_blank" href="http://www.livejournal.com/"></a>
            <div class="left-info">
                <!--LiveInternet counter--><script type="text/javascript"><!--

                    document.write("<a href='http://www.liveinternet.ru/click' "+

                        "target=_blank><img src='//counter.yadro.ru/hit?t14.12;r"+

                        escape(document.referrer)+((typeof(screen)=="undefined")?"":

                        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?

                            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+

                        ";"+Math.random()+

                        "' alt='' title='LiveInternet: показано число просмотров за 24"+

                        " часа, посетителей за 24 часа и за сегодня' "+

                        "border='0' width='88' height='31'><\/a>")

                    //--></script><!--/LiveInternet-->

                <a href="http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2508/*http://market.yandex.ru/shop/7147/reviews"><img src="http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2505/*http://grade.market.yandex.ru/?id=7147&action=image&size=0" border="0" width="88" height="31" alt="Читайте отзывы покупателей и оценивайте качество магазина на Яндекс.Маркете" /></a>
            </div>

        </div>
    <a class="back-to-top" href="javascript:void(0)">Наверх</a>
    <script type="text/javascript">
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.back-to-top').fadeIn(duration);
            } else {
                jQuery('.back-to-top').fadeOut(duration);
            }
        });

        jQuery('.back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    </script>
 	</footer>
<!--noindex-->

<!--/noindex-->

<!-- Yandex.Metrika counter -->
 
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter20869261 = new Ya.Metrika({id:20869261,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
 <noscript> 
  <div><img src="//mc.yandex.ru/watch/20869261" style="position:absolute; left:-9999px;"  /></div>
 </noscript> 
<!-- /Yandex.Metrika counter --><!-- Был UA-5833282-1 -->

<!-- Код тега ремаркетинга Google -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1011585190;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1011585190/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Конец Код тега ремаркетинга Google -->
 
<script type="text/javascript"><!-- /* build:::5 */ -->
	var liveTex = true,
		liveTexID = 42100,
		liveTex_object = true;
	(function() {
		var lt = document.createElement('script');
		lt.type ='text/javascript';
		lt.async = true;
		lt.src = 'http://cs15.livetex.ru/js/client.js';
		var sc = document.getElementsByTagName('script')[0];
		sc.parentNode.insertBefore(lt, sc);
	})();
</script>

<!-- veinteractive.com -->
<!--<script src="//config1.veinteractive.com/tags/A49C687B/8D88/45AA/AD67/48D3C01F4A30/tag.js" type="text/javascript" async></script>-->
	</body>
</html>