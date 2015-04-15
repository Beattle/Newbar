<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка | Дизайн-станция");
?><section class="mar-t pad">
<h1>Доставка</h1>

<p>
	<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/includes/element_delivery.php",
		"EDIT_TEMPLATE" => "standard.php"
		),
		false
	);?>
</p>

<p>Для доставки в другие города можно воспользоватья услугами транспортной компании.</p>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>