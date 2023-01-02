<?php
include_once '/var/www/html/lk/kursach/db/alerts/alerts.php';

function db_connect(){
    $link = mysqli_connect('localhost', 'galimimus', 'pass111','kursach');

    alert_error($link, "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    
    mysqli_set_charset($link, "utf8");
    return $link;
}