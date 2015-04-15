<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Добавляем фотки в свойства корзины
if (!CModule::IncludeModule('iblock')) {
	CModule::IncludeModule('iblock');
}


foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
	
	//Sorting
	$arSort = array(
		"SORT" => "ASC"
	);
	//FILTER
	$arFilter = array(
		"ID" => $arItem["PRODUCT_ID"],
		"IBLOCK_ID" => 1,
		"IBLOCK_LID" => SITE_ID,
		"IBLOCK_ACTIVE" => "Y",
		"ACTIVE_DATE" => "Y",
		"ACTIVE" => "Y",
	);
	//SELECT
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"CODE",
		"XML_ID",
		"NAME",
		"SORT",
		"PREVIEW_PICTURE",
		//"PROPERTY_*",
	);
	
	$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
	while($obElement = $rsElement->GetNextElement()) {
		$fields = $obElement->GetFields();
		$FILE = CFile::GetFileArray($fields["PREVIEW_PICTURE"]);
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PREVIEW_PICTURE"] = $FILE;
	}
}

// Считаем общую цену каждого товара
foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
	$arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"] = $arItem["PRICE"]*$arItem["QUANTITY"];
	if (strlen($arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"]) > 3) {
		$simbol = strlen($arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"]) - 3;
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"] = substr_replace($arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"], " ", $simbol, 0);
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"] = $arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"]." руб.";
	}
}

// Считаем количество всех товаров
$i = 0;
foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
	$i = $i + $arItem["QUANTITY"];
}
$arResult["allQuantity"] = $i;

?>