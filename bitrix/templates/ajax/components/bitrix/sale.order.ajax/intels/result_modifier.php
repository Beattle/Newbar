<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/*
// Если данные подгружаются аяксом (то есть форма была отправлена) - 
// Меняем кодировку всех данных формы
if (isset($_REQUEST["confirmorder"]) && $_REQUEST["confirmorder"] == "Y") {
	if (isset($arResult["ORDER_PROP"]["USER_PROPS_Y"])) {
		foreach ($arResult["ORDER_PROP"]["USER_PROPS_Y"] as $yPropKey => $yPropVal) {
			$arResult["ORDER_PROP"]["USER_PROPS_Y"][$yPropKey]["VALUE"] = iconv("UTF-8", "windows-1251", $yPropVal["VALUE"]);
			$arResult["ORDER_PROP"]["USER_PROPS_Y"][$yPropKey]["VALUE_FORMATED"] = iconv("UTF-8", "windows-1251", $yPropVal["VALUE_FORMATED"]);
		}
		foreach ($arResult["ORDER_PROP"]["USER_PROPS_N"] as $nPropKey => $nPropVal) {
			$arResult["ORDER_PROP"]["USER_PROPS_N"][$nPropKey]["VALUE"] = iconv("UTF-8", "windows-1251", $nPropVal["VALUE"]);
			$arResult["ORDER_PROP"]["USER_PROPS_N"][$nPropKey]["VALUE_FORMATED"] = iconv("UTF-8", "windows-1251", $nPropVal["VALUE_FORMATED"]);
		}		
	}
}
*/

?>