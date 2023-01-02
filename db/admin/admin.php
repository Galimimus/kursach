<!--функции для работы с бд через лк админа.
(добавление в бд учеников и учителей, их удаление)
автогенерация пароля.

работа с таблицами grades, employees, subjects

восстановление пароля через почту сделать(отдельно)
доделать удаление

генерацию пароля переделать-->

<?php


include_once '/var/www/html/lk/kursach/db/db_connect.php';
include_once '/var/www/html/lk/kursach/db/alerts/alerts.php';

function add_student($grade_name, $student_name){
    $link=db_connect();
    $pass = gen_password(8);
    $pass_hash = md5($pass);
    $sql = "INSERT INTO grades (grade_name, student_name, password) VALUES ('$grade_name', '$student_name', '$pass_hash')";
    $result = mysqli_query($link,$sql);

    $err = alert_error($result, "Произошла ошибка при выполнении запроса к таблице grades");

    mysqli_close($link);
    echo $err;
    return $pass;
}
 
function add_teacher($name){
    $link=db_connect();
    $pass = gen_password();
    $pass_hash = md5($pass);
    //$pass = md5("Password111");
    $sql = "INSERT INTO employees (name, subjects_id, grades_id, password) VALUES ('$name', '', '', '$pass_hash')";
    $result = mysqli_query($link,$sql);

    alert_error($result, "Произошла ошибка при выполнении запроса к таблице employees");

    mysqli_close($link);
    return $pass;
}

function remove_student($grade_name, $student_name){
    $link=db_connect();

    //TODO: удаление из таблицы grades
    //this code will remove student_name from grades where grade_name = $grade_name
    $sql = "SELECT student_name FROM grades WHERE grade_name='$grade_name'";

    mysqli_close($link);
}

function remove_teacher($name){
    $link=db_connect();

    //TODO: удаление из таблицы employees

    mysqli_close($link);
}

function add_subject_to_teacher($teacher_name, $subject_name, $grade_name){
    $link=db_connect();
    $sql = "SELECT subjects_id FROM employees WHERE name='$teacher_name'";
    $result = mysqli_query($link,$sql);

    alert_error($result, "Произошла ошибка при выполнении запроса к таблице employees");


    $row = mysqli_fetch_array($result);
    $subjects = explode(" ", $row['subjects_id']);
    $subjects_length = count($subjects);
    $subjects_new = $row['subjects_id'];
    $subjects_new .= "x";

    $sql = "SELECT subject_id FROM subjects WHERE name='$subject_name' AND grade_name = '$grade_name'";
    $result = mysqli_query($link,$sql);

    alert_error($result, "Произошла ошибка при выполнении запроса к таблице subjects");

    $row = mysqli_fetch_array($result);
    $subject_id = $row['subject_id'];
    settype($subject_id, "string");

    
    for($i=0; $i<$subjects_length; $i++){
        if(!strcmp($subjects[$i], $subject_id)){
            mysqli_close($link);
            return true;
        }
    }

    $subjects_new .= $subject_id;
    $sql = "UPDATE employees SET subjects_id='$subjects_new' WHERE name='$teacher_name'";
    $result = mysqli_query($link,$sql);

    alert_error($result, "Произошла ошибка при выполнении запроса к таблице employees");

    $res = add_grade_to_teacher($teacher_name, $grade_name);
    mysqli_close($link);
    return $result && $res;
}

function remove_subject_from_teacher(){
    $link=db_connect();

    mysqli_close($link);
}

function add_grade_to_teacher($teacher_name, $grade_name){
    $link=db_connect();
    $sql = "SELECT grades_id FROM employees WHERE name='$teacher_name'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    $grades = explode(" ", $row['grades_id']);
    $grades_length = count($grades);
    $grades_new = $row['grades_id'];
    $grades_new .= " ";

    for($i=0; $i<$grades_length; $i++){
        if(!strcmp($grades[$i], $grade_name)){
            mysqli_close($link);
            return true;
        }
    }

    $grades_new .= $grade_name;
    $sql = "UPDATE employees SET grades_id='$grades_new' WHERE name='$teacher_name'";
    $result = mysqli_query($link,$sql);

    mysqli_close($link);
    return $result;

}

function remove_grade_from_teacher(){
    $link=db_connect();

    mysqli_close($link);
}

function add_subject($subject, $grade){
    $link=db_connect();

    $sql = "INSERT INTO subjects (name, grade_name) VALUES ('$subject', '$grade')";
    $result = mysqli_query($link,$sql);
    mysqli_close($link);

    return $result;
}

function remove_subject(){
    $link=db_connect();

    mysqli_close($link);
}


 
function gen_password($length = 8)
{
	$password = '';
	$arr = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
		'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
		'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
		'1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
	);  
	$pass = array();
	$pass[] = $arr[random_int(0, count($arr) - 1)];
	$pass[] = $arr[random_int(0, count($arr) - 1)];
	$pass[] = $arr[random_int(0, count($arr) - 1)];
	$pass[] = $arr[random_int(0, count($arr) - 1)];
	$pass[] = $arr[random_int(0, count($arr) - 1)];
	$pass[] = $arr[random_int(0, count($arr) - 1)];
	$pass[] = $arr[random_int(count($arr) - 37, count($arr) - 11)];
	$pass[] = $arr[random_int(count($arr) - 11, count($arr) - 1)];
	shuffle($pass);
	$password = implode($pass);
	return $password;
}




