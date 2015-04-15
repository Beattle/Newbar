<? if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

$arTemplateParameters["FILTER_NAME"] = array(
		'NAME' => 'Имя фильтра',
		'TYPE' => 'STRING',
		"DEFAULT" => "arrFilter",
		'MULTIPLE' => 'N',
		'PARENT' => 'BASE',
);
$arTemplateParameters["METKA_NAME"] = array(
		'NAME' => 'Выберите метку',
		'TYPE' => 'LIST',
		"DEFAULT" => "",
		"VALUES" => array(
			"ON_SALE" => "ON_SALE",
			"LIDER_OF_SALES" => "LIDER_OF_SALES",
			"NOVELTY" => "NOVELTY",
		),
		'MULTIPLE' => 'N',
		'PARENT' => 'BASE',
);

?>