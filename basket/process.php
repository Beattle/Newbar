<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");

$params = array();
if($_POST['color']){
    $params =  array(
        array('NAME' => 'Цвета товара','CODE' => 'COLORS', "VALUE" => $_POST['color'])
    ); //,"CODE" => $_POST['code']
}

if(empty($_POST['quantity']))
    $_POST['quantity'] = 1;

/* Addition of the goods in a basket at addition in a basket */
if($_POST["ajaxaddid"] && $_POST["ajaxaction"] == 'add'){
    Add2BasketByProductID($_POST["ajaxaddid"], $_POST['quantity'], $params);
}

/* Goods removal at pressing on to remove in a small basket */
if($_POST["ajaxdeleteid"] && $_POST["ajaxaction"] == 'delete'){
    CSaleBasket::Delete($_POST["ajaxdeleteid"]);
}
/* Changes of quantity of the goods after receipt of inquiry from a small basket */
if($_POST["basketid"] && $_POST["quantity"] && $_POST["ajaxaction"] == 'update'){
    $arFields = array(
        "QUANTITY" => $_POST["quantity"]
    );
    CSaleBasket::Update($_POST["basketid"], $arFields);
}
if($_POST['basketid'] && $_POST['ajaxaction'] == 'delete')
    CSaleBasket::Delete($_POST['basketid']);


if($_POST['removeAll']){
    CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
}


$APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket.small",
    "intels",
    Array(
        "PATH_TO_BASKET" => "/basket/",
        "PATH_TO_ORDER" => "/basket/"
    )
);


if($_POST['removeAll']){
    return;
}

?>

<? //spin the wheel of that  cursed by the gods bitrix

    $arID = array();
    $arBasketItems = array();
    $id_quantity = array();
    $id_price_sum = array();
    $total_price = 0;
    $total_quantity = 0;
    $dbBasketItems = CSaleBasket::GetList(false, array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "ORDER_ID" => NULL), false, false, array("ID", "PRODUCT_ID", "QUANTITY",'PRICE',"CALLBACK_FUNC", "MODULE",'PRODUCT_PROVIDER_CLASS'));
    while ($arItems = $dbBasketItems->GetNext()):
        if ('' != $arItems['PRODUCT_PROVIDER_CLASS'] || '' != $arItems["CALLBACK_FUNC"]){
            CSaleBasket::UpdatePrice($arItems["ID"],
                $arItems["CALLBACK_FUNC"],
                $arItems["MODULE"],
                $arItems["PRODUCT_ID"],
                $arItems["QUANTITY"],
                "N",
                $arItems["PRODUCT_PROVIDER_CLASS"]
            );
            $arID[] = $arItems["ID"];
        }
    endwhile;

        if (!empty($arID)) {
            $dbBasketItems = CSaleBasket::GetList(
                array(
                    "NAME" => "ASC",
                    "ID" => "ASC"
                ),
                array(
                    "ID" => $arID,
                    "ORDER_ID" => "NULL"
                ),
                false,
                false,
                array("ID", "CALLBACK_FUNC", "MODULE",
                    "PRODUCT_ID", "QUANTITY", "DELAY",
                    "CAN_BUY", "PRICE", "WEIGHT", "PRODUCT_PROVIDER_CLASS", "NAME")
            );
            while ($arItems = $dbBasketItems->Fetch()):
                $id_quantity[$arItems["PRODUCT_ID"]] +=   $arItems["QUANTITY"];
                $id_price_sum[$arItems['ID']] = $arItems['PRICE'] * $arItems['QUANTITY'];
                $total_price += $id_price_sum[$arItems['ID']];
                $total_quantity += $arItems["QUANTITY"];
            endwhile;
        }

        unset($arID,$arBasketItems,$dbBasketItems);


    if($total_quantity == 0){
        return;
    }


?>

<div class="basket-message">
    <? if ($id_quantity[$_POST["ajaxaddid"]]) { ?>
        <p style="color: green; font-weight: bold;">В корзине <span class='item-count'><?=$id_quantity[$_POST["ajaxaddid"]]?></span> шт.</p>
    <? } ?>
</div>

<?php if ($id_price_sum[$_POST['basketid']]):?>
<div class="sum-price" id="<?=$_POST['basketid'];?>">
    <?=number_format($id_price_sum[$_POST['basketid']],0,'',' ');?><span class="r">Р</span>
