<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strTitle = "";
?>
<div class="clients-list">
	<h1>Отзывы наших клиентов и фотографии проектов</h1>
	<p>Предлагаем ознакомиться с неполным списком заведений, которые сотрудничают с компанией DИЗАЙN SТАНЦИЯ. Что приятно, многие наши клиенты при необходимости обращаются к нам повторно, например, при расширении бизнеса, открытии новых ресторанов, кафе, баров.</p>
	<?
	$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
	$CURRENT_DEPTH = $TOP_DEPTH;

	foreach($arResult["SECTIONS"] as $arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
		{
			echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
		}
		elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
		{
			echo "</li>";
		}
		else
		{
			while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
			{
				echo "</li>";
				echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
				$CURRENT_DEPTH--;
			}
			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
		}
		
		/*
		$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";
		
		if ($_REQUEST['SECTION_ID']==$arSection['ID'])
		{
			$link = '<b>'.$arSection["NAME"].$count.'</b>';
			$strTitle = $arSection["NAME"];
		}
		else
		{
			$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].$count.'</a>';
		}
		*/

		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
		?><li id="<?=$this->GetEditAreaId($arSection['ID']);?>">
			<?//=$link?>
			
			<?if($arSection["DEPTH_LEVEL"] == 1):?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"clients_nav_bar",
					Array(
						"IBLOCK_TYPE" => "clients",
						"IBLOCK_ID" => $arSection["IBLOCK_ID"],
						"SECTION_ID" => "",
						"SECTION_CODE" => "",
						"SECTION_URL" => "",
						"COUNT_ELEMENTS" => "N",
						"TOP_DEPTH" => "1",
						"SECTION_FIELDS" => array(),
						"SECTION_USER_FIELDS" => array(),
						"ADD_SECTIONS_CHAIN" => "Y",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y"
					)
				);?>
				<a name="<?echo $arSection["CODE"]?>"></a>
				<h2 class="section-name"><?echo $arSection["NAME"]?></h2>
			<?else:?>
				<?echo $arSection["NAME"]?>
			<?endif;?>
			
			<?if($arSection["DEPTH_LEVEL"] > 1):?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"clients",
					Array(
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "",
						"IBLOCK_ID" => $arSection["IBLOCK_ID"],
						"SECTION_ID" => "",
						"SECTION_CODE" => $arSection["CODE"],
						"SECTION_USER_FIELDS" => array(),
						"ELEMENT_SORT_FIELD" => "sort",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_FIELD2" => "id",
						"ELEMENT_SORT_ORDER2" => "desc",
						"FILTER_NAME" => "arrFilter",
						"INCLUDE_SUBSECTIONS" => "N",
						"SHOW_ALL_WO_SECTION" => "N",
						"SECTION_URL" => "",
						"DETAIL_URL" => "",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SET_META_KEYWORDS" => "N",
						"META_KEYWORDS" => "-",
						"SET_META_DESCRIPTION" => "Y",
						"META_DESCRIPTION" => "-",
						"BROWSER_TITLE" => "-",
						"ADD_SECTIONS_CHAIN" => "N",
						"DISPLAY_COMPARE" => "N",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"PAGE_ELEMENT_COUNT" => "30",
						"LINE_ELEMENT_COUNT" => "3",
						"PROPERTY_CODE" => array(),
						"OFFERS_LIMIT" => "5",
						"PRICE_CODE" => array(),
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"PRICE_VAT_INCLUDE" => "Y",
						"BASKET_URL" => "/personal/basket.php",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"USE_PRODUCT_QUANTITY" => "N",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"ADD_PROPERTIES_TO_BASKET" => "N",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => array(),
						"CACHE_TYPE" => "N",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "Товары",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"HIDE_NOT_AVAILABLE" => "N",
						"CONVERT_CURRENCY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N"
					)
				);?>
			<?endif;?>
		<?

		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}

	while($CURRENT_DEPTH > $TOP_DEPTH)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}
	?>
</div>
<?//=($strTitle?'<br/><h2>'.$strTitle.'</h2>':'')?>
<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>