<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$isOnsale = 0;
$isLider = 0;
$isNovelty = 0;

foreach ($arResult["ITEMS"] as $key => $arItem) {
	foreach ($arItem["DISPLAY_PROPERTIES"]["MARKS"]["VALUE_XML_ID"] as $id) {
		if ($id == "ON_SALE") {
			$isOnsale = 1;
			$arResult["IS_MARKS_TEMP"]["ON_SALE"] = "Распродажа";
			$arResult["ITEMS"][$key]["ON_SALE"] = "Y";
		}
		if ($id == "LIDER_OF_SALES") {
			$isLider = 1;
			$arResult["IS_MARKS_TEMP"]["LIDER_OF_SALES"] = "Лидеры продаж";
			$arResult["ITEMS"][$key]["LIDER_OF_SALES"] = "Y";
		}
		if ($id == "NOVELTY") {
			$isNovelty = 1;
			$arResult["IS_MARKS_TEMP"]["NOVELTY"] = "Новинки";
			$arResult["ITEMS"][$key]["NOVELTY"] = "Y";
		}
	}
}

if ($arResult["IS_MARKS_TEMP"]["ON_SALE"]) {$arResult["IS_MARKS"]["ON_SALE"] = $arResult["IS_MARKS_TEMP"]["ON_SALE"];}
if ($arResult["IS_MARKS_TEMP"]["LIDER_OF_SALES"]) {$arResult["IS_MARKS"]["LIDER_OF_SALES"] = $arResult["IS_MARKS_TEMP"]["LIDER_OF_SALES"];}
if ($arResult["IS_MARKS_TEMP"]["NOVELTY"]) {$arResult["IS_MARKS"]["NOVELTY"] = $arResult["IS_MARKS_TEMP"]["NOVELTY"];}
unset($arResult["IS_MARKS_TEMP"]);

?>