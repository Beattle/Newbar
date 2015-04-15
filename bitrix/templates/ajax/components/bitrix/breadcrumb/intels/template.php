<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";
// echo '<pre>' . print_r($arResult, true) . '</pre>';
if(count($arResult) > 1){
    for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
    {
        if($index > 0)
            $strReturn .= '&nbsp;&gt;&nbsp;';

        $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
        if($arResult[$index]["LINK"] <> "")
            $strReturn .= '<a class="bread" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';
        else
            $strReturn .= $title;
    }

    return $strReturn;
} else {
    return '';
}
?>