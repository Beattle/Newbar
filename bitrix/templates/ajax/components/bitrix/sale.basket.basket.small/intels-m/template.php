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
			$basketStr = $itemCount." ".$word." на ".SaleFormatCurrency($priceCount, $curItem["CURRENCY"]);
		}
	}
}

echo "<div class=\"basket-sm cell-m-25 mar-m-50\">";
	echo "<a class=\"link-block pad bg-3 button input-button dropdown\" href=\"#\">&nbsp;</a>";
	echo "<div class=\"ajaxTaker bg-1 pad vpad text-center\">";
		echo "<span>{$basketStr} </span>";
		if ($basketStr != "Пусто") {echo "<span><a href=\"{$arParams["PATH_TO_BASKET"]}\">Корзина и заказ</a></span>";}
	echo "</div>";
echo "</div>";

//echo "<pre>"; print_r($arResult); echo "</pre>";
?>