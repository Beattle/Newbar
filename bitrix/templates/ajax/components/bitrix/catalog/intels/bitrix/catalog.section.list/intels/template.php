<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
// Хлебные крошки и заголовок
echo "<div class=\"mar-t pad\">
		<p class=\"pad breadcrumbs\">";
			$APPLICATION->IncludeComponent("bitrix:breadcrumb", "intels", array(
				"START_FROM" => "1",
				"PATH" => "/catalog/",
				"SITE_ID" => "s1"
				),
				false
			);
		echo "</p>";
	if ($arResult["SECTION"]) {
		echo "<p class=\"h1 pad category \">{$arResult["SECTION"]["NAME"]}</p>";
	}
echo "</div>";

// Список категорий
if ($arResult["SECTIONS"]) {
	echo "<div class=\"sections mar-t\">
			<section class=\"row\">";
	foreach($arResult["SECTIONS"] as $key => $arSection) {
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		echo "<article id=\"{$this->GetEditAreaId($arSection['ID'])}\" class=\"cell-t-16 first-item bg-1 eq-height border-1\">
				<a class=\"link-block button \" href=\"{$arSection["SECTION_PAGE_URL"]}\">
					<div class=\"category_caption pad vpad h2 text-center\">{$arSection["NAME"]}</div>
					<figure class=\"pad vpad bg-1\"><img src=\"{$arSection["PICTURE"]["SRC"]}\" /></figure>
				</a>
			</article>";
		if (($key+1)%6 == 0 AND $key != 0) {
			echo "</section><section class=\"row\">";
		}
	}
	echo "</section>
		</div>";
}
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>



<script type="text/javascript">
    var artricle = $('.sections section.row article');
    var quantity = artricle.length;
    if(quantity < 6)
    artricle.width(String(100/quantity)+'%');

</script>