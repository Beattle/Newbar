<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

echo "<div class=\"basketContainer\">";

// В случае если корзина не пуста или пуста, но потому что заказ успешно завершен - показываем корзину
if ((isset($arResult["ITEMS"]["AnDelCanBuy"]) && !empty($arResult["ITEMS"]["AnDelCanBuy"])) || (isset($_REQUEST["ORDER_ID"]) && !empty($_REQUEST["ORDER_ID"]))) {
	echo "<section class=\"basket mar-t row\">
			<!--<div class=\"sort\">
				<a class=\"border-radius basket-clear link-block pad button bg-4 reverse input-button small cell-m-auto\" href=\"#\">Очистить корзину</a>
			</div>-->";
			
			// WARNING
			if(is_array($arResult["WARNING_MESSAGE"]) && !empty($arResult["WARNING_MESSAGE"])) {
				foreach($arResult["WARNING_MESSAGE"] as $v)
				{
					echo "<p>{$v}</p>";
				}
			}
			
			// FORM
			echo "<form class=\"basketForm\" method=\"post\" action=\"".POST_FORM_ACTION_URI."\" name=\"basket_form\">";
				echo "<input type=\"hidden\" name=\"BasketRefresh\" value=\"submit\" />"; // Без этого инпута не будет меняться корзина
				
				if ($arResult["ShowReady"]=="Y") {
					foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arItem) {
						echo "<article class=\"row bg-1 border-basket\">";
								if ($arItem["PREVIEW_PICTURE"]) {
									echo "<div class=\"only-d cell-d-12-5 pad vpad\">
											<figure><img src=\"{$arItem["PREVIEW_PICTURE"]["SRC"]}\" /></figure>
										</div>";
								}
								$colorHtml = "";
								if ($arItem["PROPS"]["0"]["VALUE"] != "не указан") {$colorHtml = "Цвет: {$arItem["PROPS"]["0"]["VALUE"]}";}
								echo "<div class=\"cell-m-100 cell-t-50 pad vpad\">
										<h2><a href=\"{$arItem["DETAIL_PAGE_URL"]}\">{$arItem["NAME"]}</a></h2>
										<p>{$colorHtml}</p>
									</div>";
								echo "<div class=\"quantityChanger cell-m-25 cell-t-12-5 pad vpad\">
										<input class=\"quantity h2 input-text cell-m-75 text-center\" type=\"text\" name=\"QUANTITY_{$arItem["ID"]}\" value=\"{$arItem["QUANTITY"]}\" />
										<div class=\"up bg-3 button reverse input-button small cell-m-25\"></div>
										<div class=\"down bg-3 button reverse input-button small cell-m-25\"></div>
									</div>";
								echo "<div class=\"price cell-m-50 cell-t-25 cell-d-18-75 vpad pad h3\">
										<div>{$arItem["PRICE_FORMATED"]}</div>
										<div><strong>{$arItem["PRICE_QUANTITY"]}</strong></div>
									</div>";
								echo "<div class=\"basket-delete cell-m-25 cell-t-12-5 cell-d-6-25 vpad pad\">
										<div class=\"bg-1 button\"></div>
										<input type=\"hidden\" name=\"DELETE_{$arItem["ID"]}\" value=\"N\" />
									</div>";
							echo "</article>";
					}
				}
			echo "</form>";
		echo "</section>";
		
		// Выводим итоговую плашку корзины
		$lastNumber = substr($arResult["allQuantity"], strlen($arResult["allQuantity"])-1, 1);
		if (strlen($arResult["allQuantity"]) > 1) {$almostLastNumber = substr($arResult["allQuantity"], strlen($arResult["allQuantity"])-2, 1);}
		if ($lastNumber == 1 AND $almostLastNumber != 1) {
			$word = "товар";
		} elseif ($lastNumber > 1 AND $lastNumber < 5 AND $almostLastNumber != 1) {
			$word = "товара";
		} elseif ($lastNumber > 4 OR $lastNumber == 0 OR $almostLastNumber = 1) {
			$word = "товаров";
		}
		
		echo "<section class=\"basketTotal mar-t row bg-2 vpad border-basket\" id=\"orderAncor\">
		
				<div class=\"cell-m-100 cell-t-50 pad h2\">Итого:</div>
		
				<div class=\"cell-m-100 cell-t-50 h2\">
					<span class=\"pad\">{$arResult["allQuantity"]} {$word}:</span>
					<span class=\"pad\"><strong>{$arResult["allSum_FORMATED"]}</strong></span>
				</div>
				
				<div class=\"cell-m-100 cell-t-50 mar-t-50 pad vpad\">";
					$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/bitrix/templates/design-station/includes/element_delivery.php",
						"EDIT_TEMPLATE" => "standard.php"
						),
						false
					);
				echo "</div>";
		echo "</section>";
		
} else {	// Если в корзине ничего нет
	echo "<section class=\"basket mar-t pad vpad row\">
			<p style=\"margin-top: 0;\">В корзине ничего нет</p>
		</section>";
}
echo "</div>";

//echo "<pre>"; print_r($arParams); echo "</pre>";
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>