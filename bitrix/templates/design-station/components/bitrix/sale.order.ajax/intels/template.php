<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

echo "<section class=\"order mar-m row\">";

// Если заказ подтвержден
if ($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y") {
		// Спасибо за покупку
		if (!empty($arResult["ORDER_ID"])) {
			echo "<input type=\"hidden\" id=\"orderComplite\">";  // Если этот инпут есть, jquery удаляет с экрана корзину
      echo "<input type=\"hidden\" class=\"orderNum\" value=\"{$arResult["ORDER_ID"]}\" />"; //для подсказок купить еще
			echo "<h1>Заказ № {$arResult["ORDER_ID"]} принят.</h1>";
			echo "<p>Специалист свяжется с вами в ближайшее время.</p>";
			echo "<p>Мы с удовольствием ответим на любой вопрос по телефону <strong>";
				$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/bitrix/templates/design-station/includes/phone1.php",
					"EDIT_TEMPLATE" => "standard.php"
					),
					false
				);
			echo "</strong>.</p>";
			echo "<h2>Спасибо!</h2>";
      echo "<img src=\"//drs2.veinteractive.com/DataReceiverService.asmx/Pixel?journeycode=A49C687B-8D88-45AA-AD67-48D3C01F4A30\" width=\"1\" height=\"1\" />";
		} else {
			echo "<div class=\"formError\">";
			echo "<ul><li>Ошибка при формировании заказа</li></ul>";
			echo "</div>";
		}
	
// Форма заказа	- если заказ еще не подтвержден.
} else {

	// Подключаем функцию, которая выводит html полей формы в соответствии с $arResult["ORDER_PROP"] (поля в дивах)
	include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/PrintPropsForm.php");
		
		echo "<header class=\"row \"><h1>Оформление заказа</h1></header>";
		$FORM_NAME = "ORDERFORM_".RandString(5);
		
		echo "<form id=\"orderForm\" method=\"POST\" action=\"\" name=\"{$FORM_NAME}\">";
			// Служебные поля
			echo "<input type=\"hidden\" name=\"PERSON_TYPE\" value=\"{$arResult["USER_VALS"]["PERSON_TYPE_ID"]}\" />";
			echo "<input type=\"hidden\" name=\"PERSON_TYPE_OLD\" value=\"{$arResult["USER_VALS"]["PERSON_TYPE_ID"]}\" />";
			echo "<input type=\"hidden\" name=\"PAY_SYSTEM_ID\" value=\"{$arResult["USER_VALS"]["PAY_SYSTEM_ID"]}\" />";
			echo "<input type=\"hidden\" name=\"confirmorder\" id=\"confirmorder\" value=\"Y\" />";
			
			if (!empty($arResult["ORDER_PROP"]["USER_PROPS_Y"])) {
				foreach ($arResult["ORDER_PROP"]["USER_PROPS_Y"] as $key => $arProperties) {
					PrintPropsForm($arProperties);
					if ($arProperties["NAME"] == "Телефон") {

                        // SUBMIT
                        echo "<div class=\"submit pad cell-m-100 cell-t-50 cell-d-25\">
                                                <div class=\"row \">";
                        echo "<input class=\"button  \" type='submit' name=\"ok\" value=\"Завершить заказ\" />";
                        echo "</div>";
                        // ERROR
                        if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y") {
                            echo "<div class=\"formError\">";
                            echo "<ul>";
                            foreach($arResult["ERROR"] as $v) {
                                echo "<li class=\"h2\" style=\"color:red; \">{$v}</li>";
                            }
                            echo "</ul>";
                            echo "</div>";
                        }
                        echo '</div>';

						echo "<div class=\"row not-phone cell-d-68-75\">"; // открываем дивы для остальных полей <div class=\"pad cell-m-100 cell-t-50\">

					}
                    if($arProperties['NAME'] == 'Получать рассылку')
                        echo '</div>
                              <div class="row pad not-phone cell-d-68-75">
                                <div class="cell-d-43-75">';
                    if($arProperties['NAME'] == 'Доставка')
                        echo    '</div>
                                <div class="cell-d-43-75 mar-d-l textarea-2">';
                    if($arProperties['NAME'] == 'Комментарий к заказу')
                        echo    '</div>';

				}
			}
			if (!empty($arResult["ORDER_PROP"]["USER_PROPS_N"])) {
				foreach ($arResult["ORDER_PROP"]["USER_PROPS_N"] as $key => $arProperties) {
					PrintPropsForm($arProperties);
				}
			}
			
				// echo "</div>";
				

			 echo "</div>"; // закрываем дивы для остальных полей
    echo "</div>";


		echo "</form>";
}
//echo "<pre>"; print_r($_REQUEST); echo "</pre>";
//echo "<pre>"; print_r($arParams); echo "</pre>";
//echo "<pre>"; print_r($arResult); echo "</pre>";

echo "</section>";
?>