<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["ITEMS"]) {
	echo "<div class=\"products mar-t\">
			<div class=\"row button-group not-m\">";
				$i = 0;
				foreach ($arResult["IS_MARKS"] as $key => $mark) {
					$isActive = "";
					if ($i == 0) {$isActive = "active";}
					echo "<a class=\"border-radius-top cell-t-auto link-block bg-4 button radio accordion-next pad input-button small {$isActive}\" href=\"#\">{$mark}</a>";
					$i++;
				}
		echo "</div>";
		
		echo "<div class=\"row small\">";
			if ($arResult["IS_MARKS"]["ON_SALE"]) {
				echo "<section class=\"row\">
						<div class=\"row\">
						<a class=\"link-block h2 bg-4 button pad input-button only-m\" href=\"/\">{$arResult["IS_MARKS"]["ON_SALE"]}</a>";
						$i = 0;
						foreach ($arResult["ITEMS"] as $key => $arElement) {
							if ($arElement["ON_SALE"]) {
								$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
								$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
								$notM = "";
								if ($i != 0) {$notM = "not-m";}
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
								if (($i+1)%4 == 0) {echo "</div><div class=\"row only-m\">";}
								$i++;
							}
						}
				echo "</div>";
					if ($i > 4) {echo "<a class=\"border-radius top-opener link-block bg-3 button reverse pad input-button cell-m-auto not-m small\"><span>Показать всё</span><span class=\"hidden\">Скрыть</span></a>";}
				echo "</section>";
			}
			
			if ($arResult["IS_MARKS"]["LIDER_OF_SALES"]) {
				echo "<section class=\"row only-m\">
						<div class=\"row\">
						<a class=\"link-block h2 bg-4 button pad input-button only-m\" href=\"/\">{$arResult["IS_MARKS"]["LIDER_OF_SALES"]}</a>";
						$i = 0;
						foreach ($arResult["ITEMS"] as $key => $arElement) {
							if ($arElement["LIDER_OF_SALES"]) {
								$notM = "";
								if ($i != 0) {$notM = "not-m";}
								echo "<article class=\"cell-t-25 bg-1 button eq-height border-1 {$notM}\" id=\"{$this->GetEditAreaId($arElement['ID'])}\">
										<a class=\"link-block pad vpad\" href=\"/catalog/{$arElement["DETAIL_PAGE_URL"]}\">
											<h3>{$arElement["NAME"]}</h3>
											<p class=\"price h2\">{$arElement["PRICES"]["BASE"]["PRINT_VALUE"]}</p>
											<figure><img src=\"{$arElement["PREVIEW_PICTURE"]["SRC"]}\" /></figure>
										</a>
									</article>";
								if (($i+1)%4 == 0) {echo "</div><div class=\"row only-m\">";}
								$i++;
							}
						}
				echo "</div>";
					if ($i > 4) {echo "<a class=\"border-radius top-opener link-block bg-3 button reverse pad input-button cell-m-auto not-m small\"><span>Показать всё</span><span class=\"hidden\">Скрыть</span></a>";}
				echo "</section>";
			}
			
			if ($arResult["IS_MARKS"]["NOVELTY"]) {
				echo "<section class=\"row only-m\">
						<div class=\"row\">
						<a class=\"link-block h2 bg-4 button pad input-button only-m\" href=\"/\">{$arResult["IS_MARKS"]["NOVELTY"]}</a>";
						$i = 0;
						foreach ($arResult["ITEMS"] as $key => $arElement) {
							if ($arElement["NOVELTY"]) {
								$notM = "";
								if ($i != 0) {$notM = "not-m";}
								echo "<article class=\"cell-t-25 bg-1 button eq-height border-1 {$notM}\" id=\"{$this->GetEditAreaId($arElement['ID'])}\">
										<a class=\"link-block pad vpad\" href=\"/catalog/{$arElement["DETAIL_PAGE_URL"]}\">
											<h3>{$arElement["NAME"]}</h3>
											<p class=\"price h2\">{$arElement["PRICES"]["BASE"]["PRINT_VALUE"]}</p>
											<figure><img src=\"{$arElement["PREVIEW_PICTURE"]["SRC"]}\" /></figure>
										</a>
									</article>";
								if (($i+1)%4 == 0) {echo "</div><div class=\"row only-m\">";}
								$i++;
							}
						}
				echo "</div>";
					if ($i > 4) {echo "<a class=\"border-radius top-opener link-block bg-3 button reverse pad input-button cell-m-auto not-m small\"><span>Показать всё</span><span class=\"hidden\">Скрыть</span></a>";}
				echo "</section>";
			}
			
		echo "</div>";
	echo "</div>";
}

//echo "<pre>"; print_r($arResult); echo "</pre>";
?>