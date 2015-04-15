<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();


if ($this->StartResultCache(3600)) {
	
	/* Processing of received parameters */
	$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
	
	$arParams["PROPORTION"] = abs($arParams["PROPORTION"]);
	$arResult["PARAMS"]["PROPORTION"] = $arParams["PROPORTION"];
	$arParams["PROPORTION_MOBILE"] = abs($arParams["PROPORTION_MOBILE"]);
	$arResult["PARAMS"]["PROPORTION_MOBILE"] = $arParams["PROPORTION_MOBILE"];
	
	if ($arParams["MOBILE_SCREEN_POINT"] < 320) {$arParams["MOBILE_SCREEN_POINT"] = 320;}
	$arParams["MOBILE_SCREEN_POINT"] = intval($arParams["MOBILE_SCREEN_POINT"]);
	$arResult["PARAMS"]["MOBILE_SCREEN_POINT"] = $arParams["MOBILE_SCREEN_POINT"];
	
	$arResult["PARAMS"]["USE_ARROWS"] = $arParams["USE_ARROWS"];
	$arResult["PARAMS"]["USE_SWITCHER"] = $arParams["USE_SWITCHER"];
	$arResult["PARAMS"]["USE_AUTO"] = $arParams["USE_AUTO"];
	if ($arParams["AUTO_TIME"] < 1000) {$arParams["AUTO_TIME"] = 1000;}
	$arParams["AUTO_TIME"] = intval($arParams["AUTO_TIME"]);
	$arResult["PARAMS"]["AUTO_TIME"] = $arParams["AUTO_TIME"];
	
	$arParams["ARROWS_TOP_MARGIN"] = abs($arParams["ARROWS_TOP_MARGIN"]);
	if ($arParams["ARROWS_TOP_MARGIN"] > 100) {$arParams["ARROWS_TOP_MARGIN"] = 100;}
	$arParams["ARROWS_TOP_MARGIN"] = 100 - $arParams["ARROWS_TOP_MARGIN"];
	$arResult["PARAMS"]["ARROWS_TOP_MARGIN"] = $arParams["ARROWS_TOP_MARGIN"];
	
	$arParams["ARROWS_HEIGHT"] = abs($arParams["ARROWS_HEIGHT"]);
	if ($arParams["ARROWS_HEIGHT"] > 100) {$arParams["ARROWS_HEIGHT"] = 100;}
	$arResult["PARAMS"]["ARROWS_HEIGHT"] = $arParams["ARROWS_HEIGHT"];
	
	$arParams["SLIDE_CHANGE_TIME"] = abs($arParams["SLIDE_CHANGE_TIME"]);
	$arParams["SLIDE_CHANGE_TIME"] = intval($arParams["SLIDE_CHANGE_TIME"]);
	if ($arParams["SLIDE_CHANGE_TIME"] > 10000) {$arParams["SLIDE_CHANGE_TIME"] = 10000;}
	$arResult["PARAMS"]["SLIDE_CHANGE_TIME"] = $arParams["SLIDE_CHANGE_TIME"];
	
	
	/* Forming arResult */
	CModule::IncludeModule('iblock');
	
	//Sorting
	$arSort = array(
		"SORT" => "ASC"
	);
	//FILTER
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_LID" => SITE_ID,
		"IBLOCK_ACTIVE" => "Y",
		"ACTIVE_DATE" => "Y",
		"ACTIVE" => "Y",
	);
	//SELECT
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"CODE",
		"XML_ID",
		"NAME",
		"SORT",
		"PREVIEW_TEXT",
		"PREVIEW_TEXT_TYPE",
		"DETAIL_TEXT",
		"DETAIL_TEXT_TYPE",
		"DETAIL_PICTURE",
		"PREVIEW_PICTURE",
		//"PROPERTY_*",
	);
	
	$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
	$i = 0;
	while($obElement = $rsElement->GetNextElement()) {
		$arResult["SLIDES"][$i] = $obElement->GetFields();
		$arResult["SLIDES"][$i]["PREVIEW_PICTURE"] = (0 < $arResult["SLIDES"][$i]["PREVIEW_PICTURE"] ? CFile::GetFileArray($arResult["SLIDES"][$i]["PREVIEW_PICTURE"]) : false);
		$arResult["SLIDES"][$i]["DETAIL_PICTURE"] = (0 < $arResult["SLIDES"][$i]["DETAIL_PICTURE"] ? CFile::GetFileArray($arResult["SLIDES"][$i]["DETAIL_PICTURE"]) : false);
		$arResult["SLIDES"][$i]["PROPERTIES"] = $obElement->GetProperties();
		
		$arResult["SLIDES"][$i]["MORE_PHOTO"] = array();
		if(isset($arResult["SLIDES"][$i]["PROPERTIES"]["MORE_PHOTO"]["VALUE"]))
		{
			$FILE = CFile::GetFileArray($arResult["SLIDES"][$i]["PROPERTIES"]["MORE_PHOTO"]["VALUE"]);
			$arResult["SLIDES"][$i]["MORE_PHOTO"] = $FILE;
		}
		
		if(isset($arResult["SLIDES"][$i]["PROPERTIES"]["MORE_PHOTO"]["VALUE"]) && is_array($arResult["SLIDES"][$i]["PROPERTIES"]["MORE_PHOTO"]["VALUE"]))
		{
			foreach($arResult["SLIDES"][$i]["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $FILE)
			{
				$FILE = CFile::GetFileArray($FILE);
				if(is_array($FILE))
					$arResult["SLIDES"][$i]["MORE_PHOTO"][]=$FILE;
			}
		}
		$arButtons = CIBlock::GetPanelButtons(
			$arParams["IBLOCK_ID"],
			$arResult["SLIDES"][$i]["ID"],
			0,
			array("SECTION_BUTTONS"=>false, "SESSID"=>false)
		);
		$arResult["SLIDES"][$i]["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
		$arResult["SLIDES"][$i]["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
		$i++;
	}
	
	// Button "add slide" in redo mode panel
	$arButtons = CIBlock::GetPanelButtons(
		$arParams["IBLOCK_ID"],
		0,
		0,
		array("SECTION_BUTTONS"=>false, "SESSID"=>false)
	);
	if($APPLICATION->GetShowIncludeAreas()) {
		$this->AddIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
	}
	
	$this->IncludeComponentTemplate();
	
}
?>