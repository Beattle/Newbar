<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Добавляем фотки в свойства корзины
if (!CModule::IncludeModule('iblock')) {
	CModule::IncludeModule('iblock');
}

//global $USER;



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
    "PROPERTY_COLORS"
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
		"PROPERTY_POSTAVKA",
    //"PROPERTIES",
	);
  
  $rsElement = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
	while($obElement = $rsElement->GetNextElement()) {
		$fields = $obElement->GetFields();
    $FILE = CFile::GetFileArray($fields["PREVIEW_PICTURE"]);
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PREVIEW_PICTURE"] = $FILE;
    $arResult["ITEMS"]["AnDelCanBuy"][$key]["POSTAVKA"] = $fields['PROPERTY_POSTAVKA_VALUE'];
    //$arResult["ITEMS"]["AnDelCanBuy"][$key]["PROPERTIES"] = $fields['PROPERTIES'];
	}
  
  //	  
  $res = CIBlockElement::GetByID($arItem["PRODUCT_ID"]); 
  if ($ar_res = $res->GetNext()) {
    $db_props = CIBlockElement::GetProperty($ar_res["IBLOCK_ID"], $arItem["PRODUCT_ID"], "sort", "asc", array("CODE" => "MIN_QUANTITY_FOR_BUYW"));
    if ($ob = $db_props->GetNext()) {
      $arResult["ITEMS"]["AnDelCanBuy"][$key]["MIN_QUANTITY_FOR_BUYW"] = $ob['VALUE'];
    }
  }

  //if ($USER->IsAdmin())
  //{
   //echo '<pre>' . print_r($ob, true) . '</pre>';
  //}

  
}

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
    'NAME',
/*    "CODE",
    "XML_ID",
    "SORT",*/
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

// Считаем общую цену каждого товара
foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
	$arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"] = $arItem["PRICE"]*$arItem["QUANTITY"];
	if (strlen($arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"]) > 3) {
		$simbol = strlen($arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"]) - 3;
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"] = substr_replace($arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"], " ", $simbol, 0);
		$arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"] = $arResult["ITEMS"]["AnDelCanBuy"][$key]["PRICE_QUANTITY"]." <span class='r'>Р</span>";
	}
}

// Считаем количество всех товаров
$i = 0;
foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
	$i = $i + $arItem["QUANTITY"];
}
$arResult["allQuantity"] = $i;

?>