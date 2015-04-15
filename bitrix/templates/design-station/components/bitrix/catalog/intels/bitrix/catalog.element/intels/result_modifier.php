<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


// Делаем массив с цветами
//ORDER BY
$arSort = array(
	"SORT" => "ASC"
);
//FILTER
$arFilter = array(
	"IBLOCK_ID" => 2,
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

$i = 0;
while($obElement = $rsElement->GetNextElement()) {
	$arResult["COLORS"][$i] = $obElement->GetFields();
	$arResult["COLORS"][$i]["PREVIEW_PICTURE"] = (0 < $arResult["COLORS"][$i]["PREVIEW_PICTURE"] ? CFile::GetFileArray($arResult["COLORS"][$i]["PREVIEW_PICTURE"]) : false);
	
	// Превращаем ключи в ID
	$newKey = $arResult["COLORS"][$i]["ID"];
	$arResult["COLORS"][$newKey] = $arResult["COLORS"][$i];
	unset($arResult["COLORS"][$i]);
	$i--;
}


// Определяем какие из товаров есть в корзине и в каком кол-ве
$basketArr = array();
if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
	$basket = CSaleBasket::GetList(false, array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "ORDER_ID" => NULL), false, false, array("ID", "PRODUCT_ID", "QUANTITY"));
	while ($basketItem = $basket->GetNext()) {
		$basketArr[$basketItem["PRODUCT_ID"]] = $basketArr[$basketItem["PRODUCT_ID"]] + $basketItem["QUANTITY"];
	}
}
$arResult["BASKET"] = $basketArr;
?>