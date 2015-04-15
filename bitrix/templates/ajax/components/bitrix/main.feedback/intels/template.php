<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

echo "<div class=\"feedbackContainer\">";
//echo "<div class=\"feedbackClose popup-close\"></div>";
// Значок Loading
echo "<div class=\"feedbackContainerLoading\"></div>";

//echo "<div class=\"feedbackHeader\"><h2 class=\"big\">Обратная связь</h2></div>";

// ok
if (!empty($arResult["OK_MESSAGE"])) {
	echo "
		<div class=\"feedbackOk\">
			<p>{$arResult["OK_MESSAGE"]}</p>
			<div class=\"formRow submit\">
				<input class=\"buttonOk popup-close\" type=\"button\" value=\"ОК\" />
			</div>
		</div>";
} else {
	// form
	$formName = "feedbackForm".rand();
	echo "<form name=\"{$formName}\" class=\"feedbackForm\" action=\"".$APPLICATION->GetCurPage()."\" method=\"POST\">";

		echo bitrix_sessid_post(); // защита от взлома
		
		// ФИО
		echo "<div class=\"formRow text\">";
			$label = "ФИО";
			if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) {
				$label .= "&nbsp;*";
			}
			echo "<label for=\"user_name\">{$label}</label>";
			echo "<input id=\"user_name\" type=\"text\" name=\"user_name\" value=\"{$arResult["AUTHOR_NAME"]}\" />";
		echo "</div>";
		
		// E-mail
		echo "<div class=\"formRow text\">";
			$label = "E-mail";
			if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) {
				$label .= "&nbsp;*";
			}
			echo "<label for=\"user_email\">{$label}</label>";
			echo "<input id=\"user_email\" type=\"text\" name=\"user_email\" value=\"{$arResult["AUTHOR_EMAIL"]}\" />";
		echo "</div>";

		// Сообщение
		echo "<div class=\"formRow textarea\">";
			$label = "Сообщение";
			if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) {
				$label .= "&nbsp;*";
			}
			echo "<label for=\"user_message\">{$label}</label><br />";
			echo "<textarea id=\"user_message\" name=\"MESSAGE\">{$arResult["MESSAGE"]}</textarea>";
			echo "<div>* - поля обязательные для заполнения</div>";
		echo "</div>";
		
		// Капча
		if ($arParams["~USE_CAPTCHA"] == "Y" || $arParams["USE_CAPTCHA"] == "Y") {
			echo "
				<div class=\"formRow text vpad\">
					<input type=\"hidden\" name=\"captcha_sid\" value=\"{$arResult["capCode"]}\">
					<label for=\"captcha_word\">Введите цифры на картинке:</label><br />
					<figure><img id=\"captcha\" src=\"/bitrix/tools/captcha.php?captcha_sid={$arResult["capCode"]} alt=\"CAPTCHA\" /></figure>
					<div class=\"vpad\"><input id=\"captcha_word\" type=\"text\" name=\"captcha_word\" value=\"\" /></div>
				</div>";
		}
		
		echo "<input type=\"hidden\" name=\"PARAMS_HASH\" value=\"{$arResult["PARAMS_HASH"]}\" />";
		echo "<input type=\"hidden\" name=\"submit\" value=\"submit\" />";
		
		//error
		if (!empty($arResult["ERROR_MESSAGE"])) {
			echo "<div class=\"formError\">";
				echo "<ul>";
				foreach($arResult["ERROR_MESSAGE"] as $value) {
					echo "<li>{$value}</li>";
				}
				echo "</ul>";
			echo "</div>";
		}
		
		echo "
				<div class=\"formRow submit\">
					<input type=\"submit\" name=\"submit\" value=\"Отправить\" />
				</div>
			";
			
	echo "</form>";
}
echo "</div>";
?>
