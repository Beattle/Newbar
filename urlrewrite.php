<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/([0-9]+)/([0-9]+)/.*#",
		"RULE" => "SECTION_ID=\$1&ELEMENT_ID=\$2",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/([0-9]+)/.*#",
		"RULE" => "SECTION_ID=\$1",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/cat80_106.html#",
		"RULE" => "SECTION_ID=76",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
);

?>