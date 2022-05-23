<?php
require_once('functions.php');
require_once('data.php');

$data = ['goods_name' => '', 'category_name' => '', 'goods_info' => '', 'goods_price' => 0, 'goods_bid' => 0, 'goods_date_end' => ''];

$form_errors = '';

if(isset($_POST['submit'])){
    $data = $_POST;
    $data['goods_price'] = (int)$data['goods_price'];
    $data['goods_bid'] = (int)$data['goods_bid'];
    $form_errors = checking($data, $_FILES);

    if (count($form_errors) == 0){
        $sent = CreateLot()
    }
}

$cat = [];
$cat = $categories;

$main = include_template(
    'add.php',
    [
        'categories' => $categories,
        'data' => $data,
        'form_errors' => $form_errors
    ]
);

$layout_content = include_template(
    'layout.php',
    [
        'main' => $main,
        'categories' => $categories,
        'title' => 'Добавление лота',
        'is_auth' => $is_auth,
        'user_name' => $user_name
    ]
);

print($layout_content);

function CreateLot()
