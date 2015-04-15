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
	foreach ($unknownLastItem as $keyUnknown => $arUnknown) {
		if ($arUnknown > $arItem["DEPTH_LEVEL"]) {
			$menuTmp[$keyUnknown]["CLASS"] .= " last-item";
			unset($unknownLastItem[$keyUnknown]);
		} elseif ($arUnknown == $arItem["DEPTH_LEVEL"]) {
			unset($unknownLastItem[$keyUnknown]);
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
 $r2 = false;
 $r1 = 0;
echo "<ul class='top'>";
foreach($menuTmp as $key => $arItem) {
        if($arItem['DEPTH_LEVEL'] == 1){
            $r1++;
            $r2 = 0;
        }
        if($arItem['DEPTH_LEVEL'] == 2)
            $arItem['NUMBER'] = $r2++;

        if($r1 == 1){
            if($arItem['NUMBER']%3 == 0 && $arItem['DEPTH_LEVEL'] == 2){
                if($arItem['NUMBER'] > 0)
                    echo '</ul><ul class="table-row">';
            }
        }

            $arItem["CLASS"] = trim($arItem["CLASS"]);

            $class = $arItem['CLASS']?$arItem['CLASS']:'';

            $dl = $arItem{'DEPTH_LEVEL'};


            switch($dl){
                case 1: $addClass = 'table';
                    break;
                case 2: $addClass = 'tc';
                    break;


             default:$addClass = '';
            }
    // we dont need to layout 3rd level in 2nd parent
            $SLSD = false;

             if($r1 == 2 && $dl == 3  )
                 continue;
            if( $r1 == 1){
                echo "<li class='{$class} {$addClass} '>";
                echo "<a href=\"{$arItem["LINK"]}\" class=\"".($arItem["DEPTH_LEVEL"] == 1 ? " table-caption link-block button   h2" : "")."\">{$arItem["TEXT"]}</a>";
            } else{
                echo "<li class='{$class} not-table'>";
                echo "<a href=\"{$arItem["LINK"]}\" class=\"".($arItem["DEPTH_LEVEL"] == 1 ? " table-caption link-block button   h2" : "")."\">{$arItem["TEXT"]}</a>";
            }



/*            echo "<li class=\"".($arItem["CLASS"] ? "{$arItem["CLASS"]}" : "").($arItem["DEPTH_LEVEL"] == 1 ? " table" : "").($arItem['DEPTH_LEVEL'] == 2 ? ' tc '.$arItem['NUMBER']:'')."\">";*/





    if ($r1 == 2 && $dl == 2){
        $SLSD = true;
    }


		
		if ($arItem["IS_PARENT"] && $SLSD == false ) {
			echo "<ul ".($arItem["DEPTH_LEVEL"] == 1 ? "class=\"table-row\"" : "").">";
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

<!--<pre><?/* print_r($arResult); */?></pre>-->