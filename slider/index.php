<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>

<?$APPLICATION->IncludeComponent("intels:slider.responsive", ".default", array(
	"IBLOCK_ID" => "3",
	"PROPORTION" => "3.636",
	"MOBILE_SCREEN_POINT" => "720",
	"PROPORTION_MOBILE" => "2.3",
	"USE_SWITCHER" => "Y",
	"USE_ARROWS" => "Y",
	"ARROWS_TOP_MARGIN" => "43",
	"ARROWS_HEIGHT" => "15",
	"SLIDE_CHANGE_TIME" => "300",
	"USE_AUTO" => "Y",
	"AUTO_TIME" => "7000",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>