</div>
<?endif;?>
<?
$lastNumber = substr($total_quantity, strlen($total_quantity)-1, 1);
if (strlen($total_quantity) > 1) {$almostLastNumber = substr($total_quantity, strlen($total_quantity)-2, 1);}
if ($lastNumber == 1 AND $almostLastNumber != 1) {
    $word = "товар";
} elseif ($lastNumber > 1 AND $lastNumber < 5 AND $almostLastNumber != 1) {
    $word = "товара";
} elseif ($lastNumber > 4 OR $lastNumber == 0 OR $almostLastNumber = 1) {
    $word = "товаров";
}


?>
<div class="total-price cell-m-100 cell-t-50 cell-d-37-5 h2">
    <span class="pad"><?="$total_quantity $word";?></span>
    <span class="pad"><strong><?=number_format($total_price,0,'',' ');?> <span class="r">Р</span></strong></span>
</div>
<? unset($id_price_sum,$id_quantity)?>



<!-- I need that product -->
<?
$res = CIBlockElement::GetByID(intval($_POST["ajaxaddid"]));

    $item = $res->GetNext();
    $name = $item['NAME'];
    $pic_id = $item['DETAIL_PICTURE'];
    $detail_url = $item['DETAIL_PAGE_URL'];
    $db_props = CIBlockElement::GetProperty($item['IBLOCK_ID'], $item['ID'], array("sort" => "asc"));
    $ar_price = GetCatalogProductPrice($item['ID'], 1);
    $price = $ar_price['PRICE'];
    while($ar_props = $db_props->Fetch())
        $item['props'][] = $ar_props;


    unset($item,$res,$ar_props);
    $file = CFile::ResizeImageGet($pic_id, array('width'=>195, 'height'=>135), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $img = '<img class="post-cart-add__photo" src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" />';
    unset($file,$item);

?>
<!--HAND MADE MODAL -->


<div id="container">
    <style scoped="">
        #container{
            height: 270px;
            background: #fff;
            width: 392px;
            padding: 20px;
            box-shadow: 0 0 5px 2px #000;
            opacity: 0.9;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }
        .post-cart-add__header {
            border-bottom: 1px solid #EEEEEE;
            margin: -20px -20px 0;
            padding: 20px;
            width: 100%;
        }

        #container figure{
            position: relative;
            width: 155px;
            height: auto!important;
            float: left;
            min-height: 158px;
            padding-left: -20px;
        }
        .post-cart-add__photo {
            height: auto!important;
            max-width: 195px;
            position: absolute;
            left:0;
            right:0;
            bottom:0;
            margin 0 auto;


        }
        .post-cart-add__content {
            /*padding-left: 155px;*/
            min-width: 245px;
            position: relative;
        }
        .post-cart-add__title, .post-cart-add__busket-title {
            font-size: 22px;
            margin: -3px 0 15px;
        }
        .post-cart-add__busket-title {
            margin-top: 15px;
        }
        .post-cart-add .basket-button {
            margin-right: 17px;
            white-space: nowrap;
        }
        .post-cart-add__item-info {
            line-height: 18px;
            padding-top: 24px;
            white-space: nowrap;
        }
        .post-cart-add__item-brand {
            font-weight: 700;
        }
        .post-cart-add__item-description {
            color: #666666;
        }
        .post-cart-add .price__new {
            font-weight: 700;
        }
        .post-cart-add__products-list {
            list-style-type: none;
            margin: 20px -20px 0;
            overflow: hidden;
            padding: 0 20px 14px;
            white-space: nowrap;
            width: 576px;
        }
        .post-cart-add__products-list_scrollable {
            overflow-x: scroll;
        }
        .post-cart-add__product {
            display: inline-block;
            margin: 0;
            overflow: hidden;
            padding: 0;
            position: relative;
            vertical-align: top;
            width: 116px;
        }
        .post-cart-add__product .post-cart-add__photo {
            display: block;
            float: none;
            height: 144px;
            margin: 0 auto 12px;
            width: 96px;
        }
        .post-cart-add__product .post-cart-add__item-info {
            padding: 0 0 0 10px;
        }

        .post-cart-add__footer {
            border-top: 1px solid #EEEEEE;
            clear: both;
            padding: 0;
            width: 90%;
            background: #2781BB;
            position: absolute;
            bottom:20px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            border: 1px solid transparent;
        }

        .post-cart-add__footer:hover{
            background: linear-gradient(to bottom, #2781BB, #3C96D0) repeat scroll 0 0 rgba(0, 0, 0, 0);
        }


        #container .button, #container .button.button_big {
            background: linear-gradient(to bottom, #FFFFFF, #EFEFEF) repeat scroll 0 0 rgba(0, 0, 0, 0);
        }
        #container .button.button_big {
            background-position: 0 -102px;
        }
        #container .button, #container .button.button_big {
            background: -webkit-gradient(linear, left top, left bottom, from(#ffc401), to(#ffa601));
            background: -webkit-linear-gradient(top, #ffc401, #ffa601);
            background: -moz-linear-gradient(top, #ffc401, #ffa601);
            background: -ms-linear-gradient(top, #ffc401, #ffa601);
            background: -o-linear-gradient(top, #ffc401, #ffa601);
            color:#fff;
        }


        #container .button:hover, #container .button.button_big:hover {
        background: -webkit-gradient(linear, left top, left bottom, from(#FFE522), to(#ffa601));
        background: -webkit-linear-gradient(top, #FFE522, #ffa601);
        background: -moz-linear-gradient(top, #FFE522, #ffa601);
        background: -ms-linear-gradient(top, #FFE522, #ffa601);
        background: -o-linear-gradient(top, #FFE522, #ffa601);
        }

        #container .button_big {
            font-size: 15px;
            height: 29px;
            line-height: 27px;
            padding: 0 10px;
        }
        #container .button {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            -moz-user-select: none;
            border-color: #DDDDDD #D5D5D5 #CDCDCD;
            border-image: none;
            border-left: 1px solid #D5D5D5;
            border-radius: 3px;
            border-right: 1px solid #D5D5D5;
            border-style: solid;
            border-width: 1px;x
            box-sizing: border-box;
            cursor: pointer;
            display: inline-block;
            font: 13px/23px Arial,Helvetica,sans-serif;
            height: 25px;
            margin: 0;
            outline: 0 none;
            overflow: visible;
            padding: 0 8px;
            position: relative;
            text-decoration: none;
        }

        #container .post-cart-add__footer .basket-button{
            background: #2781BB;
            color:#fff;
            padding-left: 50px;
            min-height: 31px;
            position: relative;
            z-index: 0;
            background: url(/bitrix/templates/design-station/img/small-bsk-bw.png) no-repeat 15px center;
            border:none;
        }

        #container .post-cart-add__footer .basket-button:hover{
            background: url(/bitrix/templates/design-station/img/small-bsk-bw.png) no-repeat 15px center;
        }

        #container .post-cart-add__footer .basket-button .button__title{
            line-height:29px;

        }

        .post-cart-add__item-info .price{
            font-size: 1.4em;
        }

        #simplemodal-container .simplemodal-close{
            background: url("/bitrix/templates/design-station/img/btn-cb.png") no-repeat scroll -210px -16px padding-box #3A3A4B;
            border: 6px solid #3A3A4B;
            border-radius: 100%;
            box-sizing: content-box;
            cursor: pointer;
            height: 10px;
            position: absolute;
            right: 10px;
            top: 10px;
            width: 10px;
            z-index: 8040;
        }

        </style>

    <div class="post-cart-add__content">
        <figure>
        <?=$img;?>
        </figure>
        <div class="post-cart-add__title">Товар добавлен</div>
			<span id="leave-me-alone" data-popup-close="" class="post-cart-add__close button button_big">
			<span  class="button__title">Продолжить покупки</span>
            </span>
        <div class="post-cart-add__item-info">
            <span class="post-cart-add__item-brand"><?=$name;?></span>
            <br>
            <span class="post-cart-add__item-description"><?if($_POST['color']){?>Цвет: <?=$_POST['color'];}?><br/>Кол-во: <?=$_POST["quantity"] ?> шт.</span><br/><span class="price"><?=intval($price);?> руб.</span>
        </div>
    </div>
    <div class="post-cart-add__footer">
        <a href="/basket" class="basket-button button button_blue button_big"><span class="button__title"><i class="button__icon"></i><span class="button__subtitle">&nbsp;Оформить заказ&nbsp;</span>(<?=$total_quantity;?> <?=$word?> на <?=number_format($total_price,0,'',' ');?> руб.)</span><i class="basket-button__corner"></i></a>
    </div>
</div>
<?php unset($img,$detail_url,$name); ?>