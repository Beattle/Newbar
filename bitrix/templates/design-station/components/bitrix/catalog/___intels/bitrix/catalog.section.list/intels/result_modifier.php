<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['SECTIONS'] as &$section) :

$arUF = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("IBLOCK_1_SECTION",$section['ID'],"UF_BLUE_PIC");
if($arUF["UF_BLUE_PIC"]["VALUE"] != ""){
    $section["UF_BLUE_PIC"] = $arUF["UF_BLUE_PIC"]["VALUE"];
}
endforeach;


