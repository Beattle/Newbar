<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/cloudzoom/cloudzoom.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jcarousellite_1.0.1.pack.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.qtip.min.js');


$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/cloudzoom/cloudzoom.css');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jquery.qtip.min.css');

?>
<script type="text/javascript">
	function rrAsyncInit() {
		try{ rrApi.view(<?php echo $arResult["ID"] ?>); } catch(e) {}
	}
</script>
<?php

echo "<div class=\"product mar-t-r mar-t-l\">
		<div class=\"box pad row\">
			<p class=\"small\">";
				$APPLICATION->IncludeComponent("bitrix:breadcrumb", "intels", array(
					"START_FROM" => "1",
					"PATH" => "/catalog/",
					"SITE_ID" => "s1"
					),
					false
				);
			echo "</p>
			<h1>{$arResult["NAME"]}</h1>";
      if ($arResult["PROPERTIES"]["SKU"]["VALUE"]) {
        echo "<span class=\"artw\">Артикул: {$arResult["PROPERTIES"]["SKU"]["VALUE"]}</span>";
      }
		echo "</div>
		
		<div class=\"product1 pad cell-m-100 cell-t-50 cell-d-29-l   </div>\">
			<div class=\"img bg-1  vpad\">";

                if ($arResult["PROPERTIES"]["MARKS"]["VALUE"]) {
                    echo "<div class=\"row\">";
                    $tmpl_path = SITE_TEMPLATE_PATH;
                    foreach ($arResult["PROPERTIES"]["MARKS"]["VALUE"]  as $key => $arMark) {
                        switch($arResult["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key]){
                            case 'NOVELTY':$file_name = 'New-icon';
                                break;
                            case 'LIDER_OF_SALES':$file_name = 'Lider-icon1';
                                break;
                            case 'ON_SALE':$file_name = 'Sale-icon';
                        }
                        echo "<div class=\" cell-m-auto\">
                                                <img class='{$arElement["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key2]}' src='/bitrix/templates/design-station/img/{$file_name}.png' />
                                            </div>";
                    }
                    echo "</div>";
                }
				if ($arResult["DETAIL_PICTURE"]) {
					echo "<figure>";
					echo "<img class=\"cloudzoom\" src=\"{$arResult["DETAIL_PICTURE"]["SRC"]}\" 
					data-cloudzoom = \"zoomSizeMode: 'image',zoomClass:'zoom-zoom',zoomPosition:'.product2',startMagnification:5\" />";
						if($arResult['PROPERTIES']['NEW_YEAR']['VALUE'] == 'Y'){
							echo '<div class="upper new_year"><img class="new_year" src="/upload/medialibrary/2dc/2dcab2fe1f519c189f006bb9802fffbd.png"/></div>';
						}
					echo "</figure>";
				}


				if ($arResult["MORE_PHOTO"]) {
					foreach ($arResult["MORE_PHOTO"] as $key => $arPhoto) {
						$hider = "hidden";
						if ($key == 0 AND !$arResult["DETAIL_PICTURE"]) {$hider = "";}
						echo "<figure class=\"{$hider}\"><img class=\"cloudzoom\" src=\"{$arPhoto["SRC"]}\" 
						data-cloudzoom = \"zoomSizeMode: 'zoom',zoomClass:'zoom-zoom',zoomPosition:'.product2',startMagnification:5\" /></figure>";
					}
				}
				
			echo "</div>";
                if ($arResult["MORE_PHOTO"]) {
			    echo "<div class=\"thumbs not-m button-group\">";
                    if(count($arResult['MORE_PHOTO']) >=3):?>

                    <button class='prev'></button>
                    <button class='next'></button>
                    <?php endif;?>
                    <? echo "<div class=\"row\">
                        <ul>";


                        foreach ($arResult["MORE_PHOTO"] as $key => $arPhoto) {
                            if ($key == 0 AND $arResult["DETAIL_PICTURE"]) {
                                echo "<li class=\"cell-d-31-25-l thumb   button bg-1  radio\">
                                        <div >
                                            <a class=\"link-block \" href=\"{$arResult["DETAIL_PICTURE"]["SRC"]}\">
                                                <figure><img src=\"{$arResult["DETAIL_PICTURE"]["SRC"]}\"></figure>
                                                <div class=\"active-mark\"></div>
                                            </a>
                                        </div>
                                    </li>";
                            }

                            echo "<li class=\"cell-d-31-25-l thumb   button bg-1  radio\">
                                <div>
                                    <a class=\"link-block \" href=\"{$arPhoto["SRC"]}\">
                                        <figure><img src=\"{$arPhoto["SRC"]}\"></figure>
                                        <div class=\"active-mark\"></div>
                                    </a>
                                </div>
                                </li>";

    /*						$photoCount = count($arResult["MORE_PHOTO"]) + 1;
                            if ($arResult["DETAIL_PICTURE"]) {
                                if (($key+2)%4 == 0 AND $photoCount != ($key+2)) { // +2 потому что при первом цикле дополнительно добавляет детальную картинку
                                    echo "</div><div class=\"row\">";
                                }
                            } else {
                                if (($key+1)%4 == 0 AND $photoCount != ($key+1)) { // +2 потому что при первом цикле дополнительно добавляет детальную картинку
                                    echo "</div><div class=\"row\">";
                                }
                            }*/
                        }

		echo "</ul>
          </div>

				</div>";
        }
			echo "</div>";
		
		
	//!!!!!!!!!!!!!
	//  COLORS  !!!
	//!!!!!!!!!!!!!
	echo "<div class=\"product2  cell-m-100 cell-t-50 cell-d-40\">";
		if ($arResult["DISPLAY_PROPERTIES"]["COLORS"] AND $arResult["PRODUCT_PROPERTIES"]["COLORS"] AND $arResult["DISPLAY_PROPERTIES"]["COLORS"]["VALUE"]["0"] != "613") {
			echo "<div class=\"colors pad cell-d-50\">
                    <span class='title'>Цвета</span>
						<div class=\"button-group\">";
								$active = 0;
								
								foreach ($arResult["PRODUCT_PROPERTIES"]["COLORS"]["VALUES"] as $key => $arColors) {
									$activeColor = "";
									if ($active == 0) {$activeColor = "active"; $active = 1;}
									if ($arResult["COLORS"][$key]) {
										echo "<div class=\"button color radio input-button  {$activeColor}\">
												<div class=\"colorHolder\"><img src=\"{$arResult["COLORS"][$key]["PREVIEW_PICTURE"]["SRC"]}\" alt=\"{$arColors}\" /></div>
												<input type=\"hidden\" value=\"$arColors\" />
											</div>";
									}
								}

            echo "</div>";
						$basketBlockWidth = "cell-d-50";
            echo '</div>';
        } elseif($arResult['PROPERTIES']['UPHOLSTERY']['VALUE']){

                        echo "<div class='upholstery pad cell-d-50'>
                            <img src='".SITE_TEMPLATE_PATH."/img/upholstery.png' alt='Обивка на выбор заказчика' />
                            <span>
                            {$arResult['PROPERTIES']['UPHOLSTERY']['NAME']}
                            </span>
                        </div>";
                        $basketBlockWidth = "cell-d-50";

        }        else {
			$basketBlockWidth = "";
		}


				
				//!!!!!!!!!!!!!
				//  BASKET  !!!
				//!!!!!!!!!!!!!
if(empty($arResult['DISPLAY_PROPERTIES']['POSTAVKA']['VALUE'])){
    $postavka =  '<span class="unknown">не известно</span>';
} else{
    switch(strpbrk($arResult['DISPLAY_PROPERTIES']['POSTAVKA']['VALUE'], '0123456789')){
        case false:$spanClass = 'available';
            break;
        default:$spanClass = 'wait-days';
    }
    $postavka =  "<span class='{$spanClass}'>{$arResult[DISPLAY_PROPERTIES][POSTAVKA][VALUE]}</span>";

}

// $arParams['PRODUCT_PROPERTIES'] = array();
echo "<div class=\"basket pad {$basketBlockWidth}\">
						    <div class='available'>
						        <span class='title'>Наличие: </span>$postavka
						    </div>
							<div class=\"h2\">";
								if ($arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"] != 0) :?>
                                    <? if($arResult['PROPERTIES']['PRICE_FROM']['VALUE'] == 'Y'):?>
                                        <span class="price-from"><?=$arResult['PROPERTIES']['PRICE_FROM']['NAME'];?></span>
                                    <? endif;?>
								<?=$arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"];?><span class='r'>Р</span>
								<? else: echo "Цена по запросу";?>
								<? endif;?>
								
							<? echo "</div>
							
							<form class=\"add2basket row\" action=\"".POST_FORM_ACTION_URI."\" method=\"post\" enctype=\"multipart/form-data\">";
								if ($arParams["USE_PRODUCT_QUANTITY"]) {
                  // shitty whitespaces go away
                  $qntw = $arResult["PROPERTIES"]["MIN_QUANTITY_FOR_BUYW"]["VALUE"]?$arResult["PROPERTIES"]["MIN_QUANTITY_FOR_BUYW"]["VALUE"]:1;
                  if ($qntw!=1) {
                    $dataqw = "data-minqw=\"".$qntw."\"";
                    $message = "<div class='qty-mes'>Этот товар продается от <strong>$qntw шт.</strong></div>";
                    $warn = "<div class='warn-tip hidden'>Минимальный заказ  от <strong>$qntw шт.</strong></div>";
                  }
                  ?>
									<div class=qty <?=$dataqw?> >
                                            <?  if($qntw !=1) echo $message; ?>
											<input class="quantity h2  text-center" type="text" name="<?=$arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="<?=$qntw?>" />
                                        <div class='qty-ch'>
                                            <div class="up"></div>
                                            <div class="down"></div>
                                        </div>
                                        <input onmousedown="try { rrApi.addToBasket(<?=$arResult["ID"]?>) } catch(e) {}" class="intoCart button reverse" name="<?=$arParams["ACTION_VARIABLE"]?>ADD2BASKET" type="submit" value="Купить" />
										</div>
                                        <?php if($qntw) echo $warn; ?>
								<? }

                                echo "<input type=\"hidden\" name=\"{$arParams["ACTION_VARIABLE"]}\" value=\"ADD2BASKET\" />";
								echo "<input type=\"hidden\" name=\"{$arParams["PRODUCT_ID_VARIABLE"]}\" value=\"{$arResult["ID"]}\" />";
								if ($arResult["PROPERTIES"]["COLORS"]["VALUE"]) {
									echo "<input class=\"color-input\" type=\"hidden\" name=\"{$arParams["PRODUCT_PROPS_VARIABLE"]}[COLORS]}\" value=\""; //{
                                    $sel = $arResult['PRODUCT_PROPERTIES']['COLORS']['SELECTED'];
                                    echo $arResult['PRODUCT_PROPERTIES']['COLORS']['VALUES'][$sel];

									echo "\" />";
								}echo "</form>";

								echo "<div class=\"basket-message\">";
									if ($arResult["BASKET"][$arResult["ID"]]) {
										echo "<p style=\"color: green; font-weight: bold;\">В корзине {$arResult["BASKET"][$arResult["ID"]]} шт.</p>";
									}
						echo "</div>
					</div>";

		
		if ($arResult["PROPERTIES"]["SUPER_DESCRIPTION"]["VALUE"]) {
			echo "<div class='row'>
                    <div class='pad super-desc'><p>{$arResult["PROPERTIES"]["SUPER_DESCRIPTION"]["VALUE"]}</p></div>
                  </div>";
		}
		
		
		// Таблица характеристик
		if ($arResult["DISPLAY_PROPERTIES"]) {
			if (!$arResult["DISPLAY_PROPERTIES"]["COLORS"]) {
				echo "<div class=\"params row\">
						<h2>Характеристики</h2>
						<table class=\"small\">";
							foreach ($arResult["DISPLAY_PROPERTIES"] as $key => $arProperty) {
								if ($key != "COLORS") {
									echo "<tr><td>{$arProperty["NAME"]}</td><td>{$arProperty["DISPLAY_VALUE"]}</td></tr>";
								}
							}
				echo "</table></div>";
			} elseif (count($arResult["DISPLAY_PROPERTIES"]) > 1) {
				echo "<div class=\"params row \">
						<h2>Характеристики</h2>
						<table class=\"small\">";
                $filter_key = array_flip(array('COLORS','POSTAVKA','MARKS','IND_SIZE','QV_NOTES'));
                $filter_array =  array_diff_key($arResult["DISPLAY_PROPERTIES"],$filter_key);
							foreach ($arResult['PROPERTIES'] as $key => $arProperty) {
								    if(array_key_exists ($key,$filter_array )){
                                        switch ($key):
                                            case 'CHAR_WEIGHT': $units = 'кг';
                                                break;
                                            case 'FRAME_COLOR':
                                            case 'SIDENIE':
                                            case 'CHAR_MANUFACTURER':
                                            case 'CHAR_MATERIAL':
                                            case 'QV_NOTES':
                                            case 'CHAR_DURABILITY':
                                            case 'STOLESHNICA':
                                            case 'CHAR_MECH':
                                            case 'CHAR_FOUNDATION_MATERIAL':
                                                $units = '';
                                                break;
                                            default :$units = 'мм';
                                        endswitch;
									echo "<tr><td class='name-cont'><div class='container'><span class='name'>{$arProperty["NAME"]}</span></div></td><td class='value-cont'><span class='value'> {$arProperty["VALUE"]} {$units}</span></td></tr>";
                                    }
								// }
							}

                echo '</table>';
                    if($arResult['DISPLAY_PROPERTIES']['IND_SIZE']['VALUE'] == 'Y')
                        echo '<div class="ind-size">Данная модель может быть сделана по Вашим индивидуальным размерам</div>';
                echo '</div>';
			}
		}
		

	echo "</div>";

    echo "<div class=\"not-t product3 cell-m-100 cell-d-29 \">
                <div class=\"includes\">
                    <div id=\"contacts\" class=\"row  pad \">
                        <p>";
    $APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_TEMPLATE_PATH."/includes/element_question.php",
            "EDIT_TEMPLATE" => "standard.php"
        ),
        false
    );
    echo "</p></div>

                        <div id=\"payment\" class=\"row  pad \">
                <h2>
                    <a class=\"popup-payment2\" href=\"/payment/\">Оплата</a>
                </h2>
                ";
