<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Определяем какую метку надо показывать, а так же заголовок H1
$metka_user = $arParams["METKA_NAME"];
if ($metka_user == "NOVELTY") {
	$metka_name = "Новинки";
	$metka_not = "новинок";
} elseif ($metka_user == "ON_SALE") {
	$metka_name = "Распродажа";
	$metka_not = "распродаж";
} elseif ($metka_user == "LIDER_OF_SALES") {
	$metka_name = "Лидеры продаж";
	$metka_not = "лидеров продаж";
}

echo "<section class=\"products mar-t\">
<header class=\"pad vpad\"><h1>{$metka_name}</h1></header>";
if ($arResult["ITEMS"] AND $arResult["IS_MARKS"][$metka_user]) {
				echo "<div class=\"row\">";
					$i = 0;
					foreach ($arResult["ITEMS"] as $key => $arElement) {
						if ($arElement[$metka_user]) {
							$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
							$notM = "";
							if ($i > 2) {$notM = "not-m";}
							echo "<article class=\"cell-t-25 bg-1 button eq-height border-1 {$notM}\" id=\"{$this->GetEditAreaId($arElement['ID'])}\">
									<a class=\"link-block pad vpad\" href=\"/catalog/{$arElement["DETAIL_PAGE_URL"]}\">
										<h3>{$arElement["NAME"]}</h3>
										<p class=\"price h2\">";
											if ($arElement["PRICES"]["BASE"]["PRINT_VALUE"] != 0) {
												echo $arElement["PRICES"]["BASE"]["PRINT_VALUE"];
											} else {
												echo "Цена по запросу";
											}
										echo "</p>
										<figure><img src=\"{$arElement["PREVIEW_PICTURE"]["SRC"]}\" /></figure>
									</a>
								</article>";
							if (($i+1)%4 == 0) {echo "</div><div class=\"row\">";}
							$i++;
						}
					}
			echo "</div>";
} else {
	echo "<p class=\"pad\">В данный момент в магазине нет {$metka_not}</p>";
}
if ($i > 3) {echo "<a class=\"border-radius top-opener link-block bg-3 button reverse pad input-button cell-m-auto only-m small\"><span>Показать всё</span><span class=\"hidden\">Скрыть</span></a>";}
echo "</section>";

//echo "<pre>"; print_r($arParams); echo "</pre>";
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>