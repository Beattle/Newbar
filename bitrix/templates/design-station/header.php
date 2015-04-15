<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
define("PATH_TO_404", "/404.php");
$home = 'others'; if ($APPLICATION->GetCurPage(false) === '/') $home = 'home';
?>
<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!-->
<html><!--<![endif]-->

<head>
	<title><?$APPLICATION->ShowTitle();?></title>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<!-- css -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/cell.css" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/fancy/jquery.fancybox.css?v=2.1.4" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/fancy/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/fancy/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
	<!-- js -->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.simplemodal.1.4.4.min.js"></script>
	
	<!--<script type="text/javascript" src="<?/*=SITE_TEMPLATE_PATH*/?>/js/jquery.mousewheel-3.0.6.pack.js"></script>-->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/fancy/jquery.fancybox.js?v=2.1.4"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/fancy/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
	
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/detectmobilebrowser.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/script.js"></script>

	<!--This script enables structural HTML5 elements in old IE. http://code.google.com/p/html5shim/-->
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?$APPLICATION->ShowHead();?>
  <?$APPLICATION->AddChainItem('Главная','/');?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-23982086-1', 'newbar.ru');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

  </script>
  
<script>
       var rrPartnerId = "5385d87f1e994405dca2c716";
       var rrApi = {}; 
       var rrApiOnReady = rrApiOnReady || [];
       rrApi.addToBasket = rrApi.order = rrApi.categoryView = rrApi.view = 
           rrApi.recomMouseDown = rrApi.recomAddToCart = function() {};
       (function(d) {
           var ref = d.getElementsByTagName('script')[0];
           var apiJs, apiJsId = 'rrApi-jssdk';
           if (d.getElementById(apiJsId)) return;
           apiJs = d.createElement('script');
           apiJs.id = apiJsId;
           apiJs.async = true;
           apiJs.src = "//cdn.retailrocket.ru/content/javascript/api.js";
           ref.parentNode.insertBefore(apiJs, ref);
       }(document));
</script>
  
