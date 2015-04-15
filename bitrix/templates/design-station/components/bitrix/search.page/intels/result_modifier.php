<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (isset($arResult["SEARCH"]) && is_array($arResult["SEARCH"])) {
	foreach($arResult["SEARCH"] as $key => $item) {
		$str = "";
		if (isset($item["MODULE_ID"]) && $item["MODULE_ID"] == "iblock" && isset($item["ITEM_ID"]) && !empty($item["ITEM_ID"])) {
		
			// Определяем непосредственную категорию категорию
			$sectionId = 0;
			$firstChar = substr($item["ITEM_ID"], 0, 1);
			// если элемент
			if (preg_match("/^[1-9]{1}$/", $firstChar)) {
				$obj = CIBlockElement::GetByID($item["ITEM_ID"]);
				if ($elem = $obj->GetNext()) {
					$sectionId = $elem["IBLOCK_SECTION_ID"];
				}
			// если категория
			} elseif ($firstChar == "S") {
				$sectionId = substr($item["ITEM_ID"], 1);
			}
			
			// Строим навигационную цепочку
			if (!empty($sectionId)) {
				$str .= "<a href=\"/catalog/\">Каталог</a>&nbsp;/ ";
				$navObj = CIBlockSection::GetNavChain(false, $sectionId);
				while ($nav = $navObj->GetNext()) {
					$str .= "<a href=\"{$nav["SECTION_PAGE_URL"]}\">{$nav["NAME"]}</a>&nbsp/ ";
				}
			}
		}
		// добавляем навигацию 
		$arResult["SEARCH"][$key]["BREAD"] = $str;
	}
}
?>