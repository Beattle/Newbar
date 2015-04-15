<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Преобразование ID input и container для js
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);


// Определение подписи поисковой строки
//$searchValue = $arResult["TEXT_INPUT"];
$searchValue = 'поиск...';
if (!empty($_REQUEST["q"])) {
	$searchValue = $_REQUEST["q"];
}
// Вывод строки и кнопки поиска
if($arParams["SHOW_INPUT"] !== "N"){
	echo "<div id=\"{$CONTAINER_ID}\" class=\"search cell-t-25\">";
		echo "<form action=\"{$arResult["FORM_ACTION"]}\">";
			echo "<input id=\"fakeInput\" type=\"hidden\" value=\"{$arResult["TEXT_INPUT"]}\" />";
			echo "<input id=\"{$INPUT_ID}\" class=\"input-text small\" type=\"text\" name=\"q\" value=\"{$searchValue}\" />";
			echo "<input class=\"input-button button  small\" name=\"s\" type=\"submit\" value=\"ok\" />";
		echo "</form>";
	echo "</div>";
}
?>



<!-- Подключение ajax -->
<script type="text/javascript">
	var jsControl = new JCTitleSearch({
		'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
		'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
		'INPUT_ID': '<?echo $INPUT_ID?>',
		'MIN_QUERY_LEN': 2
	});
</script>
<!-- 'WAIT_IMAGE': '/bitrix/themes/.default/images/wait.gif', -->