$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH."/includes/element_payment.php",
        "EDIT_TEMPLATE" => "standard.php"
    ),
    false
);
echo "
                    </div>
                    <div id=\"delivery\" class=\"row  pad\">
                <h2>
                    <a class=\"popup-delivery2\" href=\"/delivery/\">Доставка</a>
                    <div class=\"popup-close bg-darker hidden\">
                        <div class=\"cell-m-90 mar-m-5 cell-t-50 mar-t-25 pad vpad\">
                            <div class=\"feedbackClose popup-close\"></div>
                            <div class=\"ajax-catcher-delivery\"></div>
                        </div>
                    </div>
                </h2>";
$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH."/includes/element_delivery.php",
        "EDIT_TEMPLATE" => "standard.php"
    ),
    false
);
echo "
            </div>
        </div>
                </div>";






    echo "</div>";

echo "</div>";

if ($arResult["PREVIEW_TEXT"] OR $arResult["DETAIL_TEXT"]) {
    echo "<div class=\"descr box pad-t cell-m-100 cell-t-100 cell-d-100  \">
    <h2 class='in'>Описание</h2>
    <div id='inner-desc'>{$arResult["PREVIEW_TEXT"]}";
    if ($arResult["DETAIL_TEXT"]) {
        echo "<p><a href=\"#\" class=\"more java\">Подробное описание</a></p>
					<div class=\"hidden\">
						<p>{$arResult["DETAIL_TEXT"]}</p>
					</div>";
    }
                    echo "</div>
        </div>";
}
 // if(mobro() == true){
