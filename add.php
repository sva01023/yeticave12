<?php
require_once('functions.php');
require_once('data.php');

/* $data = ['goods_name' => '', 'category_name' => '', 'goods_info' => '', 'goods_price' => 0, 'goods_bid' => 0, 'goods_date_end' => '']; */


$form_errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['goods_name']) && !empty($_POST['goods_info']) && !empty($_FILES['image']['name']) && !empty($_POST['goods_price']) && !empty($_POST['goods_date_end']) && !empty($_POST['goods_bid']))
        {
            $file = $_FILES['image']['name'];
            $path = $_FILES['image']['tmp_name'];
            move_uploaded_file($path, 'img/' . $file);

            $id_author = 1;
            $id_category = $_POST['category_name'];
            $goods_name = $_POST['goods_name'];
            $goods_info = $_POST['goods_info'];
            $goods_img = 'img/' . $_FILES['image']['name'];
            $goods_price = $_POST['goods_price'];
            $goods_date_end = $_POST['goods_date_end'];
            $goods_bid = $_POST['goods_bid'];

            $query_add = "INSERT INTO goods (goods_date_reg, goods_name, goods_info, goods_img, goods_price, goods_date_end, goods_bid, id_author, id_winner, id_category) VALUES
                (now(), '$goods_name', '$goods_info', '$goods_img', $goods_price, '$goods_date_end', $goods_bid, 1, null, $id_category)";
            $result_add = mysqli_query($link, $query_add);

            $query_read = 'SELECT id_goods from goods order by id_goods desc';
            $result_id = mysqli_query($link, $query_read);

            $ID = $result_id->fetch_row()[0];
            if ($result_add) {
                header('Location:lot.php?page=' . $ID);
            } else {

            }
        } else {
            if (empty($_POST['goods_name']))
                array_push($form_errors, '1');
            if (empty($_POST['goods_info']))
                array_push($form_errors, '2');
            if (empty($_FILES['image']['name']))
                array_push($form_errors, '3');
            if (empty($_POST['goods_price']))
                array_push($form_errors, '4');
            if (empty($_POST['goods_date_end']))
                array_push($form_errors, '5');
            if (empty($_POST['goods_bid']))
                array_push($form_errors, '6');
        }
    }

    $main = include_template(
        'add.php',
        [
            'categories' => $categories,
            'goods' => $goods,
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

