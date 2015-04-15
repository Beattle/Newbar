<!-- Вывод выпадающего блока с результатами поиска по заголовкам -->

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!empty($arResult["CATEGORIES"])) {
	echo "<div>";
	echo "<table class=\"title-search-result\">";
		foreach($arResult["CATEGORIES"] as $category_id => $arCategory) {
			echo "<tr>";
				echo "<th class=\"title-search-separator\">&nbsp;</th>";
				echo "<td class=\"title-search-separator\">&nbsp;</td>";
			echo "</tr>";
			foreach($arCategory["ITEMS"] as $i => $arItem) {
				echo "<tr>";
					if($i == 0) {
						echo "<th>&nbsp;{$arCategory["TITLE"]}</th>";
					}
					else {
						echo "<th>&nbsp;</th>";
					}
					if($category_id === "all") {
						echo "<td class=\"title-search-all\"><a href=\"{$arItem["URL"]}\">{$arItem["NAME"]}</td>";
					}
					elseif(isset($arItem["ICON"])) {
						echo "<td class=\"title-search-item\"><!--<img src=\"{$arItem["ICON"]}\">--><a href=\"{$arItem["URL"]}\">{$arItem["NAME"]}</td>";
					}
					else {
						echo "<td class=\"title-search-more\"><a href=\"{$arItem["URL"]}\">{$arItem["NAME"]}</td>";
					}
				echo "</tr>";
			}
		}
		echo "<tr>";
			echo "<th class=\"title-search-separator\">&nbsp;</th>";
			echo "<td class=\"title-search-separator\">&nbsp;</td>";
		echo "</tr>";
	echo "</table><div class\"title-search-fader\"></div>";
	echo "</div>";
}
//echo "<pre>",htmlspecialchars(print_r($arResult,1)),"</pre>";
?>
<!--<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<pre>
	<?// print_r($arResult); ?>
</pre>-->