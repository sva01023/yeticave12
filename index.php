<?php
$is_auth = rand(0, 1);

$user_name = 'Пользователь123424'; // укажите здесь ваше имя

$categories = array('Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное');

$goods = [
    ['Name'=>'2014 Rossignol District Snowboard','Category'=>'Доски и лыжи','price'=>10999,'Url'=>'img/lot-1.jpg'],
    ['Name'=>'DC Ply Mens 2016/2017 Snowboard','Category'=>'Доски и лыжи','price'=>159999,'Url'=>'img/lot-2.jpg'],
    ['Name'=>'Крепления Union Contact Pro 2015 года размер L/XL','Category'=>'Крепления','price'=>8000,'Url'=>'img/lot-3.jpg'],
    ['Name'=>'Ботинки для сноуборда DC Mutiny Charocal','Category'=>'Ботинки','price'=>10999,'Url'=>'img/lot-4.jpg'],
    ['Name'=>'Куртка для сноуборда DC Mutiny Charocal','Category'=>'Одежда','price'=>7500,'Url'=>'img/lot-5.jpg'],
    ['Name'=>'Маска Oakley Canopy','Category'=>'Разное','price'=>5400,'Url'=>'img/lot-6.jpg'],
];

require_once('functions.php');

$main = include_template(
    'index.php',
    [
        'categories' => $categories,
        'goods' => $goods,
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'title' => 'Главная страница',
        'main' => $main,
        'categories' => $categories,
        'is_auth' => $is_auth,
        'user_name' => $user_name
    ]
);

print($layout_content);

?>

