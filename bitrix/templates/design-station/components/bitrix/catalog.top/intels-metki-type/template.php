<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.qtip.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/cloudzoom/cloudzoom.js');


$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/cloudzoom/cloudzoom.css');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jquery.qtip.min.css');
$tmpl_path = SITE_TEMPLATE_PATH;
// Определяем какую метку надо показывать, а так же заголовок H1
$metka_user = $arParams["METKA_NAME"];
if ($metka_user == "NOVELTY") {
	$metka_name = "Новинки";
	$metka_not = "новинок";
} elseif ($metka_user == "ON_SALE") {
	$metka_name = "Распродажа";
	$metka_not = "распродаж";
} elseif ($metka_user == "LIDER_OF_SALES") {
	$metka_name = "Лидеры продаж";
	$metka_not = "лидеров продаж";
}

echo "<section class=\"products mar-t\">
<header class=\"pad vpad\"><h1>{$metka_name}</h1></header>";
if ($arResult["ITEMS"] AND $arResult["IS_MARKS"][$metka_user]) {
				echo "<div class=\"row\">";
					$i = 0;
                    $k = count($arResult['ITEMS']);
					foreach ($arResult["ITEMS"] as $key => $arElement) {
						if ($arElement[$metka_user]) {
							$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));

							echo "<article class=\"cell-t-16  button  {$notM}\" id=\"{$this->GetEditAreaId($arElement['ID'])}\">
										<h3><a href=\"/catalog/{$arElement["DETAIL_PAGE_URL"]}\"> {$arElement["NAME"]}</a></h3>";

                                 echo "<figure>
										    <a class='row link-block pad  small' href=\"/catalog/{$arElement["DETAIL_PAGE_URL"]}\">";
										    					if ($arElement["PROPERTIES"]["MARKS"]["VALUE"]) {
						echo "<div class=\"mark\">";
                        foreach ($arElement["PROPERTIES"]["MARKS"]["VALUE"] as $key2 => $arMark) {
                            switch($arElement["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key2]){
                                case 'NOVELTY':$file_name = 'New-icon';
                                    break;
                                case 'LIDER_OF_SALES':$file_name = 'Lider-icon1';
                                    break;
                                case 'ON_SALE':$file_name = 'Sale-icon';
                            }
                            echo "<div class=\" cell-m-auto\">
							    <img class='{$arElement["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key2]}' src='{$tmpl_path}/img/{$file_name}.png' />
							</div>";
                        }
						echo "</div>";
					}
                        echo "<img src=\"{$arElement["PREVIEW_PICTURE"]["SRC"]}\" />
										    </a>
										    <span class='hover-block'>
                                                <span class='hover-link fast'>Быстрый просмотр</span>
                                            </span>
										</figure>
										<p class=\"price h2\">";
                                            if ($arElement["PRICES"]["BASE"]["PRINT_VALUE"] != 0) {
                                                echo "<span class='price'>{$arElement['PRICES']['BASE']['VALUE']} <span class='r'>Р</span></span>";
                                            } else {
                                                echo "<span class='price not-available'>цена по запросу</span>";
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
                                         echo "</p>
								</article>";
							if (($i+1)%6 == 0 || $k == $i+1) {echo "</div><div class=\"row\">";}
							$i++;
						}
					}
			echo "</div>";
} else {
	echo "<p class=\"pad\">В данный момент в магазине нет {$metka_not}</p>";
}
/*if ($i > 3) {echo "<a class=\"border-radius top-opener link-block bg-3 button reverse pad input-button cell-m-auto only-m small\"><span>Показать всё</span><span class=\"hidden\">Скрыть</span></a>";}
*/ echo "</section>";

//echo "<pre>"; print_r($arParams); echo "</pre>";
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>