<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.qtip.min.js');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jquery.qtip.min.css');


$colors = $arResult['COLORS'];

echo "<div class=\"basketContainer\">";

// В случае если корзина не пуста или пуста, но потому что заказ успешно завершен - показываем и корзину и форму заказа
if ((isset($arResult["ITEMS"]["AnDelCanBuy"]) && !empty($arResult["ITEMS"]["AnDelCanBuy"])) || (isset($_REQUEST["ORDER_ID"]) && !empty($_REQUEST["ORDER_ID"]))) {
	echo "<section class=\"basket mar-m  row\">
			<header class=\"row\">
			    <div class=\"clr-bsk\">
                    <a class=\" basket-clear link-block  cell-m-auto\" href=\"#\">Очистить корзину</a>
                </div>
				<h1>Корзина</h1>
			</header>";
;
			
			// WARNING
			if(is_array($arResult["WARNING_MESSAGE"]) && !empty($arResult["WARNING_MESSAGE"])) {
				foreach($arResult["WARNING_MESSAGE"] as $v)
				{
					echo "<p>{$v}</p>";
				}
			}
?>
<script type="text/javascript">
function getitems() {
  console.log("callitems");
                var items = [];
                jQuery.each(jQuery('form.basketForm article'), function ( index, itme ) {
                  var id=0;
                  var qnt=0;
                  var price=0;
                  //console.log(jQuery(itme));
                  id = jQuery(itme).find("input#PASS-ID").attr('data-xml-id'); //jQuery('form.basketForm article').find("input#PASS-ID").val() attr('data-xml-id')
                  qnt = jQuery(itme).find("input.quantity").val(); //jQuery('form.basketForm article').find("input.quantity").val()
                  price = parseInt(jQuery(itme).find("div.price").children('div:first-child').text().replace(/\s+/g, ''),10);//parseInt(jQuery(jQuery('form.basketForm article').find("div.price").children('div:first-child')).text().replace(/\s+/g, ''),10)
                  items.push({
                    'id': id,
                    'qnt': qnt,
                    'price': price
                  });
                  console.log({'id': id, 'qnt': qnt, 'price': price});
                });
                
    return items;
}

function getOrderNum() {
 console.log("call_getOrderNum:");
 var num = "";
 num = jQuery('section.order .orderNum').val();
 console.log(num);
 return num; 
}
                
function rrAsyncInitForAjax() {
    try {
        rrApi.order({
            transaction: getOrderNum(),
            items: getitems()
        });
    } catch(e) {}
}

</script>                
<?php
//global $USER;	

//if ($USER->IsAdmin())
//{
//   echo '<pre>' . print_r($arResult, true) . '</pre>';
//}		
			// FORM
			echo "<form class=\"basketForm\" method=\"post\" action=\"".POST_FORM_ACTION_URI."\" name=\"basket_form\">";
				echo "<input type=\"hidden\" name=\"BasketRefresh\" value=\"submit\" />"; // Без этого инпута не будет меняться корзина

				if ($arResult["ShowReady"]=="Y") {
					foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {


//if ($USER->IsAdmin())
//{
   //echo '<pre>' . print_r($arItem, true) . '</pre>';
//}
            $qntw = $arItem["MIN_QUANTITY_FOR_BUYW"] ? $arItem["MIN_QUANTITY_FOR_BUYW"] : 1;
            $dataqw = '';
            if ($qntw!=1) {
              $dataqw = "data-minqw=\"".$qntw."\"";
                $message = "<div class='qty-mes text-center'>Этот товар продается от <strong>$qntw шт</strong></div>";
				$warn = "<div class='warn-tip hidden'>Минимальный заказ  от <strong>$qntw шт.</strong></div>";
            }

						echo "<article class=\"row table\">";
								if ($arItem["PREVIEW_PICTURE"]) {
									echo "<div class=\"cell-t-16 cell-d-12-5 pad vpad tc hidden\">
											<figure><img src=\"{$arItem["PREVIEW_PICTURE"]["SRC"]}\" /></figure>
										</div>";
								}
								$colorHtml = "";
                           // есди  !пустой и !не указан
								echo "<div class=\"cell-m-100 cell-t-50  properties tc\">
										<h2><a href=\"{$arItem["DETAIL_PAGE_URL"]}\">{$arItem["NAME"]}</a></h2>";
								if (!empty($arItem["PROPS"]["0"]["VALUE"]) && $arItem["PROPS"]["0"]["VALUE"] != "не указан"){
                                    $name = $arItem["PROPS"]["0"]["VALUE"]?$arItem["PROPS"]["0"]["VALUE"]:'';
                                    $src = $colors[searchForName($name,$colors)]['PREVIEW_PICTURE']['SRC'];
                                    $colorHtml = "<span class='color'>Цвет: {$arItem["PROPS"]["0"]["VALUE"]}</span>";
                                    $colorImg = "<img class='col-img' src='{$src}'></span>";
									echo "<p id='color-prop'>{$colorImg}{$colorHtml}</p>";
                                    }
                                    if(empty($arItem['POSTAVKA'])){
                                        $postavka =  '<span class="unknown">не известно</span>';
                                    } else{
                                        switch(strpbrk($arItem['POSTAVKA'], '0123456789')){
                                            case false:$spanClass = 'available';
                                                break;
                                            default:$spanClass = 'wait-days';
                                        }
                                        $postavka =  "<span class='{$spanClass}'>{$arItem[POSTAVKA]}</span>";
                                    }
									echo "<p class='available not-m'><span class='title'>НАЛИЧИЕ: </span>{$postavka}</p>
                                    <input id='PASS-ID' data-xml-id='{$arItem['PRODUCT_XML_ID']}' data-color='{$name}' type='hidden' value='{$arItem['ID']}'>
									</div>";
								echo "<div class=\"quantityChanger tc cell-m-25 cell-t-16 cell-d-12-5 \" {$dataqw}>";?>
                                         <?  if ($qntw!=1) echo $message;
                                        echo "<input class=\"quantity h2  cell-m-75 cell-t-50 text-center\" type=\"text\" name=\"QUANTITY_{$arItem["ID"]}\" value=\"{$arItem["QUANTITY"]}\" /><div class='qty-ch cell-m-25 cell-t-25 cell-d-18-75'>
                                            <div class=\"up  cell-m-25\"></div>
                                            <div class=\"down  cell-m-25\"></div>
										</div>
									</div>";
									  if ($qntw!=1) echo $warn; 
                        $arItem['PRICE_FORMATED'] = number_format($arItem['PRICE'],0,'',' ');
								echo "<div class=\"price  tc cell-m-50 cell-t-16 cell-d-18-75  h3\">
										<div>{$arItem["PRICE_FORMATED"]} <span class='r'>Р</span></div>
										<div id='{$arItem['ID']}' class='sum-price'>{$arItem["PRICE_QUANTITY"]} </div>
									</div>";
								echo "<div class=\"basket-delete  tc cell-m-25 cell-t-12-5 cell-d-6-25\">
										<div class=\"button\">Удалить</div>
										<input  type=\"hidden\" name=\"DELETE_{$arItem["ID"]}\" value=\"N\" />
									</div>";
							echo "</article>";
					}
				}
			echo "</form>";
		echo "</section>";

		// Выводим итоговую плашку корзины
		$lastNumber = substr($arResult["allQuantity"], strlen($arResult["allQuantity"])-1, 1);
		if (strlen($arResult["allQuantity"]) > 1) {$almostLastNumber = substr($arResult["allQuantity"], strlen($arResult["allQuantity"])-2, 1);}
		if ($lastNumber == 1 AND $almostLastNumber != 1) {
			$word = "товар";
		} elseif ($lastNumber > 1 AND $lastNumber < 5 AND $almostLastNumber != 1) {
			$word = "товара";
		} elseif ($lastNumber > 4 OR $lastNumber == 0 OR $almostLastNumber = 1) {
			$word = "товаров";
		}

		echo "<section class=\"basketTotal mar-m row  vpad border-basket\" id=\"orderAncor\">

				<div class=\"results cell-m-100 cell-t-50 cell-d-62-5  h2\">Итого:</div>

				<div class=\"total-price cell-m-100 cell-t-50 cell-d-37-5 h2\">
					<span class=\"pad\">{$arResult["allQuantity"]} {$word}:</span>
					<span class=\"pad\"><strong>{$arResult["allSum_FORMATED"]}</strong></span>
				</div>

				<div class=\"cell-m-100 cell-t-50 delivery cell-d-50 pad  row \">";
					$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/bitrix/templates/design-station/includes/element_delivery.php",
						"EDIT_TEMPLATE" => "standard.php"
						),
						false
					);
				echo "</div>";
		echo "</section>";


		// ORDER
		$APPLICATION->IncludeComponent("bitrix:sale.order.ajax", "intels", Array(
			"ALLOW_AUTO_REGISTER" => "Y", // ф-ция автоматической регистрации на сайте
			"SEND_NEW_USER_NOTIFY" => "N" // письмо с уведомлением о регистрации
		));

    // для rocketsale
    $iditems = array();
    foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
     $iditems[] = $arItem['PRODUCT_XML_ID'];
    }
    ?>
    <div class="rr-widget pad-t bg-2 cell-d-100 cell-t-100 cell-m-100"
    data-rr-widget-type="cart"
    data-rr-widget-products-id="<?php echo implode(',', $iditems); ?>"
    data-rr-widget-id="5385d87f1e994405dca2c718"
    data-rr-widget-width="100%"></div>

<?php if (count($iditems) >= 1) : ?>
<script type="text/javascript">
var google_tag_params = {
ecomm_prodid: '<?php echo implode(',', $iditems); ?>',
ecomm_pagetype: 'cart',
<?php 
                if ($arResult['allSum'] != 0) {
									echo 'ecomm_totalvalue: \'' . $arResult['allSum'] . '\',' ;
								} else {
									//echo "Цена по запросу";
								} ?>
};
</script>
<?php endif; ?><?php		

} else {	// Если в корзине ничего нет
	echo "<section class=\"basket mar-t row\">
			<header class=\"row vpad\">
				<h1>Корзина</h1>
			</header>
			<h2>В корзине ничего нет</h2>
		</section>";
}
echo " </div>";



function searchForName($id, $array) {
    foreach ($array as $key => $val) {
        if ($val['NAME'] === $id) {
            return $key;
        }
    }
    return null;
}

/*global $USER;
if ($USER->IsAdmin())
{
   // echo '<pre>' . print_r($arResult["ITEMS"]["AnDelCanBuy"], true) . '</pre>';
}*/

?>