<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult)) return;

// Вывод HTML
$menuLastKey = count($arResult) - 1;
 $r2 = false;
 $r1 = 0;
echo "<ul class='top'>";
foreach($arResult as $key => $arItem) {
        if($arItem['DEPTH_LEVEL'] == 1){
            $r1++;
            $r2 = 0;
        }








                echo "<li>";
                echo "<a href=\"{$arItem["LINK"]}\">{$arItem["TEXT"]}</a>";

		
		if ($arItem["IS_PARENT"]  ) {
			echo "<ul>";
		} else {
			echo "</li>";
		}

		if ($key != $menuLastKey) {
			$levelDifference = $arItem["DEPTH_LEVEL"] - $arResult[$key + 1]["DEPTH_LEVEL"];
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

