<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


        <div class="product">
            <style scoped="" type="text/css">
        .product{
            background: #fff;
            overflow: hidden;
            padding: 25px 50px;
            text-align: left;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 14px 2px rgba(39, 129, 187, 1);
            -moz-box-shadow:    0px 0px 14px 2px rgba(39, 129, 187, 1);
            box-shadow:         0px 0px 14px 2px rgba(39, 129, 187, 1);

        }



        .product1{
            margin: 0;
/*            overflow: auto;*/
        }

        .product1 h1{
            margin: 0;
            display: block;
            width: 100%;
            font-size: 1.3rem;
            color: #1b1e24;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .product1 .right{

        }

        .product1 div.img .go-product-detail{
            cursor: pointer;
        }

        .product1 div.img figure div.upper{
            position: absolute;
            right: 0;
            top: 0;
            width: 86px;
            height: auto!important;
        }

        .product1 div.img{
            width: 50%;
            float: left;
            margin-right: 11.136890951276102088167053364269%;
            min-height: 200px;
        }


        .product1 div.img figure img.cloudzoom{
            max-height: 200px;
        }

        .product1 div.basket{
            margin-top: 1.455%;
        }
        .product1 div.basket div.h2{
            color:#1b1e24;
            font-size: 1.3rem;
            text-transform: uppercase;
        }

        .product .basket .h2 .price-from{
            text-transform: lowercase;
            font-size: 14px;
        }

        .product1 div.basket form.add2basket{
            margin-top: 1.818%;
            overflow: auto;
        }

        form.add2basket input.quantity {
            vertical-align: 6px;
        }

        form.add2basket input, form.add2basket div.qty-ch{
            /*    box-sizing: content-box;
                -moz-box-sizing: content-box;
                -webkit-box-sizing: content-box;*/
        }

        .r{
            text-decoration: line-through;
        }

        .product1 div.basket form.add2basket div.qty input.quantity{
            display: inline-block;
            width: 20.4636%;
            min-height: 28px;
            font-size: 1rem;
            border: 1px solid #ccc;
            -webkit-border-top-left-radius: 12px;
            -webkit-border-bottom-left-radius: 12px;
            -moz-border-radius-topleft: 12px;
            -moz-border-radius-bottomleft: 12px;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            vertical-align: top;
        }

        .product1 div.basket form.add2basket div.qty div.qty-ch{
            display: inline-block;
            position: relative;
            width: 10.596026490066225165562913907285%;
            position: relative;
            border: solid #ccc;
            border-width: 1px 0 1px;
            height: 28px;
        }

        .product1 div.basket form.add2basket div.qty{
            float: left;
            font-size: 0;
        }

        form.add2basket input.intoCart {
            display: inline-block;
            height: 28px;
            width: 56%;
            background: url("/bitrix/templates/design-station/img/cart-bg.png") repeat-x;
            color:#fff;
            text-transform: uppercase;
            border:solid #ec8b00;
            border-width: 1px 1px 1px 0;
            vertical-align: top;
            -webkit-border-top-right-radius: 12px;
            -webkit-border-bottom-right-radius: 12px;
            -moz-border-radius-topright: 12px;
            -moz-border-radius-bottomright: 12px;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            line-height: 30px;
            font-size: 0.7rem;
        }


        .product .basket .qty-ch .up, .product .basket .qty-ch .down{
            height: 14px;
            width: 100%;
            position: absolute;
            cursor: pointer;
        }

        .product .basket .qty-ch .up {
            top:0;
            background: url('/bitrix/templates/design-station/img/up.png') no-repeat center;
        }

        .product .basket .qty-ch .down{
            bottom: 0;
            background: url("/bitrix/templates/design-station/img/down.png") no-repeat center;
        }

        .colors{
            text-align: left;
        }

        .colors .dropdown{
        }

        .colors .color{
            width: 30px;
            height: 30px;
            display: inline-block;
            cursor: pointer;
        }



        .colorHolder img{
            width: 18px;
            height: 18px;
            position: absolute;
            top:0;right: 0;bottom: 0;left: 0;
            overflow: auto;
            margin: auto;
        }

        .colorHolder{
            width: 30px;
            height: 30px;
            position: relative;
        }

        .color.active .colorHolder{
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border:1px solid #f10f1f;
        }

        .basket-message{
            clear: both;
            position: relative;
        }

        span#GoBsk{
            position: absolute;
            right:7%;
        }
        span#GoBsk a{
            color:#2781BB;
            font-size: 1rem;
            font-weight: bold;
        }

        span.bskQt{
            font-size: 0.9rem;
        }

        .params{
            margin-top: 1.5rem;
            clear: both;
        }

        .params h2{
            text-align: center;
            margin: 0;
        }

        .params table.small{
            width: 100%;
        }


        .params table.small caption{
            font-size: 14px;
            text-transform: uppercase;
            text-align: left;
            color: #353434;
        }

        .params table.small tbody tr td{
            font-size: 12px;
            color:#454444;
            height: 24px;
            text-align: left;
        }

        .params table.small tbody tr td:last-child{
            color:#3082b4;
            padding-left: 20px;
        }

        .phones{
            float: left;
            margin-top: 1rem;
        }

        .phones p{
            margin: 0;
            text-align: right;
        }


        .detail_url{
            min-height: 40px;
            text-align: right;
            margin-top: 15px;
        }

        .detail_url a{
            padding: 10px 25px;
            border:2px solid #2781BB;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 12px;
            vertical-align: -10px;
            color: #2781BB;
            -webkit-border-radius: 13px;
            -moz-border-radius: 13px;
            border-radius: 13px;
        }

        .link-to-big-img{
            position: relative;
            text-align: center;
            display: block;
        }

        .link-to-big-img img{
            display: inline;

        }

        .phones p a{
            color: #2781BB;
            font-size: 1.2rem;
        }
        </style>
            <div class="product1">
                <div class="img">
                    <?if ($arResult["PROPERTIES"]["MARKS"]["VALUE"]) {
                        echo "<div class=\"row\">";
                        $tmpl_path = SITE_TEMPLATE_PATH;
                        foreach ($arResult["PROPERTIES"]["MARKS"]["VALUE"]  as $key => $arMark) {
                            switch($arResult["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key]){
                                case 'NOVELTY':$file_name = 'New-icon';
                                    break;
                                case 'LIDER_OF_SALES':$file_name = 'Lider-icon1';
                                    break;
                                case 'ON_SALE':$file_name = 'Sale-icon';
                            }
                            echo "<div class=\" cell-m-auto\">
							    <img class='{$arElement["PROPERTIES"]["MARKS"]['VALUE_XML_ID'][$key2]}' src='/bitrix/templates/design-station/img/{$file_name}.png' />
							</div>";
                        }
                        echo "</div>";
                    }
                    if ($arResult["DETAIL_PICTURE"]) { ?>
                        <div class="go-product-detail">
                            <figure>
                                <a href='<?=$arResult["DETAIL_PICTURE"]["SRC"];?>' class="link-to-big-img" title="<?=$arResult["NAME"];?>">
                                    <img data-cloudzoom="zoomClass:'zoom-zoom',zoomSizeMode:'image',zoomPosition:'.product.simplemodal-data .params',startMagnification:10" alt='<?=$arResult["NAME"];?>' class='cloudzoom' src="<?=$arResult["DETAIL_PICTURE"]["SRC"];?>"  />
                                </a>
                                <? if($arResult['PROPERTIES']['NEW_YEAR']['VALUE'] == 'Y'){ ?>
                                <div class="upper new_year">
                                    <img alt="" class="new_year" src="/upload/medialibrary/2dc/2dcab2fe1f519c189f006bb9802fffbd.png"/>
                                </div>
                                <? } ?>
                           </figure>
                        </div>
                   <? } ?>





                </div>
                <div class="right">
                <h1><?=$arResult["NAME"];?></h1>


                <? if ($arResult["DISPLAY_PROPERTIES"]["COLORS"] AND $arResult["PRODUCT_PROPERTIES"]["COLORS"] AND $arResult["DISPLAY_PROPERTIES"]["COLORS"]["VALUE"]["0"] != "613") {
                    echo "<div  class=\"colors\">
                                    <div class=\"button-group\">";
                    $active = 0;

                    foreach ($arResult["PRODUCT_PROPERTIES"]["COLORS"]["VALUES"] as $key => $arColors) {
                        $activeColor = "";
                        if ($active == 0) {$activeColor = "active";  $active = 1;}
                        if ($arResult["COLORS"][$key]) {
                            echo "<div class=\"button color radio input-button  {$activeColor}\">
                                                            <div tabindex='0' class=\"colorHolder\"><img src=\"{$arResult["COLORS"][$key]["PREVIEW_PICTURE"]["SRC"]}\" alt=\"{$arColors}\" /></div>
                                                            <input type=\"hidden\" value=\"$key\" />
                                                        </div>";
                        }
                    }

                    echo "
                                        </div>
                            </div>";
                    $basketBlockWidth = "cell-d-50";
                } else {
                    $basketBlockWidth = "";
                }
                ?>

                <div class="basket">



                    <div class="h2">
                        <? if ($arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"] != 0) { ?>
                            <? if($arResult['PROPERTIES']['PRICE_FROM']['VALUE'] == 'Y'):?>
                                <span class="price-from"><?=$arResult['PROPERTIES']['PRICE_FROM']['NAME'];?></span>
                            <? endif;?>
                            <span class="price"><?=$arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"];?></span><span class='r'>Р</span>
                        <? } else { ?>
                            <span class="price">Цена по запросу</span>
                        <?  } ?>

                    </div>

                    <form class="add2basket" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
                        <? if ($arParams["USE_PRODUCT_QUANTITY"]) { ?>
                        <?php
                         $qntw = $arResult["PROPERTIES"]["MIN_QUANTITY_FOR_BUYW"]["VALUE"]?$arResult["PROPERTIES"]["MIN_QUANTITY_FOR_BUYW"]["VALUE"]:1;
                         if ($qntw!=1) {
                           $dataqw = "data-minqw=\"".$qntw."\"";
                           $message = "<div class='qty-mes'>Этот товар продается от <strong>$qntw шт</strong></div>";
                             $warn = "<div class='warn-tip hidden'>Минимальный заказ  от <strong>$qntw шт.</strong></div>";
                         } 
                        ?>
                            <div class=qty <?=$dataqw?> >
                                <?  if($qntw !=1) echo $message; ?>
                                <input class="quantity h2  text-center" type="text" name="<?=$arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="<?=$qntw?>" />
                                <div class='qty-ch'>
                                    <div class="up"></div>
                                    <div class="down"></div>
                                </div>
                                <input onmousedown="try { rrApi.addToBasket(<?=$arResult["ID"]?>) } catch(e) {}" class="intoCart button reverse" name="<?=$arParams["ACTION_VARIABLE"]?>ADD2BASKET" type="submit" value="Купить" />
                            </div>
                            <?php if($qntw) echo $warn; ?>
                        <?	} ?>
                        <input type="hidden" name="<?=$arParams["ACTION_VARIABLE"]?>" value="ADD2BASKET" />
                       <input type="hidden" name="<?=$arParams["PRODUCT_ID_VARIABLE"];?>" value="<?=$arResult["ID"]?>" />
                        <? if ($arResult["PROPERTIES"]["COLORS"]["VALUE"]) { ?>
                        <input type="hidden" name="<?=$arParams['SECTION_ID_VARIABLE'];?>" value="<?=$arResult['SECTION']['ID']?>" />
                            <input class="color-input" type="hidden" name="<?=$arParams["PRODUCT_PROPS_VARIABLE"]?>[COLORS]" value="<? foreach ($arResult["PRODUCT_PROPERTIES"]["COLORS"]["VALUES"] as $key => $value) {
                                echo $key;
                                break;
                            } ?>" />
                        <? } ?>
                    </form>
                    <div class="basket-message">
                        <? if ($arResult["BASKET"][$arResult["ID"]]) { ?>
                            <p style="color: green; font-weight: bold;"><span class="bskQt"> В корзине <span class='item-count'><?=$arResult["BASKET"][$arResult["ID"]]?></span> шт.</span>
                                <span id="GoBsk"><a href="/basket">Перейти в корзину</a></span></p>
                        <? } ?>
                    </div>
                </div>



                <!--
                    //!!!!!!!!!!!!!
                    //  BASKET  !!!
                    //!!!!!!!!!!!!!
                -->
                </div>
            </div>





        <!--		<?/* if ($arResult["PROPERTIES"]["SUPER_DESCRIPTION"]["VALUE"]) { */?>
                    <div class="row bg-2 pad vpad border-1"><p><?/*$arResult["PROPERTIES"]["SUPER_DESCRIPTION"]["VALUE"]*/?></p></div>
                --><? /* }  */ ?>


        <!--    //********************************* Таблица характеристик      ************************************ -->
        <? if ($arResult["DISPLAY_PROPERTIES"]) {
            if (!$arResult["DISPLAY_PROPERTIES"]["COLORS"]) {
                echo "<div id='place-zoom' class=\"params row\">
                                <h2>Характеристики</h2>
                                <table class=\"small\">";
                foreach ($arResult["DISPLAY_PROPERTIES"] as $key => $arProperty) {
                    if ($key != "COLORS") {
                        echo "<tr><td>{$arProperty["NAME"]}</td><td>{$arProperty["DISPLAY_VALUE"]}</td></tr>";
                    }
                }
                echo "</table></div>";
            } elseif (count($arResult["DISPLAY_PROPERTIES"]) > 1) {
                echo "<div class=\"params row pad\">
                                <h2>Характеристики</h2>
                                <table class=\"small\">";
                $filter_key = array_flip(array('CHAR_WIDTH','DEPTH','CHAR_HEIGHT','RIDE_HEIGHT','BASE_SIZE','REC_SIZE_TT','FRAME_COLOR','SIDENIE','CHAR_WEIGHT','CHAR_MANUFACTURER','CHAR_MATERIAL','QV_NOTES'));
                $filter_array =  array_intersect_key($arResult["PROPERTIES"],$filter_key);
                foreach ($filter_array as $key => $arProperty) {
                    if (!empty($arProperty['VALUE'])) {
                        switch ($key):
                            case 'CHAR_WEIGHT': $units = 'кг';
                                break;
                            case 'FRAME_COLOR':
                            case 'SIDENIE':
                            case 'CHAR_MANUFACTURER':
                            case 'CHAR_MATERIAL':
                            case 'QV_NOTES':
                                $units = '';
                                break;
                            default :$units = 'мм';
                        endswitch;
                        echo "<tr><td>{$arProperty["NAME"]}</td><td>{$arProperty["VALUE"]} {$units}</td></tr>";
                    }
                }
                echo "</table></div>";
            }
        }

        // Описание
        /*		if ($arResult["PREVIEW_TEXT"] OR $arResult["DETAIL_TEXT"]) {
                    echo "<div class=\"descr box pad\">
                            <h2>Описание</h2>
                            <p>{$arResult["PREVIEW_TEXT"]}</p>";
                    if ($arResult["DETAIL_TEXT"]) {
                    echo "<p><a href=\"#\" class=\"more java\">Подробное описание</a></p>
                            <div class=\"hidden\">
                                <p>{$arResult["DETAIL_TEXT"]}</p>
                            </div>";
                    }
                    echo "</div>";
                } */?>

        <!--<script type="text/javascript" src="<?/*=SITE_TEMPLATE_PATH; */?>/js/jquery-1.9.1.min.js"></script>-->
            <div class="phones">
                <p><a href="tel:+74957305924">+7 (495) 369-33-60</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><a href="tel:+78001006812">+7 (800) 100-68-12</a></strong>*<br>
                    <span class="small">*звонок по России бесплатный</span></p>

            </div>
            <div class="detail_url"><a href="<?=$arResult['DETAIL_PAGE_URL']; ?>" title="Перейти к подробному представлению товара">Подробнее</a> </div>
        </div>