</head>
<body lang="ru" class="<?=$home?>">
    <?php global $USER;
        if($USER->IsAdmin()){
            echo $uri;
        }
    ?>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<header class="mainHeader">
		<div class="line-1">
				<!-- logo -->
				<div class="logo2">

                    <div class="static">
                        <div class="logo-parent ghost">
                            <div class="in">
                                <a class="logo_link" href="/">
                                    <figure>
                                        <img class="logo" src="/bitrix/templates/design-station/img/logo.png" title="Design station" alt="Design station"  />
                                    </figure>
                                </a>
                            </div>
                        </div><!--
                        --><div class="contacts-link ghost">
                            <div class="in">
                                <a  href="/contacts" title="Контакты">
                                    <span>Контакты</span>
                                </a>
                            </div>
                        </div><!--
                        --><div class="sep"><div class="in">|</div></div><!--
                        --><div class="ghost del-pay">
                            <div class="in">
                                <a class="delivery-payment" href="/delivery-and-payment">
                                    <span>Доставка и оплата</span>
                                </a>
                            </div>
                        </div><!--
                        --><div class="sep"><div class="in">|</div></div><!--
                        --><div class="not-m  call-wrapper ghost">
                            <div class="in">
                                <div class="order-call">
                                    <a class="callback-link" title="Заказать звонок" href="javascript:void(0);">
                                        <span>Заказать звонок</span>
                                    </a>
                                    <div class="hidden">
                                        <form method="POST" id="callback" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <h2>Заявка<br>на обратный звонок</h2>
                                            <label>
                                                <b>Телефон <u>*</u></b>
                                                <input type="text" required="" name="phone">
                                            </label>
                                            <label>
                                                <b>Удобное время для звонка</b>
                                                <input type="text" placeholder="С 10 до 19 часов"  name="time">
                                            </label>
                                            <label>
                                                <b>Ваше имя</b>
                                                <input type="text" name="name">
                                            </label>
                                            <label>
                                                <b>Суть вашего вопроса</b>
                                                <textarea name="ask"></textarea>
                                            </label>
                                            <div class="submit">
                                                <button name="Submit" type="submit">Отправить</button>
                                                <div class="phone"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="static-right">
                        <div class='basket-h  ghost'>
                            <div class='basket-sm in'>
                                <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "intels", array(
                                        "PATH_TO_BASKET" => "/basket/",
                                        "PATH_TO_ORDER" => "/basket/"
                                    ),
                                    false
                                );?>
                            </div>
                        </div>
                        <div class="contacts ghost mar-m-r">
                            <div class="in">
                                <!--<p><a href="tel:+74957305924" id="ctPhone4">+7 (495) 730-59-24</a></p>-->
                                <p><a href="tel:+74953693360" id="new_phone">+7 (495) 369-33-60</a></p>
                                <p><a href="tel:+78001006812" id="fed-phone">+7 (800) 100-68-12</a></p>

                                <p id="free-call"><span>Звонок по России бесплатный</span></p>
                            </div>
                        </div>


                    </div>

                    <div class="search-wrapper not-m">
                                <?$APPLICATION->IncludeComponent("bitrix:search.title","intels-desktop",Array(
                                        // Основные параметры
                                        "NUM_CATEGORIES" => "3", // Количество категорий поиска в выпадающем списке
                                        "TOP_COUNT" => "10",	// Количество выводимых в каждой категории
                                        "ORDER" => "rank",		// Сортировка по дате или по релевантности
                                        "USE_LANGUAGE_GUESS" => "Y",	// Автоопределение раскладки клавиатуры
                                        "CHECK_DATES" => "Y",	// Искать только в активных по дате документах
                                        "SHOW_OTHERS" => "Y",	// Показывать категорию "прочее"
                                        "TEXT_INPUT" => "Поиск",	// Что будет написано в строке поиска

                                        // Шаблоны ссылок
                                        "PAGE" => "#SITE_DIR#search/index.php", // Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)

                                        // Дополнительно
                                        "SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
                                        "INPUT_ID" => "title-search-input",		// ID строки ввода поискового запроса
                                        "CONTAINER_ID" => "title-search",		// ID контейнера, по ширине которого будут выводиться результаты

                                        // Категория [номер_категории]
                                        "CATEGORY_0_TITLE" => "Каталог",	// Название категории в выпадающем списке
                                        "CATEGORY_0" => array("iblock_catalog"),		// Инфоблоки в которых будет происходить поиск
                                        "CATEGORY_0_iblock_catalog" => array("all"),	// Можно ограничивать поиск внутри инфоблока

                                        // Категория "прочее"
                                        "CATEGORY_OTHERS_TITLE" => "Прочее"		// Название для категории "прочее"
                                    )
                                );?>
                    </div>
				</div>
				</div>

		
		
		<!-- Телефоны -->
		<div class="line-2 not-m">
            <?$APPLICATION->IncludeComponent("hipno:menu.sections", ".default", array(
	"IS_SEF" => "Y",
	"SEF_BASE_URL" => "/catalog/",
	"SECTION_PAGE_URL" => "#SECTION_ID#/",
	"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#/",
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "1",
	"COL" => "UF_COL",
	"ROW" => "UF_ROW",
	"DEPTH_LEVEL" => "3",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000"
	),
	false
);
            ?>





		</div>
		 <!-- поиск, корзина и меню для мобильной версии -->
		<div class="only-m">
			<div class="panel button-group bg-3">

                <nav class="cell-m-50 ">
                    <a class="link-block pad  button  dropdown" href="/">Каталог</a>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "catalog-mobile",
                        Array(
                            "ROOT_MENU_TYPE" => "main",
                            "MAX_LEVEL" => "3",
                            "CHILD_MENU_TYPE" => "main",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array()
                        ),
                        false
                    );?>
                </nav>
				
				<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "intels-m", array(
					"PATH_TO_BASKET" => "/basket/",
					"PATH_TO_ORDER" => "/basket/"
					),
					false
				);?>



				<?$APPLICATION->IncludeComponent("bitrix:search.title","intels-mobile",Array(
					// Основные параметры
						"NUM_CATEGORIES" => "3", // Количество категорий поиска в выпадающем списке
						"TOP_COUNT" => "10",	// Количество выводимых в каждой категории
						"ORDER" => "rank",		// Сортировка по дате или по релевантности
						"USE_LANGUAGE_GUESS" => "Y",	// Автоопределение раскладки клавиатуры
						"CHECK_DATES" => "Y",	// Искать только в активных по дате документах
						"SHOW_OTHERS" => "Y",	// Показывать категорию "прочее"
						"TEXT_INPUT" => "Поиск",	// Что будет написано в строке поиска

					// Шаблоны ссылок
						"PAGE" => "#SITE_DIR#search/index.php", // Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
						
					// Дополнительно
						"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
						"INPUT_ID" => "title-search-input-mob",		// ID строки ввода поискового запроса
						"CONTAINER_ID" => "title-search-mob",		// ID контейнера, по ширине которого будут выводиться результаты

					// Категория [номер_категории] 
						"CATEGORY_0_TITLE" => "Каталог",	// Название категории в выпадающем списке
						"CATEGORY_0" => array("iblock_catalog"),		// Инфоблоки в которых будет происходить поиск
						"CATEGORY_0_iblock_catalog" => array("all"),	// Можно ограничивать поиск внутри инфоблока
					
					// Категория "прочее"
						"CATEGORY_OTHERS_TITLE" => "Прочее"		// Название для категории "прочее"
					)
				);?>

				

			</div>
		</div>
		<!-- меню для десктопной версии -->

		
	</header>
	<div class="header-fixed not-m"></div>
    <div class="work-section">