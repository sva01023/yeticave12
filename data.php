<?php

$link = mysqli_connect('127.0.0.1', 'root', '','schema');
mysqli_set_charset($link, "utf8");

if (!$link) {
    $error = mysqli_connect_error();
    $main = include_template('error.php', ['error' => $error]);
}

else {
    $sql1 = "SELECT * FROM category";
    $result1 = mysqli_query($link, $sql1);

    if ($result1) {
        $categories = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $main = include_template('error.php', ['error' => $error]);
    }


    $sql2 = 'SELECT * FROM goods inner join category on goods.id_category=category.id_category';
    $result2 = mysqli_query($link, $sql2);

    if ($result2) {
        $goods = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $main = include_template('error.php', ['error' => $error]);
    }
}

?>
