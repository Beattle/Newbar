<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?php if(empty($arResult['ITEMS'])) return;?>

<?php
$arslider = array();
$arprod = array(); 
foreach($arResult['ITEMS'] as $arItem){
  if ($arItem['IBLOCK_ID'] == $arResult['iblock_slider']) $arslider[] = $arItem;
  if ($arItem['IBLOCK_ID'] == $arResult['iblock_prods']) $arprod[] = $arItem;
}
//var_dump(count($arResult['ITEMS']));
?>

<div class="b-promobox view_wide items_6 state_init">
<table class="b-promobox-h" style="visibility: visible;">
  <tbody>
    <tr class="b-promobox-row">
			<td class="b-promobox-cell mod_side view_single-item border_none wide2">
				<div style="background-image: url(<?php echo $arprod[0]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[0]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT']; //echo $arprod[0]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[0]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[0]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[0]["NAME"];?>"></a>
				</div>
			</td>
			<td class="b-promobox-cell mod_side view_single-item border_none wide1">
				<div style="background-image: url(<?php echo $arprod[1]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[1]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT']; //echo $arprod[0]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[1]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[1]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[1]["NAME"];?>"></a>
				</div>
			</td>
			<td class="b-promobox-cell mod_side view_single-item border_none wide3">
				<div style="background-image: url(<?php echo $arprod[2]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[2]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT']; //echo $arprod[0]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[2]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[2]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[2]["NAME"];?>"></a>
				</div>
			</td>
			<td rowspan="2" class="b-promobox-cell mod_main"> 
				<div class="b-promobox-slider"> 
<div  id="klondike-slider" class="klondike-slider klondike-slider-<?php echo $arParams['COLOR_SCHEME']?>">
	<?php foreach($arslider as $arItem){?>
		<div class="klondike-slide">
			<div class="klondike-slide-in"> 
        <a href="<?php echo $arItem['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>">
				<div class="slide-header"><?php echo $arItem['NAME']?></div>
				<div class="slide-data">
        
					<?php echo $arItem['PROPERTIES']['PREVIEW_TEXT']['~VALUE']['TEXT'];?>
          
					<div class="slide-price">
            <span class="slide-price--item_price"><?php echo $arItem['PROPERTIES']['CPRICE']['VALUE']?></span>
					</div>
				</div>

				<!--<a href="<?php echo $arItem['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="klondike-link"><?php echo GetMessage('CATALOG_MORE')?></a>-->

				<?php if(!empty($arItem["IMG"])){?>
					<div class="klondike-img">
            <!--width="<?php echo $arItem["IMG"]["width"]?>" height="<?php echo $arItem["IMG"]["height"]?>"-->
						<img src="<?php echo $arItem["IMG"]["SRC"]?>" alt="<?php echo $arItem["NAME"]?>" title="<?php echo $arItem["NAME"]?>" />
					</div>
				<?php }?> 
        </a>
			</div>
		</div>
	<?php }?>
  <!--
	<nav class="klondike-arrows">
		<span class="klondike-arrows-prev"></span>
		<span class="klondike-arrows-next"></span>
	</nav>
  -->
</div>
				</div>
			</td>
			<td colspan="2" class="b-promobox-cell mod_side">
				<div class="b-promobox-slider"> 
					<div class="b-promobox-slider-list">
						<div style="background: url(<?php echo $arprod[3]['IMG']['SRC']?>) right center no-repeat; border-radius: 0 6px 0 0;" class="b-promobox-item">
              <div class="b-promobox-item-info"><?php echo $arprod[3]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT'];?></div>
					    <div class="b-promobox-price">
						    <span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[3]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					    </div>
							<a class="b-promobox-anchor" href="<?php echo $arprod[3]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" title="<?php echo $arprod[3]["NAME"];?>"></a>
						</div> 
					</div> 
				</div>
			</td>
		</tr>
		<tr class="b-promobox-row">
			<td class="b-promobox-cell mod_side view_single-item border_none wide2">
				<div style="background-image: url(<?php echo $arprod[4]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[4]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT'];//$arprod[2]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[4]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[4]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[4]["NAME"];?>"></a>
				</div>
			</td>
			<td class="b-promobox-cell mod_side view_single-item border_none wide1">
				<div style="background-image: url(<?php echo $arprod[5]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[5]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT'];//$arprod[2]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[5]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[5]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[5]["NAME"];?>"></a>
				</div>
			</td>
			<td class="b-promobox-cell mod_side view_single-item border_none wide3">
				<div style="background-image: url(<?php echo $arprod[6]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[6]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT'];//$arprod[2]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[6]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[6]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[6]["NAME"];?>"></a>
				</div>
			</td>
			<td class="b-promobox-cell mod_side view_single-item">
				<div style="background-image: url(<?php echo $arprod[7]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[7]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT'];//$arprod[3]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[7]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[7]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[7]["NAME"];?>"></a>
				</div>
			</td>
			<td class="b-promobox-cell mod_side view_single-item">
				<div style="background-image: url(<?php echo $arprod[8]['IMG']['SRC']?>)" class="b-promobox-item">
					<div class="b-promobox-item-title"><?php echo $arprod[8]['PROPERTIES']['SLTEXT']['~VALUE']['TEXT'];//$arprod[4]["NAME"];?></div>
					<div class="b-promobox-price">
						<span class="b-sbutton mod_price skin_product size_small scheme_available"><?php echo $arprod[8]['PROPERTIES']['CPRICE']['~VALUE']['TEXT'] ?></span>
					</div>
					<a href="<?php echo $arprod[8]['PROPERTIES']['SLIDER_LINK']['VALUE'] ?>" class="b-promobox-anchor" title="<?php echo $arprod[8]["NAME"];?>"></a>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

<!--
<pre>
<?php var_dump($arResult);?>
</pre>
-->

<script type="text/javascript">
	$(function() {
		$('#klondike-slider').cslider({
			<?php if('N' == $arParams['AUTO_PLAY']){?>autoplay:false,<?php } ?>
			interval: <?php echo $arParams["INTERVAL"];?>,
		});
	});
</script>