echo "<div class=\"product3 cell-t-100 cell-m-100 only-t pad-t \">
                <div class=\"includes\">
                    <div id=\"contacts\" class=\"row  pad cell-t-33 \">
                        <h2>
                            <a class=\"popup-question2\" href=\"/\">Есть вопросы?</a>
                            <div class=\"popup-close bg-darker hidden\">
                                <div class=\"cell-m-90 mar-m-5 cell-t-50 mar-t-25 pad vpad\">
                                    <div class=\"feedbackClose popup-close\"></div>
                                    <h2>Есть вопросы?</h2>
                                    <p>Если у вас есть вопросы по товару или условиям работы, вы можете связаться с нами любым из удобных способов:</p>
                                    <p>Телефон: +7 (495) 730-59-24<br />
                                    E-mail: <a href=\"mailto:d-station@list.ru\">d-station@list.ru</a><br />
                                    Мы с радостью ответим на ваши вопросы!</p>";
$APPLICATION->IncludeComponent("bitrix:main.feedback", "intels", array(
        "USE_CAPTCHA" => "Y",
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "EMAIL_TO" => "png@intels.pro",
        "REQUIRED_FIELDS" => array(
            0 => "EMAIL",
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "35",
        )
    ),
    false
);
echo "</div>
                            </div>
                        </h2>
                        <p>";
