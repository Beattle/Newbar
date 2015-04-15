<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

function PrintPropsForm($arProperties=Array()) {
			
			// PHONE - должен быть первым, чтобы открыть див для остальных полей
			if ($arProperties["NAME"] == "Телефон") {
				if ($arProperties["VALUE"] != "") {
					$val = $arProperties["VALUE"];
				} else {
					$val = $arProperties["DEFAULT_VALUE"];
				}
				echo "<div class=\"row bg-2\">
						<div class=\"pad vpad cell-m-100 cell-t-50\">
							<input id=\"{$arProperties["FIELD_NAME"]}\" class=\"input-phone input-text cell-m-100 pad\" type=\"text\" name=\"{$arProperties["FIELD_NAME"]}\" value=\"{$val}\" />
							<div class=\"hidden\">{$arProperties["DEFAULT_VALUE"]}</div>
						</div>
						<label for=\"{$arProperties["FIELD_NAME"]}\" class=\"pad vpad cell-m-100 cell-t-50\">{$arProperties["DESCRIPTION"]}</label>
					</div>";
			}
			
			// TEXT
			elseif($arProperties["TYPE"] == "TEXT") {
				if ($arProperties["VALUE"] == "konstantin-ponizov@yandex.ru") {$arProperties["VALUE"] = "E-mail";}
				echo "<div class=\"row vpad\">
						<input class=\"input-text pad cell-m-100\" type=\"text\" name=\"{$arProperties["FIELD_NAME"]}\" value=\"{$arProperties["VALUE"]}\" id=\"{$arProperties["FIELD_NAME"]}\" />
						<div class=\"hidden\">{$arProperties["DEFAULT_VALUE"]}</div>
					</div>";
			}
			
			// TEXTAREA
			elseif ($arProperties["TYPE"] == "TEXTAREA") {
				echo "<div class=\"row vpad\">
						<textarea name=\"{$arProperties["FIELD_NAME"]}\" class=\"input-textarea pad vpad cell-m-100\" id=\"{$arProperties["FIELD_NAME"]}\">{$arProperties["VALUE"]}</textarea>
						<div class=\"hidden\">{$arProperties["DEFAULT_VALUE"]}</div>
					</div>";
			}
			
			// CHECKBOX
			elseif($arProperties["TYPE"] == "CHECKBOX") {
				$checked = "";
				if ($arProperties["CHECKED"]=="Y") {
					$checked = "active";
				}
				echo "<div class=\"input-checkbox row\">
						<div class=\"bg-1 button reverse {$checked}\" id=\"{$arProperties["FIELD_NAME"]}\"><div class=\"active-mark\"></div></div>
						<label class=\"pad\" for=\"{$arProperties["FIELD_NAME"]}\">{$arProperties["NAME"]}</label>
						<input type=\"hidden\" name=\"{$arProperties["FIELD_NAME"]}\" value=\"{$arProperties["DEFAULT_VALUE"]}\" />
					</div>";
			}
			
			// RADIO
			elseif ($arProperties["TYPE"] == "RADIO")
			{
				echo "<div class=\"formRow radio\">";
					echo "<label>{$label}</label>";
					foreach($arProperties["VARIANTS"] as $arVariants)
					{
						$checked = "";
						if ($arVariants["CHECKED"]=="Y") {
							$checked = "checked";
						}
						echo "<div class=\"formRowInner\">";																					
							echo "<input type=\"radio\" name=\"{$arProperties["FIELD_NAME"]}\" id=\"{$arProperties["FIELD_NAME"]}_{$arVariants["VALUE"]}\" value=\"{$arVariants["VALUE"]}\" {$checked} />";
							echo "<label for=\"{$arProperties["FIELD_NAME"]}_{$arVariants["VALUE"]}\">{$arVariants["NAME"]}</label>";
						echo "</div>";
					}
					// echo "<div class=\"formLabel\">{$label}. {$arProperties["DESCRIPTION"]}</div>";
				echo "</div>";
			}
			
			// SELECT
			elseif($arProperties["TYPE"] == "SELECT") {
				echo "<div class=\"select row vpad\">";
					echo "<div class=\"options cell-m-90\">";
						if ($arProperties["VALUE_FORMATED"]) {
							foreach ($arProperties["VARIANTS"] as $key => $arVariant) {
								if ($arProperties["VALUE_FORMATED"] == $arVariant["NAME"]) {
									$selectValueFormatted = $arProperties["VALUE_FORMATED"];
									$selectValue = $arVariant["VALUE"];
								}
							}
						} else {
							$selectValueFormatted = $arProperties["VARIANTS"]["0"]["VALUE_FORMATED"];
							$selectValue = $arProperties["VARIANTS"]["0"]["VALUE"];
						}
						echo "<div class=\"input-text pad cell-m-100\">{$selectValueFormatted}<div class=\"hidden\">{$selectValue}</div></div>";
						echo "<div class=\"hidden\">";
							foreach ($arProperties["VARIANTS"] as $key => $arVariant) {
								echo "<div class=\"input-text pad cell-m-100\" type=\"text\">{$arVariant["NAME"]}<div class=\"hidden\">{$arVariant["VALUE"]}</div></div>";
							}
						echo "</div>";
					echo "</div>";
					echo "<div class=\"bg-3 button input-button down cell-m-10\"></div>";
					echo "<input type=\"hidden\" name=\"{$arProperties["FIELD_NAME"]}\" value=\"{$selectValue}\" id=\"{$arProperties["FIELD_NAME"]}\" />";
				echo "</div>";
			}
			
			// MULTISELECT
			elseif ($arProperties["TYPE"] == "MULTISELECT")
			{
				echo "<div class=\"formRow multiselect\">";
					echo "<label for=\"{$arProperties["FIELD_NAME"]}\">{$label}</label>";
					echo "<select multiple name=\"{$arProperties["FIELD_NAME"]}\" id=\"{$arProperties["FIELD_NAME"]}\" size=\"{$arProperties["SIZE1"]}\">";
					// echo "<option value=\"\"></option>";
					foreach($arProperties["VARIANTS"] as $arVariants)
					{
						$selected = "";
						if ($arVariants["SELECTED"]=="Y") {
							$selected = "selected";
						}						
						echo "<option value=\"{$arVariants["VALUE"]}\" {$selected} >{$arVariants["NAME"]}</option>";
					}
					echo "</select>";
					// echo "<div class=\"formLabel\">{$label}. {$arProperties["DESCRIPTION"]}</div>";
				echo "</div>";
			}
		
		return true;
}
?>