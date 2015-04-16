<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$basketStr = "Пусто";
$itemCount = 0;
$priceCount = 0;
if ($arResult["READY"]=="Y") {
	if (isset($arResult["ITEMS"]) && !empty($arResult["ITEMS"])) {
		foreach($arResult["ITEMS"] as $curItem) {
			if ($curItem["CAN_BUY"] == "Y") {
				$itemCount = $itemCount + $curItem["QUANTITY"];
				$priceCount = $priceCount + ($curItem["PRICE"]*$curItem["QUANTITY"]);
			}
		}
		
		$lastNumber = substr($itemCount, strlen($itemCount)-1, 1);
		if (strlen($itemCount) > 1) {$almostLastNumber = substr($itemCount, strlen($itemCount)-2, 1);}
		if ($lastNumber == 1 AND $almostLastNumber != 1) {
			$word = "товар";
		} elseif ($lastNumber > 1 AND $lastNumber < 5 AND $almostLastNumber != 1) {
			$word = "товара";
		} elseif ($lastNumber > 4 OR $lastNumber == 0 OR $almostLastNumber = 1) {
			$word = "товаров";
		}
		
		if (!empty($itemCount) && !empty($priceCount)) {
            $basketStr = "<span class='itemCount'>{$itemCount}</span> $word <br/><span class='itemPrice'>". SaleFormatCurrency($priceCount, $curItem['CURRENCY']).'</span>';
		}
	}
}

echo "<div class=\"basket-sm in\">";
	echo "<a class=\"bsk\" href=\"{$arParams["PATH_TO_BASKET"]}\">";
		// echo "<span><strong>Корзина</strong></span>";
		echo "<span class=\"tiny\">{$basketStr}</span>";
	echo "</a>";
echo "</div>";

//echo "<pre>"; print_r($arResult); echo "</pre>";
?>