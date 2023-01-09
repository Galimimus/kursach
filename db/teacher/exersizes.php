<?php
include_once '/var/www/html/lk/kursach/db/db_connect.php';
function add_exersize($subject_id, $text, $name, $teacher_id){

    $link=db_connect();
    $sql = "INSERT INTO exercises (text, subject_id, teacher_id, name) VALUES ('$text', $subject_id, $teacher_id, '$name')";
    $result = mysqli_query($link,$sql);
    $pass = 1;
        if ($result == false) {

            $pass = "Произошла ошибка при выполнении запроса";

        }  

    mysqli_close($link);
    
    return $pass;
}

//ДОБАВИТЬ ФУНКЦИЮ УДАЛЕНИЯ ЗАДАНИЯ!!!!!!!