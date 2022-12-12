<!--функции для работы с бд через лк админа.
(добавление в бд учеников и учителей, их удаление)
автогенерация пароля.

работа с таблицами grades, employees, subjects

восстановление пароля через почту сделать(отдельно)
за айди класса брать название???
переделать под аякс??-->

<?php



function add_student($grade_name, $student_name){
    $link=db_connect();
    $pass = gen_password(8);
    $pass_hash = md5($pass);
    $grade_id = $grade_name;
    settype($grade_id, "int");
    $sql = "INSERT INTO grades (grade_id, grade_name, student_name, password) VALUES ($grade_id, '$grade_name', '$student_name', '$pass_hash')";
    $result = mysqli_query($link,$sql);

        if ($result == false) {

            print("Произошла ошибка при выполнении запроса");

        }  

    mysqli_close($link);
    return $pass;
}

function add_teacher($name){
    $link=db_connect();
    $pass = md5(gen_password(8));
    //$pass = md5("Password111");
    $sql = "INSERT INTO employees (name, subjects_id, grades_id, password) VALUES ('$name', '', '', '$pass')";
    $result = mysqli_query($link,$sql);

        if ($result == false) {

            print("Произошла ошибка при выполнении запроса");

        }  

    mysqli_close($link);
    return $pass;
}

function remove_student($grade_name, $student_name){

}

function remove_teacher($name){

}

function add_subject_to_teacher(){

}

function remove_subject_from_teacher(){

}

function add_grade_to_teacher(){

}

function remove_grade_from_teacher(){

}

function add_subject(){

}

function remove_subject(){

}

function db_connect(){
    $link = mysqli_connect('localhost', 'galimimus', 'pass111','kursach');
    if ($link == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }
    
    mysqli_set_charset($link, "utf8");
    return $link;
}

function gen_password($length = 6)
{
	$password = '';
	$arr = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
		'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
		'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
		'1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
	);
 
	for ($i = 0; $i < $length; $i++) {
		$password .= $arr[random_int(0, count($arr) - 1)];
	}
	return $password;
}
 
