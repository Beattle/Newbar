<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult)) return;

$menuTmp = array();
// убираем все запрещенные пункты
foreach($arResult as $arItem) {
	if ($arItem["PERMISSION"] > "D") {
		$menuTmp[] = $arItem;
	}
}

if (empty($menuTmp)) return;

// Проставляем css классы
$prevLvl = 0; // глубина предыдущего уровня
foreach($menuTmp as $arIndex => $arItem) {

	$menuTmp[$arIndex]["CLASS"] = "";
	
	if ($arItem['SELECTED']) {
		$menuTmp[$arIndex]["CLASS"] .= ' selected';
	}
	if ($arItem['IS_PARENT']) {
		$menuTmp[$arIndex]["CLASS"] .= ' parent';
	}
	if ($prevLvl < $arItem["DEPTH_LEVEL"]) {
		$menuTmp[$arIndex]["CLASS"] .= " first-item";
	}
	
	// Вешаем last-item на элементы, не являющиеся parent
	if ($prevLvl > $arItem["DEPTH_LEVEL"]) {
		$menuTmp[$arIndex - 1]["CLASS"] .= " last-item";
	}
	
	// Формируем массив ключей, являющиеся одновременно last-item и parent и вешаем классы last-item на нужные элементы меню
	if ($prevLvl < $arItem["DEPTH_LEVEL"] AND $arIndex != 0) {
		$unknownLastItem[$arIndex - 1] = $menuTmp[$arIndex - 1]["DEPTH_LEVEL"];
	}

    if(is_array($unknownLastItem)){
	foreach ($unknownLastItem as $keyUnknown => $arUnknown) {
		if ($arUnknown > $arItem["DEPTH_LEVEL"]) {
			$menuTmp[$keyUnknown]["CLASS"] .= " last-item";
			unset($unknownLastItem[$keyUnknown]);
		} elseif ($arUnknown == $arItem["DEPTH_LEVEL"]) {
			unset($unknownLastItem[$keyUnknown]);
		}
	}
    }
	 
	$prevLvl = $arItem["DEPTH_LEVEL"];
}

// Вешаем last-item на элементы, одновременно являющиеся last-item и parent, оставшиеся в массиве (остаются, потому что после них нет элементов такого же уровня или уровнем выше)
foreach ($unknownLastItem as $keyUnknown => $arUnknown) {$menuTmp[$keyUnknown]["CLASS"] .= " last-item";}

// Вешаем last-item на последний элемент меню
$menuTmp[count($menuTmp) - 1]['CLASS'] .= ' last-item';



// Вывод HTML
$menuLastKey = count($menuTmp) - 1;
echo "<ul class=\"button-group-break\">";
	foreach($menuTmp as $key => $arItem) {
		$arItem["CLASS"] = trim($arItem["CLASS"]);
		echo "<li class=\"".($arItem["CLASS"] ? "{$arItem["CLASS"]}" : "")."\">";
		$aClass = "";
		if ($arItem["DEPTH_LEVEL"] == 1) {$aClass = "h2";}
		if ($arItem["IS_PARENT"]) {$aClass .= " dropdown";}
		echo "<a href=\"{$arItem["LINK"]}\" class=\"link-block border-3 pad vpad bg-3 button {$aClass}\">{$arItem["TEXT"]}</a>";
		
		if ($arItem["IS_PARENT"]) {
			echo "<ul>";
		} else {
			echo "</li>";
		}
		
		if ($key != $menuLastKey) {
			$levelDifference = $arItem["DEPTH_LEVEL"] - $menuTmp[$key + 1]["DEPTH_LEVEL"];
			if ($levelDifference > 0) {
				for ($i = 0; $i < $levelDifference; $i++) {
					echo "</ul></li>";
				}
			}
		} else {
			for ($i=0; $i < $arItem["DEPTH_LEVEL"] - 1; $i++) {
				echo "</ul></li>";
			}
		}
	}
echo "</ul>";
?>

<!--<pre><?// print_r($arResult); ?></pre>-->