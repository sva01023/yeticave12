<?php
require_once('functions.php');
require_once('connectDB.php');

$id = 0;

if(isset($_GET["id_goods"]))
{
    $id = $_GET["id_goods"];
    $sql = 'SELECT * FROM goods INNER JOIN category on goods.id_category = category.id_category WHERE id_goods ='.$id;
    $result = mysqli_query($link, $sql);
    $
    if ()
    {

    }
    else
    {
        header('404.php');
    }
}


$main = include_template(
    'lot.php',
    [
        'categories' => $categories,
        'goods' => $goods,
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'main' => $main,
        'categories' => $categories,
        'goods' => $goods,
        'title' => $current['goods_name'],
        'is_auth' => $is_auth,
        'user_name' => $user_name,
    ]
);

print($layout_content);

?>
