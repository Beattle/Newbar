<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["DISPLAY_TOP_PAGER"]) {
	echo "<section class=\"nav mar-t pad\">";
		echo $arResult["NAV_STRING"];
	echo "</section>";
}

echo "<section class=\"mar-t\">";
	echo "<h1 class=\"pad\">{$arResult["NAME"]}</h1>";
	if ($arResult["ITEMS"]) {
		foreach ($arResult["ITEMS"] as $key => $arItem) {
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			echo "<article class=\"row vpad2\" id=\"{$this->GetEditAreaId($arItem['ID'])}\">
					<h2 class=\"pad\">{$arItem["NAME"]}</h2>
					<div class=\"cell-t-75 pad\">";
						if ($arItem["DISPLAY_ACTIVE_FROM"]) {echo "<p>{$arItem["DISPLAY_ACTIVE_FROM"]}</p>";}
						if ($arItem["PREVIEW_TEXT"]) {echo "<p>{$arItem["PREVIEW_TEXT"]}</p>";}
						echo "<p><a href=\"{$arItem["DETAIL_PAGE_URL"]}\">Читать подробнее</a></p>
					</div>";
					if ($arItem["PREVIEW_PICTURE"]) {echo "<figure class=\"cell-t-25 pad vpad\"><img src=\"{$arItem["PREVIEW_PICTURE"]["SRC"]}\" /></figure>";}
			echo "</article>";
		}
	} else {
		echo "<h2 class=\"pad\">Новостей нет</h1>";
	}
echo "</section>";

if($arParams["DISPLAY_BOTTOM_PAGER"]) {
	echo "<section class=\"nav mar-t pad\">";
		echo $arResult["NAV_STRING"];
	echo "</section>";
}


//echo "<pre>"; print_r($arResult); echo "</pre>";
?>