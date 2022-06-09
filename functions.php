<?php

/* function checking(array $data, array ) */

function price ($price) {
    $price =ceil($price);
    if ($price >= 1000){
        $result = number_format($price,0,' ',' ');
    }
    else $result = $price;
    return $result . ' ₽';
}

function data_end () {
    $current = time();
    $tomorrowMidnight = strtotime('tomorrow');
    $unix = $tomorrowMidnight - $current;

    $h = floor($unix / 3600);
    $m = floor(($unix % 3600) / 60);

    if ($h < 10) {
        $h = sprintf("%02d", $h);
    }

    if ($m < 10) {
        $m = sprintf("%02d", $m);
    }

    return "{$h}:{$m}";
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}

$is_auth = rand(0, 1);
$user_name = 'Пользователь31234';