$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH."/includes/element_question.php",
        "EDIT_TEMPLATE" => "standard.php"
    ),
    false
);
echo "  </div>

                      <div id=\"delivery\" class=\"row  cell-t-33 pad\">
                <h2>
                    <a class=\"popup-delivery2\" href=\"/delivery/\">Доставка</a>
                    <div class=\"popup-close bg-darker hidden\">
                        <div class=\"cell-m-90 mar-m-5 cell-t-50 mar-t-25 pad vpad\">
                            <div class=\"feedbackClose popup-close\"></div>
                            <div class=\"ajax-catcher-delivery\"></div>
                        </div>
                    </div>
                </h2>
                <p>";
$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH."/includes/element_delivery.php",
        "EDIT_TEMPLATE" => "standard.php"
    ),
    false
);
echo "</p>
            </div>

                        <div id=\"payment\" class=\"row cell-t-33  pad \">
                <h2>
                    <a class=\"popup-payment2\" href=\"/payment/\">Оплата</a>
                    <div class=\"popup-close bg-darker hidden\">
                        <div class=\"cell-m-90 mar-m-5 cell-t-50 mar-t-25 pad vpad\">
                            <div class=\"feedbackClose popup-close\"></div>
                            <div class=\"ajax-catcher-payment\"></div>
                        </div>
                    </div>
                </h2>
                <p>";
$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH."/includes/element_payment.php",
        "EDIT_TEMPLATE" => "standard.php"
    ),
    false
);
echo "</p>
                    </div>

        </div>
                </div>";
 // }

?>
<div class="rr-widget pad-t cell-m-100 cell-t-100 cell-d-100" style="padding-top: 20px" 
     data-rr-widget-product-id="<?php echo $arResult["ID"] ?>"
     data-rr-widget-id="5385d87f1e994405dca2c717"
     data-rr-widget-width="100%"></div>
<?
// echo "<pre>"; print_r($arParams); echo "</pre>";
// echo "<pre>"; print_r($arResult); echo "</pre>";
global $USER;
if ($USER->IsAdmin())
{
   //echo '<pre>' . print_r($arResult, true) . '</pre>';
   //echo '<pre>';
   //var_dump($arResult);
   //echo '</pre>';
}
?>
<script type="text/javascript">
var google_tag_params = {
ecomm_prodid: '<?php echo $arResult["ID"] ?>',
ecomm_pagetype: 'product',
<?php 
                if ($arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"] != 0) {
									echo 'ecomm_totalvalue: \'' . $arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"] . '\',' ;
								} else {
									//echo "Цена по запросу";
								} ?>
};
</script>