<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arElement):?>
	<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">[<?=$arElement["NAME"]?>]</a>
<?endforeach?>