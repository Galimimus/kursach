<?php

function db_connect(){
    $link = mysqli_connect('localhost', 'galimimus', 'pass111','kursach');

    
    mysqli_set_charset($link, "utf8");
    return $link;
}