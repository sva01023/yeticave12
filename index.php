<?php
require_once('functions.php');

// Практика 8

$link = mysqli_connect('127.0.0.1', 'root', '','schema');
mysqli_set_charset($link, "utf8");

if (!$link) {
    $error = mysqli_connect_error();
    $main = include_template('error.php', ['error' => $error]);
}

else {
    $sql = "SELECT * FROM category";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $main = include_template('error.php', ['error' => $error]);
    }


    $sql = 'SELECT * FROM goods left join category on goods.id_category=category.id_category';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $main = include_template('error.php', ['error' => $error]);
    }
}

//


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

