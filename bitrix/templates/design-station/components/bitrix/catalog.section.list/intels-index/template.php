<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

//echo "<h2 class=\"pad mar-t\">Все что нужно бару или ресторану —</h2>";

// Список категорий

if ($arResult["SECTIONS"]) {
	echo "<div class=\"sections mar-t\">
			<section class=\"row\">";
	foreach($arResult["SECTIONS"] as $key => $arSection) {
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		echo "<article id=\"{$this->GetEditAreaId($arSection['ID'])}\" class=\"cell-t-16 first-item bg-1 eq-height border-1\">
				<a class=\"link-block button \" href=\"/catalog/{$arSection["SECTION_PAGE_URL"]}\">
					<figure class=\"pad vpad bg-1\"><img src=\"{$arSection["PICTURE"]["SRC"]}\" /></figure>
					<div class=\"pad  vpad h2 text-center\">{$arSection["NAME"]}</div>
				</a>
			</article>";
		if (($key+1)%6 == 0 AND $key != 0) {
			echo "</section><section class=\"row\">";
		}
	}
	echo "</section>
		</div>";
}


?>