<?php 
//обработка дефолта!!!
//Добавление отправки сообщений об успехе\ошибке
include '/var/www/html/lk/kursach/db/admin.php';
include '/var/www/html/lk/kursach/db/exersizes.php';
 
switch ($_GET['q']){
    case "add_student":

        $fio = $_GET['fio'];
        $grade = $_GET['grade'];
        $pass = add_student($grade, $fio);
        echo $pass;
        break;

    case "add_teacher":

        $fio = $_GET['fio'];
        $pass = add_teacher($fio);
        echo $pass;
        break;

    case 'remove_student':

        $fio = $_GET['fio'];
        $grade = $_GET['grade'];
        remove_student($grade, $fio);
        break;

    case 'delete_teacher':
        $fio = $_GET['fio'];
        remove_teacher($fio);
        break;

    case 'add_subject_to_teacher':

        $fio = $_GET['fio'];
        $grade = $_GET['grade'];
        $subject = $_GET['subject'];
        $res = add_subject_to_teacher($fio, $subject, $grade);
        echo $res;
        break;
    
    case 'add_subject':
        $grade = $_GET['grade'];
        $subject = $_GET['subject'];
        $res = add_subject($subject, $grade);
        echo $res;
        break;

    case 'add_exersize':
        session_start();
        $text = $_GET['text'];
        $subject_id = $_GET['subject_id'];
        $name = $_GET['name'];
        $teacher_id = $_SESSION['id'];
        $res = add_exersize($subject_id, $text, $name, $teacher_id);
        echo $res;
        break;
    
}