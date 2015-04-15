<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();



$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.qtip.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/cloudzoom/cloudzoom.js');


$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/cloudzoom/cloudzoom.css');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jquery.qtip.min.css');
global $USER;
?>
<script type="text/javascript">
  function rrAsyncInit() {
		try { rrApi.categoryView(<?php echo $arResult["ID"] ?>); } catch(e) {}
	}
</script>
<?php

// html оболочка и кнопка "сначала дешевые"

if(isset($_GET['sort'])) {
    if ($_GET["method"] == "asc") {
        $sortAscActive = "active";
    } elseif($_GET["method"] == "desc") {
        $sortDescActive = "active";
    }
}


echo "<div class=\"products mar-t\">";
		if ($arResult["ITEMS"]) {
			echo "<!--noindex-->
                    <div class=\"sort\">
                    <a rel='nofollow' class=\"border-radius link-block  button  reverse input-button small {$sortAscActive}\" href=\"{$arResult["SECTION_PAGE_URL"]}?sort=catalog_PRICE_1&method=asc\">Сначала дешевые</a>
					<a rel='nofollow' class=\"border-radius link-block  button  reverse input-button small {$sortDescActive}\" href=\"{$arResult["SECTION_PAGE_URL"]}?sort=catalog_PRICE_1&method=desc\"> <span class='sep'>&nbsp;&nbsp;/</span>&nbsp;&nbsp;Сначала дорогие</a>

				</div>
				<!--/noindex-->";
		}
		echo "<section class=\"row first-item\">";
		
		$tmpl_path = SITE_TEMPLATE_PATH;
    
  $prod_idsw = array();
  $prods_pricew = 0;    
    
	// Перебираем товары





	foreach ($arResult["ITEMS"] as $key => $arElement) {
    $prod_idsw[] = $arElement['ID'];
    /*
    if ($USER->IsAdmin())
    {
      if ($arElement['ID']==351) {
        //echo '<pre>' . print_r($arElement, true) . '</pre>';
      }
      //echo '<pre>' . print_r($arResult, true) . '</pre>';
    }
    */
    $qntw = $arElement["PROPERTIES"]["MIN_QUANTITY_FOR_BUYW"]["VALUE"]?$arElement["PROPERTIES"]["MIN_QUANTITY_FOR_BUYW"]["VALUE"]:1;
    $dataqw = "";
    if ($qntw!=1) {
      $dataqw = "data-minqw=\"".$qntw."\"";
    }
    
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		echo "<article class=\"cell-t-16 button  \" id=\"{$this->GetEditAreaId($arElement['ID'])}\">";
		echo "<div class='border'>
				<h3><a class=\"row small\" href=\"{$arElement["DETAIL_PAGE_URL"]}\">{$arElement["NAME"]}</a></h3>";
        if ($arElement["PROPERTIES"]["SKU"]["VALUE"]) {
          echo "<div class=\"artwc\">Артикул: {$arElement["PROPERTIES"]["SKU"]["VALUE"]}</div>";
        }
				echo "
				<figure>
                    <a class=\"row link-block pad  small\" href=\"{$arElement["DETAIL_PAGE_URL"]}\">";
					if ($arElement["PROPERTIES"]["MARKS"]["VALUE"]) {
						echo "<div class=\"mark\">";
                        foreach ($arElement["PROPERTIES"]["MARKS"]["VALUE"] as $key2 => $arMark) {
                            switch($arElement["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key2]){
                                case 'NOVELTY':$file_name = 'New-icon';
                                    break;
                                case 'LIDER_OF_SALES':$file_name = 'Lider-icon1';
                                    break;
                                case 'ON_SALE':$file_name = 'Sale-icon';
                            }
							echo "<div class=\" cell-m-auto\">
							    <img class='{$arElement["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key2]}' src='{$tmpl_path}/img/{$file_name}.png' />
							</div>";
						}
						echo "</div>";
					}
					echo "<img src=\"{$arElement["PREVIEW_PICTURE"]["SRC"]}\" />";
                    if($arElement['PROPERTIES']['NEW_YEAR']['VALUE'] == 'Y'){
							echo '<div class="upper new_year"><img class="new_year" src="/upload/medialibrary/2dc/2dcab2fe1f519c189f006bb9802fffbd.png"/></div>';
				    }
                    echo "</a>
                <span class='hover-block'>
                    <span class='hover-link fast'>Быстрый просмотр</span>
                </span>
				</figure>


				";

/*		foreach ($arElement["DISPLAY_PROPERTIES"] as $keyProp => $arProperty) {
			if ($keyProp != "ON_SALE" AND $keyProp != "LIDER_OF_SALES" AND $keyProp != "NOVELTY") {
				echo "<p class=\"param\">{$arProperty["NAME"]}:<br />{$arProperty["DISPLAY_VALUE"]}</p>";
			}
		}*/

		echo "</a>";?>



            <? echo  "<p class=\"price h2\">";
            if ($arElement["PRICES"]["BASE"]["PRINT_VALUE"] != 0) {
               $prods_pricew += $arElement['PRICES']['BASE']['VALUE'];
                if($arElement['PROPERTIES']['PRICE_FROM']['VALUE'] == 'Y'){
                    $from = '<span class="price-from">'.$arElement['PROPERTIES']['PRICE_FROM']['NAME']. '</span>';
                } else{
                    $from = '';
                }
               echo "<span class='price'>{$from} {$arElement['PRICES']['BASE']['VALUE']} <span class='r'>Р</span></span>";
            } else {
                echo "<span class='price not-available'>цена по запросу</span>";
            }
            if(empty($arElement['PROPERTIES']['POSTAVKA']['VALUE'])){
                echo '<span class="unknown">не известно</span>';
            } else{
                switch(strpbrk($arElement['PROPERTIES']['POSTAVKA']['VALUE'], '0123456789')){
                    case false:$spanClass = 'available';
                        break;
                    default:$spanClass = 'wait-days';
                }
                echo "<span class='{$spanClass}'>{$arElement['PROPERTIES']['POSTAVKA']['VALUE']}</span>";

            }

        echo "</p>";?>
        <? if($arResult['UF_ADD2CART']):?>
        <div class="hover-block">
            <!--noindex-->
                <a onmousedown="try { rrApi.addToBasket(<?php echo $arElement['ID'] ?>) } catch(e) {}" data-id="<?php echo $arElement['ID']; ?>" class="hover-link add" href="<?echo $arElement["ADD_URL"]?>" rel="nofollow" <?php echo $dataqw; ?>><span class="add">Купить</span></a>
            <!--/noindex-->
        </div>
        <?endif; ?>
		<? echo "</div></article>";
		if (($key+1)%6 == 0 AND $key != 0) {
			echo "</section><section class=\"row\">";
		}
	}
echo "</section>	
	</div>";
?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <p><?=$arResult["NAV_STRING"]?></p>
<? endif; ?>
<? echo "<div class=\"row mar-t\">
		<div class=\"pad cell-t-100\">{$arResult["DESCRIPTION"]}</div>
	</div>";
?>
<?php if (count($prod_idsw) >= 1) : ?>
<script type="text/javascript">
var google_tag_params = {
ecomm_prodid: '<?php echo implode(',', $prod_idsw); ?>',
ecomm_pagetype: 'category',
<?php 
                if ($prods_pricew != 0) {
									echo 'ecomm_totalvalue: \'' . $prods_pricew . '\',' ;
								} else {
									//echo "Цена по запросу";
								} ?>
};
</script>
<?php endif; ?>

<?/*  echo "<pre>"; print_r($arResult); echo "</pre>"; */
//global $USER;
if ($USER->IsAdmin())
{
 // echo '<pre>' . print_r($arResult['ID'], true) . '</pre>';
}
?>
