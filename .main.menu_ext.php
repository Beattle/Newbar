<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"DEPTH_LEVEL" => "3",
		"IS_SEF" => "Y",
		"SEF_BASE_URL" => "/catalog/",
		"SECTION_PAGE_URL" => "#SECTION_ID#/",
		"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#/"
	),
false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>