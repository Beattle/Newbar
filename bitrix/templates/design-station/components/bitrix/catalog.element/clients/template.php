<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="client-element">
	
	<?if($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]):?>
		<h1><?echo $arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]?></h1>
	<?elseif($arResult["SECTION"]["NAME"]):?>
		<h1><?echo $arResult["SECTION"]["NAME"]?></h1>
	<?endif;?>
	
	<?if(is_array($arResult["PREVIEW_PICTURE"])):?>
		<a href="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>">
			<img
				src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
				id="image_<?=$arResult["PREVIEW_PICTURE"]["ID"]?>"
				/>
		</a>
	<?endif;?>
	
	<?if($arResult["DETAIL_TEXT"]):?>
		<div class="text">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>
	<?elseif($arResult["PREVIEW_TEXT"]):?>
		<div class="text">
			<?=$arResult["PREVIEW_TEXT"]?>
		</div>
	<?endif;?>
	
	<?if(is_array($arResult["PROPERTIES"]["PHOTO"]["VALUE"])):?>
		<ul class="photos">
			<?foreach($arResult["PROPERTIES"]["PHOTO"]["VALUE"] as $key => $photoID):?>
				<li><a class="fancybox" href="<?echo CFile::GetPath($photoID)?>" rel="photoreport"><img src="<?echo CFile::GetPath($photoID)?>" alt=""></a></li>
			<?endforeach;?>
		</ul>
	<?endif;?>
	
	<?if(is_array($arResult["SECTION"])):?>
		<br /><a href="<?=$arResult["SECTION"]["LIST_PAGE_URL"]?>"><?=GetMessage("CATALOG_BACK")?></a>
	<?endif?>
</div>
<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>