<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// html оболочка и кнопка "сначала дешевые"

if(isset($_GET['sort'])) {
    if ($_GET["method"] == "asc") {
        $sortAscActive = "active";
    } elseif($_GET["method"] == "desc") {
        $sortDescActive = "active";
    }
}


echo "<div class=\"products mar-t\">";
		if ($arResult["ITEMS"]) {
			echo "<div class=\"sort\">
					<a class=\"border-radius link-block  button  reverse input-button small {$sortDescActive}\" href=\"{$arResult["SECTION_PAGE_URL"]}?sort=catalog_PRICE_1&method=desc\"> <span class='sep'>&nbsp;&nbsp;/</span>&nbsp;&nbsp;Сначала дорогие</a>
					<a class=\"border-radius link-block  button  reverse input-button small {$sortAscActive}\" href=\"{$arResult["SECTION_PAGE_URL"]}?sort=catalog_PRICE_1&method=asc\">Сначала дешевые</a>
				</div>";
		}
		echo "<section class=\"row first-item\">";
		
		
	// Перебираем товары
	foreach ($arResult["ITEMS"] as $key => $arElement) {
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		echo "<article class=\"cell-t-16 bg-1 button  \" id=\"{$this->GetEditAreaId($arElement['ID'])}\">";
		echo "<a class=\"row link-block pad vpad small\" href=\"{$arElement["DETAIL_PAGE_URL"]}\">
				<h3>{$arElement["NAME"]}</h3>";
				echo "
				<figure>";
					if ($arElement["PROPERTIES"]["MARKS"]["VALUE"]) {
						echo "<div class=\"mark\">";
						foreach ($arElement["PROPERTIES"]["MARKS"]["VALUE"] as $arMark) {
							echo "<div class=\"pad small bg-4 cell-m-auto input-button\"><span>{$arMark}</span></div>";
						}
						echo "</div>";
					}
					echo "<img src=\"{$arElement["PREVIEW_PICTURE"]["SRC"]}\" />
				</figure>";

/*		foreach ($arElement["DISPLAY_PROPERTIES"] as $keyProp => $arProperty) {
			if ($keyProp != "ON_SALE" AND $keyProp != "LIDER_OF_SALES" AND $keyProp != "NOVELTY") {
				echo "<p class=\"param\">{$arProperty["NAME"]}:<br />{$arProperty["DISPLAY_VALUE"]}</p>";
			}
		}*/
		echo "</a>
            <p class=\"price pad h2\">";
            if ($arElement["PRICES"]["BASE"]["PRINT_VALUE"] != 0) {
                echo "<span class='price'>{$arElement['PRICES']['BASE']['PRINT_VALUE']}</span>";
            } else {
                echo "<span class='price'>Цена по запросу</span>";
            }
            if(empty($arElement['PROPERTIES']['POSTAVKA']['VALUE'])){
                echo '<span class="unknown">не известно</span>';
            } else{
                switch(strpbrk($arElement['PROPERTIES']['POSTAVKA']['VALUE'], '0123456789')){
                    case false:$spanClass = 'available';
                        break;
                    default:$spanClass = 'wait-days';
                }
                echo "<span class='{$spanClass}'>{$arElement['PROPERTIES']['POSTAVKA']['VALUE']}</span>";

            }

        echo "</p>";?>
        <div class="hover-block">
            <noindex>
                <a class="hover-link add" href="<?echo $arElement["ADD_URL"]?>" rel="nofollow"><span class="add">Купить</span></a>
                <a class="hover-link fast" href="javascript:void(0)" rel="nofollow>">Быстрый просмотр</a>
            </noindex>
        </div>

		<? echo "</article>";
		if (($key+1)%6 == 0 AND $key != 0) {
			echo "</section><section class=\"row\">";
		}
	}
echo "</section>	
	</div>";
?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <p><?=$arResult["NAV_STRING"]?></p>
<?endif?>

<nav class="bg-1 row ">
    <div class="mar-t">
        <ul class="pad cell-m-100 cell-t-50 cell-d-25">

            <li><a href="/news/" >Новости</a></li>
            <li><a href="/lidersofsale/" >Лидеры продаж</a></li>
            <li><a href="/onsale/" >Распродажа</a></li>
            <li><a href="/novelties/" >Новинки</a></li>
        </ul>

        <ul class="pad cell-m-100 cell-t-50 cell-d-25">
            <li><a href="/ourclients/" >Наши клиенты</a></li>
            <li><a href="/" >Комплексное оснащение</a></li>
            <li><a href="/"> Дизайн </a> </li>
            <li><a href="/" >Часто задаваемые вопросы</a></li>
        </ul>

        <ul class="pad cell-m-100 cell-t-50 cell-d-25">
            <li><a href="/" >Выставочный зал</a></li>
            <li>
                <a class="popup-footer3" href="#" >Заказать бесплатные образцы</a>
                <div class="popup-close bg-darker hidden">
                    <div class="cell-m-90 mar-m-5 cell-t-50 mar-t-25 pad vpad">
                        <div class="feedbackClose popup-close"></div>

                        <h2>Заказать бесплатные образцы</h2>

                        <p><b>Звоните прямо сейчас:</b> +7(495)730-59-24 многоканальный</p>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.feedback",
                            "intels",
                            Array(
                                "USE_CAPTCHA" => "Y",
                                "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                                "EMAIL_TO" => "d-station@list.ru",
                                "REQUIRED_FIELDS" => array(0=>"EMAIL",),
                                "EVENT_MESSAGE_ID" => array(0=>"37",)
                            )
                        );?> 							</div>
                </div>
            </li>
            <li>
                <a class="popup-footer2" href="#" >Заказать бесплатный каталог</a>
                <div class="popup-close bg-darker hidden">
                    <div class="cell-m-90 mar-m-5 cell-t-50 mar-t-25 pad vpad">
                        <div class="feedbackClose popup-close"></div>

                        <h2>Заказать бесплатный каталог</h2>

                        <p><b>Звоните прямо сейчас:</b> +7(495)730-59-24 многоканальный</p>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.feedback",
                            "intels",
                            Array(
                                "USE_CAPTCHA" => "Y",
                                "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                                "EMAIL_TO" => "d-station@list.ru",
                                "REQUIRED_FIELDS" => array(0=>"EMAIL",),
                                "EVENT_MESSAGE_ID" => array(0=>"36",)
                            )
                        );?> 							</div>
                </div>
            </li>
            <li><a href="/" >Скучная, но важная информация</a></li>
        </ul>

        <ul class="pad cell-m-100 cell-t-50 cell-d-25">
            <li><a href="/about">О компании </a> </li>
            <li><a href="/delivery-and-payment/" >Доставка и оплата</a></li>
            <li><a href="/contacts/" >Контактная информация</a></li>
            <li><a href="/representation/" >Наши представительства</a></li>
            <!--          -->
        </ul>
    </div>
</nav>

<?
echo "<div class=\"row mar-t\">
		<div class=\"pad cell-t-100\">{$arResult["DESCRIPTION"]}</div>
	</div>";
?>


<? // echo "<pre>"; print_r($arResult); echo "</pre>"; ?>
