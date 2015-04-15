<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


// echo $APPLICATION->GetCurPage();
$APPLICATION->AddChainItem('Корзина','/basket/');
// $APPLICATION->ShowNavChain();
    echo "<div class=\"mar-t pad\">
		<p class=\"pad breadcrumbs\">";
			$APPLICATION->IncludeComponent("bitrix:breadcrumb", "intels", array(
				"START_FROM" => "0",
				"PATH" => "/",
				"SITE_ID" => "s1"
				),
				false
			);
		echo "</p>";
	if ($arResult["SECTION"]) {
		echo "<p class=\"h1 pad category \">{$arResult["SECTION"]["NAME"]}</p>";
	}
echo "</div>";
?>

<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "intels", array(
	"COLUMNS_LIST" => array(
		0 => "NAME",
		1 => "PROPS",
		2 => "PRICE",
		3 => "QUANTITY",
		4 => "DELETE",
	),
	"PATH_TO_ORDER" => "/personal/order.php",
	"HIDE_COUPON" => "N",
	"QUANTITY_FLOAT" => "N",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
	"USE_PREPAYMENT" => "N",
	"SET_TITLE" => "Y"
	),
	false
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>