<!--      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/qtip2/2.2.0/jquery.qtip.min.js"></script>
        <script type="text/javascript">

            var qty = $(".add2basket .qty input.quantity");

            $(".add2basket .up").click(function() {
                newValue = $(this).parent().prev("input.quantity").attr("value") - 0 + 1;
                $(this).parent().prev("input.quantity").attr("value", newValue);
            });

            $(".add2basket .down").click(function() {
                var minqw = $(this).parent().parent().data().minqw;
                //console.log(minqw);
                //alert('1'); 
                if ($(this).parent().prev("input.quantity").attr("value") == 1) {return;}
                if ($.isNumeric(minqw)) {
                  if ($(this).parent().prev("input.quantity").attr("value") == minqw) {return;}
                }
                newValue = $(this).parent().prev("input.quantity").attr("value") - 1;
                $(this).parent().prev("input.quantity").attr("value", newValue);
            });

            qty.keyup(function() {
                var minqw = $(this).parent().data().minqw;
                if (event.keyCode != 8 && event.keyCode != 13 && event.keyCode != 46) {
                    var qty = $(this).val().replace(/[^0-9]+/, "") - 0;
                    if ($.isNumeric(minqw)) {
                      if (qty <= minqw) {qty = minqw;}
                    }
                    if (qty == 0) {qty = 1;}
                    $(this).val(qty);
                }
            });


            qty.focusout(function() {
                if ($(this).val() == "") {$(this).val("1");}
            });

            var colors = $('.colors .color');
            if(colors.length < 8) {
                $('.colors .dropdown').hide();
            } else {
               $('.colors .dropdown').click(function(){
                    $(this).animate({
                        height:"toggle",
                        opacity:"toggle"
                    },'normal',function(){
//                         for(i=0;i<jqObject.length;i++){
                        var i = 0;
                        $(jqObject[i]).show('slow',function(){
                            function complete (){
                                if($(jqObject[i]).length){
                                    $(jqObject[i+1]).show('slow',function(){
                                        i++;
                                        complete();
                                    });
                                }
                            }
                            complete();
                        });


                        // }
                    });
                });
            }
            var jqObject = [];
            colors.each(function(i,el){
                if(i>8){
                    $(this).hide();
                    jqObject.push(el);

                }
                jqObject.join(", ");
                $(this).qtip({
                    content: {
                        text: $(this).find('img').attr('alt')
                    }
                });
            });
            colors.click(function() {
                if($(this).hasClass('active') == false) {
                    $(this).parent().find('.active').removeClass('active');
                    $(this).addClass('active');
                }
                $(".add2basket .color-input").attr("value", $(this).children("input").attr("value"));
            });







        </script>-->
<!--
--><?/* echo '<pre>' . print_r($arResult, true) . '</pre>';*/?>

