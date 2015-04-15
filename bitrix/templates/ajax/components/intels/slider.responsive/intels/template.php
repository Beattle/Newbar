<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Открываем базовую структуру слайдера
echo <<<END
	<section class="slidercontainer row ">
		<div class="slides">
END;

// Слайды обязательно выводить в article или div
foreach($arResult["SLIDES"] as $key => $arSlide) {
	$activeSlide = "";
	if ($key == 0) {$activeSlide = "active";}
	if ($arSlide["PROPERTIES"]["LINK"]["VALUE"]) {
		$slideLink = "href=\"{$arSlide["PROPERTIES"]["LINK"]["VALUE"]}\"";
	}
	$this->AddEditAction($arSlide['ID'], $arSlide['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arSlide['ID'], $arSlide['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('Готово!')));
	echo <<<END
		<article id="{$this->GetEditAreaId($arSlide['ID'])}" class="slideContainer row {$activeSlide}">
		<a class="link-block" {$slideLink}>
			<figure>
				<img src="{$arSlide["PREVIEW_PICTURE"]["SRC"]}" />
			</figure>
				</a>
		</article>
END;

	//<h1>{$arSlide["NAME"]}</h1>
	// 					<p class="only-d">{$arSlide["PREVIEW_TEXT"]}</p>

		}
	
	// Закрываем div со слайдами
	echo "</div>";
	
	// Подключаем стрелки переключения слайдера, если отмечена опция
	if ($arResult["PARAMS"]["USE_ARROWS"] == "Y") {
		echo <<<END
			<div class="arrows">
				<div class="arrow leftArrow"></div>
				<div class="arrow rightArrow"></div>
		 	</div>
END;
	}
	
	// Подключаем кнопки переключения слайдера, если отмечена опция
	if ($arResult["PARAMS"]["USE_SWITCHER"] == "Y") {
		echo "<div class=\"switcher row pad vpad mar-t\">";
			foreach($arResult["SLIDES"] as $key => $arSlide) {
				$activeSwitch = "";
				if ($key == 0) {$activeSwitch = "activeSwitch";}
				echo "<a class=\"switcher-button {$activeSwitch}\">&nbsp;</a>";
			}
		echo "</div>";
	}
	
	// Параметры для передачи в jquery
	echo "<input id =\"PROPORTION\" type=\"hidden\" value=\"{$arResult["PARAMS"]["PROPORTION"]}\" />";
	echo "<input id =\"PROPORTION_MOBILE\" type=\"hidden\" value=\"{$arResult["PARAMS"]["PROPORTION_MOBILE"]}\" />";
	echo "<input id =\"MOBILE_SCREEN_POINT\" type=\"hidden\" value=\"{$arResult["PARAMS"]["MOBILE_SCREEN_POINT"]}\" />";
	echo "<input id =\"USE_AUTO\" type=\"hidden\" value=\"{$arResult["PARAMS"]["USE_AUTO"]}\" />";
	echo "<input id =\"AUTO_TIME\" type=\"hidden\" value=\"{$arResult["PARAMS"]["AUTO_TIME"]}\" />";
	echo "<input id =\"ARROWS_TOP_MARGIN\" type=\"hidden\" value=\"{$arResult["PARAMS"]["ARROWS_TOP_MARGIN"]}\" />";
	echo "<input id =\"ARROWS_HEIGHT\" type=\"hidden\" value=\"{$arResult["PARAMS"]["ARROWS_HEIGHT"]}\" />";
	echo "<input id =\"SLIDE_CHANGE_TIME\" type=\"hidden\" value=\"{$arResult["PARAMS"]["SLIDE_CHANGE_TIME"]}\" />";
	
	// Закрываем структуру слайдера
	echo "</section>";
?>

<?
//echo '<pre>'; print_r($arParams); echo '</pre>';
//echo '<pre>'; print_r($arResult); echo '</pre>';
?>