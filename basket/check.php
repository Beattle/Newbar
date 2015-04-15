<?php
/**
 * User: Hipno
 * Date: 17.03.15
 * Time: 18:06
 * Project: Newbar
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(check_bitrix_sessid()){
    echo '1';
} else{
    echo "2";
}
echo '<pre>'.print_r(check_bitrix_sessid(),true).'</pre>';