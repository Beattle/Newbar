<?php
/**
 * User: Hipno
 * Date: 07.03.15
 * Time: 1:12
 * Project: Newbar
 */

// echo '<pre>'.print_r($arResult,true).'</pre>';
function iterateMenu ($tree,$k,$output=''){

    foreach($tree as $key =>$branch){

        if($branch['DEPTH_LEVEL'] == 1){
            $output .="<li class='level1'><a  href='{$branch['URL']}'>{$branch['NAME']}</a>";
        }



        if($branch['DEPTH_LEVEL'] == 2 && (empty($branch['COLUMN']) || empty($branch['ROW']))){
            unset($tree[$key]);
            continue;
        }

        $first_key = key($tree);
        if($branch['DEPTH_LEVEL'] == 2 && $key == $first_key){
            $output .= "<div class='hidden'><table><tr><td>";
        }



/*        if($branch['DEPTH_LEVEL'] == 2 && $tree[$key+1]['COLUMN'] == $branch['COLUMN'] ){
            $output .="<td>";
        }*/
        if($branch['DEPTH_LEVEL'] == 2){
            $no_children = '';
            if(!$branch['children']){
                $no_children =' no-children';
            }
            $output .="<div class='level2 $no_children'><p><a title='{$branch['NAME']}' href='{$branch['URL']}'>{$branch['NAME']}</a></p>";

        }
        if($branch['DEPTH_LEVEL'] == 3 && $key == 0 ){
            $output .= "<ul>";
         }
        if($branch['DEPTH_LEVEL'] == 3){
            $output .= "<li class='level3'><a href='{$branch['URL']}' title='{$branch['NAME']}'>{$branch{'NAME'}}</a></li>";
        }
        if($branch['DEPTH_LEVEL'] == 3 && $key == $k[$branch['DEPTH_LEVEL']]-1){
            $output .= "</ul></div>";
        }


        if($branch['children']){
            $k[$branch['DEPTH_LEVEL']+1] = count($branch['children']);
           $output .= iterateMenu($branch['children'],$k);
        }elseif($branch['DEPTH_LEVEL'] == 2  &&  $branch['children'] == false){
            $output .= "</div>";
        }

        if ($branch['DEPTH_LEVEL'] == 2 && $tree[$key+1]['COLUMN'] != $branch['COLUMN']){
            $output .="</td>";
            if($tree[$key+1]) $output .= '<td>';
        }

        if($branch['DEPTH_LEVEL'] == 2 && $key == $k[$branch['DEPTH_LEVEL']]-1){
            $output .= "</tr></table></div>";
        }
        if($branch['DEPTH_LEVEL'] == 2){
           //  $output .= "</li>";
        }
        if($branch['DEPTH_LEVEL'] == 1){
            $output .= "</li>";
        }

    }
    return $output;
}

$string = '<ul>';
$string .= iterateMenu($arResult,$k=array(),$output);
$string .= '</ul>';
?>
<nav class="menu-table">
    <?php echo  $string;?>
</nav>


