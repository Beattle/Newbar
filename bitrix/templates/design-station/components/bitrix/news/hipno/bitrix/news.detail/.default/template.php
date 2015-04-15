<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

echo "<section class=\"mar-t\">";

	echo "<header class=\"pad\">";
		echo "<p><a href=\"/news/\">Все новости</a></p>";
		echo "<h1>{$arResult["NAME"]}</h1>";
	echo "</header>";
	
	echo "<div class=\"row vpad2\">";
		echo "<div>";
			if ($arResult["DISPLAY_ACTIVE_FROM"]) {echo "<p>{$arResult["DISPLAY_ACTIVE_FROM"]}</p>";}
			if ($arResult["PREVIEW_TEXT"]) {echo "<p><strong>{$arResult["PREVIEW_TEXT"]}</strong></p>";}
			if ($arResult["DETAIL_TEXT"]) {echo "<p>{$arResult["DETAIL_TEXT"]}</p>";}
		echo "</div>";
		echo "<div>";
			if ($arResult["PREVIEW_PICTURE"] OR $arResult["DETAIL_PICTURE"]) {
				echo "<div class=\"cell-m-100\">";
					if ($arResult["PREVIEW_PICTURE"]) {echo "<figure class=\"cell-t-50 pad vpad\"><img src=\"{$arResult["PREVIEW_PICTURE"]["SRC"]}\" /></figure>";}
					if ($arResult["DETAIL_PICTURE"]) {echo "<figure class=\"cell-t-50 pad vpad\"><img src=\"{$arResult["DETAIL_PICTURE"]["SRC"]}\" /></figure>";}
				echo "</div>";
			}
			if ($arResult["DISPLAY_PROPERTIES"]["FILE"]) {
				echo "<div class=\"cell-m-100\">
						<div class=\"cell-t-50 pad vpad\">
							<a href=\"/\"><img style=\"display: block; margin: 0 auto;\" src=\"/images/copy_2.png\" /></a>
							<p style=\"text-align: center;\"><a href=\"{$arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]}\">".($arResult["DISPLAY_PROPERTIES"]["FILE"]["DESCRIPTION"] ? "{$arResult["DISPLAY_PROPERTIES"]["FILE"]["DESCRIPTION"]}" : "Скачать файл")."</a></p>
						</div>
					</div>";
			}
		echo "</div>";
	echo "</div>";
	
echo "</section>";

//echo "<pre>"; print_r($arResult); echo "</pre>";
?>