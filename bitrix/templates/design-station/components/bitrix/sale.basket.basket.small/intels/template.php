<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$basketStr = "Ваша корзина<br/>пуста";
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
        $format_currency = number_format ($priceCount,0,'.',' ');

		
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
			$basketStr = "<span class='itemCount'>{$itemCount}</span> $word <br/><span class='itemPrice'>". $format_currency.'</span> руб.';
		}
	}
}


	echo "<a class=\"bsk\" href=\"{$arParams["PATH_TO_BASKET"]}\">";
		// echo "<span><strong>Корзина</strong></span>";
		echo "<img src='".SITE_TEMPLATE_PATH."/img/basket.png'/><span class='tiny'>{$basketStr}</span>";
	echo "</a>";


//echo "<pre>"; print_r($arResult); echo "</pre>";
?>