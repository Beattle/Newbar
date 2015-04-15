<?php
/**
 * Created by PhpStorm.
 * User: Hipno
 * Date: 02.03.14
 * Time: 21:35
 */
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$arEventFields = array(
    'AUTHOR'                =>  !empty($_POST['name'])?$_POST['name']:'Не указано',
    'PHONE'                 =>  !empty($_POST['phone'])?$_POST['phone']:'Не указано', //:)
    'TIME'                  =>  !empty($_POST['time'])?$_POST['time']:'Не указано',
    'TEXT'                  =>  !empty($_POST['ask'])?$_POST['ask']:'Не указано',

);
    CModule::IncludeModule("main");
    if (CEvent::SendImmediate("FEEDBACK_FORM", "s1", $arEventFields,'N',40)):
        echo "check up and good to go";
    endif;

