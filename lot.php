<?php

require_once('functions.php');
require_once "data.php";


$id = 0;

if (isset($_GET["id_goods"]))
{
    $id = $_GET['id_goods'];
    foreach ($goods as $g)
    {
        if (intval($g['id_goods']) == $id){
            $thisgoods = $g;
        }
        else{
            header("404.php");
        }
    }
}


    $main = include_template(
        'lot.php',
        [
            'is_auth' => $is_auth,
            'categories' => $categories,
            'goods' => $goods,
            'thisgoods' => $thisgoods
        ]
    );

    $layout_content = include_template(
        'layout.php',
        [
            'main' => $main,
            'categories' => $categories,
            'title' => $thisgoods['goods_name'],
            'is_auth' => $is_auth,
            'user_name' => $user_name
        ]
    );

print($layout_content);


?>
