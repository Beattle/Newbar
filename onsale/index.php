<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дизайн-станция. Распродажа");
?>

<?$GLOBALS["arrFilter"] = array(
	"!PROPERTY_MARKS_VALUE" => false
);
$APPLICATION->IncludeComponent("bitrix:catalog.top", "intels-metki-type", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "1",
	"FILTER_NAME" => "arrFilter",
	"METKA_NAME" => "ON_SALE",
	"ELEMENT_SORT_FIELD" => "name",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "sort",
	"ELEMENT_SORT_ORDER2" => "asc",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "10000",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "MARKS",
		1 => "",
	),
	"OFFERS_LIMIT" => "0",
	"SECTION_URL" => "#SECTION_ID#/",
	"DETAIL_URL" => "#SECTION_ID#/#ELEMENT_ID#/",
	"BASKET_URL" => "/basket/index.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"DISPLAY_COMPARE" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "Y",
	"CONVERT_CURRENCY" => "N",
	"QUANTITY_FLOAT" => "N"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>