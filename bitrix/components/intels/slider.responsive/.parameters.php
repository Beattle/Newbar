<? if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = array(
	
	"GROUPS" => array(
		"SIZE" => array(
			"NAME" => GetMessage("GROUPS_SIZE_NAME"),
			"SORT" => "200"
		),
		"SWITCHERS" => array(
			"NAME" => GetMessage("GROUPS_SWITCHERS_NAME"),
			"SORT" => "300"
		),
		"SWITCH_PROCESS" => array(
			"NAME" => GetMessage("GROUPS_SWITCH_PROCESS_NAME"),
			"SORT" => "400"
		),
	),
	
	'PARAMETERS' => array(
		'IBLOCK_ID' => array(
			'NAME' => GetMessage("PARAMETERS_IBLOCK_ID_NAME"),
			'TYPE' => 'STRING',
			'MULTIPLE' => 'N',
			'PARENT' => 'BASE',
			),
		'PROPORTION' => array(
			'NAME' => GetMessage("PARAMETERS_PROPORTION_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "2",
			'MULTIPLE' => 'N',
			'PARENT' => 'SIZE',
			),
		'MOBILE_SCREEN_POINT' => array(
			'NAME' => GetMessage("PARAMETERS_MOBILE_SCREEN_POINT_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "720",
			'MULTIPLE' => 'N',
			'PARENT' => 'SIZE',
			),
		'PROPORTION_MOBILE' => array(
			'NAME' => GetMessage("PARAMETERS_PROPORTION_MOBILE_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "0.5",
			'MULTIPLE' => 'N',
			'PARENT' => 'SIZE',
			),
		'USE_SWITCHER' => array(
			'NAME' => GetMessage("PARAMETERS_USE_SWITCHER_NAME"),
			'TYPE' => 'CHECKBOX',
			"DEFAULT" => "Y",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCHERS',
			),
		'USE_ARROWS' => array(
			'NAME' => GetMessage("PARAMETERS_USE_ARROWS_NAME"),
			'TYPE' => 'CHECKBOX',
			"DEFAULT" => "Y",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCHERS',
			),
		'ARROWS_TOP_MARGIN' => array(
			'NAME' => GetMessage("PARAMETERS_ARROWS_TOP_MARGIN_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "0",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCHERS',
			),
		'ARROWS_HEIGHT' => array(
			'NAME' => GetMessage("PARAMETERS_ARROWS_HEIGHT_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "50",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCHERS',
			),
		'SLIDE_CHANGE_TIME' => array(
			'NAME' => GetMessage("PARAMETERS_SLIDE_CHANGE_TIME_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "300",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCH_PROCESS',
			),
		'USE_AUTO' => array(
			'NAME' => GetMessage("PARAMETERS_USE_AUTO_NAME"),
			'TYPE' => 'CHECKBOX',
			"DEFAULT" => "Y",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCH_PROCESS',
			),
		'AUTO_TIME' => array(
			'NAME' => GetMessage("PARAMETERS_AUTO_TIME_NAME"),
			'TYPE' => 'STRING',
			"DEFAULT" => "10000",
			'MULTIPLE' => 'N',
			'PARENT' => 'SWITCH_PROCESS',
			),
		'CACHE_TIME'  =>  array('DEFAULT'=>3600),
	),
);

?>