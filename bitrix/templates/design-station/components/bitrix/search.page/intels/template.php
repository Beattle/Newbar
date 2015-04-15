<!-- Не забыть настроить include компонента search.title!!! -->

<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

echo "<section class=\"row mar-m\">";

echo "<h1>Результаты поиска</h1>";
// Открываем div класса search-page и форму
echo '<div class="searchContainer updateContainer">';

	// Исправляет запрос с неправильной раскладкой
	if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])) {
		echo "<div class=\"searchLanguageGuess\">";
		echo "<p>В запросе <a href=\"{$arResult["ORIGINAL_QUERY_URL"]}\">{$arResult["REQUEST"]["ORIGINAL_QUERY"]}</a> восстановлена раскладка клавиатуры.</p>";
		echo "</div>";
		// Скрипт ниже меняет неправильную раскладку в компоненте search.title
		echo "<script>";
			echo "$(\".textInput\").attr(\"value\", \"{$arResult["REQUEST"]["QUERY"]}\")";
		echo "</script>";
	}

	// Работа с запросом и результатом
	if($arResult["REQUEST"]["QUERY"] === false) {}
	
	// Если код ошибки не 0, то пишет про ошибку
	elseif($arResult["ERROR_CODE"]!=0){
		echo "<p>В поисковой фразе обнаружена ошибка:</p>";
		ShowError($arResult["ERROR_TEXT"]);	// Вывод названия ошибки
		echo "<p>Исправьте поисковую фразу и повторите поиск.</p>";
		echo "<p><b>Синтаксис поискового запроса:</b><br /><br />Обычно запрос представляет из себя просто одно или несколько слов, например: <br /><i>контактная информация</i><br />По такому запросу будут найдены страницы, на которых встречаются оба слова запроса. <br /><br />Логические операторы позволяют строить более сложные запросы, например: <br /><i>контактная информация или телефон</i><br />По такому запросу будут найдены страницы, на которых встречаются либо слова &quot;контактная&quot; и &quot;информация&quot;, либо слово &quot;телефон&quot;.<br /><br /> <i>контактная информация не телефон</i><br /> По такому запросу будут найдены страницы, на которых встречаются либо слова &quot;контактная&quot; и &quot;информация&quot;, но не встречается слово &quot;телефон&quot;.<br /> Вы можете использовать скобки для построения более сложных запросов.<br /></p>";
		echo "<p><b>Логические операторы:</b></p>";
		echo "<table border=\"0\" cellpadding=\"5\">";
			echo "<tr>";
				echo "<td align=\"center\" valign=\"top\">Оператор</td><td valign=\"top\"> Синонимы</td>";
				echo "<td>Описание</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=\"center\" valign=\"top\">и</td><td valign=\"top\">and, &amp;, +</td>";
				echo "<td>Оператор <i>логическое &quot;и&quot;</i> подразумевается, его можно опускать: запрос &quot;контактная информация&quot; полностью эквивалентен запросу &quot;контактная и информация&quot;.</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=\"center\" valign=\"top\">или</td><td valign=\"top\">or, |</td>";
				echo "<td>Оператор <i>логическое &quot;или&quot;</i> позволяет искать товары, содержащие хотя бы один из операндов.</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=\"center\" valign=\"top\">не</td><td valign=\"top\">not, ~</td>";
				echo "<td>Оператор <i>логическое &quot;не&quot;</i> ограничивает поиск страниц, не содержащих слово, указанное после оператора.</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=\"center\" valign=\"top\">( )</td>";
				echo "<td valign=\"top\">&nbsp;</td>";
				echo "<td><i>Круглые скобки</i> задают порядок действия логических операторов.</td>";
			echo "</tr>";
		echo "</table>";
	}
	
	// Проверяем результаты поиска - пустые или нет
	elseif(count($arResult["SEARCH"])>0) {
		// Выводим верхнюю навигацию, если включен DISPLAY_BOTTOM_PAGER
		if($arParams["DISPLAY_TOP_PAGER"] != "N") {
			echo "<div class=\"navigation\">{$arResult["NAV_STRING"]}</div>";
		}
		
		// Перебираем и выводим результаты поиска
		$categoryCheck = "no";		// Переменная которая смотрит первый ли это элемент результатов поиска в категории
		foreach($arResult["SEARCH"] as $arItem) {
			echo "<div class=\"searchResult\">";
				// Название категории, если это первый элемент в ней
				if ($arResult["SHOW_CATEGORY"] == "Y" and $categoryCheck != $arItem["PARAM1"]) {
					if ($arItem["PARAM1"] != "") {
						$iblock_type_my = CIBlockType::GetByIDLang($arItem["PARAM1"]);
						echo "<h2>{$iblock_type_my["NAME"]}</h2>";
					}
					else {
						echo "<h2>На сайте</h2>";
					}
				}
				$categoryCheck = $arItem["PARAM1"];
				
				// Заголовок
				//$slashposition = strpos($arItem["URL"], '?');
				//$arItem["URL"] = substr_replace($arItem["URL"], '/', $slashposition, 0);
				echo "<h3><a href=\"{$arItem["URL_WO_PARAMS"]}\">{$arItem["TITLE_FORMATED"]}</a></h3>";
				
				// Выводим текст анонса 
				echo "<p class=\"description\">{$arItem["BODY_FORMATED"]}</p>";
				
				// выводим дату изменения
				// echo "<p class=\"date\">Изменен:&nbsp;{$arItem["DATE_CHANGE"]}</p>";
				
				// выводит хлебные крошки к объекту поиска из chain_template
				if (!empty($arItem["BREAD"])) {
					echo "<p class=\"searchBread\">{$arItem["BREAD"]}</p>";
				}
			
			echo "</div>";
		}
	}
	// Если ничего не найдено
	else {
		echo "<div class=\"notfound\"><p>К сожалению, на ваш поисковый запрос ничего не найдено.</p></div>";
	}
	
// Закрываем div класса searchContainer	
echo "</div>";

// Выводим нижнюю навигацию, если включен DISPLAY_BOTTOM_PAGER
if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") {
	echo "<div class=\"navigation\">{$arResult["NAV_STRING"]}</div>";
}

echo "</section>";
?>