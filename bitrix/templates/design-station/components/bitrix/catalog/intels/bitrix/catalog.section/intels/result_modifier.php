<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// echo '<pre>' . print_r($GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("IBLOCK_1_SECTION", $arResult['ID'], "UF_ADD2CART"), true) . '</pre>';
// получаем значение пользовательского поля у каждого раздела
 $arUF = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("IBLOCK_1_SECTION",$arResult['ID'],"UF_ADD2CART");
 if($arUF["UF_ADD2CART"]["VALUE"] != ""){
         $arResult["UF_ADD2CART"] = $arUF["UF_ADD2CART"]["VALUE"];
     }


